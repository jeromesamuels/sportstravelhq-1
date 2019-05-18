<?php
namespace App\Http\Controllers\SystemAdmin;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Rfp;
use App\User;
use App\Models\Invoices;
use App\Models\State;
use App\Models\UserTrip;
use App\Models\HotelAmenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HotelsController extends Controller {

    public function __construct() {
        if (Session::has('level')) {
            if (Session::get('level') != 1) return redirect()->back();
        } else return redirect()->back();
    }

    public function viewHotels(Request $request) {
        $q = (new Hotel)->newQuery();
        $searchField = "";
        if ($request->searchField) {
            $q->where('name', "LIKE", $request->searchField . "%");
            $searchField = $request->searchField;
        }
        $hotels = $q->orderBy('id','desc')->get();
        $data_hotel = Hotel::groupBy('type')->get();
        $currentMonth = date('m');
        $purchases = Invoices::sum('invoices.amt_paid');
        $purchases_month = Invoices::whereRaw('MONTH(created_at)', [$currentMonth])->sum('invoices.amt_paid');
        /* pending amount*/
        $purchases_due_month = Invoices::whereRaw('MONTH(created_at)', [$currentMonth])->sum('invoices.est_amt_due');
        $purchases_due = Invoices::sum('invoices.est_amt_due');
        $trips = UserTrip::all();
        $rfps_new = Rfp::where('status', 2)->get();
        $trip_booking = UserTrip::whereRaw('MONTH(added) = ?', [$currentMonth])->get();
        return view('systemadmin.viewHotels', compact('hotels', 'searchField', 'purchases', 'purchases_due', 'trip_booking', 'data_hotel', 'rfps_new', 'purchases_month', 'purchases_due_month','trips'));
    }

    public function createHotels() {
        $amenities = HotelAmenities::all();
        $states =State::all();
        return view('systemadmin.createHotels', compact('amenities','states'));
    }

    public function storeHotels(Request $request) {
        $this->validate($request, [
             "hotel_code" => "required|max:191",
             "IATA_number" => "required", 
             "service_type" => "required|max:191", 
             "name" => "required|max:191",
             "zip" => "required",
             "state" => "required",
             "phone" => "required",
             "address" => "required|max:191",
             "city" => "required|max:191",
             "type" => "required|max:191", 
             "logo" => "required|max:555", 
             "property" => "required|max:555", 
             "rating" => "required|min:1|max:4",
             "active" => "required", ]);
        /*For hotel type logo*/
        $file = $request->file('logo')->getClientOriginalName();
        $destinationPath = './uploads/users/';
        $uploadSuccess = $request->file('logo')->move($destinationPath, $file);
        /*For hotel type property*/
        $filep = $request->file('property')->getClientOriginalName();
        $destinationPathp = './uploads/users/';
        $uploadSuccessp = $request->file('property')->move($destinationPathp, $filep);
        $hotel = new Hotel();
        $hotel->hotel_code = $request->hotel_code;
        $hotel->IATA_number = $request->IATA_number;
        $hotel->service_type = $request->service_type;
        $hotel->name = $request->name;
        $hotel->zip = $request->zip;
        $hotel->state = $request->state;
        $hotel->phone = $request->phone;
        $hotel->address = $request->address;
        $hotel->city = $request->city;
        $hotel->type = $request->type;
        $hotel->logo = $file;
        $hotel->property = $filep;
        $hotel->rating = $request->rating;
        $hotel->active = $request->active == "true" ? true : false;
        $hotel->save();
        $hotel->amenities()->sync($request->amenities);
        Session::flash("success", "New Hotel Added Successfully");
        return redirect()->action('SystemAdmin\HotelsController@viewHotels');
    }

    public function deleteHotels($id) {
        Hotel::findOrFail($id)->delete();
        Session::flash("success", "Record Deleted");
        return redirect()->back();
    }

    public function editHotels($id) {
        $hotel = Hotel::findOrFail($id);
        $amenities = HotelAmenities::all();
        $hotel_type = Hotel::where('type', '!=', $hotel->type)->groupBy('type')->pluck('type');
        return view('systemadmin.editHotels', compact('hotel', 'amenities', 'hotel_type'));
    }

    public function hotelProfile($id) {
        $hotel = Hotel::findOrFail($id);
        $user = User::where('hotel_id', $id)->pluck('id');
        if(count($user)>= 1){
        $data_hotel = Hotel::groupBy('type')->get();
        $amenities = HotelAmenities::all();
        $currentMonth = date('m');
        $purchases = Invoices::where('invoices.hotel_name', $id)->whereRaw('MONTH(created_at) = ?', [$currentMonth])->sum('invoices.amt_paid');
        $purchases_due = Invoices::where('invoices.hotel_name', $id)->whereRaw('MONTH(created_at) = ?', [$currentMonth])->sum('invoices.est_amt_due');
        $hotel_contract = Rfp::get()->where("status", '!=', 3)->all();
        $hotel_trips = Rfp::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(10);
        /*Total Booking of this month*/
        $trip_booking = UserTrip::whereRaw('MONTH(added) = ?', [$currentMonth])->get();
        return view('systemadmin.hotelProfile ', compact('hotel', 'amenities', 'data_hotel', 'trip_booking', 'hotel_trips', 'purchases', 'purchases_due', 'hotel_contract'));
       }
       else{
        return redirect()->back();
       }
    }

    public function updateHotels(Request $request, $id) {
        $this->validate($request, [
            "hotel_code" => "required|max:191", 
            "IATA_number" => "required", 
            "service_type" => "required|max:191", 
            "name" => "required|max:191", 
            "zip" => "required",
            "state" => "required",
            "phone" => "required",
            "address" => "required|max:191", 
            "city" => "required|max:191",
            "type" => "required|max:191", 
            "rating" => "required|min:1|max:4",
            "active" => "required", ]);

        /*For hotel type logo*/
        $hotel_id=Hotel::findOrFail($id);
        if($request->file('logo') !=''){
        $file = $request->file('logo')->getClientOriginalName();
        $destinationPath = './uploads/users/';
        $uploadSuccess = $request->file('logo')->move($destinationPath, $file);
        }
        else{
            $file=$hotel_id->logo;
        }
        /*For hotel type property*/
        if($request->file('property') !=''){
        $filep = $request->file('property')->getClientOriginalName();
        $destinationPathp = './uploads/users/';
        $uploadSuccessp = $request->file('property')->move($destinationPathp, $filep);
        }
        else{
          $filep=$hotel_id->property; 
        }
        
        $hotel = Hotel::findOrFail($id);
        $hotel->hotel_code = $request->hotel_code;
        $hotel->IATA_number = $request->IATA_number;
        $hotel->service_type = $request->service_type;
        $hotel->name = $request->name;
        $hotel->zip = $request->zip;
        $hotel->state = $request->state;
        $hotel->phone = $request->phone;
        $hotel->address = $request->address;
        $hotel->city = $request->city;
        $hotel->type = $request->type;
        $hotel->logo = $file;
        $hotel->property = $filep;
        $hotel->rating = $request->rating;
        $hotel->active = $request->active == "true" ? true : false;
        $hotel->save();
        $hotel->amenities()->sync($request->amenities);
        Session::flash("success", "Hotel Updated Successfully");
        return redirect()->back();
    }
}
