<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class State extends Sximo  {
	
	protected $table = 'states';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT states.* FROM states  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE states.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
