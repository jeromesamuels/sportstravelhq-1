<?php

namespace App\Http\Controllers\HotelManager;

use App\Http\Controllers\Controller;
use App\Models\AgreementForm;
use App\Models\Core\Users;
use App\Models\Rfp;
use App\Models\Hotel;
use App\Models\usertrips;
use App\Models\Invoices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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

    public function index(Request $request) {

        //dd(Session::all());
      /*  $this->data['tc_users'] = \DB::table('tb_users')->get()->where("group_id", 4)->count();
        $this->data['hotel_info'] = \DB::table('hotels')->get()->where("id", Session::get('hid'))->first();
       
    	return view('hotelmanager.index', $this->data);*/

       $q = (new Hotel)->newQuery();
        $searchField = "";
        if($request->searchField){
        $q->where('name',"LIKE",$request->searchField."%");
        $searchField = $request->searchField;
        }
        $hotels = $q->get();
        return view('hotelmanager.index',compact('hotels','searchField'));

    }

    public function saveBid(Request $request) {

    	$this->validate($request,[
    		'trip_id' => 'required|numeric|min:0',
    		'offer_rate' => 'required|numeric|min:0',
    		'eventDistance' => 'required|max:500',
    		
    		'offerValidityDate' => 'required|date|after:today',
    	]);
       // echo $request->eventDistance;

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
    	$rfp->status =1; //Bid not yet send/pending
    	$rfp->destination = $trip->from_city;
    	$rfp->hotel_information = 0;
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

        $r = \Helper::addTripStatusLog(2, $trip->id, $rfp->id);
    

    	Session::flash('success','Bid has been Sent successfully');
    	return redirect()->back();

    }
     public function bidSent($id) {
      
        DB::table('rfps') ->where('user_trip_id', $id)->update(['status' => 3]);
        //Session::flash("success","Hotel Updated Successfully");
        return redirect()->back()->with('Success','Bid Declined Successfully !');;
    }


    public function viewAgreements(){
        $this->checkAgreementFormAvailability();
        $agreements = AgreementForm::where('reciever_id',Session::get('uid'))->get();
        return view('hotelmanager.viewagreements',compact('agreements'));
    }

    public function downloadAgreement($id){
        $agreement = AgreementForm::find($id);
        if(Session::get('uid') != $agreement->reciever_id){
            return redirect()->back();
        }
        if($agreement->downloaded == true){
            Session::flash('error','You cannot Download Agreement for the Second Time');
            return redirect()->back();
        }

        $response = -1;
        if($agreement->file != ''){
        $response =  response()->download(public_path($agreement->file));
        if($response  !== -1){
            $agreement->downloaded = true;
            $agreement->save();
            return $response;
        }
       }
       else{
         return redirect()->back();
       }

    }

    public function agreementDetails($id){
        $agreement = AgreementForm::find($id);
        if(Session::get('uid') != $agreement->reciever_id){
            return redirect()->back();
        }

        if($agreement){
            return view('hotelmanager.agreementDetails',compact('agreement'));
        }
    }

    public function RFPDetails($id){
        $rfp = Rfp::find($id);
        if(Session::get('uid') != $rfp->user_id){
            return redirect()->back();
        }

        if($rfp){
            return view('hotelmanager.rfpdetails',compact('rfp'));
        }
    }

    public function checkAgreementFormAvailability(){
       $agreementsToDelete = AgreementForm::where('reciever_id',Session::get('uid'))->get();
       $expired = [];
       foreach($agreementsToDelete as $agreement){
            $difference = Carbon::now()->diffInHours(new Carbon($agreement->agreement_sent));
            if($difference > 72){
                $expired[] = $agreement->id;
            }
       }

       if(count($expired) > 0){
            foreach($expired as $id){
                AgreementForm::find($id)->delete();
            }
       }
    }

     public function makeInvoice(Request $request) {
       if( $request->file('invoice_file') != ''){
        $this->validate($request,[
            'trip_id' => 'numeric|min:0',
            'actualized_room_count' => 'numeric|min:0',
            'room_rate' => 'numeric',
            'amt_paid' => 'numeric',
          
        ]);
         $file = $request->file('invoice_file')->getClientOriginalName();
        $destinationPath = './uploads/users/';
        $extension = $request->file('invoice_file')->getClientOriginalExtension(); 
        $uploadSuccess = $request->file('invoice_file')->move($destinationPath, $file);

    }
    else{
         $this->validate($request,[
            'trip_id' => 'required|numeric|min:0',
            'actualized_room_count' => 'required|numeric|min:0',
            'room_rate' => 'required|numeric',
            'amt_paid' => 'required|numeric',
          
        ]);
         $file='';
    }
        

        $trip = usertrips::find($request->trip_id);

        //geting Trip Amenities
        $amenitie_ids = [];
        foreach ($trip->amenities as $amenity) {
            $amenitie_ids[count($amenitie_ids)] = $amenity->id;
        }
        // Getting manager info
        $hotel_manager_id=Session::get('uid');
        $hotel_manger_info =  DB::table('tb_users')->where('id', $hotel_manager_id)->first();
       
        $email = $hotel_manger_info->email;
        $phone_number = $hotel_manger_info->phone_number;
        $hotel_id = $hotel_manger_info->hotel_id;
        
        //Getting hotel info
        $hotel_info = DB::table('hotels')->where('id', $hotel_id)->first();
       
        $hotel_name = $hotel_info->name;
        $hotel_type=$hotel_info->type;
        $hotel_address = $hotel_info->address;
       
         $a = mt_rand(100000,999999); 

      
         $rfp = new Invoices();

        $rfp->invoice_id =$a; 
        $rfp->trip_status =$trip->status; 
        $rfp->trip_name =$trip->trip_name; 
        $rfp->trip_address =$trip->from_address_1; 
        $rfp->check_in = $trip->check_in;
        $rfp->check_out = $trip->check_out;
        $rfp->rfp_id = $request->trip_id;
        $rfp->hotel_name =$hotel_name;
        $rfp->hotel_add =$hotel_address;
        $rfp->hotel_type =$hotel_type;
        $rfp->hotel_manager =Session::get('fid');
        $rfp->email =$email;
        $rfp->phone =$phone_number;
        $rfp->total_room = $trip->double_king_qty + $trip->double_queen_qty;
        $rfp->room_rate = $request->room_rate;
        $rfp->actualized_room_count = $request->actualized_room_count;
        $rfp->commissoin_rate = 10;
        $rfp->amt_paid = $request->amt_paid;
        $rfp->invoice_file = $file;
        $rfp->entry_by = $trip->entry_by;

        $record_exists = DB::table('invoices')->where('rfp_id', '=', $request->trip_id)->first();
        
        
        if (is_null($record_exists)) {
         $rfp->save();
            DB::table('rfps')->where('id', $rfp->rfp_id)->update(['status' => 4]);
        }

         else{
          return redirect()->back()->with('message',__('Record Already Exists!!'))->with('status','Error');

         }
          if( $request->file('invoice_file') == ''){
          return view('hotelmanager.tripInvoice',compact('rfp'));
          }
          else{
          return redirect()->back()->with('message',__('Invoice Uploaded Successfully!!'))->with('status','success');
         
        // return redirect()->back();
          

          }
      
    }
/*public function uploadInvoice(Request $request) {

         $this->validate($request,[
            'trip_id' => 'required|numeric|min:0',
           
        ]);
          DB::table('user_trips') ->where('id', $request->trip_id)->update(['invoice_status' => 1]);
          
}*/
    
}
