@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}

<section class="page-header row" style="margin-top: 30px;">
   <h1>Dashboard</h1><span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Users  </span>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
                <div class="sbox" style="border-top: none">
            <div class="sbox-content dashboard-container">
                @foreach($data_hotel as $value)
                <?php 
                 
                    $name=$value->type;
                    $currentMonth = date('m');
                    /*Amount Paid*/
                    
                    $array[$name] = $purchases;
                    $y = $array[$value->type];
                    $sum_new =array_sum($array);
                    
                    /* pending amount*/
                    
                    $array[$name] = $purchases_due;
                    $y = $array[$value->type];
                    $sum_due =array_sum($array);
                    $revenu_due=$sum_new-$sum_due;
               
                    ?>
                @endforeach
                <div class="row" style="border-bottom:1px solid #eee;">
                    <h2 style="padding-bottom: 20px;">User Overview</h2>
                </div>
                <div class="row" style="border-bottom: 1px solid #eee;">
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4>Total Booking</h4>
                            <p style="font-size: 14px;padding-top: 10px;">Total Booking</p>
                        </div>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right: 10px;">{{ count($trip_booking) }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Paid Invoices</h4>
                            <p style="font-size: 14px;padding-top: 10px;">Till Today</p>
                        </div>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Open Balance</h4>
                            <p style="font-size: 14px;padding-top: 10px;">Till Today</p>
                        </div>
                        
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Estimated Revenue</h4>
                            <p style="font-size: 14px;padding-top: 10px;">Till Today</p>
                        </div>
                       
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right:10px;color: #5dbbe0;">${{ $sum_new }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sbox">
            <div class="sbox-title">
                <h1> Account Details </h1>
            </div>
            <div class="sbox-content">
                <!-- Toolbar Top -->
              
                <!-- End Toolbar Top -->
                <!-- Table Grid -->
                <div class="table-responsive" style="padding-bottom: 70px;">
                    {!! Form::open(array('url'=>'core/users?', 'class'=>'form-horizontal m-t' ,'id' =>'SximoTable' )) !!}
                    <table class="table table-striped table-hover " id="">
                        <thead>
                            <tr style="border-bottom-style: dashed;border-color: #eee;">
                                <th style="width: 3% !important;" class="number"> No </th>
                                <th>Username</th>
                                <th>Avatar</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th  style="width: 10% !important;">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr style="border-bottom-style: dashed;border-color: #eee;">
                                <td > 1 </td>
                                <td>{{$user->username}}</td>
                                <td><img alt="" src="../public/uploads/users/<?php echo $user->avatar; ?>" width="70" height="70" class="img-circle"></td>
                                <td>{{ $user->first_name.' '.$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                     <td>
                                    <div class="dropdown">
                                     
                                        <a href="#" style="color: #5dbbe0;font-weight: bold;" class="dropdown-toggle" data-toggle="dropdown">View User <i class="fa fa-chevron-down" aria-hidden="true" style="color: #000;padding-top: 5px;padding-left: 5px;"></i></a>
                                        <ul class="dropdown-menu">
                                           
                                            <li><a href="{{ url('core/users/'.$user->id.'?return=')}}" class="tips" title="{{ __('core.btn_view') }}">View Details</a></li>
                                            
                                            <li><a  href="{{ url('core/users/'.$user->id.'/edit?return=') }}" class="tips" title="{{ __('core.btn_edit') }}">Edit Details</a></li>

                                            <li class="divider" role="separator"></li>
                                           
                                        </ul>
                                    </div>
                                </td>		 
                            </tr>
                           
                        </tbody>
                    </table>
                    <input type="hidden" name="action_task" value="" />
                    {!! Form::close() !!}
                 
                </div>
                <!-- End Table Grid -->
            </div>
        </div>

         <div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
            <div class="sbox-content dashboard-container" style=" padding: 0;">
                <div class="row">
                  
                    <div class="col-md-4">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #5dbbe0;padding: 20px;">
                            <div class="head">
                                <h3 style="color:#fff;">Revenue</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#fff;font-size: 40px;">${{ $sum_new }}</h1>
                                <p style="color:#fff;">Total Revenue till today</p>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-4 col-sm-12">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                            <div class="head">
                                <h3>Booking</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($trip_booking)}}</h1>
                                <p>Total Booking </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                            <div class="head">
                                <h3 >Trips</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($rfps_new) }}</h1>
                                <p>Accepted Proposals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
    	$('.copy').click(function() {
    		var total = $('input[class="ids"]:checkbox:checked').length;
    		if(confirm('are u sure Copy selected rows ?'))
    		{
    			$('input[name="action_task"]').val('copy');
    			$('#SximoTable').submit();// do the rest here	
    		}
    	})	
    	
    });	
</script>	
@stop