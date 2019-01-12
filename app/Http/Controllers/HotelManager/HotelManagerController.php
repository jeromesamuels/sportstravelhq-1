<?php

namespace App\Http\Controllers\HotelManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HotelManagerController extends Controller
{
	public function __construct(){
		if(Session::has('level')){
			if(Session::get('level') != 5)
				return redirect()->back();
		}
		else
			return redirect()->back();
	}

    public function index(){
    	return view('hotelmanager.index');
    }
}
