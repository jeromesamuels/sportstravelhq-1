<?php
namespace App\Http\Controllers\HotelManager;
use App\Http\Controllers\Controller;
use App\Models\AgreementForm;
use App\Models\Core\Users;
use App\Models\Rfp;
use App\User;
use App\Models\Hotel;
use App\Models\Usertrips;
use App\Models\Invoices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class HotelManagerController extends Controller {

    public function __construct() {
        if (Session::has('level')) {
            if (Session::get('level') != 5) return redirect()->back();
        } else return redirect()->back();
    }

    public function index(Request $request) {
        $q = (new Hotel)->newQuery();
        $searchField = "";
        if ($request->searchField) {
            $q->where('name', "LIKE", $request->searchField . "%");
            $searchField = $request->searchField;
        }
        $hotel = User::find(session('uid'));
        $hotels = $q->where('id', $hotel->hotel_id)->get();
        $data_hotel = Hotel::find($hotel->hotel_id);
        $purchases = Invoices::where('invoices.hotel_name', '=', $hotel->hotel_id)->sum('invoices.amt_paid');
        $purchases_due = Invoices::where('invoices.hotel_name', '=', $hotel->hotel_id)->sum('invoices.est_amt_due');
        $trip_booking = Usertrips::all();
        $rfps_new = Rfp::where(['user_id' => session('uid') ])->get();
        return view('hotelmanager.index', compact('hotels', 'searchField', 'data_hotel', 'purchases', 'purchases_due', 'trip_booking', 'rfps_new'));
    }

    public function saveBid(Request $request) {
        $this->validate($request, ['trip_id' => 'required|numeric|min:0', 'offer_rate' => 'required|numeric|min:0', 'eventDistance' => 'required|max:500', 'offerValidityDate' => 'required|date|after:today', ]);
        $trip = Usertrips::find($request->trip_id);
        //geting Trip Amenities
        $amenitie_ids = [];
        foreach ($trip->amenities as $amenity) {
            $amenitie_ids[count($amenitie_ids) ] = $amenity->id;
        }
        // Saving Rfp
        $rfp = new Rfp();
        $rfp->user_trip_id = $trip->id;
        $rfp->user_id = Session::get('uid');
        $rfp->added = Carbon::now();
        $rfp->status = 1; //Bid not yet send/pending
        $rfp->destination = $trip->from_city;
        $rfp->hotel_information = 0;
        $rfp->distance_event = $request->eventDistance;
        $rfp->offer_rate = $request->offer_rate;
        $rfp->cc_authorization = 1;
        $rfp->offer_validity = $request->offerValidityDate;
        $rfp->check_in = date("Y-m-d", strtotime($trip->check_in));
        $rfp->check_out = date("Y-m-d", strtotime($trip->check_out));
        $rfp->sales_manager = Session::get('fid');
        $rfp->king_beedrooms = $trip->double_king_qty;
        $rfp->queen_beedrooms = $trip->double_queen_qty;
        $rfp->amenitie_ids = json_encode($amenitie_ids);
        $rfp->hotels_message = $request->message;
        $rfp->save();
        $r = \Helper::addTripStatusLog(2, $trip->id, $rfp->id);
        Session::flash('success', 'Bid has been Sent successfully');
        return redirect()->back();
    }

    public function bidSent($id) {
       Rfp::where('user_trip_id', $id)->update(['status' => 3]);
        return redirect()->back()->with('Success', 'Bid Declined Successfully !');
    }

    public function viewAgreements() {
        $this->checkAgreementFormAvailability();
        $agreement = AgreementForm::orderBy('created_at', 'DESC')->get();
        $user = User::find(session('uid'));
        $hotel_data = Hotel::find($user->hotel_id);
        if (Session::get('level') != 1 && Session::get('level') != 6) {
            $agreements = AgreementForm::where('reciever_id', '=', Session::get('uid'))->orWhere('coordinator_id', '=', Session::get('uid'))->orderBy('created_at', 'DESC')->get();
        } elseif ($hotel_data->name != '' && Session::get('level') == 6) {
            $agreements = AgreementForm::orderBy('created_at', 'DESC')->where('hotel_name', $hotel_data->name)->get();
        } else {
            $agreements = AgreementForm::orderBy('created_at', 'DESC')->get();
        }
        $rfp_status='';
        if ($agreements != '') {
        foreach ($agreements as $agreement) {
                $rfp_status = Rfp::find($agreement->for_rfp);
         } 
             return view('hotelmanager.viewagreements', compact('agreements', 'rfp_status'));
         }
        else {
             return redirect()->back();
            }
    }

    public function downloadAgreement($id) {
        $agreement = AgreementForm::find($id);
        if ($agreement->downloaded == true) {
            Session::flash('error', 'You cannot Download Agreement for the Second Time');
            return redirect()->back();
        }
        if ($agreement->file != '') {
            $response = - 1;
            $file = public_path() . '/uploads/users/' . $agreement->file;
            $response = response()->download($file);
            if ($response !== - 1) {
                return $response;
            }
        } else {
            return redirect()->back();
        }
    }

    public function agreementDetails($id) {
        $agreement = AgreementForm::find($id);
        $IATA_number = Hotel::where('name', '=', $agreement->hotel_name)->pluck('IATA_number');
        if ($agreement) {
            return view('hotelmanager.agreementDetails', compact('agreement', 'IATA_number'));
        }
    }

    public function RFPDetails($id) {
        $rfp = Rfp::find($id);
        if ($rfp) {
            return view('hotelmanager.rfpdetails', compact('rfp'));
        }
    }

    public function checkAgreementFormAvailability() {
        $agreementsToDelete = AgreementForm::get();
        $expired = [];
        foreach ($agreementsToDelete as $agreement) {
            $difference = Carbon::now()->diffInHours(new Carbon($agreement->agreement_sent));
            if ($difference > 72) {
                $expired[] = $agreement->id;
            }
        }
        if (count($expired) > 0) {
            foreach ($expired as $id) {
                AgreementForm::find($id)->delete();
            }
        }
    }

    public function makeInvoice(Request $request) {
        $this->validate($request, [
            'trip_id' => 'numeric|min:0', 
            'actualized_room_count' => 'numeric|min:0', 
            'room_rate' => 'numeric', 
            'amt_paid' => 'numeric', ]);

        $file = $request->file('invoice_file')->getClientOriginalName();
        $destinationPath = './uploads/users/';
        $extension = $request->file('invoice_file')->getClientOriginalExtension();
        $uploadSuccess = $request->file('invoice_file')->move($destinationPath, $file);
        $trip_idd = Rfp::find($request->rfp_id);
        $trip = Usertrips::find($trip_idd->user_trip_id);
        //geting Trip Amenities
        $amenitie_ids = [];
        foreach ($trip->amenities as $amenity) {
            $amenitie_ids[count($amenitie_ids) ] = $amenity->id;
        }
        // Getting manager info
        $hotel_manager_id = Session::get('uid');
        $hotel_manger_info = User::find($hotel_manager_id);
        $email = $hotel_manger_info->email;
        $phone_number = $hotel_manger_info->phone_number;
        $hotel_id = $hotel_manger_info->hotel_id;
        //Getting hotel info
        $hotel_info = Hotel::find($hotel_id);
        $hotel_name = $hotel_info->name;
        $hotel_type = $hotel_info->type;
        $hotel_address = $hotel_info->address;
        $a = mt_rand(100000, 999999);
        $rfp = new Invoices();
        $rfp->invoice_id = $a;
        $rfp->trip_status = $trip->status;
        $rfp->trip_name = $trip->trip_name;
        $rfp->trip_address = $trip->from_address_1;
        $rfp->check_in = $trip->check_in;
        $rfp->check_out = $trip->check_out;
        $rfp->rfp_id = $request->rfp_id;
        $rfp->hotel_name = $hotel_id;
        $rfp->hotel_add = $hotel_address;
        $rfp->hotel_type = $hotel_type;
        $rfp->hotel_manager = Session::get('fid');
        $rfp->email = $email;
        $rfp->phone = $phone_number;
        $rfp->total_room = $trip->double_king_qty + $trip->double_queen_qty;
        $rfp->room_rate = $request->room_rate;
        $rfp->actualized_room_count = $request->actualized_room_count;
        $rfp->commissoin_rate = 10;
        $rfp->amt_paid = $request->amt_paid;
        $rfp->invoice_file = $file;
        $rfp->entry_by = $trip->entry_by;
        $record_exists = Invoices::where('rfp_id', '=', $request->trip_id)->first();
        if (is_null($record_exists)) {
            $rfp->save();
            Rfp::where('id', $rfp->rfp_id)->update(['status' => 4]);
            $users = User::find(1);
            /*send an invoice*/
            $to = [$email, $users->email];
            \Mail::send('user.emails.invoiceMail', compact('rfp'), function ($message) use ($rfp, $to) {
                $message->to($to)->subject('Manager Uploaded Invoice');
            });
            $record_exists = Invoices::where('rfp_id', '=', $rfp->rfp_id)->first();
            $IATA_number = Hotel::find($hotel_id);
            return view('hotelmanager.tripInvoice', compact('rfp', 'record_exists', 'IATA_number','hotel_info'));
        } else {
            return redirect()->back()->with('message', __('Record Already Exists!!'))->with('status', 'Error');
        }
    }

    public function blackoutDates() {
        $user = User::find(session('uid'));
        $hotels =Hotel::find($user->hotel_id);

        return view('hotelmanager.blackoutDates', compact('hotels'));
    }

    public function blackoutStore(Request $request) {
        $this->validate($request, ['start' => 'required', 'end' => 'required', 'blackout_reason' => 'required|max:500', ]);
        $hotel = Hotel::find($request->hotel_id);
        $hotel->blackout_start = $request->start;
        $hotel->blackout_end = $request->end;
        $hotel->blackout_reason = $request->blackout_reason;
        $hotel->save();
        Session::flash('success', 'Blackout date added successfully');
        return redirect()->back();
    }

    public function blackoutReport() {
        $user = User::find(session('uid'));
        if (session('level') == 1) {
            $hotel =Hotel::orderBY('updated_at', 'desc')->where('blackout_start', '!=', '')->get();
        } else {
            $hotel =Hotel::orderBY('updated_at', 'desc')->where([['blackout_start', '!=', ''], ['id', $user->hotel_id]])->get();
        }
        return view('hotelmanager.blackoutReport', compact('hotel'));
    }
}
