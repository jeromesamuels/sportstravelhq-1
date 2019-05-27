@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<style>
    #myModal .modal-dialog {
    max-width: 600px;
    margin: 5.75rem auto;
    }
    #myModal .modal-header{
    display: block;
    border-bottom: 2px solid #eee;
    border-bottom-style:dashed;
    }
    #myModal .modal-content .modal-header .modal-title {
    font-weight: bold;
    font-size: 20px;
    }
    /*steps progress bar css */
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
    .progress .progress-bar {
    line-height: 10px;
    background-color: #dddede;
    box-shadow: none;
    }
    .progress{
    height: 8px;
    }
    #progress_bar{
    margin-top: 40px;
    background: #f5f5f5;
    padding: 25px 50px;
    height: 180px;
    }
    .progress p{
    font-size: 16px;
    width: 60px;
    left: -15px;
    position: relative;
    padding-top: 20px;
    word-break: keep-all;
    color: #44c8f5;
    font-weight: bold;
    }
    .progress h6{
    left: -15px;
    position: relative;
    width: 90px;
    }
    .sbox{
    padding: 20px;
    }
    .table td, .table th,.table tbody tr td, .table tbody tr th {
    border-bottom: 0 !important;
    border-top: 0 !important;
    font-size: 14px;
    padding: 12px;
    }
    .status_detail{
    border-bottom: 2px solid #dedbdb;
    border-bottom-style: dotted;
    margin-bottom: 30px;
    padding-bottom: 15px;
    }
     .status_detail1{
       margin-bottom: 30px;
      padding-bottom: 25px;
     }
    .print-btn{
    text-align: center;
    border-radius: 20px !important;
    border: 2px solid #eee !important;
    width: 100px;
    height: 40px;
    padding: 8px;
    margin-right: 50px;
    }
    a.export,
    a.export:visited {
    display: inline-block;
    text-decoration: none;
    color: #000;
    padding: 10px;
    background-color: transparent;
    }
    .modal-header {
    display: inline-block !important;
}
</style>
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
                            <p style="font-size: 14px;">Client has added Bid Response</p>
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
              
                if($trip_id != null){  
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
       
        <div class="sbox" >
            <div class="sbox-title">
                <h1 style="font-size: 20px;"> Trip #{{ $trip->id }}</h1>
            </div>
            <div class="sbox-content">
                @include('includes.alerts')
                <div class="row" style="border-bottom: 2px solid #eee;margin-bottom: 30px;">
                    <div class="col-sm-3" style="border-right: 2px solid #eee;">
                      
                        <div class="status_detail">
                            <h5>Status Detail</h5>
                            <p style="font-size: 14px;color: #b1afaf;">{{$trip->comment}}</p>
                        </div>
                        <div class="status_detail">
                            <h5>Date Created</h5>
                            <p style="font-size: 14px;color: #b1afaf;">{{ $trip->added }}</p>
                        </div>
                         <?php  
                        if($invoice != null){ ?>
                      
                        <div class="status_detail">
                            <h5>Invoice #</h5>
                            @if($invoice->count() > 0)
                            <p style="font-size: 14px;color: #b1afaf;"><?php echo $invoice->invoice_id;?></p>
                            @else
                            <p style="font-size: 14px;color: #b1afaf;">Not generated invoice yet</p>
                            @endif
                            <h5>Invoice Status</h5>
                            @if($invoice->count() > 0)
                            <p style="font-size: 14px;color: #b1afaf;">Paid</p>
                            @else
                            <p style="font-size: 14px;color: #b1afaf;">Unpaid</p>
                            @endif
                        </div>
                      
                        <div class="status_detail1">
                            <h5>Document</h5>
                            @if($invoice->invoice_file != '')
                            <a href="../../uploads/users/{{ $invoice->invoice_file }}" target="_blank" style="font-size: 14px;color: #00b0e4;" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> Roster File</a>
                            @else
                            <a href="#" style="font-size: 14px;color: #00b0e4;" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> Roster File</a>
                            @endif
                        </div>
                    <?php  }  ?>
                    </div>
                    <?php  ?>
                    <div class="col-sm-9" id="print_div">
                     
                        <table class="table " >
                            <tbody>
                                <tr>
                                    <td width='30%' class='label-view text-right'>Contact Name</td>
                                    <td><img src="../../uploads/users/{{  $trip->tripuser->avatar }}" class="m--img-rounded m--marginless" width="50"  height="50" alt="User" style="margin-right: 18px !important;float: left;"><h6>{{ $trip->tripuser->first_name." ".$trip->tripuser->last_name }}</h6>
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

                            @if (auth()->user()->is_hotel_manager)
                                @if ($rfp)
                                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal"> View Bid </button>
                                @elseif ($trip->status == 6)
                                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal"> Bid Now </button>
                                @endif
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
                                <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($rfps_new)}}</h1>
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

