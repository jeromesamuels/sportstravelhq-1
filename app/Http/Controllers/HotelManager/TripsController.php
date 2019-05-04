<?php
namespace App\Http\Controllers\HotelManager;
use App\Http\Controllers\Controller;
use App\Models\usertrips;
use App\Models\invoices;
use App\Models\hotelamenities;
use App\Models\Roomlisting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Models\Hotel;
use App\Models\Rfp;
use Mail;

class TripsController extends Controller
{
public function __construct() {
	if(Session::has('level')){
	if(Session::get('level') != 5)
	return redirect()->back();
	}
	else
	return redirect()->back();
}
public function index(){
	$trips = usertrips::orderBy('added', 'desc')->get();
	$hotel_id=User::where('id',session('uid'))->pluck('hotel_id');
	
	foreach($hotel_id as $hotel_id_new){
	$user_hotel=$hotel_id_new;
	}
	$user_grp=User::where('hotel_id',$user_hotel)->where('group_id',5)->pluck('id');
	foreach($user_grp as $user_grp_new){
	$user_grp_id=$user_grp_new;
	} 
	if(session('level')==1){
	$rfps= Rfp::all();
	}
	elseif(session('level')==5){
	$rfps= Rfp::where('user_id',session('uid'))->orderBy('updated_at', 'desc')->get();
	}
	elseif(session('level')==6){
	if(count($user_grp) >= 1){
	$rfps= Rfp::where('user_id',$user_grp_id )->orderBy('updated_at', 'desc')->get();
	//echo $user_grp_id;
	}
	else{
	$rfps= Rfp::where('user_id',session('uid') )->orderBy('updated_at', 'desc')->get();
	}
	}
	else{
	$rfps= Rfp::where('user_id',session('uid'))->orderBy('updated_at', 'desc')->get();
	}
	$amenities = hotelamenities::all();
	return view('hotelmanager.viewtrips',compact('trips','amenities','rfps'));
}

public function show($id) {
	$trip = usertrips::find($id);
	$rfp = Rfp::where('user_trip_id', '=', $id)->where('user_id', '=', session('uid'))->first();

	//$corporate_view=User::where('group_id', '=', session('level')==6)->pluck('hotel_id');
	if(session('uid')==5){
	DB::table('user_trips')->where('id', $id)->update(['status' => 6]);
	}
	return view('hotelmanager.tripsingle', compact('trip', 'rfp'));
}

public function invoice($invoice_id) {
	return view('hotelmanager.tripInvoice');
}

public function filterByAmenities(Request $request)
{
	if($request->data){ 
	$trips = usertrips::join('trip_amenities','trip_amenities.trip_id','=','user_trips.id')->whereIn('trip_amenities.amenity_id', explode(',', $request->data))->all();
	}
	else{ 
	$trips = usertrips::all();
	}
	return view('hotelmanager.table')->withTrips($trips);
}

public function uploadRoomingList(Request $request) {
	$this->validate($request,[
	'trip_id' => 'numeric|min:0'
	]);
	$file = $request->file('rooming_file')->getClientOriginalName();
	$destinationPath = './uploads/users/';
	$extension = $request->file('rooming_file')->getClientOriginalExtension(); 
	$uploadSuccess = $request->file('rooming_file')->move($destinationPath, $file);
	if($extension== 'csv' || $extension== 'xls'){
	//echo $request->trip_id;
	$hotel_id=Rfp::where('id', $request->trip_id)->get();
	foreach ($hotel_id as $hotel_id_new) {
	}
	$user_email=User::where('id', $hotel_id_new->user_id)->pluck('email');
	foreach ($user_email as $user_email_new) {
	}
	$roomListing = new Roomlisting();
	$roomListing->cordinator_id =Session::get('uid');
	$roomListing->hmanager_id = $hotel_id_new->user_id;
	$roomListing->file = $file;
	$user_data = User::find($hotel_id_new->user_id);
	$roomListing->save();

	Rfp::where('id', $request->trip_id)->update(['status' => 8]);
	$data = array('name'=> $user_data->first_name." ".$user_data->last_name, "trip_id" => $request->trip_id);
	$to = $user_data->email;
	$csvPath=public_path().'/uploads/users/'.$file;
	\Mail::send('user.emails.mail', compact('data','file'), function ($message) use($data, $file, $to){
	//$message->from('SportTravelHQ');
	$message->to($to)->subject('Uploaded Rooming List');
	$message->attach(public_path().'/uploads/users/'.$file);
	});
	}
	else{
	Session::flash("Error","Only CSV file uploaded");
	}
	return redirect('/trips');
}

}