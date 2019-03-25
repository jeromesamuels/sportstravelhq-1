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
</style>

<div class="container">
<div class="page-content row">
    <div class="page-content-wrapper no-margin">

 
 
        <div class="sbox">
        	<section class="page-header row">
				 <h2>INVOICE</h2>
			</section>
        <?php 
        $record_exists = DB::table('invoices')->where('rfp_id', '=', $rfp->rfp_id)->first();
        if (is_null($record_exists)) {
        ?>
            <div class="sbox-content">
                
                @include('includes.alerts')

                <div class="row">
                	 <div class="col-sm-1">
                	 </div>
                    <div class="col-sm-3">
                            <div class="sbox-title">
				                <h1> Invoice #{{$rfp->invoice_id}} </h1>
				            </div>
                            <h5>{{ $rfp->hotel_manager }}</h5>

                            <span><a href="{{ $rfp->email }}">{{ $rfp->email }}</a></span><br>
                             <span><b>{{ $rfp->phone }}</b></span><br>
                        
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
					      <tr style="background: #95d1ea;">
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
				<div>
					<p>Thank you for your Trip, It's Pleasure to work with you.</p>
					<p>Sincearly Your's</p>
					<h6>{{ $rfp->hotel_manager }}</h6>
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
                            <div class="sbox-title">
				                <h1> Invoice #{{$record_exists->invoice_id}} </h1>
				            </div>
                            <h5>{{ $record_exists->hotel_manager }}</h5>

                            <span><a href="{{ $rfp->email }}">{{ $record_exists->email }}</a></span><br>
                             <span><b>{{ $record_exists->phone }}</b></span><br>
                        
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
					      <tr style="background: #95d1ea;">
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
				<div>
					<p>Thank you for your Trip, It's Pleasure to work with you.</p>
					<p>Sincearly Your's</p>
					<h6>{{ $record_exists->hotel_manager }}</h6>
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
