<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function create(){
    	return view('systemadmin.invoices.create');
    }

    public function store(Request $request){
    	$invoice = new Invoice();
    	$invoice->trip_status = $request->trip_status;
    	$invoice->check_in = $request->check_in;
    	$invoice->check_out = $request->check_out;
    	$invoice->trip_request_num = $request->trip_request_num;
    	$invoice->hotel_name = $request->hotel_name;
    	$invoice->hotel_addr = $request->hotel_addr;
    	$invoice->amount = $request->amount;
    	$invoice->hotel_manager = $request->hotel_manager;
    	$invoice->email = $request->email;
    	$invoice->phone = $request->phone;
    	$invoice->total_rooms = $request->total_rooms;
    	$invoice->room_rate = $request->room_rate;
    	$invoice->actual_rooms = $request->actual_rooms;
    	$invoice->commision_rate = $request->commision_rate;
    	$invoice->payment_status = $request->payment_status;
    	$invoice->due_date = $request->due_date;
    	$invoice->estimated_amount_due = $request->estimated_amount_due;
    	$invoice->amount_paid = $request->amount_paid;
    	$invoice->payment_mode = $request->payment_mode;
    	$invoice->check_number = $request->check_number;
    	$invoice->notes = $request->notes;

    	$invoice->save();
    	Session::flash('success','Invoice Created Successfully');
    	return redirect()->back();
    }
}
