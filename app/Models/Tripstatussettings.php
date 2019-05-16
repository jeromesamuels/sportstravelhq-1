<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class TripstatusSettings extends Sximo  {
	
	protected $table = 'trip_statuses';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT trip_statuses.* FROM trip_statuses  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE trip_statuses.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
