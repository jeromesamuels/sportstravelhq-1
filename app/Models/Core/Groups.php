<?php namespace App\Models\Core;

use App\Models\Sximo;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    level
 * @property string description
 * @property string name
 * @property int    group_id
 */
class Groups extends Sximo  {
	
	protected $table = 'tb_groups';
	protected $primaryKey = 'group_id';

    //-- This table does not have created_at and updated_at
    public $timestamps = false;

    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }

	public static function querySelect(  ){
		
		
		return " SELECT  
	tb_groups.group_id,
	tb_groups.name,
	tb_groups.description,
	tb_groups.level


FROM tb_groups  ";
	}
	public static function queryWhere(  ){
		
		return "  WHERE tb_groups.group_id IS NOT NULL    ";
	}
	
	public static function queryGroup(){
		return "    ";
	}
	

}
