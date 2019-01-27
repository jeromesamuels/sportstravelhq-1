<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Helper
{
    static function showAmenities()
    {
    	$users = \App\User::all();

    	$r = '<ul class="unstyled centered">';
    	$amenities = DB::table('hotel_amenities')->get();
		foreach ($amenities as $key => $value) {

    		$r .= '<li>
			    <input class="styled-checkbox" id="styled-checkbox-'.$value->id.'" type="checkbox" value="'.$value->id.'" name="trip_amenities[]">
			    <label for="styled-checkbox-'.$value->id.'">'.$value->title.'</label>
			  </li>';
		}

        return '</ul>'.$r;
    }

    static function addTripStatusLog($step, $trip_id, $rfp_id=0)
    {
        $user_trip = DB::table('user_trips')->where('id', '=', $trip_id)->first();
        $coordinator = DB::table('tb_users')->where('id', '=', $user_trip->entry_by)->first();

        if($rfp_id!=0) {
            $user_rfp = DB::table('rfps')->where('id', '=', $rfp_id)->first();
            $manager = DB::table('tb_users')->where('id', '=', $user_rfp->user_id)->first();
        } else {
            $manager = new \stdClass();
            $manager->first_name = ' ';
            $manager->last_name = ' ';
        }

        $trip_statuses = DB::table('trip_statuses')->where('step', '=', $step)->get();


        $str_search = array('{coordinator_name}', 
                            '{manager_name}', 
                            '{trip_title}', 
                            '{trip_id}', 
                            '{rfp_id}');

        $str_replace = array($coordinator->first_name.' '.$coordinator->last_name, 
                             $manager->first_name.' '.$manager->last_name, 
                             $user_trip->trip_name, 
                             $trip_id, 
                             $rfp_id); 


        foreach ($trip_statuses as $trip_status) {

            //this is for Travel Coordinator
            if($trip_status->group_level == 4) 
            {
                $user_id = $user_trip->entry_by;
                $users = DB::table('tb_users')->where('id', '=', $user_id)->first();
                $to = $users->email;
                $subject = "[ " .config('sximo.cnf_appname')." ] ".$trip_status->mail_subject;

                $data = array(
                    'mail_body' => str_replace($str_search, $str_replace, $trip_status->mail),
                    'email'     => $to,
                    'subject'   => str_replace($str_search, $str_replace, $subject)
                );
                \Mail::send('emails.trips.new_trip', $data, function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['subject']);
                });
            }

            //this is for Hotel Manager
            if($trip_status->group_level == 5) 
            {
                if($step == 1) 
                {
                    $user_id = 0;   // 0 means to all hotel manager
                    $managers = DB::table('tb_users')->where('group_id', '=', 5)->get();
                } else {
                    $rfp = DB::table('rfps')->where('id', '=', $rfp_id)->first();
                    $user_id = $rfp->user_id;
                    $managers = DB::table('tb_users')->where('id', '=', $user_id)->get();
                }

                foreach ($managers as $manager) {

                    $str_replace = array($coordinator->first_name.' '.$coordinator->last_name, 
                    $manager->first_name.' '.$manager->last_name, 
                    $user_trip->trip_name, 
                    $trip_id, 
                    $rfp_id); 


                    $to = $manager->email;
                    $subject = "[ " .config('sximo.cnf_appname')." ]".$trip_status->mail_subject; 

                    $data = array(
                        'mail_body' => str_replace($str_search, $str_replace, $trip_status->mail),
                        'email'     => $to,
                        'subject'   => str_replace($str_search, $str_replace, $subject)
                    );
                    \Mail::send('emails.trips.new_trip', $data, function ($message) use ($data) {
                        $message->to($data['email'])->subject($data['subject']);
                    });
                }
            }

            $trip_status_logs[] = array(
                'trip_id'=> $trip_id, 
                'user_id'=> $user_id, 
                'rfp_id'=> $rfp_id, 
                'trip_status_id'=> $trip_status->id, 
                'generated_title'=> str_replace($str_search, $str_replace, $trip_status->title), 
                'generated_description'=> str_replace($str_search, $str_replace, $trip_status->description), 
                'generated_mailsubject'=> str_replace($str_search, $str_replace, $trip_status->mail_subject), 
                'generated_mail'=> str_replace($str_search, $str_replace, $trip_status->mail) 
            );
        }

        DB::table('trip_status_logs')->insert($trip_status_logs);
    }

}


