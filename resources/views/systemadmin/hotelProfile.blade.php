@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<style>
    .sbox-content {
    padding: 15px 20px 0px 20px;
    border-bottom: 1px solid #eee;
    } 
    .hotel-info-section{
    padding: 20px;
    background: #5dbbe0;
    color: #fff;  
    }
    .hotel_range{
    background-color: #000;
    height: 6px;
    border-radius: 5px;
    }
    .skills {
    text-align: right;
    padding: 0;
    color: #000;
    }
    .final_range{
    width: 100%;
    background-color: #ddd;
    }
    .one, .two, .three, .four, .five, .six, .seven, .eight, .nine{
    position:absolute;
    margin-top:-2px;
    z-index:1;
    height:12px;
    width:12px;
    border-radius:25px;
    }
    .one{
    left:1%;
    }
    .two{
    left:12.5%;
    }
    .three{
    left:25%;
    }
    .four{
    left:37.5%;
    }
    .five{
    left:50%;
    }
    .six{
    left:62.5%;
    }
    .seven{
    left:75%;
    }
    .eight{
    left:87.5%;
    }
    .nine{
    left:98%;
    }
    .success-color{
    background-color:#44c8f5;
    }
    .no-color{
    background-color:#afafaf;
    }
</style>
<?php  $hotel_manager_id=Session::get('uid');
    $user_group_id= DB::table('tb_users')->where('id', $hotel_manager_id)->pluck('group_id');
    foreach($user_group_id as $item_new) {
    $user_group_id_new = $item_new;
    }
     ?>
<section class="page-header row" style="margin-top: 30px;">
    <h1>Dashboard </h1>
    <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Hotel Profile </span>
