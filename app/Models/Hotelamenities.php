<?php 
namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class HotelAmenities extends Sximo  {
	
	protected $table = 'hotel_amenities';
	protected $primaryKey = 'id';

    //-- This table does not have created_at and updated_at
    public $timestamps = false;

	public function __construct() {
		parent::__construct();
		
	}

	// Many To Many Relation With Trips
	public function trips(){
		return $this->belongsToMany(usertrip::class,'trip_amenities','amenity_id','trip_id');
	}

	// Many To Many Relation With Hotels
	public function hotels(){
		return $this->belongsToMany(Hotel::class,'h_amenity_pivot','amenity_id','hotel_id');
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
