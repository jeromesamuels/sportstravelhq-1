@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<style>
	
.trip-details tbody tr td, .trip-details tbody tr th {
    padding: 6px;
    border-top: 0;
    border-bottom: 0;
}
.sbox-title{
    padding: 10px 0px 10px;
}
.page-header {
    margin-top: 0px;
    margin-bottom: 25px;
    padding: 5px 25px;
    border-bottom: 5px solid #95d1ea;
}
.sbox-content{
      border-bottom: 5px solid #eee;  
}
.table-bordered thead tr th,.table-bordered tbody tr td, .table-bordered tbody tr th{
    padding: 10px;
    border: 1px solid #080707;
}

</style>

<div class="container">
<div class="page-content row">
    <div class="page-content-wrapper no-margin">

          
 
        <div class="sbox">
        	<section class="page-header row">
                <a href="{{ URL::to('/hotelmanager/trips') }}"><img src="http://13.92.240.159/demo/public/uploads/images/invoice-logo.jpg" title="Sports Travel HQ" alt="Sports Travel HQ" height="70" class="invoice-logo"></a>
				 
			</section>
        <?php 
          

        if (is_null($record_exists)) {
        ?>
            <div class="sbox-content">
                
                @include('includes.alerts')

                <div class="row">
                	 <div class="col-sm-1">
                	 </div>
                    <div class="col-sm-3">
                            <h2>INVOICE</h2>
                            <div class="sbox-title">
                               
				                <h1> Invoice #{{$rfp->invoice_id}} </h1>
                                 <h1> IATA # {{$IATA_number}} </h1>
				            </div>
                            <h5 style="margin: 20px 0px 10px;">{{ $rfp->hotel_manager }}</h5>

                            <span><a href="{{ $rfp->email }}">{{ $rfp->email }}</a></span><br>
                             <span><b style="margin-top: 10px;">{{ $rfp->phone }}</b></span><br>
                        
                    </div>
                    
               
                 <div class="col-sm-7">
               <div class="table-responsive">
                <table class="table trip-details" >

                    <tbody>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Trip Name :</b></td>
                            <td>{{ $rfp->trip_name }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Trip Address :</b></td>
                            <td>{{ $rfp->trip_address }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Hotel Name :</b></td>
                            <td>{{ $rfp->hotel_name }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Destination :</b></td>
                            <td>{{ $rfp->hotel_add }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Check In Date :</b></td>
                            <td>{{ $rfp->check_in }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Check Out Date :</b></td>
                            <td>{{ $rfp->check_out }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Total Room :</b></td>
                            <td>{{ $rfp->total_room }}</td>
                        </tr>
                         <tr>
                            <td width='30%' class='label-view text-left'><b>Actualized Room :</b></td>
                            <td>{{ $rfp->actualized_room_count	 }}</td>
                        </tr>
                         <tr>
                            <td width='30%' class='label-view text-left'><b>Actualized Amount :</b></td>
                            <td>{{ $rfp->amt_paid }}</td>
                        </tr>
                         <tr>
                            <td width='30%' class='label-view text-left'><b>Total Room Amount :</b></td>
                            <td>{{  $rfp->actualized_room_count * $rfp->room_rate }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                  <table class="table table-bordered" >
					    <thead>
					      <tr style="background: #124052;color: #fff;">
					        <th>Description</th>
					        <th>Rooms</th>
					        <th>Revenue(Room Rate)</th>
					        <th>Rate(Commissoin in %)</th>
					      
					      </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    	$room_rate=$rfp->room_rate * $rfp->actualized_room_count;
                            $room_total=($room_rate * ($rfp->commissoin_rate/100));
					    	?>
					      <tr>
					        <td>{{ $rfp->trip_name }}</td>
					        <td>{{ $rfp->actualized_room_count	 }}</td>
					        <td>{{ $rfp->room_rate }}</td>
					        <td>{{ $rfp->commissoin_rate }}</td>
					       
					      </tr>
                          <tr><td colspan="4"></td></tr>
					      <tr>
					      	<td colspan="3" style="text-align: right;"><b>Total Amount Due</b></td>
                            <td>{{ $room_total }}$</td>
					      </tr>
                     
					     
					    </tbody>
					</table>
				</div>
				<div style="margin: 20px;font-size: 14px;">
					<p>Thank you for your Trip, It's Pleasure to work with you.</p>
					<p>Sincearly Your's</p>
					<h5>{{ $rfp->hotel_manager }}</h5>
				</div>
                </div>
                 <div class="col-sm-1">
                  </div>
              </div>
            </div>
        <?php } 
        else{
        
        	?>

                <div class="sbox-content">
                
                @include('includes.alerts')

                <div class="row">
                	 <div class="col-sm-1">
                	 </div>
                   
                    <div class="col-sm-3">
                          <h2>INVOICE</h2>
                            <div class="sbox-title">

				                <h1> Invoice # {{$record_exists->invoice_id}} </h1>
                                 <h1> IATA # {{$IATA_number}} </h1>
				            </div>
                            <h5 style="margin: 20px 0px 10px;">{{ $record_exists->hotel_manager }}</h5>

                            <span><a href="{{ $rfp->email }}">{{ $record_exists->email }}</a></span><br>
                             <span><b style="margin-top: 10px;">{{ $record_exists->phone }}</b></span><br>
                        
                    </div>
                    
               
                 <div class="col-sm-7">
               <div class="table-responsive">
                <table class="table trip-details" >

                    <tbody>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Trip Name :</b></td>
                            <td>{{ $record_exists->trip_name }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Trip Address :</b></td>
                            <td>{{ $record_exists->trip_address }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Hotel Name :</b></td>
                            <td>{{ $record_exists->hotel_name }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Destination :</b></td>
                            <td>{{ $record_exists->hotel_add }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Check In Date :</b></td>
                            <td>{{ $record_exists->check_in }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Check Out Date :</b></td>
                            <td>{{ $record_exists->check_out }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Total Room :</b></td>
                            <td>{{ $record_exists->total_room }}</td>
                        </tr>
                         <tr>
                            <td width='30%' class='label-view text-left'><b>Actualized Room :</b></td>
                            <td>{{ $record_exists->actualized_room_count	 }}</td>
                        </tr>
                         <tr>
                            <td width='30%' class='label-view text-left'><b>Actualized Amount :</b></td>
                            <td>{{ $record_exists->amt_paid }}</td>
                        </tr>
                         <tr>
                            <td width='30%' class='label-view text-left'><b>Total Room Amount :</b></td>
                            <td>{{  $record_exists->actualized_room_count * $record_exists->room_rate }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                  <table class="table table-bordered" >
					    <thead>
					      <tr style="background: #124052;color: #fff;">
					        <th>Description</th>
					        <th>Rooms</th>
					        <th>Revenue(Room Rate)</th>
					        <th>Rate(Commissoin in %)</th>
					      
					      </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    	$room_rate=$record_exists->room_rate * $record_exists->actualized_room_count;
                            $room_total=($room_rate * ($record_exists->commissoin_rate/100));
					    	?>
					      <tr>
					        <td>{{ $record_exists->trip_name }}</td>
					        <td>{{ $record_exists->actualized_room_count	 }}</td>
					        <td>{{ $record_exists->room_rate }}</td>
					        <td>{{ $record_exists->commissoin_rate }}</td>
					       
					      </tr>
                          <tr><td colspan="4"></td></tr>
					      <tr>
					      	<td colspan="3" style="text-align: right;"><b>Total Amount Due</b></td>
                            <td>{{ $room_total }}$</td>
					      </tr>
                     
					     
					    </tbody>
					</table>
				</div>
				<div style="margin: 20px;font-size: 14px;">
					<p>Thank you for your Trip, It's Pleasure to work with you.</p>
					<p>Sincearly Your's</p>
					<h5>{{ $record_exists->hotel_manager }}</h5>
				</div>
                </div>
                 <div class="col-sm-1">
                  </div>
              </div>
            </div>
        <?php } ?>

        </div>
    </div>
</div>
</div>






@stop
