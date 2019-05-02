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
        $this->data['data_decline']= DB::table('rfps')->get()->where("status",'!=',3)->all();
        $this->data['data_accept']= DB::table('rfps')->get()->where("status",2)->all();
        $this->data['purchases_month']= DB::table('invoices')->sum('invoices.amt_paid');
        $this->data['data_hotel']= DB::table('hotels')->groupBy('type')->get();                              
        $this->data['trips'] = DB::table('user_trips')->get()->count();
        $this->data['a_req'] = "101";
        $this->data['data_client']= DB::table('tb_users')->orderby('id', 'DESC')->limit(3)->get();

        if(\Session::get('level') == 5) {
        	return redirect(route('hotelmanger.home'));
        }
        if(\Session::get('level') ==4) {
            return redirect('/client');
        }

        if(\Session::get('level') == 6) {
        	return redirect(route('corporate.home'));
        }

		return view('dashboard.index', $this->data);
	}


}