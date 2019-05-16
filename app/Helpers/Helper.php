<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use App\Models\AgreementForm;
use App\Models\Hotel;
use App\Models\HotelAmenities;
use App\Models\Rfp;
use App\Models\Team;
use App\Models\UserTrip;
use App\Models\Invitation;
use App\Models\Invoices;
use App\User;

class Helper {

    static function showAmenities() {
        $users = \App\User::all();
        $r = '
        <ul class="unstyled centered">
            ';
        $amenities = HotelAmenities::where('id', '<', 5)->get();
        foreach ($amenities as $key => $value) {
            $r.= '
            <li>
                <input class="styled-checkbox" id="styled-checkbox-' . $value->id . '" type="checkbox" value="' . $value->id . '" name="trip_amenities[]">
                <label for="styled-checkbox-' . $value->id . '">' . $value->title . '</label>
            </li>
            ';
        }
        return '
        </ul>
        ' . $r;
    }

    static function showAmenitiesall() {
        $users = \App\User::all();
        $r = '
        <ul class="unstyled centered">
            ';
        $amenities = HotelAmenities::where('id', '>', 4)->get();
        foreach ($amenities as $key => $value) {
            $r.= '
            <li>
                <input class="styled-checkbox" id="styled-checkbox-' . $value->id . '" type="checkbox" value="' . $value->id . '" name="trip_amenities[]">
                <label for="styled-checkbox-' . $value->id . '">' . $value->title . '</label>
            </li>
            ';
        }
        return '
        </ul>
        ' . $r;
    }

