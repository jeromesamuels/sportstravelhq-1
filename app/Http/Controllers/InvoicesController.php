<?php namespace App\Http\Controllers;
use App\Models\Invoices;
use App\Models\Hotel;
use App\Models\Rfp;
use App\Models\Usertrips;
use App\Models\AgreementForm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Mail;
use Vsmoraes\Pdf\Pdf;

class InvoicesController extends Controller {
    private $pdf;
    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'invoices';
    static $per_page = '10';
    public function __construct(Pdf $pdf) {
        $this->pdf = $pdf;
        parent::__construct();
        $this->model = new Invoices();
        $this->info = $this->model->makeInfo($this->module);
        $this->data = array('pageTitle' => $this->info['title'], 'pageNote' => $this->info['note'], 'pageModule' => 'invoices', 'order' => 'ASC', 'return' => self::returnUrl());
    }
    public function index(Request $request) {
        // Make Sure users Logged
        if (!\Auth::check()) return redirect('user/login')->with('status', 'error')->with('message', 'You are not login');
        $this->grab($request);
        if ($this->access['is_view'] == 0) {
            return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        }
        $currentMonth = date('m');
        $this->data['users'] = User::find(session('uid'));
        $this->data['hotel'] = User::find($this->data['users']->hotel_id);
        $this->data['hotel_type'] = Hotel::find($this->data['users']->hotel_id);
        $this->data['trips'] = Usertrips::whereRaw('MONTH(added) = ?', [$currentMonth])->get();
        $this->data['client'] = User::where('group_id', 4)->get();
      if ($this->data['users']->group_id == 6) {
            $this->data['purchases']= Invoices::whereRaw('MONTH(created_at) = ?', [$currentMonth])->where('invoices.hotel_type', '=', $this->data['hotel_type']->type)->sum('invoices.amt_paid');
            $this->data['purchases_due'] = Invoices::where('invoices.hotel_type', '=', $this->data['hotel']->type)->sum('invoices.est_amt_due');
            $this->data['purchases_all'] = Invoices::where('invoices.hotel_type', '=', $this->data['hotel']->type)->sum('invoices.amt_paid');
        }
        elseif ($this->data['users']->group_id == 5) {
          
            $this->data['purchases'] = Invoices::whereRaw('MONTH(created_at) = ?', [$currentMonth])->where('invoices.hotel_name', '=', $this->data['users']->hotel_id)->sum('invoices.amt_paid');
            $this->data['purchases_due'] = Invoices::where('invoices.hotel_name', '=', $this->data['users']->hotel_id)->sum('invoices.est_amt_due');
            $this->data['purchases_all'] = Invoices::where('invoices.hotel_name', '=', $this->data['users']->hotel_id)->sum('invoices.amt_paid');
        }
        else{
            $this->data['purchases'] = Invoices::whereRaw('MONTH(created_at) = ?', [$currentMonth])->sum('invoices.amt_paid');
            $this->data['purchases_due'] = Invoices::sum('invoices.est_amt_due');
            $this->data['purchases_all'] = Invoices::sum('invoices.amt_paid');
        }
        return view($this->module . '.index', $this->data);
    }
    function create(Request $request, $id = 0) {
        $this->hook($request);
        if ($this->access['is_add'] == 0) return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        $this->data['row'] = $this->model->getColumnTable($this->info['table']);
        $this->data['id'] = '';
        $code = rand(10000, 10000000);
        $hotel = Hotel::get()->toArray();
        $room_qty = DB::table('room_qty')->pluck('title');
        $this->data['invoice_id'] = $code;
        $this->data['hotel'] = $hotel;
        $this->data['room_qty'] = $room_qty;
        return view($this->module . '.form', $this->data);
    }
    function edit(Request $request, $id) {
        $this->hook($request, $id);
        if (!isset($this->data['row'])) return redirect($this->module)->with('message', 'Record Not Found !')->with('status', 'error');
        if ($this->access['is_edit'] == 0) return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
        $this->data['row'] = (array)$this->data['row'];
        $this->data['id'] = $id;
        $code = rand(10000, 10000000);
        $hotel = Hotel::get()->toArray();
        $room_qty = DB::table('room_qty')->pluck('title');
        $this->data['invoice_id'] = $code;
        $this->data['hotel'] = $hotel;
        $this->data['room_qty'] = $room_qty;
        return view($this->module . '.form', $this->data);
    }
    function show(Request $request, $id) {
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
                if (!isset($this->data['row'])) return redirect($this->module)->with('message', 'Record Not Found !')->with('status', 'error');
                if ($this->access['is_detail'] == 0) return redirect('dashboard')->with('message', __('core.note_restric'))->with('status', 'error');
                return view($this->module . '.view', $this->data);
                break;
            }
        }
        function store(Request $request) {
            $task = $request->input('action_task');
            //dd($request->all());
            switch ($task) {
                default:
                    $rules = $this->validateForm();
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->passes()) {
                        $data = $this->validatePost($request);
                         $id  = new Invoices();
                         $id->invoice_id= $request->input('invoice_id');
                         $id->check_in  = $request->input('check_in');
                         $id->check_out  = $request->input('check_out');
                         $id->rfp_id=$request->input('rfp_id');
                         $id->hotel_name=$request->input('hotel_name');
                         $id->hotel_add=$request->input('hotel_add');
                         $id->hotel_manager=$request->input('hotel_manager');
                         $id->email=$request->input('email');
                         $id->phone=$request->input('phone');
                         $id->total_room=$request->input('total_room');
                         $id->room_rate=$request->input('room_rate');
                         $id->actualized_room_count=$request->input('actualized_room_count');
                         $id->commissoin_rate=$request->input('commissoin_rate');
                         $id->payment_mode=$request->input('payment_mode');
                         $id->est_amt_due=$request->input('est_amt_due');
                         $id->amt_paid=$request->input('amt_paid');
                         $id->notes=$request->input('notes');
                         $id->save();
                        /* Insert logs */
                        $this->model->logs($request, $id);
                        if (!is_null($request->input('apply'))) return redirect($this->module . '/' . $request->input('invoice_id') . '/edit?' . $this->returnUrl())->with('message', __('core.note_success'))->with('status', 'success');
                        return redirect($this->module . '?' . $this->returnUrl())->with('message', __('core.note_success'))->with('status', 'success');
                    } else {
                        return redirect($this->module . '/' . $request->input('invoice_id') . '/edit')->with('message', __('core.note_error'))->with('status', 'error')->withErrors($validator)->withInput();
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
        public static function display() {
            $mode = isset($_GET['view']) ? 'view' : 'default';
            $model = new Invoices();
            $info = $model::makeInfo('invoices');
            $data = array('pageTitle' => $info['title'], 'pageNote' => $info['note']);
            if ($mode == 'view') {
                $id = $_GET['view'];
                $row = $model::getRow($id);
                if ($row) {
                    $data['row'] = $row;
                    $data['fields'] = \SiteHelpers::fieldLang($info['config']['grid']);
                    $data['id'] = $id;
                    view('invoices.public.view', $data);
                }
            } else {
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $params = array('page' => $page, 'limit' => (isset($_GET['rows']) ? filter_var($_GET['rows'], FILTER_VALIDATE_INT) : 10), 'sort' => $info['key'], 'order' => 'desc', 'params' => '', 'global' => 1);
                $result = $model::getRows($params);
                $data['tableGrid'] = $info['config']['grid'];
                $data['rowData'] = $result['rows'];
                $page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
                $pagination = new Paginator($result['rows'], $result['total'], $params['limit']);
                $pagination->setPath('');
                $data['i'] = ($page * $params['limit']) - $params['limit'];
                $data['pagination'] = $pagination;
                return view('invoices.public.index', $data);
            }
        }
        function store_public($request) {
            $rules = $this->validateForm();
            $validator = Validator::make($request->all(), $rules);
            if ($validator->passes()) {
                $data = $this->validatePost($request);
                $this->model->insertRow($data, $request->input('id'));
                return Redirect::back()->with('message', __('core.note_success'))->with('status', 'success');
            } else {
                return Redirect::back()->with('message', __('core.note_error'))->with('status', 'error')->withErrors($validator)->withInput();
            }
        }

        function getHotels() {
            $hotel_id = $_REQUEST['id'];
            $hotel = Hotel::find($hotel_id);
            $users = User::where('hotel_id', $hotel_id)->first();
            $hotel_info = ['address' => $hotel->address, 'phone' => $users->phone_number, 'name' => $users->first_name . ' ' . $users->last_name, 'email' => $users->email];
            return json_encode($hotel_info);
        }
         function zipHotel() {
            $zipcode = $_REQUEST['from_zip'];
            $hotel = Hotel::where('zip',$zipcode)->get();
            return json_encode($hotel);
        }

        function sendInvoice(Request $request) {
            $invoice_id = $request->input('invoice_id');
            $email = $request->input('email');
            $rfps = Invoices::where('invoice_id', $invoice_id)->get();
            foreach ($rfps as $rfp) {
                $hotel = Hotel::find($rfp->hotel_name);
                $hname = $hotel->name;
            }
            $users = User::where('id', 1)->first();
            /*send an invoice*/
            $to = [$email, $users->email];
            \Mail::send('user.emails.invoicenewMail', compact('rfp', 'hname'), function ($message) use ($rfp, $to) {
                $message->to($to)->subject('Uploaded Invoice');
            });
            return Redirect::back();
        }
        function multipleInvoice(Request $request) {
            $invoice_id = $request->input('invoice_id');
            $email = $request->input('email');
            $myaar = explode(',', $invoice_id);
            $datae = array();
            $hotel = array();
            foreach ($myaar as $key => $value) {
                $rfps = Invoices::where('id', $value)->get();
                foreach ($rfps as $values) {
                    $hotel_id = $values->hotel_name;
                    $hotels = Hotel::find($hotel_id);
                }
                $datae[] = $rfps;
                $hotel[] = $hotels;
            }
            $users = User::where('id', 1)->first();
            /*send an invoice*/
            $html = view('user.emails.loadPdf', compact('datae', 'hotel'))->render();
            $pdf = $this->pdf->load($html)->output();
            $usernm = $users->first_name . ' ' . $users->last_name;
            $data = array('name' => $usernm, 'email' => $email,);
            $to = [$email, $users->email];
            \Mail::send('user.emails.invoicepdfMail', compact('data'), function ($message) use ($data, $pdf, $to) {
                $message->to($to)->subject('[SporttravelHQ] Invoices');
                $message->attachData($pdf, "invoice.pdf");
            });
            return Redirect::back();
        }

       public function downloadReceipt($id)
        {
            $rfp = Invoices::where('rfp_id', $id)->first();
            $trip = Usertrips::find($rfp->user_trip_id);
           // return view('user.receipt', compact('rfp'));
            $html = view('user.receipt', compact('rfp'))->render();
            $file_name="Receipt.pdf";*/
            //$pdf = $this->pdf->load($html)->save('/uploads/users/Receipt.pdf');
            $file=$this->pdf->load($html, 'A3')->filename(public_path() . '/uploads/users/' . $file_name)->output();
            $response = - 1;
            $response = response()->download($file);
            if ($response !== - 1) {
                return $response;
            }

              //return redirect()->back()->with('success', 'File uploaded successfully.');

              // return $file;
            /*  return response()->json([
            'success'   => true,
            'view_data' => (string)view('user.receipt', compact('rfp')),
        ]);*/
        }
    }
    