<div class="m-portlet__header" style="padding: 20px;">
	
      <?php
                        /*Get user id of sales manger*/
                          $user_lid = DB::table('rfps')->where('sales_manager', $rfp->sales_manager)->pluck('user_id');    
                                             
                          foreach($user_lid as $item) {
                            $user_id = $item;
                          } 
                        
                          /*Get hotel id of sales manger*/
                          $hotel_lid = DB::table('tb_users')->where('id', $user_id)->pluck('hotel_id');    
                                             
                          foreach($hotel_lid as $item1) {
                            $hotel_id = $item1;
                          }
                        
                        
                          /*Get hotel details of sales manger*/
                         
                           $hotel_details = DB::table('hotels')->select('name', 'address', 'property', 'rating')->where('id',$hotel_id)->first();    
                              
                             if ($hotel_details) {
		                        $name = $hotel_details->name;
		                        $address = $hotel_details->address;
		                        $property = $hotel_details->property;
		                        $rating = $hotel_details->rating;
                        
	                        } else {
	                        
	                        }  
                        
                        /*Get hotel Aminities of sales manger*/         
                         
                        
             ?>

	<div class="row">

		<div class="col-md-4">

			<i class="la la-angle-left"></i> Back

		</div>
		<div class="col-md-4" style="text-align: center;">

			<h5><?php echo  $name; ?></h5>
			<h4>{{ $rfp->queen_beedrooms + $rfp->king_beedrooms }} / room</h4>

		</div>
		<div class="col-md-4">

			<i class="la la-ellipsis-h pull-right" style="border-radius: 50%; background: darkslateblue; color: #FFF; padding: 10px; font-weight: bold;"></i>
		</div>

	</div>
	<div class="row">
        <div class="col-md-2">
		</div>
		<div class="col-md-8">
         <img alt="" src="../public/uploads/users/<?php echo $property; ?>"  class="img-responsive" width="100%"/>
		</div>
		<div class="col-md-2">
		</div>
	</div>		
</div>


<div class="m-portlet__body">
	<div class="m-portlet__body" >
       
    	<div class="alert alert-success text-left" role="alert" style="margin: 0 20px;">
			<i class="fa fa-check"></i> &nbsp;&nbsp;&nbsp; The hotel has responded with a proposal
		</div>

		<div style="text-align: left;padding: 20px;font-size: 16px;color: #2c2e2e;">
			<br />Hi  <br />Please see our hotel availability, rates and amenities below for your requested dates.<br />
		</div>

		<table class="rfp-detail" >
			<tr>
				<td><b>Destination: </b>{{ $rfp->destination }}</td>
				<td><b>Hotel Information: </b>{{ $rfp->hotel_information }}</td>
				<td><b>Distance to Event: </b>{{ $rfp->distance_event }} Miles</td>
				<td><b>Rate Offer: </b>${{ $rfp->offer_rate }}</td>
				<td><b>Hotel CC Authorization: </b>Supported</td>

				<td><b>Offer Good Until: </b>{{ \Carbon\Carbon::parse($rfp->offer_validity)->format('m/d/Y') }}</td>
				<td><b>Check In Date: </b>{{ \Carbon\Carbon::parse($rfp->check_in)->format('m/d/Y') }}</td>
				<td><b>Check Out Date: </b>{{ \Carbon\Carbon::parse($rfp->check_out)->format('m/d/Y') }}</td>

				<td><b>Sales Manager: </b>{{ $rfp->sales_manager }}</td>
				<td><b>King bedrooms: </b>{{ $rfp->king_beedrooms }}</td>
				<td><b>Queen Double bedroom: </b>{{ $rfp->queen_beedrooms }}</td>

				<td><b>Total # of Rooms: </b>{{ $rfp->queen_beedrooms + $rfp->king_beedrooms }}</td>
				<td><b>Requested Amenities: </b>Hot breakfast include in your rate, Refrigerator and microwave in all rooms, USB Ports in all the rooms (4 connections per room)</td>
			</tr>
		</table>

	</div>
</div>


<div class="rfp_footer" style="padding: 20px; background: #eae7ee;">
	<div class="row">
		<div class="col-md-4">
			<button data-toggle="modal" data-target="#confirm_decline" class="btn btn-default btn-secondary btn-md">Decline</button>
		</div>
		<div class="col-md-2">

		</div>
		<div class="col-md-6">
			<a href="javascript:void(0);" title="{{ $rfp->id }}" class="btn btn-default btn-secondary btn-md  btn-rfp-compare">Add to compare</a>
			<a href="javascript:void(0);" title="{{ $rfp->id }}" class="btn btn-default btn-secondary btn-md btn-rfp-save">Save</a>
			<button data-toggle="modal" data-target="#confirm_accept" title="{{ $rfp->id }}" class="btn btn-default btn-md">Accept</button>
		</div>		
	</div>

</div>



<!--begin::DeclineModal-->
<div class="modal fade" id="confirm_decline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5>Select a Reason</h5>

				<select id="decline_reason_select" name='decline_reason_select' rows='5' class='select2'>
				    <option value="">--Please select a reason for Declining--</option>
				    <option value="1">No availability for dates requested</option>
				    <option value="2">Budget too low</option>
				    <option value="3">To many Concessions</option>
				    <option value="4">Property under renovation</option>
				</select>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary btn-rfp-decline" title="{{ $rfp->id }}" >Submit</button>
			</div>
		</div>
	</div>
</div>


<!--begin::AcceptModal-->
<div class="modal fade" id="confirm_accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>You have clicked on the Accept proposal button and will now be sent to your hotel agreement, </p>
				<p>Are you sure you want to continue?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-primary btn-rfp-accept" title="{{ $rfp->id }}" >Yes</button>
			</div>
		</div>
	</div>
</div>



