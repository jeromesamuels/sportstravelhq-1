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
}