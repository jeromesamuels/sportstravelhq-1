@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row" style="margin-top: 30px;">
    <h1>Dashboard </h1>
    <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Trip Status | Trip {{ $trip->id }}</span>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
        <div class="sbox" style="border-top: none">
            <div class="sbox-content dashboard-container">
                <div class="row" style="border-bottom:1px solid #eee;">
                    <h2 style="padding-bottom: 20px;">Trips Overview</h2>
                </div>
                <div class="row" style="border-bottom: 2px solid #eee;border-left: 2px solid #eee;">
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h3>Trip #</h3>
                            <p style="font-size: 14px;">Trip Id</p>
                        </div>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ $trip->id }}</h3>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Progress</h4>
                        </div>
                       
                        <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:34%;height: 6px;background-color: #44c8f5;">
                            </div>
                        </div>
                        <p style="float: left;color: #44c8f5;font-weight: bold;font-size: 16px;">Step 1 to 9</p>
                        <p style="float: right;">Submitted RFP</p>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Status</h4>
                            <p style="font-size: 14px;">On this Trip</p>
                        </div>
                       
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Total RFP Recieved</h4>
                            <p style="font-size: 14px;">On this Trip</p>
                        </div>
                      
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($trip->rfps) }}</h3>
                        </div>
                    </div>
                </div>
                <?php 
                if($trip_id != null ){  
                    if($trip_id->status==1){
                   ?>
                <div class="row" id="progress_bar">
                    <div class="col-md-12">
                        <div class="progress">
                            <div class="one success-color">
                                <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client Submitted RFP</h6>
                            </div>
                            <div class="two no-color">
                                <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Corporate Viewed RFP</h6>
                            </div>
                            <div class="three no-color">
                                <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel Manager Send Proposals</h6>
                            </div>
                            <div class="four no-color">
                                <p>Step 4</p>
                                <h6>Client review and compare proposals</h6>
                            </div>
                            <div class="five no-color">
                                <p>Step 5</p>
                                <h6>Client choose winner</h6>
                            </div>
                            <div class="six no-color">
                                <p>Step 6</p>
                                <h6>Client sign the hotel agreement</h6>
                            </div>
                            <div class="seven no-color">
                                <p>Step 7</p>
                                <h6>Hotel manager sign the contract</h6>
                            </div>
                            <div class="eight no-color">
                                <p>Step 8</p>
                                <h6>Client submit the rooming list</h6>
                            </div>
                            <div class="nine no-color">
                                <p>Step 9</p>
                                <h6>Hotel Manager upload the billing receipt</h6>
                            </div>
                            <div class="progress-bar no-color" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
                <?php 
            }
            elseif( $trip_id->status==4){ ?>
                        <div class="row" id="progress_bar">
                    <div class="col-md-12">
                        <div class="progress">
                            <div class="one success-color">
                                <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client Submitted RFP</h6>
                            </div>
                            <div class="two no-color">
                                <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Corporate Viewed RFP</h6>
                            </div>
                            <div class="three no-color">
                                <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel Manager Send Proposals</h6>
                            </div>
                            <div class="four no-color">
                                <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client review and compare proposals</h6>
                            </div>
                            <div class="five no-color">
                                <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client choose winner</h6>
                            </div>
                            <div class="six no-color">
                                <p>Step 6 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client sign the hotel agreement</h6>
                            </div>
                            <div class="seven no-color">
                                <p>Step 7 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel manager sign the contract</h6>
                            </div>
                            <div class="eight no-color">
                                <p>Step 8 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client submit the rooming list</h6>
                            </div>
                            <div class="nine no-color">
                                <p>Step 9 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel Manager upload the billing receipt</h6>
                            </div>
                            <div class="progress-bar no-color" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
           <?php 
            }
            elseif( $trip_id->status==8){ ?>
                        <div class="row" id="progress_bar">
                    <div class="col-md-12">
                        <div class="progress">
                            <div class="one success-color">
                                <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client Submitted RFP</h6>
                            </div>
                            <div class="two no-color">
                                <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Corporate Viewed RFP</h6>
                            </div>
                            <div class="three no-color">
                                <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel Manager Send Proposals</h6>
                            </div>
                            <div class="four no-color">
                                <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client review and compare proposals</h6>
                            </div>
                            <div class="five no-color">
                                <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client choose winner</h6>
                            </div>
                            <div class="six no-color">
                                <p>Step 6 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client sign the hotel agreement</h6>
                            </div>
                            <div class="seven no-color">
                                <p>Step 7 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel manager sign the contract</h6>
                            </div>
                            <div class="eight no-color">
                                <p>Step 8 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client submit the rooming list</h6>
                            </div>
                            <div class="nine no-color">
                                <p>Step 9 </p>
                                <h6>Hotel Manager upload the billing receipt</h6>
                            </div>
                            <div class="progress-bar no-color" style="width: 100%"></div>
                        </div>
                    </div>
                </div>


               <?php   }
              
               elseif( $trip_id->status==5){
                ?>
                         <div class="row" id="progress_bar">
                    <div class="col-md-12">
                        <div class="progress">
                            <div class="one success-color">
                                <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client Submitted RFP</h6>
                            </div>
                            <div class="two no-color">
                                <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Corporate Viewed RFP</h6>
                            </div>
                            <div class="three no-color">
                                <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel Manager Send Proposals</h6>
                            </div>
                            <div class="four no-color">
                                <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client review and compare proposals</h6>
                            </div>
                            <div class="five no-color">
                                <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client choose winner</h6>
                            </div>
                            <div class="six no-color">
                                <p>Step 6 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client sign the hotel agreement</h6>
                            </div>
                            <div class="seven no-color">
                                <p>Step 7 </p>
                                <h6>Hotel manager sign the contract</h6>
                            </div>
                            <div class="eight no-color">
                                <p>Step 8 </p>
                                <h6>Client submit the rooming list</h6>
                            </div>
                            <div class="nine no-color">
                                <p>Step 9 </p>
                                <h6>Hotel Manager upload the billing receipt</h6>
                            </div>
                            <div class="progress-bar no-color" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
               <?php 
               } 
              
               elseif( $trip_id->status==6){
                ?>
                         <div class="row" id="progress_bar">
                    <div class="col-md-12">
                        <div class="progress">
                            <div class="one success-color">
                                <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client Submitted RFP</h6>
                            </div>
                            <div class="two no-color">
                                <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Corporate Viewed RFP</h6>
                            </div>
                            <div class="three no-color">
                                <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel Manager Send Proposals</h6>
                            </div>
                            <div class="four no-color">
                                <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client review and compare proposals</h6>
                            </div>
                            <div class="five no-color">
                                <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client choose winner</h6>
                            </div>
                            <div class="six no-color">
                                <p>Step 6 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client sign the hotel agreement</h6>
                            </div>
                            <div class="seven no-color">
                                <p>Step 7 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel manager sign the contract</h6>
                            </div>
                            <div class="eight no-color">
                                <p>Step 8 </p>
                                <h6>Client submit the rooming list</h6>
                            </div>
                            <div class="nine no-color">
                                <p>Step 9 </p>
                                <h6>Hotel Manager upload the billing receipt</h6>
                            </div>
                            <div class="progress-bar no-color" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
               <?php 
                } 
               else{
             ?>
                           <div class="row" id="progress_bar">
                    <div class="col-md-12">
                        <div class="progress">
                            <div class="one success-color">
                                <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client Submitted RFP</h6>
                            </div>
                            <div class="two no-color">
                                <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Corporate Viewed RFP</h6>
                            </div>
                            <div class="three no-color">
                                <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Hotel Manager Send Proposals</h6>
                            </div>
                            <div class="four no-color">
                                <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client review and compare proposals</h6>
                            </div>
                            <div class="five no-color">
                                <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client choose winner</h6>
                            </div>
                            <div class="six no-color">
                                <p>Step 6</p>
                                <h6>Client sign the hotel agreement</h6>
                            </div>
                            <div class="seven no-color">
                                <p>Step 7</p>
                                <h6>Hotel manager sign the contract</h6>
                            </div>
                            <div class="eight no-color">
                                <p>Step 8 </p>
                                <h6>Client submit the rooming list</h6>
                            </div>
                            <div class="nine no-color">
                                <p>Step 9 </p>
                                <h6>Hotel Manager upload the billing receipt</h6>
                            </div>
                            <div class="progress-bar no-color" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            <?php   }

               }
          
                elseif($trip->status == 6){
                    ?>     
                 <div class="row" id="progress_bar">
                    <div class="col-md-12">
                        <div class="progress">
                            <div class="one success-color">
                                <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client Submitted RFP</h6>
                            </div>
                            <div class="two no-color">
                                <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Corporate Viewed RFP</h6>
                            </div>
                            <div class="three no-color">
                                <p>Step 3</p>
                                <h6>Hotel Manager Send Proposals</h6>
                            </div>
                            <div class="four no-color">
                                <p>Step 4</p>
                                <h6>Client review and compare proposals</h6>
                            </div>
                            <div class="five no-color">
                                <p>Step 5</p>
                                <h6>Client choose winner</h6>
                            </div>
                            <div class="six no-color">
                                <p>Step 6</p>
                                <h6>Client sign the hotel agreement</h6>
                            </div>
                            <div class="seven no-color">
                                <p>Step 7</p>
                                <h6>Hotel manager sign the contract</h6>
                            </div>
                            <div class="eight no-color">
                                <p>Step 8</p>
                                <h6>Client submit the rooming list</h6>
                            </div>
                            <div class="nine no-color">
                                <p>Step 9</p>
                                <h6>Hotel Manager upload the billing receipt</h6>
                            </div>
                            <div class="progress-bar no-color" style="width: 100%"></div>
                        </div>
                    </div>
                </div>

              <?php }
              else{
              ?>
                     <div class="row" id="progress_bar">
                    <div class="col-md-12">
                        <div class="progress">
                            <div class="one success-color">
                                <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                <h6>Client Submitted RFP</h6>
                            </div>
                            <div class="two no-color">
                                <p>Step 2 </p>
                                <h6>Corporate Viewed RFP</h6>
                            </div>
                            <div class="three no-color">
                                <p>Step 3</p>
                                <h6>Hotel Manager Send Proposals</h6>
                            </div>
                            <div class="four no-color">
                                <p>Step 4</p>
                                <h6>Client review and compare proposals</h6>
                            </div>
                            <div class="five no-color">
                                <p>Step 5</p>
                                <h6>Client choose winner</h6>
                            </div>
                            <div class="six no-color">
                                <p>Step 6</p>
                                <h6>Client sign the hotel agreement</h6>
                            </div>
                            <div class="seven no-color">
                                <p>Step 7</p>
                                <h6>Hotel manager sign the contract</h6>
                            </div>
                            <div class="eight no-color">
                                <p>Step 8</p>
                                <h6>Client submit the rooming list</h6>
                            </div>
                            <div class="nine no-color">
                                <p>Step 9</p>
                                <h6>Hotel Manager upload the billing receipt</h6>
                            </div>
                            <div class="progress-bar no-color" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
            </div>
        </div>
       
        <div class="sbox" >
            <div class="sbox-title">
                <h1 style="font-size: 20px;"> Trip #{{ $trip->id }}</h1>
            </div>
            <div class="sbox-content">
                @include('includes.alerts')
                <div class="row" style="border-bottom: 2px solid #eee;margin-bottom: 30px;">
                    <div class="col-sm-3" style="border-right: 2px solid #eee;">
                        <!--   <p>
                            <span>Hi Hotel Manager</span><br>
                            {{ $trip->comment }}
                            </p> -->
                        <div class="status_detail">
                            <h5>Status Detail</h5>
                            <p style="font-size: 14px;color: #b1afaf;">{{$trip->comment}}</p>
                        </div>
                        <div class="status_detail">
                            <h5>Date Created</h5>
                            <p style="font-size: 14px;color: #b1afaf;">{{ $trip->added }}</p>
                        </div>
                         <?php 
                         if($invoices != ''){
                           ?>
                        <div class="status_detail">
                            <h5>Invoice #</h5>
                            @if($invoices->count() > 0)
                            <p style="font-size: 14px;color: #b1afaf;"><?php echo $invoices->invoice_id;?></p>
                            @else
                            <p style="font-size: 14px;color: #b1afaf;">Not generated invoice yet</p>
                            @endif
                            <h5>Invoice Status</h5>
                            @if($invoices->count() > 0)
                            <p style="font-size: 14px;color: #b1afaf;">Paid</p>
                            @else
                            <p style="font-size: 14px;color: #b1afaf;">Unpaid</p>
                            @endif
                        </div>
                           <?php } ?>
                           @if(count($trip->rfps)>=1)
                           <div class="status_detail1">
                            <h5>Document</h5>
                            @if($trip_id->roster != '')
                            <a href="../uploads/users/{{ $trip_id->roster }}" target="_blank" style="font-size: 14px;color: #00b0e4;" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> Roster File</a>
                            @else
                            <a href="#" style="font-size: 14px;color: #00b0e4;" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> No Roster File</a>
                            @endif
                            </div>
                            @endif
                    </div>
                    <div class="col-sm-9" id="print_div">
                       
                        <table class="table " >
                            <tbody>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Contact Name</td>
                                    <td><img src="{{ URL('uploads/users') }}/{{  $trip->tripuser->avatar }}" class="m--img-rounded m--marginless" width="50"  height="50" alt="User" style="margin-right: 18px !important;float: left;"><h6>{{ $trip->tripuser->first_name." ".$trip->tripuser->last_name }}</h6>
                                      <p>{{ $trip->tripuser->username}}</p></td>
                                </tr>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Contact Email</td>
                                    <td>{{ $trip->tripuser->email }}</td>
                                </tr>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Contact Number</td>
                                    <td>{{ $trip->tripuser->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Destination</td>
                                    <td><b>{{ $trip->from_city }}</b></td>
                                </tr>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Check In Date</td>
                                    <td><b>{{ $trip->check_in }}</b></td>
                                </tr>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Check Out Date</td>
                                    <td><b>{{ $trip->check_out }}</b></td>
                                </tr>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Total King Bedrooms</td>
                                    <td>{{ $trip->double_king_qty }}</td>
                                </tr>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Total Doubel Queen Bedrooms</td>
                                    <td>{{ $trip->double_queen_qty }}</td>
                                </tr>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Requested Amenties</td>
                                    <td>
                                        @foreach ($trip->amenities as $amenity)
                                        <b>{{ $amenity->title }}, &nbsp;</b>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-right">
                            <button class="btn btn-light print-btn" onclick="codespeedy()"> Print</button>
                            <a href="#" class="export btn btn-light print-btn">Export</a>
                            @if($rfp) 
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"> View Bid </button>
                            @else 
                            <button class="btn btn-info hide" data-toggle="modal" data-target="#myModal"> Bid Now </button>
                            @endif
                            <!--  <a href="javascript:window.print()">Print</a>  -->
                        </div>
                    </div>
                </div>
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
                                <h1 style="color:#fff;font-size: 40px;">${{ $purchases }}</h1>
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
<script type="text/javascript">
    /*print table*/       
    function codespeedy(){
    var print_div = document.getElementById("print_div");
    var print_area = window.open();
    print_area.document.write(print_div.innerHTML);
    print_area.document.close();
    print_area.focus();
    print_area.print();
    print_area.close();
    }
    
    /*export table*/
    $(document).ready(function() {
    
     function exportTableToCSV($table, filename) {
    
       var $rows = $table.find('tr:has(td)'),
    
         tmpColDelim = String.fromCharCode(11), // vertical tab character
         tmpRowDelim = String.fromCharCode(0), // null character
    
         // actual delimiter characters for CSV format
         colDelim = '","',
         rowDelim = '"\r\n"',
    
         // Grab text from table into CSV formatted string
         csv = '"' + $rows.map(function(i, row) {
           var $row = $(row),
             $cols = $row.find('td');
    
           return $cols.map(function(j, col) {
             var $col = $(col),
               text = $col.text();
    
             return text.replace(/"/g, '""'); // escape double quotes
    
           }).get().join(tmpColDelim);
    
         }).get().join(tmpRowDelim)
         .split(tmpRowDelim).join(rowDelim)
         .split(tmpColDelim).join(colDelim) + '"';
    
       // Deliberate 'false', see comment below
       if (false && window.navigator.msSaveBlob) {
    
         var blob = new Blob([decodeURIComponent(csv)], {
           type: 'text/csv;charset=utf8'
         });
    
         window.navigator.msSaveBlob(blob, filename);
    
       } else if (window.Blob && window.URL) {
         // HTML5 Blob        
         var blob = new Blob([csv], {
           type: 'text/csv;charset=utf-8'
         });
         var csvUrl = URL.createObjectURL(blob);
    
         $(this)
           .attr({
             'download': filename,
             'href': csvUrl
           });
       } else {
         // Data URI
         var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);
    
         $(this)
           .attr({
             'download': filename,
             'href': csvData,
             'target': '_blank'
           });
       }
     }
    
     // This must be a hyperlink
     $(".export").on('click', function(event) {
       // CSV
       var args = [$('#print_div>table'), 'exportTripDetails.csv'];
    
       exportTableToCSV.apply(this, args);
    
     });
    });
    
     
</script>
<!-- Modal -->
@if($rfp) 
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sent Bid</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('hotelmanager.saveBid') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <div class="form-group">
                        <label>Enter Your Offer Rate (In Dollars)</label>
                        <strong> {{ $rfp->offer_rate }} </strong>
                    </div>
                   <!--  <div class="form-group">
                        <label>Hotel Details</label>
                        <strong> {{ $rfp->hotel_information }} </strong>
                    </div> -->
                    <div class="form-group">
                        <label>Distance From Event (Unit Miles)</label>
                        <strong> {{ $rfp->distance_event }} </strong>
                    </div>
                    <div class="form-group">
                        <label>Your offer will be valid till ?</label>
                        <strong> {{ $rfp->offer_validity }} </strong>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <strong> {{ $rfp->hotels_message }} </strong>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bid Form</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('hotelmanager.saveBid') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <div class="form-group">
                        <label>Enter Your Offer Rate (In Dollars)</label>
                        <input type="number" class="form-control" name="offer_rate" min="0">
                    </div>
                  
                    <div class="form-group">
                        <label>Distance From Event (Unit Miles)</label>
                        <input type="text" class="form-control" name="eventDistance" id="eventDistance" value="" min="0" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Your offer will be valid till ?</label>
                        <input type="date" class="form-control" name="offerValidityDate">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
<!--for calculate distance-->
</div>

@stop
