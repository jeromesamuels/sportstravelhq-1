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
        $trip_statuses = DB::table('trip_statuses')->where('step', '=', $step)->get();

        foreach ($trip_statuses as $trip_status) {

            if($trip_status->group_level == 4) 
            {
                $user_id = $user_trip->entry_by;
                $users = DB::table('tb_users')->where('id', '=', $user_id)->first();
                $to = $users->email;

                $subject = "[ " .config('sximo.cnf_appname')." ] ".$trip_status->subject; 
                $data['mail_body'] = $trip_status->description;

                $message = view('emails.trips.new_trip', $data);
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: '.config('sximo.cnf_appname').' <'.config('sximo.cnf_email').'>' . "\r\n";
                mail($to, $subject, $message, $headers);
            }

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
                    $to = $manager->email;
                    $subject = "[ " .config('sximo.cnf_appname')." ]".$trip_status->subject; 
                    $data['mail_body'] = $trip_status->description;

                    $message = view('emails.trips.new_trip', $data);
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: '.config('sximo.cnf_appname').' <'.config('sximo.cnf_email').'>' . "\r\n";
                    mail($to, $subject, $message, $headers);
                }
            }

            $trip_status_logs[] = array(
                'trip_id'=> $trip_id, 
                'user_id'=> $user_id, 
                'rfp_id'=> $rfp_id, 
                'trip_status_id'=> $trip_status->id, 
                'generated_title'=> $trip_status->title, 
                'generated_description'=> $trip_status->description, 
                'generated_mailsubject'=> $trip_status->mail_subject, 
                'generated_mail'=> $trip_status->mail 
            );
        }

        DB::table('trip_status_logs')->insert($trip_status_logs);
    }

}


