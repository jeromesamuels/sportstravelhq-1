
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
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
     .invoice-details{
    
    margin-bottom: 25px;
    padding: 25px;
    border-bottom: 5px solid #95d1ea;
     }
     .left-section{
     	float:left;
     	width:30%;
     	text-align: right;

     }
     .right-section{
     	float:right;
     	width:60%;
     	
     }
     .btm-line{
     	margin-top: 53%;
        border-top: 5px solid #aba7a7;
        width: 100%;
     }
		</style>
	</head>
	<body>
      
		<div style="background-color: #eee;padding: 30px; width:75%;margin:50px auto;box-shadow: 0px 1px 3px 2px #ccc;min-height: 1000px">
		<img src="{{ asset('frontend/sportstravel/assets/images/logo.png') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" height="50" ><br />
		 <h2>Hi, {{ $rfp->hotel_manager }}</h2>
         <p>You have closed the trip  - #{{$rfp->rfp_id}}</p>
         <h4 class="invoice-details">The Invoice Details as Below </h4>
         
           <div class="sbox-content">
                
                @include('includes.alerts')

                <div class="row">
                	
                    <div class="left-section">
                            <h2>INVOICE</h2>
                            <div class="sbox-title">
                               
				                <h3> Invoice #{{$rfp->invoice_id}} </h3>
                                 <h3> IATA #11725383 </h3>
				            </div>
                            <h4 style="margin: 20px 0px 10px;">{{ $rfp->hotel_manager }}</h4>

                            <span><a href="{{ $rfp->email }}">{{ $rfp->email }}</a></span><br>
                             <span><b style="margin-top: 10px;">{{ $rfp->phone }}</b></span><br>
                        
                    </div>
                    
               
                 <div class="right-section">
               <div class="table-responsive">
                <table class="table trip-details" >

                    <tbody>
                       
                        <tr>
                            <td width='30%' class='label-view text-left'><b>Hotel Name :</b></td>
                            <td>{{ $hname }}</td>
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
					<p>Sincerely Your's</p>


					<h5>{{ $rfp->hotel_manager }}</h5>
				</div>
                </div>
                
              </div>
            </div>
        <br />
        <div class="btm-line">
        <p><a href="http://13.92.240.159/demo/public">http://13.92.240.159/demo/public</a></p>
		<p> Thank You. </p>
		</div>
	</div>
	</body>
</html>