<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Default Controller
Route::get('/', 'HomeController@index');
Route::post('/home/submit', 'HomeController@submit');
Route::get('/home/skin/{any?}', 'HomeController@getSkin');

Route::get('dashboard/import', 'DashboardController@getImport');
/* Auth & Profile */
Route::get('user/profile','UserController@getProfile');
Route::get('user/login','UserController@getLogin');
Route::get('user/register','UserController@getRegister');

//Route::get('user/register_tc/{tc_email}','UserController@getRegisterTC');
Route::get('user/register_tc', ['as' => 'register_tc', 'uses' => 'UserController@getRegisterTC']);

Route::get('user/logout','UserController@getLogout');
Route::get('user/reminder','UserController@getReminder');
Route::get('user/reset/{any?}','UserController@getReset');
Route::get('user/reminder','UserController@getReminder');
Route::get('user/activation','UserController@getActivation');
// Social Login
Route::get('user/socialize/{any?}','UserController@socialize');
Route::get('user/autosocialize/{any?}','UserController@autosocialize');
//
Route::post('user/signin','UserController@postSignin');
Route::post('user/create','UserController@postCreate');
Route::post('user/saveprofile','UserController@postSaveprofile');
Route::post('user/savepassword','UserController@postSavepassword');
Route::post('user/doreset/{any?}','UserController@postDoreset');
Route::post('user/request','UserController@postRequest');

Route::post('user/corporate_hotel','UserController@postSavehotel');


/* Posts & Blogs */
Route::get('posts','HomeController@posts');
Route::get('posts/{any}','HomeController@posts');
Route::post('posts/comment','HomeController@comment');
Route::get('posts/remove/{id?}/{id2?}/{id3?}','HomeController@remove');
// Start Routes for Notification 
Route::resource('notification','NotificationController');
Route::get('home/load','HomeController@getLoad');
Route::get('home/lang/{any}','HomeController@getLang');

Route::get('/set_theme/{any}', 'HomeController@set_theme');

Route::post('RFPs/{user_trip_id}', 'UsertripsController@getRFPs');
Route::post('RFP/{rfp_id}', 'UsertripsController@getRFP');
Route::post('compareRFP', 'UsertripsController@compareRFP');

Route::post('acceptRFP/{rfp_id}', 'UsertripsController@acceptRFP');
Route::post('declineRFP/{rfp_id}', 'UsertripsController@declineRFP');


include('pages.php');


Route::resource('sximoapi','SximoapiController');

// Routes for  all generated Module
include('module.php');
// Custom routes  
$path = base_path().'/routes/custom/';
$lang = scandir($path);
foreach($lang as $value) {
	if($value === '.' || $value === '..') {continue;} 
	include( 'custom/'. $value );
}

// End custom routes
Route::group(['middleware' => 'auth'], function () {
	Route::resource('dashboard','DashboardController');
});

Route::group(['namespace' => 'Sximo','middleware' => 'auth'], function () {
	// This is root for superadmin
	include('sximo.php');		
});

Route::group(['namespace' => 'Core','middleware' => 'auth'], function () {
	include('core.php');
});

Route::group(['namespace' => 'HotelManager','middleware' => 'auth','prefix'=>"hotelmanager"], function () {
	Route::get('/','HotelManagerController@index')->name('hotelmanger.home');
	Route::get('/trips','TripsController@index')->name('hotelmanager.trips.index');
	Route::get('/trips/{id}','TripsController@show')->name('hotelmanager.trips.show');
	Route::post('filter-amenities', 'TripsController@filterByAmenities')->name('filter-amenities');
	Route::post('/submitBid','HotelManagerController@saveBid')->name('hotelmanager.saveBid');

	// Agreement Form
	Route::get('/agreements','HotelManagerController@viewAgreements')->name('hotelmanager.viewAgreements');
	Route::get('/agreements/download/{id}','HotelManagerController@downloadAgreement')->name('hotelmanager.agreementDownload');
	Route::get('/agreements/{id}','HotelManagerController@agreementDetails')->name('hotelmanager.agreementDetails');

	// View Bids
	Route::get('/RFP/{id}','HotelManagerController@RFPDetails')->name('hotelmanager.rfpDetails');

	// Room Listing
	Route::get('/room-listing','BillingController@showRoomListing')->name('hotelmanager.showRoomListing');
	Route::get('/room-listing/download/{id}','BillingController@downloadRoomListing')->name('hotelmanager.roomListingDownload');
	Route::delete('/room-listing/{id}','BillingController@destroyRoomListing')->name('hotelmanager.destroyRoomListing');
});


Route::group(['namespace' => 'SystemAdmin','middleware' => 'auth','prefix'=>"systemadmin"], function () {
	Route::get('hotels','HotelsController@viewHotels')->name('systemadmin.viewHotels');
	Route::get('hotels/create','HotelsController@createHotels')->name('systemadmin.createHotels');
	Route::post('hotels/create','HotelsController@storeHotels')->name('systemadmin.storeHotels');
	Route::delete('hotels/delete/{id}','HotelsController@deleteHotels')->name('systemadmin.deleteHotels');
	Route::get('hotels/edit/{id}','HotelsController@editHotels')->name('systemadmin.editHotels');
	Route::put('hotels/update/{id}','HotelsController@updateHotels')->name('systemadmin.updateHotels');
});

