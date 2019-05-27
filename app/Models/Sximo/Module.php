<?php namespace App\Models\Sximo;

use App\Models\Sximo;
use Illuminate\Database\Eloquent\Model;

class Module extends Sximo {

	protected $table 		= 'tb_module';
	protected $primaryKey 	= 'module_id';

    //-- This table does not have created_at and updated_at
    public $timestamps = false;

	public function __construct() {
		parent::__construct();
	
			
				
	} 

}
