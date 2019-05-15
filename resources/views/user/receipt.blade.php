
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
 
     .btm-line{
        margin-top: 30px;
        border-top: 5px solid #aba7a7;
       
     }
		</style>
	</head>
	<body>
      

           <div class="sbox-content">
                   <h2>INVOICE</h2>
                @include('includes.alerts')
              <div class="row">
                	
                    <div class="left-section">
				         <h3> Invoice #{{$rfp->invoice_id}} </h3>
                          <h4> IATA #11725383 </h4>
                    </div>
                    
               
                 <div class="right-section">
               <div class="table-responsive">
                <table class="table trip-details" >

                    <tbody>
                    
                         <tr>
                            <td width='30%' class='label-view text-left'><b>Hotel Manager :</b></td>
                            <td>   
                             <h4 style="margin: 20px 0px 0px;">{{ $rfp->hotel_manager }}</h4>
                             <span >Email:<a href="{{ $rfp->email }}"> {{ $rfp->email }}</a></span>
                             <span style="padding-left:15px;">Phone:<b > {{ $rfp->phone }}</b></span>
                            </td>
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
			
                </div>
                  <div class="btm-line">
              </div>
              
            </div>
     
		</div>
	</div>
	</body>
</html>