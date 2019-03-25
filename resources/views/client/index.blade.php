@extends('layouts.app')
@section('content')
<style type="text/css">
    .dashboard-container .info-boxes {
    background: #eae7ee; 
    color: #240849;
    margin: 10px 0;
    padding: 10px 0;
    font-size: 20px;
    }
    .dashboard-container .info-boxes h3 {
    line-height: 20px;
    margin: 5px 0;
    }
    .dashboard-container .widget-box {
    margin: 10px;
    }
    .dashboard-container .widget-box .head {
    border-bottom: solid 1px #EEE;
    }
    .dashboard-container .widget-box .body table {
    width: 95%;
    margin: 10px auto;
    }
    .dashboard-container .widget-box .body table tr th {
    padding: 10px;
    background: #240849; 
    color: #FFFFFF;
    }
    .dashboard-container .widget-box .body table tr td {
    padding: 10px;
    border-bottom: solid 1px #EEE;
    }
    .dashboard-container .widget-box .body ul {
    list-style: none;
    padding: 0px;
    margin: 0;
    }
    .dashboard-container .widget-box .body ul li {
    padding: 10px;
    border-bottom: dotted 1px #EEE;
    }
    .dashboard-container .widget-box .body ul li strong {
    color: #e9955f
    }
    .dashboard-container .widget-box .head span {
    color: #240849;
    font-size: 16px;
    font-weight: bold;
    line-height: 50px;
    padding: 10px;
    }
    .box-shadow {
    -webkit-box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
    -moz-box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
    box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
    }
    .page-header {
    margin-top: 25px;
    }
    .sbox b {
    text-align: left;
    }
    .state_report .details_button{
    border: 1px solid #eee !important;
    border-radius: 25px !important;
    width: 100px;
    color: #000;
    font-weight: normal;
    }
    .canvasjs-chart-toolbar{
    display: none;
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
    #map {
    height: 400px;
    }
    #listing {
    position: absolute;
    width: 300px;
    height: 400px;
    overflow: auto;
    left: 500px;
    top: 0px;
    cursor: pointer;
    overflow-x: hidden;
    }
    #findhotels {
    position: absolute;
    text-align: right;
    width: 100px;
    font-size: 14px;
    padding: 4px;
    z-index: 5;
    background-color: #fff;
    }
    #locationField {
    position: absolute;
    width: 300px;
    height: 25px;
    left: 120px;
    top: 0px;
    z-index: 5;
    background-color: #fff;
    }
    #controls {
    position: absolute;
    left: 430px;
    width: 200px;
    top: 0px;
    z-index: 5;
    background-color: #fff;
    }
    #autocomplete {
    width: 100%;
    }
    #country {
    width: 100%;
    height: 39px;
    }
    .placeIcon {
    width: 20px;
    height: 34px;
    margin: 4px;
    }
    .hotelIcon {
    width: 24px;
    height: 24px;
    }
    #resultsTable {
    border-collapse: collapse;
    width: 240px;
    }
    #rating {
    font-size: 13px;
    font-family: Arial Unicode MS;
    }
    .iw_table_row {
    height: 18px;
    }
    .iw_attribute_name {
    font-weight: bold;
    text-align: right;
    }
    .iw_table_icon {
    text-align: right;
    }
    .gm-style .gm-style-iw-c{
    transform: translate(-75%,-100%);
    }
    .table tbody tr td, .table tbody tr th {
    padding: 20px 0 5px;
   }
    .table tbody tr td{
   padding-right: 35px !important;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<section class="page-header row">
    <h1>Dashboard </h1>
    <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Client </span>
</section>
<div class="page-content row">
<div class="page-content-wrapper no-margin">
     <div class="sbox" style="border-top: none">
            <div class="sbox-content dashboard-container">
                <?php 
                    $data_hotel= DB::table('hotels')->groupBy('type')->get();
                    foreach($data_hotel as $value){
                       $name=$value->type;
                    
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
                    <h2 style="padding-bottom: 20px;">Client Overview</h2>
                </div>
                <div class="row" style="border-bottom: 1px solid #eee;">
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
<?php 
    $data_hotel= DB::table('hotels')->groupBy('type')->get();
    foreach($data_hotel as $value){
       $name=$value->type;
    
        $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->sum('invoices.amt_paid');    
        $array[$name] = $purchases;
    }
      
    ?>
<div class="sbox" style=" margin: 0;background: #fff;padding: 20px;margin-bottom: 25px;">
     <div class="row">
        <div class="col-md-6">
            <div class="sbox-title">
                <h1> <b>Clients </b></h1>
            </div>
         </div>
            <div class="col-md-6 pull-right">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default btn-sm " 
                                onclick="SximoModal('{{ url("/search") }}','Advance Search'); " ><i class="fa fa-filter"></i> Filter </button>
                            </div>
                            <!-- /btn-group -->
                            <input type="text" class="form-control input-sm onsearch" data-target="http://13.92.240.159/demo/public/client" aria-label="..." placeholder=" Type And Hit Enter ">
                        </div>
                    </div>
        </div>
       <div class="sbox-content">
                <!-- Toolbar Top -->
                <div class="row">
                  
                    <div class="table-responsive" >
                      {!! Form::open(array('url'=>'core/users?', 'class'=>'form-horizontal m-t' ,'id' =>'SximoTable' )) !!}
                       <table class="table table-hover " id="core/usersTable">
                        <thead>
                            <tr style="border-bottom-style: dashed;border-color: #eee;">
                                <th>Client Name  </th>
                                <th> Email </th>
                                <th> Phone Number </th>
                                <th> Trips </th>
                                <th> Action </th>

                            </tr>
                        </thead>
                           <?php 
                        $data_client= DB::table('tb_users')->where('group_id', 4)->get();
                        foreach($data_client as $client_value){
                        
                        ?>
                        <tbody>
                              <tr style="border-bottom-style: dashed;border-color: #eee;">
                                <td><img src="uploads/users/<?php echo $client_value->avatar;?>" border="0" width="40" height="40" class="img-circle" style="margin-right:5px;"> {{ $client_value->first_name }} {{ $client_value->last_name }}</td>
                                <td> {{ $client_value->email }} </td>
                                <td>{{ $client_value->phone_number }} </td>
                             <td>
                                        <?php  

                                      $rfpUserIds = [];
                                      $rfpUserIds[count($rfpUserIds)] = $client_value->id;
                                      $data_usertrips= DB::table('user_trips')->where('entry_by', $client_value->id)->pluck('id');
                                      foreach($data_usertrips as $data_new_user) {
                                      $data_new_user_id=$data_new_user;
                                     

                                      $data_rfps= DB::table('rfps')->where('user_trip_id', $data_new_user_id)->get();
                                      foreach($data_rfps as $data_new) {
                                      $rfp_status=$data_new->status;
                                        }
                                      }

                                        if(in_array(Session::get('uid'), $rfpUserIds)){
                                            ?>
                                        <div class="body">
                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                <p style="float: left;top: -20px;position: relative;color: #44c8f5">Step 1</p>
                                                <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Client Submitted RFP</p>
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
                                                    <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Client Sign the hotel agreement</p>
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
                                                    <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Client review and compare proposals</p>
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
                                                    <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Hotel manager sign the contract</p>
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
                                                    <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Hotel manager upload the billing receipt</p>
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
                                                    <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Client review and compare proposals</p>
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
                                                    <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Hotel Manager send the proposal</p>
                                                    <div class="final_range">
                                                        <div class="skills hotel_range" style="width:25%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                    </td>
                                <td> 
                                 <a href="#" style="color: #5dbbe0;font-weight: bold;" class="dropdown-toggle" data-toggle="dropdown">View Details <i class="fa fa-chevron-down" aria-hidden="true" style="color: #000;padding-top: 5px;padding-left: 5px;"></i></a>
                                 <ul class="dropdown-menu">
                                  <li ><a href="{{ route('client.clientProfile',$client_value->id) }}"  class="btn btn-light"  title="View Trips" >View Details</a></li>
                                </ul>
                                </td>

                            </tr>
                         </tbody> 

                         <?php } ?>   

                       </table>
                    </div>
                </div>
      </div>              
</div>
        <div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
            <div class="sbox-content dashboard-container" style=" padding: 0;">
                <div class="row">
                    <?php 
                        $data_hotel= DB::table('hotels')->groupBy('type')->get();
                        foreach($data_hotel as $value){
                           $name=$value->type;
                        
                            $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->sum('invoices.amt_paid');    
                            $array[$name] = $purchases;
                            $y = $array[$value->type];
                            $sum =array_sum($array);
                        }
                        
                        ?>
                    <div class="col-md-4">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #5dbbe0;padding: 20px;">
                            <div class="head">
                                <h3 style="color:#fff;">Revenue</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#fff;font-size: 40px;">${{ $sum }}</h1>
                                <p style="color:#fff;">Total Revenue till today</p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $data= DB::table('user_trips')->get();
                         
                          $rfps_new= DB::table('rfps')->where('status', 2)->get();     
                        ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                            <div class="head">
                                <h3>Booking</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data)}}</h1>
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