</section>
<div class="sbox" style="border-top: none">
    <div class="sbox-content dashboard-container">
        <?php 
            $data_hotel= DB::table('hotels')->groupBy('type')->get();
            foreach($data_hotel as $value){
               $name=$value->type;
                  
                //$current_date= date('F');
              $currentMonth = date('m');
               // $year=date("Y",$time);  
            /*Amount Paid*/
            $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->whereRaw('MONTH(check_out) = ?',[$currentMonth])->sum('invoices.amt_paid');    
                $array[$name] = $purchases;
                 $y = $array[$value->type];
                 $sum_new =array_sum($array);
            
            /* pending amount*/
            $purchases_due = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->whereRaw('MONTH(check_out) = ?',[$currentMonth])->sum('invoices.est_amt_due');    
                $array[$name] = $purchases_due;
                 $y = $array[$value->type];
                 $sum_due =array_sum($array);
                 $revenu_due=$sum_new-$sum_due;
            
            }
            
             /*Total Booking of this month*/
            $trip_booking = DB::table('user_trips')->whereRaw('MONTH(added) = ?',[$currentMonth])->get();
            
            
              
            ?>
        <div class="row" style="border-bottom:1px solid #eee;">
            <h2 style="padding-bottom: 20px;">Hotel Overview</h2>
        </div>
        <div class="row" >
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4>Total Booking</h4>
                    <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">{{ count($trip_booking) }}</h4>
                </div>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Paid Invoices</h4>
                    <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                </div>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Open Balance</h4>
                    <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                </div>
                <?php 
                    $data2= DB::table('rfps')->get()->where("status",'!=',3)->all();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                </div>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Estimated Revenue</h4>
                    <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                </div>
                <?php 
                    $data3= DB::table('rfps')->get()->where("status",2)->all();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right:10px;color: #5dbbe0;">${{ $sum_new }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
        <div class="row">
            <div class="col-md-8">
                <div class="sbox">
                    <div class="sbox-title">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 style="font-size: 20px;"> Hotel Trips</h4>
                            </div>
                            <div class="col-sm-8">
                                @include('includes.alerts')
                            </div>
                        </div>
                    </div>
                    <div class="sbox-content">
                        <div class="table-responsive" >
                            <table class="table table-hover " >
                                <tr style="border-bottom-style: dashed;border-color: #eee;">
                                    <th>Date Created</th>
                                    <th>Event Date</th>
                                    <th>Trip #</th>
                                    <th>Progress</th>
                                    <!--  <th>Property</th>
                                        <th>Rating</th>
                                        <th>Status</th> -->
                                    <th>Action</th>
                                </tr>
                                <?php
                                    $user_lid = DB::table('tb_users')->where('hotel_id', $hotel->id)->get();    
                                                    
                                    foreach($user_lid as $item) {
                                    
                                     $hotel_trips = DB::table('rfps')->where('user_id', $item->id)->orderBy('created_at','desc')->get();   
                                    
                                    ?>
                                @foreach ($hotel_trips as $hotel_trips_new)
                                <?php 
                                    $rfpUserIds = [];
                                      $rfpUserIds[count($rfpUserIds)] = $item->id;
                                         $rfp_status=$hotel_trips_new->status;
                                    ?>
                                <tr style="border-bottom-style: dashed;border-color: #eee;">
                                    <td>{{ $hotel_trips_new->added }}</td>
                                    <td> {{ $hotel_trips_new->added }}</td>
                                    <td>{{ $hotel_trips_new->user_trip_id }}</td>
                                    <td>
                                        <?php  if(in_array(Session::get('uid'), $rfpUserIds)){
                                            ?>
                                        <div class="body">
                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                <p style="float: left;top: -20px;position: relative;color: #44c8f5">Step 1</p>
                                                <p style="float: right;top: -20px;position: relative;color: #8a8888">Client Submitted RFP</p>
                                                <div class="final_range">
                                                    <div class="skills hotel_range" style="width:12.5%;background-color: #44c8f5;">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } 
                                                elseif($rfp_status== 2){ ?>
                                            <div class="body">
                                                <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                    <p style="float: left;top: -20px;position: relative;color: #000">Step 6</p>
                                                    <p style="float: right;top: -20px;position: relative;color: #8a8888">Client Sign the hotel agreement</p>
                                                    <div class="final_range">
                                                        <div class="skills hotel_range" style="width:62.5%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } 
                                                elseif($rfp_status== 3){
                                                   ?>
                                            <div class="body">
                                                <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                    <p style="float: left;top: -20px;position: relative;color: #000">Step 4</p>
                                                    <p style="float: right;top: -20px;position: relative;color: #8a8888">Client review and compare proposals</p>
                                                    <div class="final_range">
                                                        <div class="skills hotel_range" style="width:37.5%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } 
                                                elseif(count($data2) > 0){ ?>
                                            <div class="body">
                                                <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                    <p style="float: left;top: -20px;position: relative;color: #000">Step 7</p>
                                                    <p style="float: right;top: -20px;position: relative;color: #8a8888">Hotel manager sign the contract</p>
                                                    <div class="final_range">
                                                        <div class="skills hotel_range" style="width:75%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } 
                                                elseif($data_new->amt_paid !=0 || $data_new->invoice_file != ''){ 
                                                ?>
                                            <div class="body">
                                                <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                    <p style="float: left;top: -20px;position: relative;color: #000">Step 9</p>
                                                    <p style="float: right;top: -20px;position: relative;color: #8a8888">Hotel manager upload the billing receipt</p>
                                                    <div class="final_range">
                                                        <div class="skills hotel_range" style="width:99%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }   
                                                elseif(count($trip->rfps) >= 2){ 
                                                ?>
                                            <div class="body">
                                                <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                    <p style="float: left;top: -20px;position: relative;color: #000">Step 4</p>
                                                    <p style="float: right;top: -20px;position: relative;color: #8a8888">Client review and compare proposals</p>
                                                    <div class="final_range">
                                                        <div class="skills hotel_range" style="width:37.5%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } 
                                                else{ 
                                                ?>
                                            <div class="body">
                                                <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                    <p style="float: left;top: -20px;position: relative;color: #000">Step 3</p>
                                                    <p style="float: right;top: -20px;position: relative;color: #8a8888">Hotel Manager send the proposal</p>
                                                    <div class="final_range">
                                                        <div class="skills hotel_range" style="width:25%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                    </td>
                                    <!--    <td><img alt="" src="../uploads/users/{{ $hotel->property }}" width="150" height="50" class="img-responsive" /></td></td>
                                        <td>
                                            @for ($i = 0; $i < $hotel->rating; $i++)
                                                <span class="fa fa-star" style="color:#a9a902"></span>
                                            @endfor
                                        </td>
                                        <td>
                                            @if ($hotel->active)
                                                <span class="label label-success" style="padding:4px 8px; font-size:12px">Active</span>
                                            @else
                                                <span class="label label-danger" style="padding:4px 8px; font-size:12px">In-Active</span>
                                            @endif
                                        </td> -->
                                    <td>
                                    <div class="dropdown">
                                    <button class="btn btn-light btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> View Trip </button>
                                    <ul class="dropdown-menu">
                                    <li ><a href="{{ route('hotelmanager.trips.show',$hotel_trips_new->user_trip_id) }}"  class="btn btn-light"  title="View Trips" >View Details</a></li>
                                    </ul>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                                <?php   } ?>
                            </table>
                            

                            </div>
                            <!-- End Table Grid -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                        <div class="sbox-title">
                            <h4 style="font-size: 20px;">Hotel Details</h4>
                        </div>
                        <div id="pages" >
                            <div id="information" class="page"  >
                                <div class="body">
                                    <img alt="" src="../../../uploads/users/{{ $hotel->property }}" id="div_hotel_img" width="100%" height="50" class="img-responsive" />
                                    <div class="hotel-info-section">
                                        <h5 style="color:#fff;" id="div_hotel_name">{{ $hotel->name }}</h5>
                                        <p id="div_hotel_adress">{{ $hotel->address }}</p>
                                        <p id="div_hotel_rating">
                                            @for ($i = 0; $i < $hotel->rating; $i++)
                                            <span class="fa fa-star" style="color:#a9a902"></span>
                                            @endfor
                                        </p>
                                    </div>
                                    <div class="contact-info" style="padding: 20px;">
                                        <p>Contact Name  :   <b>Eric Gil</b></p>
                                        <p>Contact Email : <a href="mailto:ericgildeveloper@gmail.com">ericgildeveloper@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
@section('pageLevelScripts')
@endsection