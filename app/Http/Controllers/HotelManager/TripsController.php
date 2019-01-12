<?php

namespace App\Http\Controllers\HotelManager;

use App\Http\Controllers\Controller;
use App\Models\usertrips;
use App\Models\hotelamenities;
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
		$trips = usertrips::all();
		$amenities = hotelamenities::all();
		return view('hotelmanager.viewtrips',compact('trips','amenities'));
	}

	public function show($id){
		$trip = usertrips::find($id);
		return view('hotelmanager.tripsingle',compact('trip'));
	}

	public function filterByAmenities(Request $request)
	{
		if($request->data){ 
			$trips = usertrips::join('trip_amenities','trip_amenities.trip_id','=','user_trips.id')->whereIn('trip_amenities.amenity_id', explode(',', $request->data))->get();
		}
		else{ 
		 	$trips = usertrips::all();
		 }

		return view('hotelmanager.table')->withTrips($trips);
	}
}
