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
class TripsController extends Controller {
    public function __construct() {
        if (Session::has('level')) {
            if (Session::get('level') != 5) return redirect()->back();
        } else return redirect()->back();
    }
    public function index() {
        $trips = usertrips::orderBy('added', 'desc')->get();
        $date_month = date('m');
        $trip_month = usertrips::whereRaw('MONTH(added) = ?', $date_month)->get();
        $user = User::find(session('uid'));
        foreach ($trips as $trip) {
            $data_client = DB::table('tb_users')->where('id', $trip->entry_by)->get();
        }
        if (session('level') == 1) {
            $rfps = Rfp::all();
            $data_all = DB::table('rfps')->get();
            $purchases = DB::table('invoices')->sum('invoices.amt_paid');
        } else {
            $rfps = Rfp::where('user_id', session('uid'))->orderBy('updated_at', 'desc')->get();
            $data_all = DB::table('rfps')->where('user_id', session('uid'))->get();
            $purchases = Invoices::where('invoices.hotel_name', $user->hotel_id)->sum('invoices.amt_paid');
        }
        $active_rfp = DB::table('rfps')->get()->where("status", '!=', 3)->where('user_id', session('uid'))->all();
        $trip_booking = DB::table('user_trips')->get()->where("status", 6)->where('user_id', session('uid'))->all();
        $accepted_rfp = DB::table('rfps')->get()->where("status", 2)->where('user_id', session('uid'))->all();
        $data_grp = User::where('group_id', 4)->get();
        $amenities = hotelamenities::all();
        return view('hotelmanager.viewtrips', compact('trips', 'amenities', 'rfps', 'trip_booking', 'active_rfp', 'accepted_rfp', 'data_all', 'purchases', 'data_grp', 'data_client', 'trip_month'));
    }
    public function show($id) {
        $trip = usertrips::find($id);
        $rfp = Rfp::where('user_trip_id', '=', $id)->where('user_id', '=', session('uid'))->first();
        $trip_id_detail = DB::table('rfps')->where("user_trip_id", $trip->id)->get();
        $invoice = DB::table('invoices')->where("id", $trip->id)->get();
        $data_hotel = DB::table('hotels')->groupBy('type')->get();
        foreach ($data_hotel as $value) {
            $name = $value->type;
            $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->sum('invoices.amt_paid');
        }
        $trip_booking = DB::table('user_trips')->get();
        $rfps_new = DB::table('rfps')->where('status', 2)->get();
        $user = User::find(session('uid'));
        $hotel = Hotel::find($user->hotel_id);
        if (session('uid') == 5) {
            DB::table('user_trips')->where('id', $id)->update(['status' => 6]);
        }
        return view('hotelmanager.tripsingle', compact('trip', 'rfp', 'trip_id_detail', 'invoice', 'trip_booking', 'rfps_new', 'hotel', 'purchases'));
    }
    public function invoice($invoice_id) {
        return view('hotelmanager.tripInvoice');
    }
    public function filterByAmenities(Request $request) {
        if ($request->data) {
            $trips = usertrips::join('trip_amenities', 'trip_amenities.trip_id', '=', 'user_trips.id')->whereIn('trip_amenities.amenity_id', explode(',', $request->data))->all();
        } else {
            $trips = usertrips::all();
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
            $hotel_id = Rfp::where('id', $request->trip_id)->get();
            foreach ($hotel_id as $hotel_id_new) {
            }
            $user_email = User::where('id', $hotel_id_new->user_id)->pluck('email');
            foreach ($user_email as $user_email_new) {
            }
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
