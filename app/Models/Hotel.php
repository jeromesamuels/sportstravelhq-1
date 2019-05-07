<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
	
    // Many To Many Relation With Amenities
	public function amenities(){
		return $this->belongsToMany(hotelamenities::class,'h_amenity_pivot','hotel_id','amenity_id');
	}
}
