<?php 
namespace App\Http\Controllers;
use App\Libary\SiteHelpers;
use Redirect;
use Socialize;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\UserTrip;
use App\Models\HotelAmenities;
use App\Models\Rfp;
use App\Models\Invoices;
use App\Models\Invitation;
use App\User;
use App\Models\Hotel;
use Carbon\Carbon;
use Twilio\Rest\Client;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $layout = "layouts.main";

    public function __construct()
    {
        parent::__construct();
        $this->data = array();
    }

    public function getRegister()
    {
        if (config('sximo.cnf_regist') == 'false') :
            if (\Auth::check()):
                return redirect('')->with(['message' => 'Youre already login', 'status' => 'error']);
            else:
                return redirect('user/login');
            endif;
        else:
            $this->data['socialize'] = config('services');
            $this->data['hotel_type'] = Hotel::groupBy('type')->get();
            return view('user.register', $this->data);
        endif;
    }
    public function getRegisterTC() {
        $this->data['tc_email'] = Input::get('tc_email');
        $this->data['group_id'] = Input::get('group_id');
        if (config('sximo.cnf_regist') == 'false'):
            if (\Auth::check()) :
                return redirect('')->with(['message' => 'Youre already login', 'status' => 'error']);
            else:
                return redirect('user/login');
            endif;

        else :
            $this->data['socialize'] = config('services');
            return view('user.register_tc', $this->data);
        endif;
    }

    public function postCreate(Request $request)
    {
        $rules = array(
            'username'              => 'required|unique:tb_users',
            'firstname'             => 'required|alpha_num|min:2',
            'lastname'              => 'required|alpha_num|min:2',
            'email'                 => 'required|email|unique:tb_users',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',

        );
        if (config('sximo.cnf_recaptcha') == 'true') {
            $return = $this->reCaptcha($request->all());
            if ($return !== false) {
                if ($return['success'] != 'true') {
                    return response()->json(['status' => $return['success'], 'message' => 'Invalid reCpatcha']);
                }
            }
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $code = rand(10000, 10000000);
            $authen = new User;
            $authen->username = $request->input('username');
            $authen->first_name = $request->input('firstname');
            $authen->last_name = $request->input('lastname');
            $authen->email = trim($request->input('email'));
            if ($request->input('address') != '' && $request->input('state') != '' && $request->input('city') != '' && $request->input('zip') != '') {
                $authen->address = $request->input('address');
                $authen->state   = $request->input('state');
                $authen->city    = $request->input('city');
                $authen->zip     = $request->input('zip');
            }
            /*new fields */
            $user_type = $request->input('user_type');
            if ($request->input('hotel_type') != '' && $request->input('hotel_code') != '' && $request->input('service_type') != '') {
                $authen->hotel_type = $request->input('hotel_type');
                $authen->hotel_code = $request->input('hotel_code');
                $authen->hotel_address = $request->input('hotel_address');
                $authen->service_type = $request->input('service_type');
            }
            if ($request->input('o_name') != '') {
                $authen->o_name = $request->input('o_name');
            }
            if ($user_type == 1) {
                 $hotel  = new Hotel();
                 $hotel->hotel_code= $request->input('hotel_code');
                 $hotel->type  = $request->input('hotel_type');
                 $hotel->service_type  = $request->input('service_type');
                 $hotel->save();
            }
            if ($user_type == 1) {
                $authen->group_id = 5;
            } elseif ($user_type == 2) {
                $authen->group_id = 4;
            } else {
                $authen->group_id = $this->config['cnf_group'];
            }
            $hotel_id = Hotel::where("hotel_code", $request->input('hotel_code'))->pluck('id');
            foreach ($hotel_id as $hotel_id_new) {
                $authen->hotel_id = $hotel_id_new;
            }
            if ($request->input('group_id') != '') {
                $authen->group_id = $request->input('group_id');
            }
            $authen->phone_number = ($request->input('phone') != '') ? $request->input('phone') : '';
            $authen->activation = $code;
            $email = $authen->email;
            $domain_name = substr(strrchr($email, "@"), 1);
            $authen->password = \Hash::make($request->input('password'));
            if ($this->config['cnf_activation'] == 'auto') {
                $authen->active = '1';
            } else {
                $authen->active = '0';
            }
            $new_code = URL::to('user/activation?code=' . $code);
            // Your Account SID and Auth Token from twilio.com/console
            $account_sid = 'AC4174865c2b5f392f5ffe63f9cd5123fb';
            $auth_token  = '424cddd97c717bd28f77b212168b6ad2';
            // In production, these should be environment variables. E.g.:
            // $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
            // A Twilio number you own with SMS capabilities
            $twilio_number = "+13055703074";
            $client        = new Client($account_sid, $auth_token);
            $client->messages->create(
                // Where to send a text message (your cell phone?)
                $request->input('phone'),
                array(
                    'from' => $twilio_number,
                    'body' => 'Thank You for registering with SportsTravel HQ! Please check your inbox and click on the activation link below ' . $new_code,
                )
            );
            $authen->save();
            $data = array(
                'firstname' => $request->input('firstname'),
                'lastname'  => $request->input('lastname'),
                'email'     => $request->input('email'),
                'password'  => $request->input('password'),
                'code'      => $code,
                'subject'   => "[ " . $this->config['cnf_appname'] . " ] REGISTRATION ",
            );
            if (config('sximo.cnf_activation') == 'confirmation') {
                $to      = $request->input('email');
                $subject = "[ " . $this->config['cnf_appname'] . " ] REGISTRATION ";
                if ($this->config['cnf_mail'] == 'swift') {
                    \Mail::send('user.emails.registration', $data, function ($message) use ($data) {
                        $message->to($data['email'])->subject($data['subject']);
                    });
                } else {
                    $message = view('user.emails.registration', $data);
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: ' . $this->config['cnf_appname'] . ' <' . $this->config['cnf_email'] . '>' . "\r\n";
                    mail($to, $subject, $message, $headers);
                }
                $message = "Thank You for registering with SportsTravel HQ! Please check your inbox and click on the activation link below ";
            } elseif ($this->config['cnf_activation'] == 'manual') {
                $message = "Thank You for registering with SportsTravel HQ!. We will validate you account before your account active";
            } else {
                $message = "Thank You for registering with SportsTravel HQ!. Your account is active now ";
            }
            return redirect('user/login')->with(['message' => $message, 'status' => 'success']);
        } else {
            return redirect('user/register')->with(['message' => 'The following errors occurred', 'status' => 'success'])->withErrors($validator)->withInput();
        }
    }
    public function getCode(Request $request) {
        $num = $request->input('code_send');
        if ($num != '') {
            User::where('id', session('uid'))->update('activation', $num);
            return redirect('dashboard')->with(['message' => 'Verified you code!', 'status' => 'success']);
            return view('user.code_activation', compact('num'));
        } else {
            return redirect('user/login')->with(['message' => 'Please verify code again!', 'status' => 'error']);
        }
    }

    public function userTrips()
    {
        $trips     = UserTrip::orderBy('added', 'desc')->where('status', 6)->get();
        $rfps      = Rfp::where('user_id', null)->get();
        $amenities = HotelAmenities::all();

        return view('hotelmanager.viewtrips', compact('trips', 'amenities', 'rfps'));
    }

    public function guestLogin(Request $request)
    {
        return view('user.guest_login');
    }

    public function guestLoginStore(Request $request)
    {
        $rules     = array(
            'email' => 'required|email|unique:tb_users',
        );
        $validator = Validator::make($request->all(), $rules);
        $authen    = new User;
        if ($validator->passes()) {
            $authen->email    = trim($request->input('email'));
            $authen->group_id = $request->input('group_id');
        }
        $authen->save();
        $email = $request->input('email');
        return redirect('user/trips')->with(['email' => $email]);
        
    }


    public function TripDetails($id, $email)
    {
        $trip = UserTrip::find($id);
        $rfp        = Rfp::where('sales_manager', $email)->get();
        $trip_id_detail= Rfp::where("user_trip_id",$id)->get(); 
        $amenities  = HotelAmenities::all();
        $guest_user = Invitation::where('email', '=', $email)->get();
        $rfps_new = Rfp::where('status', 2)->get();
        $invoice= Invoices::find($trip->id);
        if (count($guest_user) == 1) {
            return view('hotelmanager.tripSingleguest', compact('trip', 'rfp', 'email', 'rfps_new','trip_id_detail','invoice'));
        } else {
            return redirect('user/login');
        }
    }

    public function saveguestBid(Request $request)
    {
        $this->validate($request, [
            'trip_id'           => 'required|numeric|min:0',
            'offer_rate'        => 'required|numeric|min:0',
            'eventDistance'     => 'required|max:500',
            'offerValidityDate' => 'required|date|after:today',
        ]);
        $trip = UserTrip::find($request->trip_id);
        //geting Trip Amenities
        $amenitie_ids = [];
        foreach ($trip->amenities as $amenity) {
            $amenitie_ids[count($amenitie_ids)] = $amenity->id;
        }
        // Saving Rfp
        $rfp                    = new Rfp();
        $rfp->user_trip_id      = $trip->id;
        $rfp->user_id           = 0;
        $rfp->added             = Carbon::now();
        $rfp->status            = 1; //Bid not yet send/pending
        $rfp->destination       = $trip->from_city;
        $rfp->hotel_information = 0;
        $rfp->distance_event    = $request->eventDistance;
        $rfp->offer_rate        = $request->offer_rate;
        $rfp->cc_authorization  = 1;
        $rfp->offer_validity    = $request->offerValidityDate;
        $rfp->check_in        = date("Y-m-d", strtotime($trip->check_in));
        $rfp->check_out       = date("Y-m-d", strtotime($trip->check_out));
        $rfp->sales_manager   = $request->email;
        $rfp->king_beedrooms  = $trip->double_king_qty;
        $rfp->queen_beedrooms = $trip->double_queen_qty;
        $rfp->amenitie_ids    = json_encode($amenitie_ids);
        $rfp->hotels_message  = $request->message;
        $rfp->save();
        Session::flash('success', 'Bid has been Sent successfully');

        return redirect()->back();
    }

    public function getActivation(Request $request)
    {
        $num = $request->input('code');
        $user = User::where('activation', '=', $num)->get();
        if (count($user) >= 1) {
            User::where('activation', $num)->update(array('active' => 1, 'activation' => ''));
            return redirect('user/login')->with(['message' => 'Your account is active now!', 'status' => 'success']);
        } else {
            return redirect('user/login')->with(['message' => 'Invalid Code Activation!', 'status' => 'error']);
        }
    }

    public function getLogin()
    {
        if (\Auth::check()) {
            return redirect('')->with(['message' => 'success', 'Youre already login', 'status' => 'success']);
        } else {
            $this->data['socialize'] = config('services');

            return View('user.login', $this->data);
        }
    }

    public function reCaptcha($request)
    {
        if (!is_null($request['g-recaptcha-response'])) {
            $api_url  = 'https://www.google.com/recaptcha/api/siteverify?secret=' . config('sximo.cnf_recaptchaprivatekey') . '&response=' . $request['g-recaptcha-response'];
            $response = @file_get_contents($api_url);
            $data     = json_decode($response, true);
            return $data;
        } else {
            return false;
        }
    }

    public function getLoginCodePage()
    {
        $user_id       = session('user_id');
        $user_email    = session('user_email');
        $user_password = session('user_password');

        return view('user.code_activation', compact('user_id', 'user_email', 'user_password'));
    }

    public function postSignin(Request $request)
    {
        $rules = array(
            'email'    => 'required',
            'password' => 'required',
        );
        if ($request->has("send_code") && $request->send_code == 1) {
            $user_data = User::find($request->user_id);
            if ($user_data->activation != $request->code) {
                return redirect()->back()->with(['message' => 'Invalid Code Activation!', 'status' => 'error']);
            }
        }
        if (config('sximo.cnf_recaptcha') == 'true') {
            $return = $this->reCaptcha($request->all());
            if ($return !== false) {
                if ($return['success'] != 'true') {
                    return response()->json(['status' => $return['success'], 'message' => 'Invalid reCpatcha']);
                }
            }
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $remember = (!is_null($request->get('remember')) ? 'true' : 'false');
            if (\Auth::attempt(array('email' => $request->input('email'), 'password' => $request->input('password')), $remember)
                or
                \Auth::attempt(array('username' => $request->input('email'), 'password' => $request->input('password')), $remember)
            ) {
                if (\Auth::check()) {
                    $row = User::find(\Auth::user()->id);
                    if ($row->active == 'Inactive') {
                        // inactive
                        if ($request->ajax() == true) {
                            return response()->json(['status' => 'error', 'message' => 'Your Account is not active']);
                        } else {
                            \Auth::logout();

                            return redirect('user/login')->with(['status' => 'error', 'message' => 'Your Account is not active']);
                        }
                    } else if ($row->active == 'Banned') {
                        if ($request->ajax() == true) {
                            return response()->json(['status' => 'error', 'message' => 'Your Account is BLocked']);
                        } else {
                            // BLocked users
                            \Auth::logout();

                            return redirect('user/login')->with(['status' => 'error', 'message' => 'Your Account is BLocked']);
                        }
                    } else {
                        User::where('id', '=', $row->id)->update(array('last_login' => date("Y-m-d H:i:s")));
                        $level = 99;
                        $sql   = \DB::table('tb_groups')->where('group_id', $row->group_id)->get();
                        if (count($sql)) {
                            $l     = $sql[0];
                            $level = $l->level;
                        }
                        $session = array(
                            'gid'      => $row->group_id,
                            'hid'      => $row->hotel_id,
                            'uid'      => $row->id,
                            'eid'      => $row->email,
                            'phn'      => $row->phone_number,
                            'll'       => $row->last_login,
                            'fid'      => $row->first_name . ' ' . $row->last_name,
                            'username' => $row->username,
                            'join'     => $row->created_at,
                            'level'    => $level,
                        );
                        /* Set Lang if available */
                        if (!is_null($request->input('language'))) {
                            $session['lang'] = $request->input('language');
                        } else {
                            $session['lang'] = config('sximo.cnf_lang');
                        }
                        session($session);
                        if ($request->ajax() == true) {
                         
                        } else {
                            if ($session['level'] == 2 || $session['level'] == 1 || $session['level'] == 4 || $session['level'] == 5 || $session['level'] == 6) {
                                if (!$request->has("send_code") && $row->vcode == 0) {
                                    $code          = rand(10000, 10000000);
                                    $user_id       = $row->id;
                                    $phone         = User::where('id', '=', $row->id)->pluck('phone_number');
                                    $account_sid   = 'AC4174865c2b5f392f5ffe63f9cd5123fb';
                                    $auth_token    = '424cddd97c717bd28f77b212168b6ad2';
                                    $twilio_number = "+13055703074";
                                    $client        = new Client($account_sid, $auth_token);
                                    $client->messages->create(

                                        $phone,
                                        array(
                                            'from' => $twilio_number,
                                            'body' => 'Your SportsTravelHQ verification code is ' . $code,
                                        )
                                    );

                                    User::where('id', '=', $row->id)->update(array('activation' => $code));


                                    $login_code_session['user_id'] = $user_id;

                                    \Auth::logout();
                                    $login_code_session['user_email']    = $request->email;
                                    $login_code_session['user_password'] = $request->password;
                                    session($login_code_session);

                                    return redirect()->route('login_code');
                                }

                                $vcode = $request->input('vcode');
                                if ($vcode == 1) {
                                    User::where('id', '=', $row->id)->update(array('vcode' => 1));

                                }

                                if ($session['level'] == 5) {
                                    return redirect(route('hotelmanger.home'));
                                } elseif ($session['level'] == 4) {
                                    return redirect('client');
                                } elseif ($session['level'] == 6) {
                                    return redirect('corporate/user');
                                } else {

                                    return redirect('dashboard');
                                }

                            }
                        }


                        if ($session['level'] == 4) {
                            return redirect('client');
                        } elseif ($row->vcode == 1 && session('level') == 5) {
                            return redirect(route('hotelmanger.home'));
                        } elseif ($row->vcode == 1 && session('level') == 6) {
                            return redirect('corporate/user');
                        } elseif ($row->vcode == 1 && session('level') == 1 || session('level') == 2) {
                            return redirect('dashboard');
                        } else {
                        }


                    }
                }
            } else {

                if ($request->ajax() == true) {
                    return response()->json(['status' => 'error', 'message' => 'Your username/password combination was incorrect']);
                } else {
                    return redirect('user/login')
                        ->with(['status' => 'error', 'message' => 'Your username/password combination was incorrect'])
                        ->withInput();
                }
            }
        } else {
            if ($request->ajax() == true) {
                return response()->json(['status' => 'error', 'message' => 'The following  errors occurred']);
            } else {
                return redirect('user/login')
                    ->with(['status' => 'error', 'message' => 'The following  errors occurred'])
                    ->withErrors($validator)->withInput();
            }
        }
    }

    public function getProfile()
    {
        if (!\Auth::check()) {
            return redirect('user/login');
        }
        $info       = User::find(\Auth::user()->id);
        $this->data = array(
            'pageTitle' => 'My Profile',
            'pageNote'  => 'View Detail My Info',
            'info'      => $info,
        );

        return view('user.profile', $this->data);
    }

    public function postSaveprofile(Request $request)
    {
        if (!\Auth::check()) {
            return redirect('user/login');
        }
        $rules = array(
            'first_name' => 'required|alpha_num|min:2',
            'last_name'  => 'required|alpha_num|min:2',
        );
        if ($request->input('email') != \Session::get('eid')) {
            $rules['email'] = 'required|email|unique:tb_users';
        }
        if (!is_null($request->file('avatar'))) {
            $rules['avatar'] = 'mimes:jpg,jpeg,png,gif,bmp';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            if (!is_null($request->file('avatar'))) {
                $file            = $request->file('avatar');
                $destinationPath = './uploads/users/';
                $filename        = $file->getClientOriginalName();
                $extension       = $file->getClientOriginalExtension(); //if you need extension of the file
                $newfilename     = \Session::get('uid') . '.' . $extension;
                $uploadSuccess   = $request->file('avatar')->move($destinationPath, $newfilename);
                if ($uploadSuccess) {
                    $data['avatar'] = $newfilename;
                }
                $orgFile = $destinationPath . '/' . $newfilename;
                \SiteHelpers::cropImage('80', '80', $orgFile, $extension, $orgFile);
            }
            $user             = User::find(\Session::get('uid'));
            $user->first_name = $request->input('first_name');
            $user->last_name  = $request->input('last_name');
            $user->email      = $request->input('email');
            if (isset($data['avatar'])) {
                $user->avatar = $newfilename;
            }
            $user->save();
            $newUser = User::find(\Session::get('uid'));
            \Session::put('fid', $newUser->first_name . ' ' . $newUser->last_name);

            return redirect('user/profile')->with('message', 'Profile has been saved!')->with('status', 'success');
        } else {
            return redirect('user/profile')->with('message', 'The following errors occurred')->with('status', 'error')
                                           ->withErrors($validator)->withInput();
        }
    }

    public function postSavepassword(Request $request)
    {
        $rules     = array(
            'password'              => 'required',
            'password_confirmation' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $user           = User::find(\Session::get('uid'));
            $user->password = \Hash::make($request->input('password'));
            $user->save();

            return redirect('user/profile')->with(['status' => 'success', 'message' => 'Password has been saved!']);
        } else {
            return redirect('user/profile')->with(['status' => 'error', 'message' => 'The following errors occurred'])
                                           ->withErrors($validator)->withInput();
        }
    }

    public function postSavehotel(Request $request)
    {
        if ($request->has('assign_hotel')) {
            User::where('id', $request->user_id)->update(['hotel_id' => $request->hotel_id]);

            return redirect('core/users/corporate')->with(['status' => 'success', 'message' => 'Hotel assigned to corporate!']);
        }
    }

    public function getReminder()
    {
        return view('user.remind');
    }

    public function postRequest(Request $request)
    {
        $rules     = array(
            'credit_email' => 'required|email',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $user = User::where('email', '=', $request->input('credit_email'));
            if ($user->count() >= 1) {
                $user            = $user->get();
                $user            = $user[0];
                $data            = array('token' => $request->input('_token'));
                $to              = $request->input('credit_email');
                $subject         = "[ " . config('sximo.cnf_appname') . " ] REQUEST PASSWORD RESET ";
                $data['subject'] = $subject;
                $data['email']   = $to;
                if (config('sximo.cnf_mail') == 'swift') {
                    \Mail::send('user.emails.auth.reminder', $data, function ($message) use ($data) {
                        $message->to($data['email'])->subject($data['subject']);
                    });
                } else {
                    $message = view('user.emails.auth.reminder', $data);
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: ' . config('sximo.cnf_appname') . ' <' . config('sximo.cnf_email') . '>' . "\r\n";
                    mail($to, $subject, $message, $headers);
                }
                $affectedRows = User::where('email', '=', $user->email)
                                    ->update(array('reminder' => $request->input('_token')));
                return redirect('user/login')->with(['message' => 'Please check your email', 'status' => 'success']);
            } else {
                return redirect('user/login?reset')->with(['message' => 'Cant find email address', 'status' => 'error']);
            }
        } else {
            return redirect('user/login?reset')->with(['message' => 'The following errors occurred', 'status' => 'error'])->withErrors($validator)->withInput();
        }
    }

    public function getReset($token = '')
    {
        if (\Auth::check()) {
            return redirect('dashboard');
        }
        $user = User::where('reminder', '=', $token);;
        if ($user->count() >= 1) {
            $this->data['verCode'] = $token;
            return view('user.remind', $this->data);
        } else {
            return redirect('user/login')->with(['message' => 'Cant find your reset code', 'status' => 'error']);
        }
    }

    public function postDoreset(Request $request, $token = '')
    {
        $rules     = array(
            'password'              => 'required|alpha_num|confirmed',
            'password_confirmation' => 'required|alpha_num',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $user = User::where('reminder', '=', $token);
            if ($user->count() >= 1) {
                $data           = $user->get();
                $user           = User::find($data[0]->id);
                $user->reminder = '';
                $user->password = \Hash::make($request->input('password'));
                $user->save();
            }
            return redirect('user/login')->with(['message' => 'Password has been saved!', 'status' => 'success']);
        } else {
            return redirect('user/reset/' . $token)->with(['message' => 'The following errors occurred', 'status' => 'error'])->withErrors($validator)->withInput();
        }
    }

    public function getLogout()
    {
        \Auth::logout();
        \Session::flush();

        return redirect('')->with(['message' => 'Your are now logged out!', 'status' => 'success']);
    }

    function socialize($social)
    {
        return Socialize::driver($social)->redirect();
    }

    function autosocialize($social)
    {
        $user  = Socialize::driver($social)->user();
        $users = User::where('email', $user->email)->get();
        if (count($users)) {
            $row = $users[0];

            return self::autoSignin($row->id);
        } else {
            return redirect('user/login')
                ->with(['message' => 'You have not registered yet ', 'status' => 'error']);
        }
    }

    function autoSignin($id)
    {
        if (is_null($id)) {
            return redirect('user/login')
                ->with(['message' => 'You have not registered yet ', 'status' => 'error']);
        } else {
            \Auth::loginUsingId($id);
            if (\Auth::check()) {
                $row = User::find(\Auth::user()->id);
                if ($row->active == '0') {
// inactive 
                    \Auth::logout();

                    return redirect('user/login')->with(['message' => 'Your Account is not active', 'status' => 'error']);
                } else if ($row->active == '2') {
// BLocked users
                    \Auth::logout();

                    return redirect('user/login')->with(['message' => 'Your Account is BLocked', 'status' => 'error']);
                } else {
                    $session = array(
                        'gid'      => $row->group_id,
                        'hid'      => $row->hotel_id,
                        'uid'      => $row->id,
                        'eid'      => $row->email,
                        'll'       => $row->last_login,
                        'fid'      => $row->first_name . ' ' . $row->last_name,
                        'username' => $row->username,
                        'join'     => $row->created_at,
                    );
                    if ($this->config['cnf_front'] == 'false') :
                        return redirect('dashboard');
                    else :
                        return redirect('');
                    endif;
                }
            }
        }
    }
}
