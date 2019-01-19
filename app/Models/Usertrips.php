<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class usertrips extends Sximo  {
	
	protected $table = 'user_trips';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	// One To Many Relation With Users Table
	public function tripuser(){
		return $this->belongsTo(Core\Users::class,"entry_by");
	}

	// Many To Many Relation with Hotal Amenties 
	public function amenities(){
		return $this->belongsToMany(hotelamenities::class,'trip_amenities','trip_id','amenity_id');
	}

	// One To Many Relation with RFPS
	public function rfps(){
		return $this->hasMany(Rfp::class,'user_trip_id');
	}

	public static function querySelect(  ){
		
		return "  SELECT user_trips.* FROM user_trips  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE user_trips.id IS NOT NULL ";
	}
	
	public static function queryGroup() {
		return "  ";
	}
	
	public static function getRFPCounts() {
		return \DB::select('SELECT `user_trip_id` id, COUNT(id) total FROM rfps GROUP BY `user_trip_id` ');
	}

}