    static function addTripStatusLog($step, $trip_id, $rfp_id = 0, $reason = 0) {
        $user_trip = UserTrip::where('id', '=', $trip_id)->first();
        $coordinator = User::where('id', '=', $user_trip->entry_by)->first();
        if ($rfp_id != 0) {
            $user_rfp = Rfp::where('id', '=', $rfp_id)->first();
            $manager = User::where('id', '=', $user_rfp->user_id)->first();
        } else {
            $manager = new \stdClass();
            $manager->first_name = ' ';
            $manager->last_name = ' ';
        }
        $trip_statuses = DB::table('trip_statuses')->where('step', '=', $step)->get();
        $str_search = array('{coordinator_name}', '{manager_name}', '{trip_title}', '{trip_id}', '{rfp_id}',);
        $str_replace = array($coordinator->first_name . ' ' . $coordinator->last_name, $manager->first_name . ' ' . $manager->last_name, $user_trip->trip_name, $trip_id, $rfp_id,);
        /*Get declined message*/
        if ($reason == 1) {
            $declined_msg = "No availability for dates requested";
        } elseif ($reason == 2) {
            $declined_msg = "Budget too low";
        } elseif ($reason == 3) {
            $declined_msg = "To many Concessions";
        } elseif ($reason == 4) {
            $declined_msg = "Property under renovation";
        } else {
            $declined_msg = "..";
        }

        $declined_msg_reason = "Reason:" . $declined_msg;
        foreach ($trip_statuses as $trip_status) {
            //this is for Travel Coordinator
            if ($trip_status->group_level == 4) {
                $user_id = $user_trip->entry_by;
                $users = User::where('id', '=', $user_id)->first();
                $to = $users->email;
                $subject = "[ " . config('sximo.cnf_appname') . " ] " . $trip_status->mail_subject;
                $data = array('mail_body' => str_replace($str_search, $str_replace, $trip_status->mail, $declined_msg_reason), 'email' => $to, 'subject' => str_replace($str_search, $str_replace, $subject),);
                \Mail::send('emails.trips.new_trip', $data, function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['subject']);
                });
            }
            /*send it to Guest user*/
            $guest_users = Invitation::where(['group_id' => 5, 'status' => 0])->get();
            if (count($guest_users) > 0) {
                foreach ($guest_users as $guest_users_new) {
                    $to_guest = $guest_users_new->email;
                    $trip_guest = $trip_id;
                    $subject_guest = "[ " . config('sximo.cnf_appname') . " ] " . $trip_status->mail_subject;
                    $coordinator_name = $coordinator->first_name . ' ' . $coordinator->last_name;
                    $data_guest = array("trip_id" => $trip_guest, "trip_name" => $user_trip->trip_name, "adddress" => $user_trip->from_address_1, "city" => $user_trip->from_city, "state" => $user_trip->from_state_id, "zip_code" => $user_trip->from_zip, "check_in" => $user_trip->check_in, "check_out" => $user_trip->check_out, "budget_from" => $user_trip->budget_from, "budget_to" => $user_trip->budget_to, "double_queen_qty" => $user_trip->double_queen_qty, "double_king_qty" => $user_trip->double_king_qty, "added" => $user_trip->added, "coordinator_name" => $coordinator_name, 'subject_guest' => $subject_guest, "email" => $to_guest,);
                    \Mail::send('emails.trips.new_trip_guest', compact('data_guest'), function ($message_guest) use ($data_guest, $to_guest) {
                        $message_guest->to($to_guest)->subject($data_guest['subject_guest']);
                    });
                }
            }
            if ($trip_status->group_level == 10) {
                $user_trip = UserTrip::where('id', '=', $rfp_id)->first();
                $to = $user_trip->sales_manager;
                $subject = "[ " . config('sximo.cnf_appname') . " ] " . $trip_status->mail_subject;
                $data_guest = array("trip_id" => $trip_id, "trip_name" => $user_trip->trip_name);
                \Mail::send('emails.trips.accept_trip_guest', compact('data_guest'), function ($message_guest) use ($data_guest, $to_guest) {
                    $message_guest->to($to_guest)->subject($data_guest['subject_guest']);
                });
            }
            //this is for Hotel Manager
            if ($trip_status->group_level == 5) {
                if ($step == 1) {
                    $user_id = 0; // 0 means to all hotel manager
                    $managers = User::where('group_id', '=', 5)->get();
                } else {
                    $rfp = Rfp::where('id', '=', $rfp_id)->first();
                    $user_id = $rfp->user_id;
                    $managers = User::where('id', '=', $user_id)->get();
                }
                foreach ($managers as $manager) {
                    $str_replace = array($coordinator->first_name . ' ' . $coordinator->last_name, $manager->first_name . ' ' . $manager->last_name, $user_trip->trip_name, $trip_id, $rfp_id,);
                    $to = $manager->email;
                    $subject = "[ " . config('sximo.cnf_appname') . " ]" . $trip_status->mail_subject;
                    $data = array('mail_body' => str_replace($str_search, $str_replace, $trip_status->mail, $declined_msg_reason), 'email' => $to, 'subject' => str_replace($str_search, $str_replace, $subject),);
                    \Mail::send('emails.trips.new_trip', $data, function ($message) use ($data) {
                        $message->to($data['email'])->subject($data['subject']);
                    });
                }
            }
            
            $ip = \Request::ip();
            $location = \Location::get($ip);
            $trip_status_logs[] = array('trip_id' => $trip_id, 'user_id' => $user_id, 'rfp_id' => $rfp_id, 'trip_status_id' => $trip_status->id, 'generated_title' => str_replace($str_search, $str_replace, $trip_status->title), 'generated_description' => str_replace($str_search, $str_replace, $trip_status->description), 'generated_mailsubject' => str_replace($str_search, $str_replace, $trip_status->mail_subject), 'generated_mail' => str_replace($str_search, $str_replace, $trip_status->mail), 'reason' => $declined_msg, 'ip' => $ip, 'country' => $location->countryCode, 'location' => $location->regionName . ' <br> ' . $location->cityName . ' , ' . $location->zipCode,);
        }
        \DB::table('trip_status_logs')->insert($trip_status_logs);
    }
}
