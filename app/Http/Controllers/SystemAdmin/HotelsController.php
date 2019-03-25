<?php
namespace App\Http\Controllers\SystemAdmin;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\hotelamenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class HotelsController extends Controller
{
public function __construct(){
if(Session::has('level')){
if(Session::get('level') != 1)
return redirect()->back();
}
else
return redirect()->back();
}
public function viewHotels(Request $request){
$q = (new Hotel)->newQuery();
$searchField = "";
if($request->searchField){
$q->where('name',"LIKE",$request->searchField."%");
$searchField = $request->searchField;
}
$hotels = $q->get();
return view('systemadmin.viewHotels',compact('hotels','searchField'));
}
public function createHotels() {
$amenities = hotelamenities::all();
return view('systemadmin.createHotels',compact('amenities'));
}
public function storeHotels(Request $request){
$this->validate($request, [
"name" => "required|max:191",
"zip" => "required",
"address" => "required|max:191",
"city" => "required|max:191",
"type" => "required|max:191",
"logo" => "required|max:555",
"property" => "required|max:555",
"rating" => "required|min:1|max:4",
"active" => "required",
]);
/*For hotel type logo*/
$file = $request->file('logo')->getClientOriginalName();
$destinationPath = './uploads/users/';
$uploadSuccess = $request->file('logo')->move($destinationPath, $file);  
/*For hotel type property*/
$filep = $request->file('property')->getClientOriginalName();
$destinationPathp = './uploads/users/';
$uploadSuccessp= $request->file('property')->move($destinationPathp, $filep); 
$hotel = new Hotel();
$hotel->name = $request->name;
$hotel->zip = $request->zip;
$hotel->address = $request->address;
$hotel->city = $request->city;
$hotel->type = $request->type;
$hotel->logo = $file;
$hotel->property = $filep;
$hotel->rating = $request->rating;
$hotel->active = $request->active == "true" ? true : false;
$hotel->save();
$hotel->amenities()->sync($request->amenities);
Session::flash("success","New Hotel Added Successfully");
return redirect()->action('SystemAdmin\HotelsController@viewHotels');
}

public function deleteHotels($id){
Hotel::find($id)->delete();
Session::flash("success","Record Deleted");
return redirect()->back();
}
public function editHotels($id){
$hotel = Hotel::find($id);
$amenities = hotelamenities::all();
return view('systemadmin.editHotels',compact('hotel','amenities'));
}
public function hotelProfile($id){
$hotel = Hotel::find($id);
$amenities = hotelamenities::all();
return view('systemadmin.hotelProfile ',compact('hotel','amenities'));
}

public function updateHotels(Request $request, $id){
$this->validate($request, [
"name" => "required|max:191",
"zip" => "required",
"address" => "required|max:191",
"city" => "required|max:191",
"type" => "required|max:191",
"logo" => "required|max:555",
"property" => "required|max:555",
"rating" => "required|min:1|max:4",
"active" => "required",
]);
/*For hotel type logo*/
$file = $request->file('logo')->getClientOriginalName();
$destinationPath = './uploads/users/';
$uploadSuccess = $request->file('logo')->move($destinationPath, $file);  
/*For hotel type property*/
$filep = $request->file('property')->getClientOriginalName();
$destinationPathp = './uploads/users/';
$uploadSuccessp= $request->file('property')->move($destinationPathp, $filep); 
$hotel = Hotel::find($id);
$hotel->name = $request->name;
$hotel->zip = $request->zip;
$hotel->address = $request->address;
$hotel->city = $request->city;
$hotel->type = $request->type;
$hotel->logo = $file;
$hotel->property = $filep;
$hotel->rating = $request->rating;
$hotel->active = $request->active == "true" ? true : false;
$hotel->save();
$hotel->amenities()->sync($request->amenities);
Session::flash("success","Hotel Updated Successfully");
return redirect()->back();
}
}