<div id="output"></div>
</div>
<div id="map"></div>
<script>
    function initMap() {
      var bounds = new google.maps.LatLngBounds;
      var markersArray = [];
    
      //var origin1 = {lat: 55.93, lng: -3.118};
      var origin2 ='<?php echo $hotel->address; ?>'; //hotel adress
    
      var destinationA ='<?php echo $trip->from_address_1; ?>';
      //var destinationB = {lat: 50.087, lng: 14.421};
    
      var destinationIcon = 'https://chart.googleapis.com/chart?' +
          'chst=d_map_pin_letter&chld=D|FF0000|000000';
      var originIcon = 'https://chart.googleapis.com/chart?' +
          'chst=d_map_pin_letter&chld=O|FFFF00|000000';
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 55.53, lng: 9.4},
        zoom: 10
      });
      var geocoder = new google.maps.Geocoder;
    
      var service = new google.maps.DistanceMatrixService;
      service.getDistanceMatrix({
        origins: [origin2],
        destinations: [destinationA],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
      }, function(response, status) {
        if (status !== 'OK') {
          alert('Error was: ' + status);
        } else {
          var originList = response.originAddresses;
          var destinationList = response.destinationAddresses;
          var outputDiv = document.getElementById('output');
          outputDiv.innerHTML = '';
          deleteMarkers(markersArray);
    
          var showGeocodedAddressOnMap = function(asDestination) {
            var icon = asDestination ? destinationIcon : originIcon;
            return function(results, status) {
              if (status === 'OK') {
                map.fitBounds(bounds.extend(results[0].geometry.location));
                markersArray.push(new google.maps.Marker({
                  map: map,
                  position: results[0].geometry.location,
                  icon: icon
                }));
              } else {
               //alert('Calculate distance was not successful due to: ' + status);
              }
            };
          };
    
          for (var i = 0; i < originList.length; i++) {
            var results = response.rows[i].elements;
            geocoder.geocode({'address': originList[i]},
                showGeocodedAddressOnMap(false));
            for (var j = 0; j < results.length; j++) {
              geocoder.geocode({'address': destinationList[j]},
                  showGeocodedAddressOnMap(true));
          
            var string = results[j].distance.text;
              string = string.split(" ");
              var stringArray = new Array();
              for(var i =0; i < string.length; i++){
                  stringArray.push(string[i]);
                  if(i != string.length-1){
                      stringArray.push(" ");
                  }
              }
               var distance=string[0] * 0.621371;
               var decimals=2;
               var dist=Number(Math.round(distance+'e'+decimals)+'e-'+decimals);
               document.getElementById('eventDistance').value= dist;
              
            }
    
          }
        }
      });
    }
    
    function deleteMarkers(markersArray) {
      for (var i = 0; i < markersArray.length; i++) {
        markersArray[i].setMap(null);
      }
      markersArray = [];
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCM3IVfk3icA92tlWTGZRMg__v7dKnDaWc&callback=initMap"></script>
@stop
