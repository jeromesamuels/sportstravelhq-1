<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Core\Users;
use App\Models\Core\Groups;
use App\Models\Core\CorporateUsers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Rfp;
use App\Models\Invoices;
use App\Models\Hotel;
use App\Models\UserTrip;
use App\User;

class CorporateUsersController extends Controller {

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'CorporateUser';
    static $per_page = '10';
    public function __construct() {
        parent::__construct();
        $this->model = new CorporateUsers();
        $this->info = $this->model->makeInfo($this->module);
        //print_r($this->info);
        //die;
        $this->data = array('pageTitle' => $this->info['title'], 'pageNote' => $this->info['note'], 'pageModule' => 'corporate/user', 'return' => self::returnUrl());
    }

    public function index(Request $request) {
        // Make Sure users Logged
        if (!\Auth::check()) return redirect('user/login')->with('status', 'error')->with('message', 'You are no Logged in');
        $corporate_user_id = 6; // static corporate user Id
        $filter = ['params' => " AND tb_groups.level >= '" . CorporateUsers::level($corporate_user_id) . "'"];
        $this->data['data_hotel'] = Hotel::groupBy('type')->get();
        foreach ($this->data['data_hotel'] as $value) {
            $name = $value->type;
            $currentMonth = date('m');
            $this->data['purchases'] = Invoices::where('invoices.hotel_type', '=', $name)->sum('invoices.amt_paid');
            $this->data['purchases_due'] = Invoices::where('invoices.hotel_type', '=', $name)->sum('invoices.est_amt_due');
        }
        $this->data['rfps_new'] = Rfp::where('status', 2)->get();
        $this->data['trip_booking'] = UserTrip::all();
        $this->grab($request, $filter);
        if ($this->access['is_view'] == 0) return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        return view('corporate.user.index', $this->data);
    }

    function create(Request $request) {
        $this->hook($request);
        if ($this->access['is_add'] == 0) return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        
        $this->data['row'] = $this->model->getColumnTable($this->info['table']);
        $this->data['hotels'] = Hotel::where('active', 1)->get();
        $this->data['id'] = '';
        return view('corporate.user.form', $this->data);
    }

    function edit(Request $request, $id) {
        $this->hook($request, $id);
        if (!isset($this->data['row'])) return redirect($this->module)->with('message', 'Record Not Found !')->with('status', 'error');
        if ($this->access['is_edit'] == 0) return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        $this->data['row'] = (array)$this->data['row'];
        $this->data['hotels'] = Hotel::where('active', 1)->get();
        $this->data['id'] = $id;
        return view('corporate.user.form', $this->data);
    }

    function show(Request $request, $id) {
        /* Handle import , export and view */
        $task = $id;
        switch ($task) {
            case 'search':
                return $this->getSearch();
            break;
            case 'blast':
                return $this->getBlast($request);
            break;
            case 'coordinator':
                return $this->getCoordinator($request);
            break;
            case 'hotelmanager':
                return $this->getHotelManager($request);
            break;
            case 'corporate':
                return $this->getCorporate($request);
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
                if (!isset($this->data['row'])) return redirect($this->module)->with('message', 'Record Not Found !')->with('status', 'error');
                if ($this->access['is_detail'] == 0) return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
                return view('corporate.user.view', $this->data);
                break;
            }
        }

