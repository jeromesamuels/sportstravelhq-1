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
    .booking_h3{
    position: absolute;
    float: left;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
    .booking_h3 h3{
    font-size:50px;
    color: #44c8f5;
    }
    .booking_h3 p{
    font-size: 14px;
    padding-top: 14px;
    }
</style>
<section class="page-header row">
    <h1>Dashboard</h1>
    <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> </span>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
        <div class="sbox" style="border-top: none">
            <div class="sbox-content dashboard-container">
                <div class="row" style="border-bottom:1px solid #eee;">
                    <h2 style="padding-bottom: 20px;">Trips Status</h2>
                </div>
                <div class="row" >
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h3>Total RFP</h3>
                            <p style="font-size: 14px;">Customers</p>
                        </div>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ $rfps }}</h3>
                        </div>
                        <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:78%;height: 6px;background-color: #000000;">
                            </div>
                        </div>
                        <p style="float: left;">All Customers</p>
                        <p style="float: right;">78%</p>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Processed RFP</h4>
                            <p style="font-size: 14px;">Corporate</p>
                        </div>
                        <?php 
                            $data= DB::table('rfps')->get()->where("status", 1)->all();
                            
                            ?>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($data) }}</h3>
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
                            <h4 >Active Proposals</h4>
                            <p style="font-size: 14px;">Hotel Managers</p>
                        </div>
                        <?php 
                            $data2= DB::table('rfps')->get()->where("status",'!=',3)->all();
                            
                            ?>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($data2) }}</h3>
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
                            <h4 >Accepted Proposals</h4>
                            <p style="font-size: 14px;">Customers</p>
                        </div>
                        <?php 
                            $data3= DB::table('rfps')->get()->where("status",2)->all();
                            
                            ?>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($data3) }}</h3>
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
        <?php 
            $currentMonth = date('m');
                         // $year=date("Y",$time);  
                  /*Amount Paid*/
                     $purchases_month = DB::table('invoices')->whereRaw('MONTH(check_out) = ?',[$currentMonth])->sum('invoices.amt_paid');    
                         
            ?>
        <div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
            <div class="sbox-content dashboard-container" style=" padding: 0;">
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;width: 100%;">
                            <div class="head">
                                <span>Revenue</span>                        
                            </div>
                            <div class=" col-sm-12">
                                <div class="body">
                                    <div class="info-boxes" style="background: #fff; color: #000;">
                                        <h1 style="color: #44c8f5; font-size: 50px;font-weight: bold;">${{ $purchases_month }}</h1>
                                        <p style="font-size: 14px;padding-bottom: 20px;border-bottom-style: dashed;border-bottom: 1px solid #eee;">Total Revenue of this month</p>
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
                            <div class="col-sm-12 first_hotel_range">
                                <div class="">
                                    <h4 style="padding-bottom: 30px;">Revenue By Corporate</h4>
                                </div>
                                <?php  
                                    foreach($data_hotel as $value){
                                     $sum=0;
                                     $hotel_type=$value->type; 
                                      $y = $array[$value->type];
                                      $sum =array_sum($array);
                                    
                                    
                                    $playerson = $y;
                                     $maxplayers = $sum;
                                    
                                     $percentage =($playerson / $maxplayers) * 100; // floor (round down) optional
                                     $type_percent=round($percentage);


                                    ?>
                                <div class="col-sm-4" >
                                    <div class="info-boxes" style="background: #fff; color: #000;">
                                        <h3><?php echo  $y; ?>$</h3>
                                    </div>
                                    <div class="final_range">
                                        <div class="skills hotel_range" style="width:<?php echo  $type_percent; ?>%">
                                        </div>
                                        <p style="float: left;padding-top: 15px;font-size: 16px;"><?php echo  $hotel_type; ?></p>
                                        <p style="float: right;padding-top: 15px;font-size: 16px;"><?php echo  $type_percent; ?>%</p>
                                    </div>
                                </div>
                                <?php } ?>
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
                <div class="col-md-6 col-sm-12">
                    <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding:15px 20px; left: 15px;position: relative;">
                        <div class="head">
                            <span>Booking</span>
                        </div>
                        <div class="row">
                            <div class=" col-sm-8">
                                <div class="body">
                                    <table class="table second_hotel_range">
                                        <?php  
                                            foreach($data_hotel as $value){
                                            
                                             $sum=0;
                                             $hotel_type=$value->type; 
                                              $y = $array[$value->type];
                                              $sum =array_sum($array);
                                              //$count = count( $value->type);
                                              $purchases_all = DB::table('invoices')->where('hotel_type', $value->type)->get();
                                     
                                              ?>
                                        <tr>
                                            <td style="width: 20%;">  <img alt="" src="../uploads/users/<?php echo $value->logo;?>" id="div_corporate_img" border="0" width="60" style="margin-top: 30px;" class="img-responsive"></td>
                                            <td>
                                                <div class="hotel_revenue" style=" padding: 15px;">
                                                    <h4 >{{ count($purchases_all) }} <span style="font-size: 15px;color: #7b7777;padding-left: 5px;">Bookings</span></h4>
                                                    <p style="float: right;float: right;top: -25px;position: relative;"><?php echo  $y; ?>$</p>
                                                    <?php 
                                                        $playerson = $y;
                                                         $maxplayers = $sum;
                                                        
                                                         $percentage =($playerson / $maxplayers) * 100; // floor (round down) optional
                                                         $type_percent=round($percentage);
                                                        ?>
                                                    <div class="final_range">
                                                        <div class="skills hotel_range" style="width:<?php echo  $type_percent; ?>%">
                                                        </div>
                                                        <h5 style="float: left; padding-top: 10px;"><?php echo  $hotel_type; ?></h5>
                                                        <p style="float: right;right: 50px;padding-top: 10px;position: absolute;"><?php echo  $type_percent; ?>%</p>
                                                    </div>
                                                </div>
                                                <br /><br />
                                            </td>
                                        </tr>
                                        <?php } 
                                            ?>
                                    </table>
                                </div>
                            </div>
                            <div class=" col-sm-4">
                                <div class="info-boxes" style="background: #fff; color: #000;">
                                    <?php 
                                        $data= DB::table('user_trips')->get();
                                              
                                        ?>
                                    <div class="booking_h3">
                                        <h3 >{{ count($data) }}</h3>
                                        <p>Total Bookings</p>
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
<div class="sbox" style="border-top: none">
    <div class="sbox-content dashboard-container">
        <div class="row" style="border-bottom:1px solid #eee;">
            <h2 style="padding-bottom: 20px;">Client Stats</h2>
        </div>
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #c3bfbf;">
                <div class="state_report" style="border-bottom: 1px solid #c3bfbf;border-bottom-style: dashed;">
                    <?php 
                        $data_trips= DB::table('user_trips')->get();
                              
                        ?>
                    <h3 style="padding-top:30px;color: #5dbbe0;">{{ count($data_trips) }}</h3>
                    <p style="font-size: 14px;">All Customers</p>
                    <br /><br />
                    <strong class="pull-right" style="color: #5dbbe0;font-size: 18px;">{{ $sum }}$</strong>
                    <b style="display:block;">Average Revenue</b>
                    <p>Total Revenue</p>
                </div>
                <br />
                <div class="state_report">
                    <strong class="pull-right" style="font-size: 18px;">{{ $rfps }}</strong>
                    <b style="display:block;">New Customers</b>
                    <p>All Trips</p>
                </div>
            </div>
            <div class="col-md-4" style="border-right: 1px solid #c3bfbf;">
                <h3 style="padding-top:30px;">Most Recent Users</h3>
                <p style="font-size: 14px;">Check out each column for more details</p>
                <br />
                <?php 
                    $data_client= DB::table('tb_users')->orderby('id', 'DESC')->limit(3)->get();
                    foreach($data_client as $data_value){
                    ?>
                <div class="state_report" style="border-bottom: 1px solid #c3bfbf;border-bottom-style: dashed;padding-bottom: 30px;">
                    <strong class="pull-right" style="color: #5dbbe0;font-size: 18px;">
                    <a href="../public/core/users/<?php echo $data_value->id; ?>?return="><button type="submit" class="btn btn-default details_button" value="Details">Details</button></a>
                    </strong>
                    @if($data_value->avatar=='')
                    <img alt="" src="http://www.gravatar.com/avatar/4b3dc6054330df941dfadba06c65100a" width="70" height="70" class="img-circle" style=" float: left;
                        margin-right: 15px;">
                     @else
                       <img alt="" src="uploads/users/{{ $data_value->avatar }}"  border="0" width="70" class="img-circle" height="70" style=" float: left;margin-right: 15px;" />
                     @endif
                    <b style="display:block;"><?php echo $data_value->first_name.''.$data_value->last_name; ?></b>
                    <p><?php echo $data_value->email ?></p>
                </div>
                <br /><?php } ?>
            </div>
            <div class="col-md-4" style="border-right: 1px solid #c3bfbf;">
                <h3 style="padding-top:30px;">Corporate Hotels</h3>
                <p style="font-size: 14px;">Prefered Corporate hotels by clients</p>
                <br />
         
                <script>
                    window.onload = function () {
                    
                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "",
                        exportFileName: "Doughnut Chart",
                        exportEnabled: true,
                        animationEnabled: true,
                        title:{
                            text: ""
                        },
                        legend:{
                            cursor: "pointer",
                            itemclick: explodePie
                        },
                        data: [{
                            type: "doughnut",
                            innerRadius: 90,
                            showInLegend: true,
                            toolTipContent: "<b>{name}</b>: ${y} (#percent%)",
                            indexLabel: "{name} - #percent%",
                            dataPoints: [
                              <?php  
                               foreach($data_hotel as $value){
                                $hotel_type=$value->type; 
                                $y = $array[$value->type];
                                 ?>
                                 { y: <?php echo  $y; ?>, name: '<?php echo  $hotel_type; ?>' },
                                
                             <?php  } ?>
                               
                            ]
                        }]
                    });
                    chart.render();
                    
                    function explodePie (e) {
                        if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
                            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
                        } else {
                            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
                        }
                        e.chart.render();
                    }
                    
                    }
                </script>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
    
    });
    
</script>
@stop