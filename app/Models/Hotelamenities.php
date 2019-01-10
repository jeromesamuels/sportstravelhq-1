<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class hotelamenities extends Sximo  {
	
	protected $table = 'hotel_amenities';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	// Many To Many Relation With Trips
	public function trips(){
		return $this->belongsToMany(usertrips::class,'trip_amenities','amenity_id','trip_id');
	}

	public static function querySelect(  ){
		
		return "  SELECT hotel_amenities.* FROM hotel_amenities  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE hotel_amenities.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
