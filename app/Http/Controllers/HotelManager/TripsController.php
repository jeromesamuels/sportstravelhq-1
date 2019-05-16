<?php
namespace App\Http\Controllers\HotelManager;
use App\Http\Controllers\Controller;
use App\Models\UserTrip;
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

class TripsController extends Controller {
    public function __construct() {
        if (Session::has('level')) {
            if (Session::get('level') != 5) return redirect()->back();
        } else return redirect()->back();
    }

    public function index() {
        $trips = UserTrip::with('tripuser')->orderBy('added', 'desc')->get();
        $date_month = date('m');
        $trip_month = UserTrip::whereRaw('MONTH(added) = ?', $date_month)->get();
        $user = User::find(session('uid'));
        $Hotel = Hotel::find($user->hotel_id);

        if (session('level') == 1) {
            $rfps = Rfp::all();
            $data_all =Rfp::all();
            $purchases = invoices::sum('invoices.amt_paid');
            $active_rfp = Rfp::where("status", '!=', 3)->get();
            $accepted_rfp =  Rfp::where("status", 2)->get();
        } 
        elseif(session('level') == 6){
            $rfps = Rfp::with('usertripInfo','usertripInfo.tripuser')->where('user_id', session('uid'))->orderBy('updated_at', 'desc')->get();
            $data_all = Rfp::all();
            $purchases = Invoices::where('invoices.hotel_type', $Hotel->type)->sum('invoices.amt_paid');
            $active_rfp = Rfp::where("status", '!=', 3)->get();
            $accepted_rfp = Rfp::where("status", 2)->get();
        }
        else {
            $rfps = Rfp::with('usertripInfo','usertripInfo.tripuser')->where('user_id', session('uid'))->orderBy('updated_at', 'desc')->get();

            $data_all = Rfp::where('user_id', session('uid'))->get();
            $purchases = Invoices::where('invoices.hotel_name', $user->hotel_id)->sum('invoices.amt_paid');
            $active_rfp = Rfp::where("status", '!=', 3)->where('user_id', session('uid'))->get();
            $accepted_rfp = Rfp::where("status", 2)->where('user_id', session('uid'))->get();
        }
        $trip_booking = UserTrip::where("status", 6)->get();
        $data_grp = User::where('group_id', 4)->get();
        $amenities = hotelamenities::all();
        return view('hotelmanager.viewtrips', compact('trips', 'amenities', 'rfps', 'trip_booking', 'active_rfp', 'accepted_rfp', 'data_all', 'purchases', 'data_grp', 'trip_month'));
    }

    public function show($id) {
        $trip = UserTrip::with('tripuser')->find($id);
        $rfp = Rfp::where('user_trip_id', '=', $id)->where('user_id', '=', session('uid'))->first();
        $trip_id =Rfp::where("user_trip_id", $trip->id)->first();
        if($trip_id != null){
           $invoice    = Invoices::where('rfp_id',$trip_id->id)->first();
        }
        else{
          $invoice='';  
        }
        $data_hotel = Hotel::groupBy('type')->get();
        $user = User::find(session('uid'));
        $hotel = Hotel::find($user->hotel_id);
      
        $trip_booking = UserTrip::all();
        if (session('level') == 1) {
          $rfps_new = Rfp::with('usertripInfo','usertripInfo.tripuser')->orderBy('updated_at', 'desc')->get();
          $purchases = Invoices::sum('invoices.amt_paid');
        }
        elseif($user->group_id==6){
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
       
        if (session('uid') == 5) {
            UserTrip::where('id', $id)->update(['status' => 6]);
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
        $file = $request->file('rooming_file')->getClientOriginalName();
        $destinationPath = './uploads/users/';
        $extension = $request->file('rooming_file')->getClientOriginalExtension();
        $uploadSuccess = $request->file('rooming_file')->move($destinationPath, $file);
        if ($extension == 'csv' || $extension == 'xls') {
            $hotel_id_new = Rfp::find($request->trip_id);
            $user_email_new = User::find($hotel_id_new->user_id);
            $roomListing = new Roomlisting();
            $roomListing->cordinator_id = Session::get('uid');
            $roomListing->hmanager_id = $hotel_id_new->user_id;
            $roomListing->file = $file;
            $user_data = User::find($hotel_id_new->user_id);
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
