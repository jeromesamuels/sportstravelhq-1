<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Hotel
 * @package App\Models
 *
 * @property int id
 * @property string hotel_code
 * @property string service_type
 * @property string name
 * @property string address
 * @property string city
 * @property int zip
 * @property string type
 * @property string domain
 * @property string logo
 * @property string property
 * @property int rating
 * @property bool active
 * @property string IATA_number
 * @property string blackout_start
 * @property string blackout_end
 * @property string blackout_reason
 * @property string test
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon updated_at
 */
class Hotel extends Model
{
	
    // Many To Many Relation With Amenities
	public function amenities(){
		return $this->belongsToMany(hotelamenities::class,'h_amenity_pivot','hotel_id','amenity_id');
	}
}
