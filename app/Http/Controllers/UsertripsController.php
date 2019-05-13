<?php
namespace App\Http\Controllers;

use App\Models\AgreementForm;
use App\Models\Hotel;
use App\Models\hotelamenities;
use App\Models\TripAmenity;
use App\Models\Rfp;
use App\Models\Team;
use App\Models\Usertrips;
use App\Models\Invoices;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Validator;

//use App\Http\Controllers\Session;

class UsertripsController extends Controller
{
    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'usertrips';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        $this->model = new Usertrips();
        $this->info  = $this->model->makeInfo($this->module);
        $this->data  = array(
            'pageTitle'  => $this->info['title'],
            'pageNote'   => $this->info['note'],
            'pageModule' => 'usertrips',
            'return'     => self::returnUrl(),
        );
    }

    public function index(Request $request)
    {
        // Make Sure users Logged
        if (!\Auth::check()) {
            return redirect('user/login')->with('status', 'error')->with('message', 'You are not login');
        }
        $this->grab($request);
        if ($this->access['is_view'] == 0) {
            return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        }

        // Render into template
        return view($this->module . '.index', $this->data);
    }

    public function compare(Request $request)
    {
        // Make Sure users Logged
        if (!\Auth::check()) {
            return redirect('user/login')->with('status', 'error')->with('message', 'You are not login');
        }
        $this->grab($request);
        if ($this->access['is_view'] == 0) {
            return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        }

        // Render into template
        return view($this->module . '.public' . '.compare', $this->data);
    }

    function getDatesFromRange($start, $end, $format = 'm/d/Y')
    {

        // Declare an empty array
        $array = array();

        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

        foreach ($period as $date) {
            $array[] = $date->format($format);
        }

        return $array;
    }

    function create(Request $request, $id = 0)
    {
        $this->hook($request);
        $this->checkAgreementFormAvailability();
        if ($this->access['is_add'] == 0) {
            return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        }
        $this->data['row'] = $this->model->getColumnTable($this->info['table']);
        $this->data['id']  = '';

        return view($this->module . '.form', $this->data);
    }

    function edit(Request $request, $id)
    {
        $this->hook($request, $id);
        if (!isset($this->data['row'])) {
            return redirect($this->module)->with('message', 'Record Not Found !')->with('status', 'error');
        }
        if ($this->access['is_edit'] == 0) {
            return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        }
        $this->data['row'] = (array)$this->data['row'];
        $this->data['id']  = $id;

        return view($this->module . '.form', $this->data);
    }

    function show(Request $request, $id)
    {
        /* Handle import , export and view */
        $task = $id;
        switch ($task) {
            case 'search':
                return $this->getSearch();
                break;
            case 'lookup':
                return $this->getLookup($request);
                break;
            case 'comboselect':
                return $this->getComboselect($request);
                break;
            case 'import':
                return $this->getImport($request);
                break;
            case 'export':
                return $this->getExport($request);
                break;
            default:
                $this->hook($request, $id);
                if (!isset($this->data['row'])) {
                    return redirect($this->module)->with('message', 'Record Not Found !')->with('status', 'error');
                }
                if ($this->access['is_detail'] == 0) {
                    return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
                }

                return view($this->module . '.view', $this->data);
                break;
        }
    }

    function store(Request $request)
    {
        $task = $request->input('action_task');
        switch ($task) {
            default:
                $rules     = $this->validateForm();
                $validator = Validator::make($request->all(), $rules);
                if ($validator->passes()) {
                    $data = $this->validatePost($request);
                    $id   = $this->model->insertRow($data, $request->input($this->info['key']));
                    /* Insert logs */
                    $this->model->logs($request, $id);
                    if (!is_null($request->input('apply'))) {
                        return redirect($this->module . '/' . $id . '/edit?' . $this->returnUrl())->with('message', __('core.note_success'))->with('status', 'success');
                    }

                    return redirect($this->module . '?' . $this->returnUrl())->with('message', __('core.note_success'))->with('status', 'success');
                } else {
                    return redirect($this->module . '/' . $request->input($this->info['key']) . '/edit')
                        ->with('message', __('core.note_error'))->with('status', 'error')
                        ->withErrors($validator)->withInput();
                }
                break;
            case 'public':
                return $this->store_public($request);
                break;
            case 'delete':
                $result = $this->destroy($request);

                return redirect($this->module . '?' . $this->returnUrl())->with($result);
                break;
            case 'import':
                return $this->PostImport($request);
                break;
            case 'copy':
                $result = $this->copy($request);

                return redirect($this->module . '?' . $this->returnUrl())->with($result);
                break;
        }
    }

    public function destroy($request)
    {
        // Make Sure users Logged
        if (!\Auth::check()) {
            return redirect('user/login')->with('status', 'error')->with('message', 'You are not login');
        }
        $this->access = $this->model->validAccess($this->info['id'], session('gid'));
        if ($this->access['is_remove'] == 0) {
            return redirect('dashboard')
                ->with('message', __('core.note_restric'))->with('status', 'error');
        }
        // delete multipe rows
        if (count($request->input('ids')) >= 1) {
            $this->model->destroy($request->input('ids'));
            \SiteHelpers::auditTrail($request, "ID : " . implode(",", $request->input('ids')) . "  , Has Been Removed Successfull");

            // redirect
            return ['message' => __('core.note_success_delete'), 'status' => 'success'];
        } else {
            return ['message' => __('No Item Deleted'), 'status' => 'error'];
        }
    }

    public static function display()
    {

        $mode  = isset($_GET['view']) ? 'view' : 'default';
        $model = new Usertrips();
        $info  = $model::makeInfo('usertrips');
        $data  = array(
            'pageTitle' => $info['title'],
            'pageNote'  => $info['note'],
        );
        if ($mode == 'view') {
            $id  = $_GET['view'];
            $row = $model::getRow($id);
            if ($row) {
                $data['row']    = $row;
                $data['fields'] = \SiteHelpers::fieldLang($info['config']['grid']);
                $data['id']     = $id;

                return view('usertrips.public.view', $data);
            }
        } else {
            $page       = isset($_GET['page']) ? $_GET['page'] : 1;
            $params     = array(
                'page'   => $page,
                'limit'  => (isset($_GET['rows']) ? filter_var($_GET['rows'], FILTER_VALIDATE_INT) : 100),
                'sort'   => $info['key'],
                'order'  => 'ASC',
                'params' => '',
                'global' => 0,
            );
            $result     = $model::getRows($params, session()->get('uid'));
            $rfp_counts = $model::getRFPCounts($params);
            foreach ($rfp_counts as $value) {
                $RFPs[$value->id] = $value->total;
            }
            $data['tableGrid']  = $info['config']['grid'];
            $data['rowData']    = $result['rows'];
            $data['rfp_counts'] = isset($RFPs) ? $RFPs : 0;
            $page               = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
            $pagination         = new Paginator($result['rows'], $result['total'], $params['limit']);
            $pagination->setPath('');
            $data['i']          = ($page * $params['limit']) - $params['limit'];
            $data['pagination'] = $pagination;

            return view('usertrips.public.index', $data);
        }
    }

    function store_public($request)
    {
        if (session('gid') != 4) {
            return Redirect::back()->with('message', __('core.note_error'))->with('status',
                'error')->withErrors(['message1' => 'Only travel coordinator\'s can book a trip'])->withInput();
        }
        $rules     = $this->validateForm();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $data = $this->validatePost($request);
            $this->model->insertRow($data, $request->input('id'));
            $trip_id = DB::getPdo()->lastInsertId();
            $r       = \Helper::addTripStatusLog(1, $trip_id);
            foreach ($request->input('trip_amenities') as $amenity_id) {
                $trip_amenities[] = array('trip_id' => $trip_id, 'amenity_id' => $amenity_id);
            }
            TripAmenity::where('trip_id', '=', $trip_id)->delete();
            TripAmenity::insert($trip_amenities);

            return Redirect::to('/trips')->with('messagetext', "Thankyou! we've got your booking request. Our travel coordinator will contact you soon.")->with('status',
                'success');
        } else {
            return Redirect::back()->with('message', __('core.note_error'))->with('status', 'error')->withErrors($validator)->withInput();
        }
    }

    public function getRFPs($trip_id)
    {
        $data['rfps']        = Rfp::where("user_trip_id", $trip_id)->get();
        $data['trip_detail'] = Usertrips::where("id", $trip_id)->first();

        return response()->json([
            'success'   => true,
            'view_data' => (string)view('usertrips.public.rfps', $data),
        ]);
    }

    public function getRFP($rfp_id)
    {
        $data['rfp'] = Rfp::where("id", $rfp_id)->first();

        return response()->json([
            'success'   => true,
            'view_data' => (string)view('usertrips.public.rfp', $data),
        ]);
    }

    public function compareRFP($rfp_id)
    {
        $value = explode(',', $rfp_id);
        $rfps = Rfp::with('userInfo','userInfo.hotel')->whereIn("user_trip_id", $value)->get();
        return response()->json([
            'success'   => true,
            'view_data' => (string)view('usertrips.public.comparerfp', compact('rfps')),
        ]);
    }

    public function acceptRFP($rfp_id)
    {
        Rfp::where('id', $rfp_id)->update(['status' => 2]);
        $trip_id = Rfp::find($rfp_id);
        if ($trip_id->user_id != 0) {
            $group = User::find($trip_id->user_id);
            $hotel = Hotel::find($group->hotel_id);
            $log_id   = Session::get('uid');
            $agree_id = AgreementForm::where('for_rfp', $rfp_id)->first();
            if ($agree_id === null) {
                $agreement_sent = date("Y-m-d H:i");
                $created_at     = date("Y-m-d H:i");

                $aggreement                 = new AgreementForm();
                $aggreement->id             = $rfp_id;
                $aggreement->sender_id      = $log_id;
                $aggreement->reciever_id    = $trip_id->user_id;
                $aggreement->reciever_group = $group->group_id;
                $aggreement->coordinator_id = $log_id;
                $aggreement->reciever_email = $group->email;
                $aggreement->hotel_name     = $hotel->name;
                $aggreement->hotel_details  = $hotel->address;
                $aggreement->agreement_text = $trip_id->hotels_message;
                $aggreement->for_rfp        = $rfp_id;
                $aggreement->agreement_sent = $agreement_sent;
                $aggreement->save();


            } else {
                return response()->json([
                    'success'   => true,
                    'view_data' => 'Already Accepted !',
                ]);
            }
            $r = \Helper::addTripStatusLog(4, $trip_id->user_trip_id, $rfp_id);

        } else {
            $guestemail = Rfp::find($rfp_id);
            $group = DB::table('invitations')->where('email', $guestemail->sales_manager)->first();
            $log_id   = Session::get('uid');
            $agree_id = AgreementForm::where('id', $rfp_id)->first();
            if ($agree_id === null) {
                $agreement_sent = date("Y-m-d H:i");
                $created_at     = date("Y-m-d H:i");

                $aggreement                 = new AgreementForm();
                $aggreement->id             = $rfp_id;
                $aggreement->sender_id      = $log_id;
                $aggreement->reciever_id    = 0;
                $aggreement->reciever_group = $group->group_id;
                $aggreement->coordinator_id = $log_id;
                $aggreement->reciever_email = $guestemail->sales_manager;
                $aggreement->hotel_name     = '';
                $aggreement->hotel_details  = '';
                $aggreement->agreement_text = '';
                $aggreement->for_rfp        = $rfp_id;
                $aggreement->agreement_sent = $agreement_sent;
                $aggreement->save();
            } else {
                return response()->json([
                    'success'   => true,
                    'view_data' => 'Already Accepted !',
                ]);
            }
            //$r = \Helper::addTripStatusLog(10, $trip_id, $rfp_id);
            $user_trip = Rfp::find($rfp_id);
            $invitations = DB::table('invitations')->where('email', '=', $user_trip->sales_manager)->first();
            $to_guest      = $user_trip->sales_manager;
            $subject_guest = "Coordinator Has Accepted Proposal";
            $data_guest    = array("trip_id" => $user_trip->user_trip_id, "subject_guest" => $subject_guest, "to_guest" => $to_guest, "group" => $invitations->group_id);
            \Mail::send('emails.trips.accept_trip_guest', compact('data_guest'), function ($message_guest) use ($data_guest, $to_guest) {
              $message_guest->to($to_guest)->subject($data_guest['subject_guest']);
            });
        }
        $agreement = AgreementForm::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'success'   => true,
            'redirect'  => route('hotelmanager.viewAgreements'),
            'view_data' => 'Accepted Successfully !',
        ]);


    }

    public function acceptAgree($rfp_id)
    {
       
    $trip=Rfp::find($rfp_id);
    $trip_entry=usertrips::find($trip->user_trip_id);
    $trip_user=User::find($trip->user_id);
    $user=User::find(session('uid'));
    $trip_entry_user=User::find($trip_entry->entry_by);
    if (session('level') == 4) {
           
            Rfp::where('id', $rfp_id)->update(['status' => 5]);
            /*send an email to coordinator acceptance*/
             $to_co      = $user->email;
             $subject_co = "Thank you for Accepting Aggreement";
             $data_co    = array("trip_id" => $trip->user_trip_id, "name"=>session('fid'),"subject_co" => $subject_co, "to_co" => $to_co);
             \Mail::send('emails.aggreement_comail', compact('data_co'), function ($message_co) use ($data_co, $to_co) {
                    //$message->from('SportTravelHQ');
             $message_co->to($to_co)->subject($data_co['subject_co']);
             });

            /*send an email to manager for aggreement acceptance*/
             $to      = $trip_user->email;
             $subject = session('fid')." Has Accepting Your Proposal";
             $data    = array("trip_id" => $trip->user_trip_id, "name"=>session('fid'),"subject" => $subject, "to" => $to);
             \Mail::send('emails.aggreement_mail', compact('data'), function ($message) use ($data, $to) {
             $message->to($to)->subject($data['subject']);
             });

        } else {
            Rfp::where('id', $rfp_id)->update(['status' => 6]);

             /*send an email to manager acceptance*/
             $to_co      = $user->email;
             $subject_co = "Thank you for Accepting Aggreement";
             $data_co    = array("trip_id" => $trip->user_trip_id, "name"=>session('fid'),"subject_co" => $subject_co, "to_co" => $to_co);
             \Mail::send('emails.aggreement_comail', compact('data_co'), function ($message_co) use ($data_co, $to_co) {
                    //$message->from('SportTravelHQ');
             $message_co->to($to_co)->subject($data_co['subject_co']);
             });
             
             $coordinator_name=$trip_entry_user->first_name.' '.$trip_entry_user->last_name;
            /*send an email to coordinator  for aggreement acceptance*/
             $to      = $trip_entry_user->email;
             $subject = session('fid')." Has Accepted Your Aggreement";
             $data    = array("trip_id" => $trip->user_trip_id, "name"=>session('fid'),"subject" => $subject, "to" => $to);
             \Mail::send('emails.aggreement_mail', compact('data'), function ($message) use ($data, $to) {
                    //$message->from('SportTravelHQ');
             $message->to($to)->subject($data['subject']);
             });

              
             /*send an email to Main Corporate  for aggreement acceptance*/
             $corporate=User::find(5);
             $to_corp     = $corporate->email;
             $subject_corp = "Manager Has Accepted Aggreement";
             $data_corp    = array("trip_id" => $trip->user_trip_id, "manager_name"=>session('fid'),"coordinator_name"=>$coordinator_name,"subject_corp" => $subject, "to_corp" => $to_corp);
             \Mail::send('emails.aggreement_corpmail', compact('data_corp'), function ($message_corp) use ($data_corp, $to_corp) {
                    //$message->from('SportTravelHQ');
             $message_corp->to($to_corp)->subject($data_corp['subject_corp']);
             });

        }
        
        return response()->json([
            'success'   => true,
            'view_data' => 'Accepted Successfully !',
        ]);
    
    }

    public function declineRFP($rfp_id, $reason)
    {
        Rfp::where('id', $rfp_id)->update(['status' => 3, 'decline_reason' => $reason]);
        $user_trip_id = Rfp::where('user_trip_id', $rfp_id)->pluck('user_trip_id');
        foreach ($user_trip_id as $item_new) {
            $trip_id = $item_new;
            $r       = \Helper::addTripStatusLog(3, $trip_id, $rfp_id, $reason);
        }

        return response()->json([
            'success'   => true,
            'view_data' => 'Declined Successfully !',
        ]);
    }

    /*Get Team*/
    function getTeam(Request $request, $id = 0)
    {
        if (!\Auth::check()) {
            return redirect('user/login')->with('status', 'error')->with('message', 'You are not login');
        }
        $this->grab($request);
        if ($this->access['is_view'] == 0) {
            return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        }

        // Render into template
        return view($this->module . '.public' . '.team', $this->data);
    }

    public function getTeamstore(Request $request)
    {
        $this->validate($request, [
            "team_name" => "required|max:191",
            "age_group" => "required|max:191",
            "gender"    => "required",
        ]);
        /*For hotel type logo*/
        $team            = new Team();
        $team->team_name = $request->team_name;
        $team->age_group = $request->age_group;
        $team->gender    = $request->gender == "true" ? true : false;
        $team->save();
        Session::flash("success", "New Team Added Successfully");

        return redirect()->action('UsertripsController@getTeamview');
    }

    public function getTeamview(Request $request)
    {
        $q     = (new Team)->newQuery();
        $teams = $q->get();

        return view($this->module . '.public' . '.viewTeams', compact('teams'));
    }

    public function getTeamdelete($id)
    {
        Team::find($id)->delete();
        Session::flash("success", "Record Deleted");

        return redirect()->back();
    }

    public function uploadRoster($rfp_id, $team)
    {
        Rfp::where('user_trip_id', $rfp_id)->update(['team' => $team]);

        return response()->json([
            'success'   => true,
            'view_data' => 'Team is added to the trip',
        ]);
    }

    public function uploadRosters($rfp_id)
    {
        $teams = Rfp::where('user_trip_id', $rfp_id)->get();

        return view($this->module . '.public' . '.uploadRoster', compact('teams'));
    }

    public function uploadRostertore(Request $request)
    {
        $rfp_id          = $request->input('rfp_id');
        $file            = $request->file('room_file')->getClientOriginalName();
        $destinationPath = './uploads/users/';
        $extension       = $request->file('room_file')->getClientOriginalExtension();
        $uploadSuccess   = $request->file('room_file')->move($destinationPath, $file);
        if ($extension == 'csv') {
            Rfp::where('user_trip_id', $rfp_id)->update(['roster' => $file]);
            Session::flash("success", "CSV uploaded sucessfully");
        } else {
            Session::flash("error", "Please select a file in CSV format");
        }

        return redirect()->back();
    }

    public function show_trips()
    {
        if (Session::get('level') != 4) {
            return redirect(URL("/"));
        }
        $trips  = usertrips::where('entry_by', session('uid'))->orderBy('added', 'desc')->get();
        $data_client = User::where('id', session('uid'))->get();
        if(count($trips)!=''){
        $purchases   = Invoices::sum('invoices.amt_paid');
        }
        else{
         $purchases=0;   
        }
        $amenities   = hotelamenities::all();
        $client = User::where('group_id', 4)->get();
        $data        = usertrips::all();
        $data_all    = Rfp::all();
        $get_invoice = Rfp::where("status", '!=', 3)->get();
        $data_accept = Rfp::where("status", 2)->get();
        $data_submit = Rfp::where("status", 1)->get();

        return view('coordinator.viewtrips', compact('trips', 'amenities', 'data_client', 'purchases', 'data_all', 'data_submit', 'get_invoice', 'data_accept', 'data','client'));

    }

    public function show_trip_detail($id)
    {
        if (Session::get('level') != 4) {
            return redirect(URL("/"));
        }
        $trip        = usertrips::with('tripuser')->find($id);
        $trip_id = Rfp::where("user_trip_id", $trip->id)->first();

        if($trip_id != null){
           $invoices    = Invoices::where('rfp_id',$trip_id->id)->first();
        }
        else{
          $invoices='';  
        }
        $data_hotel  = Hotel::groupBy('type')->get();
        $purchases =   Invoices::sum('invoices.amt_paid');
        $data        = usertrips::all();
        $rfps_new    = Rfp::where('status', 2)->get();
        $rfp          = Rfp::where('user_trip_id', '=', $id)->where('user_id', '=', session('uid'))->first();

        return view('coordinator.tripsingle', compact('trip', 'rfp', 'invoices', 'trip_id', 'data_hotel', 'data', 'rfps_new','purchases'));
    }

 
}
