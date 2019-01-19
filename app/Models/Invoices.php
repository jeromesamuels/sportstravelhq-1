<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class invoices extends Sximo  {
	
	protected $table = 'invoices';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT invoices.* FROM invoices  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE invoices.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
