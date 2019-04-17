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
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<section class="page-header row">
    <h1>Dashboard </h1>
    <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Revenue </span>
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
              $purchases = DB::table('invoices')->sum('invoices.amt_paid');  
            
              $sum_new =$purchases;
             
             /* pending amount*/
              $purchases_due = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->sum('invoices.est_amt_due');    
                   $array[$name] = $purchases_due;
                   $y = $array[$value->type];
                   $sum_due =array_sum($array);
                   $revenu_due=$sum_new-$sum_due;
            
            ?>
        @endforeach
        <div class="row" style="border-bottom:1px solid #eee;">
            <h2 style="padding-bottom: 20px;">Revenue Overview</h2>
        </div>
        <div class="row" >
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4>Estimated Revenue</h4>
                    <p style="font-size: 14px;">Total Revenue</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;color: #5dbbe0;">${{ $sum_due }}</h4>
                </div>
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:78%;height: 6px;background-color: #000000;">
                    </div>
                </div>
                <p style="float: left;">Processed RFP</p>
                <p style="float: right;">78%</p>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >State Revenue</h4>
                    <p style="font-size: 14px;">Total Revenue</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                </div>
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:84%;height: 6px;background-color: #000000;">
                    </div>
                </div>
                <p style="float: left;">All Corporate</p>
                <p style="float: right;">84%</p>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Paid Invoice</h4>
                    <p style="font-size: 14px;">Total Revenue </p>
                </div>
                <?php 
                    $data2= DB::table('rfps')->get()->where("status",'!=',3)->all();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                </div>
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:69%;height: 6px;background-color: #000000;">
                    </div>
                </div>
                <p style="float: left;">All Manager</p>
                <p style="float: right;">69%</p>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Open Invoice</h4>
                    <p style="font-size: 14px;">Total Revenue this month</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right:10px;">${{ $sum_new }}</h4>
                </div>
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:50%;height: 6px;background-color: #5dbbe0;">
                    </div>
                </div>
                <p style="float: left;">All Proposals</p>
                <p style="float: right;">50%</p>
            </div>
        </div>
    </div>
</div>
@foreach($data_hotel as $value)
<?php 
    $name=$value->type;
      $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->sum('invoices.amt_paid');    
      $array[$name] = $purchases;
    
    ?>
@endforeach            
<div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
    <div class="sbox-content dashboard-container" style=" padding: 0;">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <span>Revenue By Corporate</span>                        
                    </div>
                    <div class="body">
                        @foreach($data_hotel as $value)
                        <?php  
                            $sum=0;
                            $hotel_type=$value->type; 
                             $y = $array[$value->type];
                             $sum =array_sum($array);
                            
                             ?>
                        <div class="hotel_revenue" style="    padding: 20px;">
                            <h4><?php echo  $hotel_type; ?></h4>
                            <?php 
                                $playerson = $y;
                                 $maxplayers = $sum;
                                
                                 $percentage =($playerson / $maxplayers) * 100; // floor (round down) optional
                                 $type_percent=round($percentage);
                                ?>
                            <div class="final_range">
                                <div class="skills hotel_range" style="width:<?php echo  $type_percent; ?>%">
                                </div>
                                <p style="float: left;">Estimated Revenue</p>
                                <p style="float: right;"><?php echo  $y; ?>$</p>
                            </div>
                        </div>
                        <br /><br />
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <span>Revenue by Hotels</span>
                    </div>
                    @if(session('level')==1)
                    <div class="body">
                        <script>
                            window.onload = function () {
                              
                            let chart = new CanvasJS.Chart("chartContainer", {
                                   animationEnabled: true,
                                   exportEnabled: true,
                                   title: {
                                       text: ""
                                   },
                             data: [
                             {
                               type: "column",
                               dataPoints: [
                                <?php  
                                foreach($data_hotel as $value){
                                 $hotel_type=$value->type; 
                                 $y = $array[$value->type];
                                  ?>
                                    { y: <?php echo  $y; ?>, label: '<?php echo  $hotel_type; ?>' },
                                   
                                <?php  } ?>
                              
                               ]
                             }
                             ]
                            });
                            
                            chart.render();
                            }
                        </script>
                        <div id="chartContainer" style="height: 370px; width: 100;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                    @else

                        <div class="body">
                        <script>
                            window.onload = function () {
                              
                            let chart = new CanvasJS.Chart("chartContainer", {
                                   animationEnabled: true,
                                   exportEnabled: true,
                                   title: {
                                       text: ""
                                   },
                             data: [
                             {
                               type: "column",
                               dataPoints: [
                                <?php 

                                
                                 $chotel_type=$hcorporateData->type; 
                                 $cy = $array[$hcorporateData->type];
                                  ?>
                                    { y: <?php echo  $cy; ?>, label: '<?php echo  $chotel_type; ?>' },
                                   
                              
                              
                               ]
                             }
                             ]
                            });
                            
                            chart.render();
                            }
                        </script>
                        <div id="chartContainer" style="height: 370px; width: 100;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                    @endif
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
                        <h1 style="color:#fff;font-size: 40px;">${{ $sum }}</h1>
                        <p style="color:#fff;">Total Revenue till today</p>
                    </div>
                </div>
            </div>
            <?php 
                $data= DB::table('user_trips')->get();
                      
                ?>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3>Booking</h3>
                    </div>
                    <br />
                    <div class="body">
                        <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data)}}</h1>
                        <p>Total Booking till today</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3 >Clients</h3>
                    </div>
                    <br />
                    <div class="body">
                        <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($client) }}</h1>
                        <p>Total Customers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
    
    });
    
</script>
@stop