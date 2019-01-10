<?php

namespace App\Http\Controllers\HotelManager;

use App\Http\Controllers\Controller;
use App\Models\usertrips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TripsController extends Controller
{
    public function __construct(){
		if(Session::has('level')){
			if(Session::get('level') != 5)
				return redirect()->back();
		}
		else
			return redirect()->back();
	}

	public function index(){
		$trips = DB::table('user_trips')->get();
		return view('hotelmanager.viewtrips',compact('trips'));
	}

	public function show($id){
		$trip = usertrips::find($id);
		return view('hotelmanager.tripsingle',compact('trip'));
	}
}
