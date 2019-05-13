<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class tripstatuslogs extends Sximo  {
	
	protected $table = 'trip_status_logs';
	protected $primaryKey = '';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT trip_status_logs.* FROM trip_status_logs ORDER BY added DESC";
	}	

	public static function queryWhere(  ){
		
		return "  ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
