<?php namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Models\Hotel;
use App\Models\UserTrip;
use App\Models\Hotelamenities;
use App\Models\Rfp;
use App\Models\Invoices;
use App\Models\Core\Groups;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->data = array('pageTitle' => $this->config['cnf_appname'], 'pageNote' => 'Welcome to Dashboard',);
    }
    public function index(Request $request) {
        $this->data['tc_users'] = User::where("group_id", Groups::TRAVEL_COORDINATOR)->count();
        $this->data['ro_users'] = User::where("group_id", Groups::USERS)->count();
        $this->data['hotels'] = Hotelamenities::count();
        $this->data['rfps'] = Rfp::count();
        $this->data['data_decline'] = Rfp::where("status", '!=', Rfp::STATUS_BID_SENT)->get();
        $this->data['data_accept'] = Rfp::where("status", Rfp::STATUS_BID_SELECTED)->get();
        $this->data['purchases_month'] = Invoices::sum('invoices.amt_paid');
        $this->data['data_hotel'] = Hotel::groupBy('type')->get();
        $this->data['trips'] = UserTrip::count();
        $this->data['a_req'] = "101";
        $this->data['data_client'] = User::orderby('id', 'DESC')->limit(3)->get();
        if (\Session::get('level') == 5) {
            return redirect(route('hotelmanger.home'));
        }
        if (\Session::get('level') == 4) {
            return redirect('/client');
        }
        if (\Session::get('level') == 6) {
            return redirect('corporate/user');
        }
        return view('dashboard.index', $this->data);
    }
}