        function store(Request $request) {
            $task = $request->input('action_task');
            switch ($task) {
                default:
                    return $this->postSave($request);
                break;
                case 'delete':
                    $result = $this->destroy($request);
                    return redirect('corporate/' . $this->module . '?' . $this->returnUrl())->with($result);
                break;
                case 'import':
                    return $this->PostImport($request);
                break;
                case 'copy':
                    $result = $this->copy($request);
                    return redirect('corporate/' . $this->module . '?' . $this->returnUrl())->with($result);
                break;
            }
        }
        function postSave($request, $id = 0) {
            $rules = $this->validateForm();
            if ($request->input('id') == '') {
                $rules['password'] = 'required|between:6,12|confirmed';
                $rules['password_confirmation'] = 'required|between:6,12';
                $rules['email'] = 'required|email|unique:tb_users';
                $rules['phone_number'] = 'required';
                $rules['username'] = 'required|alpha_num|min:2|unique:tb_users';
            } else {
                if ($request->input('password') != '') {
                    $rules['password'] = 'required|between:6,12|confirmed';
                    $rules['password_confirmation'] = 'required|between:6,12';
                }
            }
            if (!is_null($request->file('avatar'))) $rules['avatar'] = 'mimes:jpg,jpeg,png,gif,bmp';
            $validator = Validator::make($request->all(), $rules);
            if ($validator->passes()) {
                $data = $this->validatePost($request);
                if ($request->input('id') == '') {
                    $data['password'] = \Hash::make($request->input('password'));
                } else {
                    if ($request->input('password') != '') {
                        $data['password'] = \Hash::make($request->get('password'));
                    } else {
                        unset($data['password']);
                    }
                }
                $data['hotel_id'] = $request->input('hotel_id');
                $id = $this->model->insertRow($data, $request->input('id'));
                if (!is_null($request->file('avatar'))) {
                    $updates = array();
                    $file = $request->file('avatar');
                    $destinationPath = './uploads/users/';
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    //if you need extension of the file
                    $newfilename = $id . '.' . $extension;
                    $uploadSuccess = $request->file('avatar')->move($destinationPath, $newfilename);
                    if ($uploadSuccess) {
                        $updates['avatar'] = $newfilename;
                    }
                    $this->model->insertRow($updates, $id);
                }
                if (!is_null($request->input('apply'))) {
                    $return = 'corporate/user/' . $id . '?return=' . self::returnUrl();
                } else {
                    $return = 'corporate/user?return=' . self::returnUrl();
                }
                return redirect($return)->with('message', __('core.note_success'))->with('status', 'success');
            } else {
                return redirect()->back()->with('message', __('core.note_error'))->with('status', 'error')->withErrors($validator)->withInput();
            }
        }
        public function destroy($request) {
            // Make Sure users Logged
            if (!\Auth::check()) return redirect('user/login')->with('status', 'error')->with('message', 'You are no Logged in');
            $this->access = $this->model->validAccess($this->info['id'], session('gid'));
            if ($this->access['is_remove'] == 0) return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
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
        function getBlast() {
            $this->data = array('groups' => Groups::all(), 'pageTitle' => 'Blast Email', 'pageNote' => 'Send email to users');
            return view('core.users.blast', $this->data);
        }
        function postDoblast(Request $request) {
            $rules = array('subject' => 'required', 'message' => 'required|min:10', 'groups' => 'required',);
            $validator = Validator::make($request->all(), $rules);
            if ($validator->passes()) {
                if (!is_null($request->input('groups'))) {
                    $count = 0;
                    $groups = $request->input('groups');
                    for ($i = 0;$i < count($groups);$i++) {
                        if ($request->input('uStatus') == 'all') {
                            $users =User::where('group_id', '=', $groups[$i])->get();
                        } else {
                            $users = User::where('active', '=', $request->input('uStatus'))->where('group_id', '=', $groups[$i])->get();
                        }
                        foreach ($users as $row) {
                            $data['note'] = $request->input('message');
                            $data['row'] = $row;
                            $data['to'] = $row->email;
                            $data['subject'] = $request->input('subject');
                            $data['cnf_appname'] = $this->data['sximoconfig']['cnf_appname'];
                            if ($this->config['cnf_mail'] && $this->config['cnf_mail'] == 'swift') {
                                \Mail::send('core.users.email', $data, function ($message) use ($data) {
                                    $message->to($data['to'])->subject($data['subject']);
                                });
                            } else {
                                $message = view('core.users.email', $data);
                                $headers = 'MIME-Version: 1.0' . "\r\n";
                                $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                $headers.= 'From: ' . $this->config['cnf_appname'] . ' <' . $this->config['cnf_email'] . '>' . "\r\n";
                                mail($data['to'], $data['subject'], $message, $headers);
                            }
                            ++$count;
                        }
                    }
                    return redirect('core/users/blast')->with('message', 'Total ' . $count . ' Message has been sent')->with('status', 'success');
                }
                return redirect('core/users/blast')->with('message', 'No Message has been sent')->with('status', 'info');
            } else {
                return redirect('core/users/blast')->with('message', 'The following errors occurred')->with('status', 'error')->withErrors($validator)->withInput();
            }
        }
        function getCoordinator() {
            $this->data = array(
                'invitations' => \DB::table('invitations')->where('group_id', 4)->get(), 
                'roleTitle' => 'Travel Coordinator', 
                'slug' => 'coordinator',
                 'roleID' => '4',);
            return view('core.users.invite', $this->data);
        }
        function getHotelManager() {
            $this->data = array(
                'invitations' => \DB::table('invitations')->where('group_id', 3)->get(), 
                'roleTitle' => 'Hotel Manager', 
                'slug' => 'hotelmanager', 
                'roleID' => '4',);
            return view('core.users.invite', $this->data);
        }
        function getCorporate() {
            $this->data = array(
             'invitations' => \DB::table('invitations')->where('group_id', 6)->get(),
             'corporates' => User::where('group_id', 6)->get(),
             'hotels' => Hotel::where('active', 1)->get(), 
             'roleTitle' => 'Corporate',
             'slug' => 'corporate', 
             'roleID' => '4',);
            return view('core.users.invite', $this->data);
        }
        function postDoinvite(Request $request) {
            $rules = array('email' => 'required|email|unique:tb_users|unique:invitations',);
            $messages = ['unique' => 'Invitation already sent and/or this email is already registered.', ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->passes()) {
                $data['to'] = $request->input('email');
                $data['subject'] = "Invitation for Travel Coordinator";
                $data['cnf_appname'] = "Sports Travel HQ";
                $data['group_id'] = $request->input('group_id');
                //$this->data['sximoconfig']['cnf_appname'];
                if ($this->config['cnf_mail'] && $this->config['cnf_mail'] == 'swift') {
                    \Mail::send('corporate.user.inviteemail', $data, function ($message) use ($data) {
                        $message->to($data['to'])->subject($data['subject']);
                    });
                } else {
                    $message = view('corporate.user.inviteemail', $data);
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers.= 'From: ' . $this->config['cnf_appname'] . ' <' . $this->config['cnf_email'] . '>' . "\r\n";
                    mail($data['to'], $data['subject'], $message, $headers);
                }
                \DB::table('invitations')->insert(['email' => $request->input('email'), 'group_id' => $request->input('group_id') ]);
                return redirect('corporate.user' . $request->input('redirect_to'))->with('message', 'Message has been sent')->with('status', 'success');
            } else {
                return redirect('corporate.user' . $request->input('redirect_to'))->with('message', 'The following errors occurred')->with('status', 'error')->withErrors($validator)->withInput();
            }
        }
        public function getSearch($mode = 'native') {
            $this->data['tableForm'] = $this->info['config']['forms'];
            $this->data['tableGrid'] = $this->info['config']['grid'];
            $this->data['searchMode'] = 'native';
            $this->data['pageUrl'] = url('corporate/user');
            return view('sximo.module.utility.search', $this->data);
        }
    }
