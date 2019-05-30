<?php
namespace App\Http\Controllers\HotelManager;
use App\Http\Controllers\Controller;
use App\Models\Core\Groups;
use App\Models\UserTrip;
use App\Models\Invoices;
use App\Models\HotelAmenities;
use App\Models\Roomlisting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Models\Hotel;
use App\Models\Rfp;
use Mail;
use Auth;

class TripsController extends Controller {
    public function __construct() {
        if (Session::has('level')) {
            if (Session::get('level') != Groups::HOTEL_MANAGER) return redirect()->back();
        } else return redirect()->back();
    }

    public function index() {
        $date_month = date('m');
        $trip_month = UserTrip::whereRaw('MONTH(added) = ?', $date_month)->get();
        $user = Auth::user();
        $Hotel = Hotel::findOrFail($user->hotel_id);
       
        if ($user->is_hotel_manager) {

            $trips = UserTrip::with('tripuser')->orderBy('added','desc')->where('service_type',$user->service_type)->get();
            $rfps = Rfp::with('usertripInfo','usertripInfo.tripuser')->where('user_id', session('uid'))->orderBy('updated_at', 'desc')->get();
            $data_all = Rfp::where('user_id', session('uid'))->get();
            $purchases = Invoices::where('invoices.hotel_name', $user->hotel_id)->sum('invoices.amt_paid');
            $active_rfp = Rfp::where("status", '!=', Rfp::STATUS_BID_SENT)->where('user_id', session('uid'))->get();
            $accepted_rfp = Rfp::where("status", Rfp::STATUS_BID_SELECTED)->where('user_id', session('uid'))->get();
           
        } 
        elseif($user->is_corporate){

            $rfps = Rfp::with('usertripInfo','usertripInfo.tripuser')->where('user_id', session('uid'))->orderBy('updated_at', 'desc')->get();
            $trips = UserTrip::with('tripuser')->orderBy('added', 'desc')->get();
            $data_all = Rfp::all();
            $purchases = Invoices::where('invoices.hotel_type', $Hotel->type)->sum('invoices.amt_paid');
            $active_rfp = Rfp::where("status", '!=',  Rfp::STATUS_BID_SENT)->get();
            $accepted_rfp = Rfp::where("status", Rfp::STATUS_BID_SELECTED)->get();

        }
        else {

            $trips = UserTrip::with('tripuser')->orderBy('added', 'desc')->get();
            $rfps = Rfp::all();
            $data_all =Rfp::all();
            $purchases = Invoices::sum('invoices.amt_paid');
            $active_rfp = Rfp::where("status", '!=', Rfp::STATUS_BID_SENT)->get();
            $accepted_rfp =  Rfp::where("status", Rfp::STATUS_BID_SELECTED)->get();
           
        }
            $trip_booking = UserTrip::where("status",Rfp::STATUS_AGREEMENT_HOTEL)->get();
            $data_grp = User::where('group_id', Groups::TRAVEL_COORDINATOR)->get();
            $amenities = HotelAmenities::all();
        

        return view('hotelmanager.viewtrips', compact('trips', 'amenities', 'rfps', 'trip_booking', 'active_rfp', 'accepted_rfp', 'data_all', 'purchases', 'data_grp', 'trip_month'));
    }

    public function show($id) {
        $trip = UserTrip::with('tripuser')->findOrFail($id);
        $rfp = Rfp::where('user_trip_id', '=', $id)->where('user_id', '=', session('uid'))->first();

        $trip_id =Rfp::where("user_trip_id", $trip->id)->first();
        if($trip_id != null){
           $invoice    = Invoices::where('rfp_id',$trip_id->id)->first();
        }
        else{
          $invoice='';  
        }
        $data_hotel = Hotel::groupBy('type')->get();
        $user = Auth::user();
        $hotel = Hotel::find($user->hotel_id);
        $trip_booking = UserTrip::all();
        
        if ($user->is_super_admin) {
          $rfps_new = Rfp::with('usertripInfo','usertripInfo.tripuser')->orderBy('updated_at', 'desc')->get();
          $purchases = Invoices::sum('invoices.amt_paid');
        }
        elseif($user->is_corporate){
           $rfps_new = Rfp::with('usertripInfo','usertripInfo.tripuser')->orderBy('updated_at', 'desc')->get(); 
            foreach ($data_hotel as $value) {
            $name = $value->type;
            $purchases = Invoices::where('invoices.hotel_type', '=', $name)->sum('invoices.amt_paid');
           }  
        }
        else{
           $rfps_new = Rfp::with('usertripInfo','usertripInfo.tripuser')->where('user_id', session('uid'))->orderBy('updated_at', 'desc')->get(); 
            $purchases = Invoices::where('invoices.hotel_name', '=', $user->hotel_id)->sum('invoices.amt_paid');

        }
       
        if ($user->group_id == Groups::CORPORATE) {
            UserTrip::where('id', $id)->update(['status' => UserTrip::STATUS_VIEWED]);
        }
        
        return view('hotelmanager.tripsingle', compact('trip', 'rfp', 'trip_id', 'invoice', 'trip_booking', 'rfps_new', 'hotel', 'purchases'));
    }

    public function invoice($invoice_id) {
        return view('hotelmanager.tripInvoice');
    }

    public function filterByAmenities(Request $request) {
        if ($request->data) {
            $trips = UserTrip::join('trip_amenities', 'trip_amenities.trip_id', '=', 'user_trips.id')->whereIn('trip_amenities.amenity_id', explode(',', $request->data))->all();
        } else {
            $trips = UserTrip::all();
        }
        return view('hotelmanager.table')->withTrips($trips);
    }

    public function uploadRoomingList(Request $request) {
        $this->validate($request, ['trip_id' => 'numeric|min:0']);
        $tripuserId= Rfp::with('trip')->where('id', $request->trip_id)->first();
        $file = $request->file('rooming_file')->getClientOriginalName();
        $destinationPath = './uploads/users/';
        $extension = $request->file('rooming_file')->getClientOriginalExtension();
        $uploadSuccess = $request->file('rooming_file')->move($destinationPath, $file);
        if ($extension == 'csv' || $extension == 'xls' || $extension == 'xlsx') {
            $hotel_id_new = Rfp::findOrFail($request->trip_id);
            $user_email_new = User::findOrFail($hotel_id_new->user_id);
            $roomListing = new Roomlisting();
            $roomListing->cordinator_id = $tripuserId->trip->entry_by;
            $roomListing->hmanager_id = $hotel_id_new->user_id;
            $roomListing->file = $file;
            $user_data = User::findOrFail($hotel_id_new->user_id);
            $roomListing->save();
            Rfp::where('id', $request->trip_id)->update(['status' => 8]);
            $data = array('name' => $user_data->first_name . " " . $user_data->last_name, "trip_id" => $request->trip_id);
            $to = $user_data->email;
            $csvPath = public_path() . '/uploads/users/' . $file;
            \Mail::send('user.emails.mail', compact('data', 'file'), function ($message) use ($data, $file, $to) {
                $message->to($to)->subject('Uploaded Rooming List');
                $message->attach(public_path() . '/uploads/users/' . $file);
            });
        } else {
            Session::flash("Error", "Only CSV file uploaded");
        }
        return redirect('/trips');
    }
}
