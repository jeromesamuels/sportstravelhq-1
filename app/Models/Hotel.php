<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Sximo  {
	
	protected $table = 'hotels';
	protected $primaryKey = 'id';

    /**
     * This is for the type service_type field.
     * I dont know which is which, but its a zero or a one.
     */
    const SERVICE_FULL = 0;
    const SERVICE_PARTIAL = 1;

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT hotels.* FROM hotels  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE hotels.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	
     // Many To Many Relation With Amenities
	public function amenities(){
		return $this->belongsToMany(hotelamenities::class,'h_amenity_pivot','hotel_id','amenity_id');
	}
	

}
