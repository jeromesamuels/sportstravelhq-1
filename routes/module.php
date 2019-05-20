<?php
        
// Start Routes for users 
Route::resource('users','UsersController');
// End Routes for users 

                    
// Start Routes for hotelamenities 
Route::resource('hotelamenities','HotelamenitiesController');
// End Routes for hotelamenities 

                    
// Start Routes for usertrip 
Route::resource('usertrips','UsertripsController');
// End Routes for usertrip 

                    
// Start Routes for invoices 
Route::resource('invoices','InvoicesController');
// End Routes for invoices 

                    
// Start Routes for tripstatussettings 
Route::resource('tripstatussettings','TripstatussettingsController');
// End Routes for tripstatussettings 

                    
// Start Routes for tripstatuslogs 
Route::resource('tripstatuslogs','TripstatuslogsController');
// -- Post Method --

// End Routes for tripstatuslogs 

                    
// Start Routes for corporateuser 
Route::resource('corporateuser','CorporateuserController');
// End Routes for corporateuser 

                    
// Start Routes for subcoordinator 
Route::resource('subcoordinator','SubcoordinatorController');
// End Routes for subcoordinator 

                    
// Start Routes for state 
Route::resource('state','StateController');
// -- Post Method --

// End Routes for state 

  ?>