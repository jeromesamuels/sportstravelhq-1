<?php

namespace App\Http\Controllers\HotelManager;

use App\Http\Controllers\Controller;
use App\Models\Core\Users;
use App\Models\Rfp;
use App\Models\usertrips;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HotelManagerController extends Controller
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
    	return view('hotelmanager.index');
    }

    public function saveBid(Request $request){
    	$this->validate($request,[
    		'trip_id' => 'required|numeric|min:0',
    		'offer_rate' => 'required|numeric|min:0',
    		'eventDistance' => 'required|numeric|min:0',
    		'hotelDetails' => 'required|max:500',
    		'offerValidityDate' => 'required|date|after:today',
    	]);

    	$trip = usertrips::find($request->trip_id);
    	//geting Trip Amenities
    	$amenitie_ids = [];
    	foreach ($trip->amenities as $amenity) {
    		$amenitie_ids[count($amenitie_ids)] = $amenity->id;
    	}
    	// Saving Rfp
    	$rfp = new Rfp();
    	$rfp->user_trip_id = $trip->id;
    	$rfp->user_id = Session::get('uid');
    	$rfp->added = Carbon::now();
    	$rfp->status = 1; // 1 Mean it is not yet accepted
    	$rfp->destination = $trip->from_city;
    	$rfp->hotel_information = $request->hotelDetails;
    	$rfp->distance_event = $request->eventDistance;
    	$rfp->offer_rate = $request->offer_rate;
    	$rfp->cc_authorization = 1;
    	$rfp->offer_validity = $request->offerValidityDate;
    	$rfp->check_in = $trip->check_in;
    	$rfp->check_out = $trip->check_out;
    	$rfp->sales_manager = Session::get('fid');
    	$rfp->king_beedrooms = $trip->double_king_qty;
    	$rfp->queen_beedrooms = $trip->double_queen_qty;
    	$rfp->amenitie_ids = json_encode($amenitie_ids);
    	$rfp->hotels_message = $request->message;

    	$rfp->save();
    	Session::flash('success','Bid has been sent successfully');
    	return redirect()->back();

    }
}
