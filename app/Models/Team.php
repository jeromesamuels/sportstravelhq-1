<?php 
namespace App\Models;
use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Team extends Sximo  {
	
	protected $table = 'teams';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT teams.* FROM teams  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE teams.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}

	public static function getRows( $args , $uid = 0 )
	{
       $table = with(new static)->table;
	   $key = with(new static)->primaryKey;
	   
        extract( array_merge( array(
			'page' 		=> '0' ,
			'limit'  	=> '0' ,
			'sort' 		=> '' ,
			'order' 	=> '' ,
			'params' 	=> '' ,
			'flimit' 	=> '' ,
			'fstart' 	=> '' ,
			'global'	=> 1	  
        ), $args ));
		
		$offset = ($page-1) * $limit ;	
		$limitConditional = ($page !=0 && $limit !=0) ? "LIMIT  $offset , $limit" : '';	
		/* Added since version 5.1.7 */
		if($fstart !='' && $flimit != '')
			$limitConditional = "LIMIT  $fstart , $flimit" ;	
		/* End Added since version 5.1.7 */

		$orderConditional = ($sort !='' && $order !='') ?  " ORDER BY {$sort} {$order} " : '';

		// Update permission global / own access new ver 1.1
		$table = with(new static)->table;
		if($global == 0 )
				$params .= " AND {$table}.user_id ='".$uid."'"; 	
		// End Update permission global / own access new ver 1.1			
        if($global == 1)
        	$params .= ""; 

		$rows = array();
	    $result = \DB::select( self::querySelect() . self::queryWhere(). " 
				{$params} ". self::queryGroup() ." {$orderConditional}  {$limitConditional} ");
		
		$total = \DB::select( "
				SELECT  count(teams.id) as total 
			FROM teams " . self::queryWhere(). " 
				{$params} ". self::queryGroup() );
		$total = (count($total) != 0 ? $total[0]->total : 0 );

		return $results = array('rows'=> $result , 'total' => $total);	
    }	

	 public function teamuser()
    {
        return $this->belongsTo(User::class, "user_id");
    }
     public function teams()
    {
        return $this->hasMany(Rfp::class, 'team');
    }
	

}
