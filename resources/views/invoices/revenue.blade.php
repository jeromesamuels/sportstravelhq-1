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
            
              $sum_new =$purchases_new;
             
             /* pending amount*/
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
                    <p style="font-size: 14px;">Total Revenue of this Month</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                     @if(session('level')==1)
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;color: #5dbbe0;">${{ $monthly_purchase_due_all }}</h4>
                    @else
                      <h4 style="float:right;top: 50px;position: absolute;right: 10px;color: #5dbbe0;">${{ $monthly_purchase_due }}</h4>
                      @endif
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
                    <p style="font-size: 14px;">This Month</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                      @if(session('level')==1)
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $monthly_purchase_all }}</h4>
                    @else
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $monthly_purchase }}</h4>
                    @endif
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
                    <p style="font-size: 14px;">This Month </p>
                </div>
             
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                      @if(session('level')==1)
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $monthly_purchase_all }}</h4>
                    @else
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $monthly_purchase }}</h4>
                    @endif
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
                    @if(session('level')==1)
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;color: #5dbbe0;">${{ $monthly_purchase_due_all }}</h4>
                    @else
                      <h4 style="float:right;top: 50px;position: absolute;right: 10px;color: #5dbbe0;">${{ $monthly_purchase_due }}</h4>
                     @endif
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
    $array[$name] = $purchases_new;
    
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
                     @if(session('level')==1)
                       <div class="body">
                       @foreach($data_all as $all_data)
                        <?php  

                          $type_all=$all_data->type;
                         
                             $purchases_invoices = DB::table('invoices')->where('invoices.hotel_type', '=', $type_all)->sum('invoices.amt_paid');
                         
                            $array[$type_all] = $purchases_invoices;
                            $sum=0;

                              # code...
                          
                             $y = $array[$type_all];
                     
                            $sum =array_sum($array);
                              
                          
                             ?>
                        <div class="hotel_revenue" style="    padding: 20px;">
                            <h4><?php echo  $type_all; ?></h4>
                            <?php 
                                $playerson = $y;
                                 $maxplayers = $sum;
                                
                                 $percentage =(1/ 1) * 100; // floor (round down) optional
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
                   @else
                    <div class="body">
                        @foreach($data_hotel as $value)
                        <?php  
                            $date_start = date("Y", strtotime('-2 year'));
                                   $date_future = date("Y", strtotime('+2 year'));
                                   $date_year = date("Y");
                                   for($i=$date_start;$i<=$date_future;$i++){ 
                                   //echo $i;
                            
                                $name=$value->type;
                                   
                               $array[$name] = $purchases_new;
                               if($corporate->group_id==6){
                               
                               $purchases = DB::table('invoices')->where(['invoices.hotel_type'=> $name])->whereRaw('YEAR(created_at) = ?',$i)->sum('invoices.amt_paid');
                               }
                               else{
                                 
                                 $purchases = DB::table('invoices')->where(['invoices.hotel_name'=> $value->id])->whereRaw('YEAR(created_at) = ?',$i)->sum('invoices.amt_paid');
                               }
                               $sum=0;
                               $hotel_type=$value->type; 
                                $y = $array[$value->type];
                                $sum =array_sum($array);
                               
                                ?>
                        <div class="hotel_revenue" style=" padding: 20px;">
                            <h4>{{$i}}</h4>
                            <?php 
                                $playerson = $y;
                                $maxplayers = $sum;
                                 
                                   $percentage =($purchases / $maxplayers) * 100; // floor (round down) optional
                                   $type_percent=round($percentage);
                                  ?>
                            <div class="final_range">
                                <div class="skills hotel_range" style="width:<?php echo  $type_percent; ?>%">
                                </div>
                                <p style="float: left;">Estimated Revenue</p>
                                <p style="float: right;"><?php echo  $purchases; ?>$</p>
                            </div>
                        </div>
                        <?php } ?>
                        <br /><br />
                        @endforeach
                    </div>
                    @endif

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
                                foreach($data_all as $all_data){
                                $type_all=$all_data->type;
                                
                                $purchases_all = DB::table('invoices')->where('invoices.hotel_type', '=', $type_all)->sum('invoices.amt_paid');
          
                                 $hotel_type=$all_data->type; 
                                 $array[$type_all] = $purchases_all;
                                 $y = $array[$type_all];
                                  ?>
                                    { y: <?php echo  $purchases_all; ?>, label: '<?php echo  $hotel_type; ?>' },
                                   
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
                                foreach($data_hotel as $value){
                                $date_start = date("Y", strtotime('-5 year'));
                                $date_future = date("Y", strtotime('+5 year'));
                                $date_year = date("Y");
                                for($i=$date_start;$i<=$date_future;$i++){ 
                                //echo $i;
                                
                                 $name=$value->type;
                                 $array[$name] = $purchases_new;
                                 if($corporate->group_id==6){
                                   $purchases = DB::table('invoices')->where(['invoices.hotel_type'=> $name])->whereRaw('YEAR(created_at) = ?',$i)->sum('invoices.amt_paid');
                                 }
                                 else{
                                     $purchases = DB::table('invoices')->where(['invoices.hotel_name'=> $value->id])->whereRaw('YEAR(created_at) = ?',$i)->sum('invoices.amt_paid');
                                 }
                                 $chotel_type=$hcorporateData->type; 
                                 $cy = $array[$hcorporateData->type];
                                    
                                  ?>
                                    { y: <?php echo  $purchases; ?>, label: '<?php echo  $i; ?>' },
                                   
                                <?php  } } ?>
                              
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