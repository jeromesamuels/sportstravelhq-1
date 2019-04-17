<?php 
namespace App\Http\Controllers;
use App\Models\Usertrips;
use App\Models\Team;
use App\Models\Rfp;
use Illuminate\Http\Request;
//use App\Http\Controllers\Session;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
//use App\Models\usertrips;
use App\Models\hotelamenities;
use App\Models\AgreementForm;
class UsertripsController extends Controller {
protected $layout = "layouts.main";
protected $data = array();
public $module = 'usertrips';
static $per_page	= '10';
public function __construct()
{
parent::__construct();
$this->model = new Usertrips();	
$this->info = $this->model->makeInfo( $this->module);
$this->data = array(
'pageTitle'	=> 	$this->info['title'],
'pageNote'	=>  $this->info['note'],
'pageModule'=> 'usertrips',
'return'	=> self::returnUrl()
);
}
public function index( Request $request )
{
// Make Sure users Logged 
if(!\Auth::check()) 
return redirect('user/login')->with('status', 'error')->with('message','You are not login');
$this->grab( $request);
if($this->access['is_view'] ==0) 
return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');
// Render into template
return view( $this->module.'.index',$this->data);
}
public function compare( Request $request )
{
// Make Sure users Logged 
if(!\Auth::check()) 
return redirect('user/login')->with('status', 'error')->with('message','You are not login');
$this->grab( $request);
if($this->access['is_view'] ==0) 
return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');
// Render into template
return view( $this->module.'.public'.'.compare',$this->data);
}

function getDatesFromRange($start, $end, $format = 'm/d/Y') { 
       
     // Declare an empty array 
     $array = array(); 
       
     $interval = new DateInterval('P1D'); 
    
     $realEnd = new DateTime($end); 
     $realEnd->add($interval); 
    
     $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
    
     foreach($period as $date) {                  
         $array[] = $date->format($format);  
     } 
   
     return $array; 
} 

function create( Request $request , $id =0 ) 
{
$this->hook( $request );
$this->checkAgreementFormAvailability();
if($this->access['is_add'] ==0) 
return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');
$this->data['row'] = $this->model->getColumnTable( $this->info['table']);
$this->data['id'] = '';

return view($this->module.'.form',$this->data);
}

function edit( Request $request , $id ) 
{
$this->hook( $request , $id );
if(!isset($this->data['row']))
return redirect($this->module)->with('message','Record Not Found !')->with('status','error');
if($this->access['is_edit'] ==0 )
return redirect('dashboard')->with('message',__('core.note_restric'))->with('status','error');
$this->data['row'] = (array) $this->data['row'];
$this->data['id'] = $id;

return view($this->module.'.form',$this->data);
}
function show( Request $request , $id ) 
{
/* Handle import , export and view */
$task =$id;
switch( $task)
{
case 'search':
return $this->getSearch();
break;
case 'lookup':
return $this->getLookup($request );
break;
case 'comboselect':
return $this->getComboselect( $request );
break;
case 'import':
return $this->getImport( $request );
break;
case 'export':
return $this->getExport( $request );
break;
default:
$this->hook( $request , $id );
if(!isset($this->data['row']))
return redirect($this->module)->with('message','Record Not Found !')->with('status','error');
if($this->access['is_detail'] ==0) 
return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');
return view($this->module.'.view',$this->data);	
break;
}
}
function store( Request $request  )
{
$task = $request->input('action_task');
switch ($task)
{
default:
$rules = $this->validateForm();
$validator = Validator::make($request->all(), $rules);
if ($validator->passes()) 
{
$data = $this->validatePost( $request );
$id = $this->model->insertRow($data , $request->input( $this->info['key']));
/* Insert logs */
$this->model->logs($request , $id);
if(!is_null($request->input('apply')))
return redirect( $this->module .'/'.$id.'/edit?'. $this->returnUrl() )->with('message',__('core.note_success'))->with('status','success');
return redirect( $this->module .'?'. $this->returnUrl() )->with('message',__('core.note_success'))->with('status','success');
} 
else {
return redirect($this->module.'/'. $request->input(  $this->info['key'] ).'/edit')
->with('message',__('core.note_error'))->with('status','error')
->withErrors($validator)->withInput();
}
break;
case 'public':
return $this->store_public( $request );
break;
case 'delete':
$result = $this->destroy( $request );
return redirect($this->module.'?'.$this->returnUrl())->with($result);
break;
case 'import':
return $this->PostImport( $request );
break;
case 'copy':
$result = $this->copy( $request );
return redirect($this->module.'?'.$this->returnUrl())->with($result);
break;
}
}
public function destroy( $request)
{
// Make Sure users Logged 
if(!\Auth::check()) 
return redirect('user/login')->with('status', 'error')->with('message','You are not login');
$this->access = $this->model->validAccess($this->info['id'] , session('gid'));
if($this->access['is_remove']==0) 
return redirect('dashboard')
->with('message', __('core.note_restric'))->with('status','error');
// delete multipe rows 
if(count($request->input('ids')) >=1)
{
$this->model->destroy($request->input('ids'));
\SiteHelpers::auditTrail( $request , "ID : ".implode(",",$request->input('ids'))."  , Has Been Removed Successfull");
// redirect
return ['message'=>__('core.note_success_delete'),'status'=>'success'];
} else {
return ['message'=>__('No Item Deleted'),'status'=>'error'];
}
}
public static function display()
{

$mode  = isset($_GET['view']) ? 'view' : 'default';
$model  = new Usertrips();
$info = $model::makeInfo('usertrips');
$data = array(
'pageTitle'	=> 	$info['title'],
'pageNote'	=>  $info['note']
);
if($mode == 'view')
{
$id = $_GET['view'];
$row = $model::getRow($id);
if($row)
{
$data['row'] = $row;
$data['fields'] = \SiteHelpers::fieldLang($info['config']['grid']);
$data['id'] = $id;
return view('usertrips.public.view',$data);
}
} else {
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$params = array(
'page'		=> $page ,
'limit'		=>  (isset($_GET['rows']) ? filter_var($_GET['rows'],FILTER_VALIDATE_INT) : 100 ),
'sort'		=> $info['key'],
'order'		=> 'ASC',
'params'	=> '',
'global'	=> 0
);
$result = $model::getRows( $params, session()->get('uid') );
$rfp_counts = $model::getRFPCounts( $params );
foreach ($rfp_counts as $value) {
$RFPs[$value->id] = $value->total;
}
$data['tableGrid'] 	= $info['config']['grid'];
$data['rowData'] 	= $result['rows'];
$data['rfp_counts']	= isset($RFPs) ? $RFPs : 0;
$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
$pagination = new Paginator($result['rows'], $result['total'], $params['limit']);
$pagination->setPath('');
$data['i']			= ($page * $params['limit'])- $params['limit']; 
$data['pagination'] = $pagination;

return view('usertrips.public.index',$data);
}
}
function store_public( $request)
{
if(session('gid') != 4) 
return Redirect::back()->with('message',__('core.note_error'))->with('status','error')->withErrors(['message1'=>'Only travel coordinator\'s can book a trip'])->withInput();
$rules = $this->validateForm();
$validator = Validator::make($request->all(), $rules);
if ($validator->passes()) {
$data = $this->validatePost(  $request );
$this->model->insertRow($data , $request->input('id'));
$trip_id = DB::getPdo()->lastInsertId();
$r = \Helper::addTripStatusLog(1, $trip_id);
foreach ($request->input('trip_amenities') as $amenity_id) {
$trip_amenities[] = array('trip_id'=>$trip_id, 'amenity_id'=>$amenity_id);
}
DB::table('trip_amenities')->where('trip_id', '=', $trip_id)->delete();
DB::table('trip_amenities')->insert($trip_amenities);
return  Redirect::to('/trips')->with('messagetext', "Thankyou! we've got your booking request. Our travel coordinator will contact you soon.")->with('status','success');
} 
else {
return Redirect::back()->with('message',__('core.note_error'))->with('status','error')->withErrors($validator)->withInput();
}
}
public function getRFPs($trip_id) {
$data['rfps'] = DB::table('rfps')->get()->where("user_trip_id", $trip_id);
$data['trip_detail'] = DB::table('user_trips')->get()->where("id", $trip_id)->first();
return response()->json([
'success' => true, 
'view_data' => (string)view('usertrips.public.rfps', $data)
]);
}
public function getRFP($rfp_id) {
$data['rfp'] = DB::table('rfps')->get()->where("id", $rfp_id)->first();
return response()->json([
'success' => true, 
'view_data' => (string)view('usertrips.public.rfp', $data)
]);
}
public function compareRFP($rfp_id) {
$myaar=explode(',' , $rfp_id);
$datae=array();
foreach ($myaar as $key => $value) {
$data = DB::table('rfps')->where("user_trip_id", $value)->get();
array_push($datae , $data);
}
$output['rfps'] = $datae;
return response()->json([
'success' => true, 
'view_data' => (string)view('usertrips.public.comparerfp', $output)
]);
}

public function acceptRFP($rfp_id) {
DB::table('rfps')->where('id', $rfp_id)->update(['status' => 2]);
$user_trip_id = DB::table('rfps')->where('id', $rfp_id)->pluck('user_trip_id');
foreach($user_trip_id as $item_new) {
$trip_id = $item_new;
}
$accept_aggreement = DB::table('rfps')->where('id', $rfp_id)->get();
foreach($accept_aggreement as $accept_aggreement_new) {
$aggree = $accept_aggreement_new;
}
if($aggree->user_id != 0){
$group_id = DB::table('tb_users')->where('id', $aggree->user_id)->get();
foreach($group_id as $group_id_new) {
$group = $group_id_new;
}
$hotel_id = DB::table('hotels')->where('id', $group->hotel_id)->get();
foreach($hotel_id as $hotel_id_new) {
$hotel = $hotel_id_new;
}
$log_id=Session::get('uid');
$agree_id = DB::table('agreement_forms')->where('id', $rfp_id)->first();
if ($agree_id === null) {
$agreement_sent	=date("Y-m-d H:i");
$created_at		=date("Y-m-d H:i");	
DB::insert("insert into agreement_forms(id,sender_id,reciever_id,reciever_group,coordinator_id,reciever_email,hotel_name,hotel_details,agreement_text,for_rfp,agreement_sent,created_at) values ($rfp_id,$log_id,$aggree->user_id,$group->group_id,$log_id,'$group->email','$hotel->name','$hotel->address','$aggree->hotels_message',$rfp_id,'$agreement_sent','$created_at')");
}
else{
return response()->json([
'success' => true, 
'view_data' => 'Already Accepted !'
]);
}
$r = \Helper::addTripStatusLog(4, $trip_id, $rfp_id);

}
else{
$user_email = DB::table('rfps')->where('id', $rfp_id)->pluck('sales_manager');
foreach($user_email as $user_email_new) {
$guestemail = $user_email_new;
}
$group_id = DB::table('invitations')->where('email', $guestemail)->pluck('group_id');
foreach($group_id as $group_id_new) {
$group = $group_id_new;
}
$log_id=Session::get('uid');
$agree_id = DB::table('agreement_forms')->where('id', $rfp_id)->first();
if ($agree_id === null) {
$agreement_sent	=date("Y-m-d H:i");
$created_at		=date("Y-m-d H:i");	
DB::insert("insert into agreement_forms(id,sender_id,reciever_id,reciever_group,coordinator_id,reciever_email,hotel_name,hotel_details,agreement_text,for_rfp,agreement_sent,created_at) values ($rfp_id,$log_id,0,$group,$log_id,'$guestemail','','','',$rfp_id,'$agreement_sent','$created_at')");
}
else{
return response()->json([
'success' => true, 
'view_data' => 'Already Accepted !'
]);
}
//$r = \Helper::addTripStatusLog(10, $trip_id, $rfp_id);
$user_trip = DB::table('rfps')->where('id', '=', $rfp_id)->get();
foreach($user_trip as $user_trip_new) {
$user_trip_single = $user_trip_new;
}
$invitations = DB::table('invitations')->where('email', '=', $user_trip_single->sales_manager)->pluck('group_id');
foreach($invitations as $invitations_new) {
$invitations_single = $invitations_new;
}
//$guest_users = DB::table('invitations')->where('group_id', 5)->first();
$to_guest = $user_trip_single->sales_manager;
$subject_guest = "Coordinator Has Accept Proposals";
$data_guest = array("trip_id" => $user_trip_single->user_trip_id, "subject_guest"=>$subject_guest,"to_guest"=>$to_guest,"group"=>$invitations_single);
\Mail::send('emails.trips.accept_trip_guest', compact('data_guest'), function ($message_guest) use($data_guest, $to_guest){
//$message->from('SportTravelHQ');
$message_guest->to($to_guest)->subject($data_guest['subject_guest']);
});
}
$agreement = AgreementForm::orderBy('created_at', 'DESC')->get(); 
//return redirect('hotelmanager/agreements')->with('message', __('core.note_restric'))->with('status','success');

return response()->json([
'success' => true, 
'redirect'=>route('hotelmanager.viewAgreements'),
'view_data' => 'Accepted successfully !',
//'view_data' => (string)view('hotelmanager.viewAgreements',$agreements)
]);


}
public function acceptAgree($rfp_id) {
if(session('level')==4){
DB::table('rfps')->where('id', $rfp_id)->update(['status' => 5]);
}
else{
DB::table('rfps')->where('id', $rfp_id)->update(['status' => 6]);	
}
return response()->json([
'success' => true, 
'view_data' => 'Accepted successfully !'
]);
}
public function declineRFP($rfp_id, $reason) {
//$reason=$request->reason;
DB::table('rfps')
->where('id', $rfp_id)
->update(['status' => 3,'decline_reason' => $reason]);
$user_trip_id = DB::table('rfps')->where('user_trip_id', $rfp_id)->pluck('user_trip_id');
foreach($user_trip_id as $item_new) {
$trip_id = $item_new;
$r = \Helper::addTripStatusLog(3, $trip_id, $rfp_id,$reason);
}
return response()->json([
'success' => true, 
'view_data' => 'Declined successfully !'
]);
}
/*Get Team*/
function getTeam(Request $request , $id =0 ) 
{
if(!\Auth::check()) 
return redirect('user/login')->with('status', 'error')->with('message','You are not login');
$this->grab( $request);
if($this->access['is_view'] ==0) 
return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');
// Render into template
return view( $this->module.'.public'.'.team',$this->data);
}
public function getTeamstore(Request $request){
$this->validate($request, [
"team_name" => "required|max:191",
"age_group" => "required|max:191",
"gender" => "required",
]);
/*For hotel type logo*/
$team = new Team();
$team->team_name = $request->team_name;
$team->age_group = $request->age_group;
$team->gender = $request->gender == "true" ? true : false;
$team->save();
Session::flash("success","New Team Added Successfully");
return redirect()->action('UsertripsController@getTeamview');
}
public function getTeamview(Request $request){
$q = (new Team)->newQuery();
$teams=$q->get();
return view($this->module.'.public'.'.viewTeams',compact('teams'));
}
public function getTeamdelete($id){
Team::find($id)->delete();
Session::flash("success","Record Deleted");
return redirect()->back();
}
public function uploadRoster($rfp_id, $team) {
DB::table('rfps')->where('user_trip_id', $rfp_id)->update(['team' => $team]);
return response()->json([
'success' => true, 
'view_data' => 'Team is added to the trip'
]);
}
public function uploadRosters($rfp_id){
$teams = DB::table('rfps')->where('user_trip_id', $rfp_id)->get();
return view($this->module.'.public'.'.uploadRoster',compact('teams'));		
}
public function uploadRostertore(Request $request){
$rfp_id=$request->input('rfp_id');
$file = $request->file('room_file')->getClientOriginalName();
$destinationPath = './uploads/users/';
$extension = $request->file('room_file')->getClientOriginalExtension(); 
$uploadSuccess = $request->file('room_file')->move($destinationPath, $file);
if($extension== 'csv'){
DB::table('rfps')->where('user_trip_id', $rfp_id)->update(['roster' => $file]);
Session::flash("success","CSV uploaded sucessfully");
}
else{
Session::flash("error","Please select a file in CSV format");
}
return redirect()->back();
}
function show_trips() 
{
if(Session::get('level') != 4)
return redirect(URL("/"));
$trips = usertrips::all()->sortByDesc('added')->where('entry_by', session('uid'));
$rfps= DB::table('rfps')->orderBy('updated_at', 'desc')->get();
$amenities = hotelamenities::all();
return view('coordinator.viewtrips', compact('trips', 'amenities','rfps'));
}
public function show_trip_detail($id) {
if(Session::get('level') != 4)
return redirect(URL("/"));
$trip = usertrips::find($id);
$rfp = DB::table('rfps')->where('user_trip_id', '=', $id)->where('user_id', '=', session('uid'))->first();
return view('coordinator.tripsingle', compact('trip', 'rfp'));
}
}