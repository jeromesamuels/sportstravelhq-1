<?php namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {

	public function __construct()
	{
		parent::__construct();
		
        $this->data = array(
            'pageTitle' =>  $this->config['cnf_appname'],
            'pageNote'  =>  'Welcome to Dashboard',
        );
	}

	public function index( Request $request )
	{
		$this->data['tc_users'] = DB::table('tb_users')->get()->where("group_id", 4)->count();
        $this->data['ro_users'] = DB::table('tb_users')->get()->where("group_id", 3)->count();

        $this->data['hotels'] = DB::table('hotel_amenities')->get()->count();
        $this->data['rfps'] = DB::table('rfps')->get()->count();

        $this->data['trips'] = DB::table('user_trips')->get()->count();
        $this->data['a_req'] = "101";

        //print_r($data);die();

		return view('dashboard.index', $this->data);
	}


}