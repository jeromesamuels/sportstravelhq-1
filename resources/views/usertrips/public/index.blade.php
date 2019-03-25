
@if(Session::has('messagetext'))

<script type="text/javascript">
$(document).ready(function() {
    swal("Good job!", "{!! Session::get('messagetext') !!}", "success");
});
</script>

@endif

<style type="text/css">
	.planned-trips .planned-trip-content {
		border-bottom: solid 1px #DDD;
		padding: 20px;
		position: relative;
	}
	.planned-trips .planned-trip-content:hover {
		background: #eee;
		cursor: pointer;
	}

	.planned-trips .planned-trip-content .planned-trip-action {
		position: absolute;
		right: 25px;
		bottom: 15px;
	}

	.planned-trips .planned-trip-content i {
	    position: absolute;
	    top: 15px;
	    right: 25px;
	    font-size: 20px;
	    font-weight: bold;
	    color: #333!important;
    }

	.m-portlet .m-portlet__body {
		text-align: center;
		min-height: 400px;
	}

	.m-portlet__body ul {
		list-style: none;
		-webkit-column-count: 2;
	    -moz-column-count: 2;
	    column-count: 2;
		position: relative;
	}

	.m-portlet__body ul li {
		text-align: left;
		float: left;
	}

	.m-portlet__body ul li h4 {
		position: absolute;right: 10px; top: 20px;
	}

	.rfp_footer {
		min-height: 100px;
		background: #5e6668; 
		color: #FFF;
		padding: 20px 0;
	}

	.rfp_footer ul {
		list-style: none;
	}

	.m-portlet__body table.rfp_detail tr {
		text-decoration: none;
		color: #333;
		display: inline-block;
		border-bottom: solid 1px #ddd;
		padding: 20px 0;
		width: 100%;
		text-align: left;
	}
	.m-portlet__body table.rfp_detail tr:hover {
		background: #eee;
		border-left: solid #18c942;
		margin-left: -6px;
	}
	.m-portlet__body table.rfp_detail tr td {
		padding: 0 20px;
	}

	.m-portlet__body table.rfp_detail tr .rfp_show_detail {
		cursor: pointer;
	}

	.rfp_footer ul li {
		float: left;
		font-weight: bold;
		width: 20%;
	}

	.rfp_footer ul li span {
		font-weight: normal;
	}

	.rfp-detail {
		text-align: left;
		padding: 10px;
		font-size: 14px;
		margin: 10px;
	}

	.rfp-detail tr td {
		padding: 10px;
		background: #ffffff;
		display: inline-block;
		width: 100%;
	}

	.rfp-detail tr td:nth-child(odd) {
		background: #f1f1f1;
	}

	.rfp-detail tr td:nth-child(even) {
	}

	.rfp-detail tr td b {
		min-width: 200px;
		display: inline-block;
	}

	.m-portlet-comparerfp table tr th, .m-portlet-comparerfp table tr td {
		padding: 5px 20px;
	    border-right: solid 1px #AAA;
	}

	.m-portlet-comparerfp table tr th {
		padding: 20px;
		background: #5e6668;
		color: #ffffff;
		font-weight: normal;
	}

	.m-portlet-comparerfp table tr th a { color: #ffffff; text-decoration: none; }

	.alert-success:not(.m-alert--outline) {
		background-color: #d2f5de;
		color: #434343;
	}

</style>


<script type="text/javascript">
	
	$(document).ready(function() {

		var rfp_ids = [];
		var rfp_ids_array = [];

		$(".planned-trips .planned-trip-content").on("click", function() {
			rfp_ids = [];
			var id = $(this).attr("id");

			$('.m-portlet__body').html('<div class="m-spinner m-spinner--brand m-spinner--lg"></div>');

			var url = '{{ url("/RFPs/") }}';
			$.post(url + '/' + id, function(response) {
			    if(response.success) 
			    	$('.received_rfps').html(response.view_data);
			}, 'json');
		});

		$(document).on("click", ".m-portlet__body .rfp_detail .rfp_show_detail", function() {
			var id = $(this).attr("id");

			$('.m-portlet__body').html('<div class="m-spinner m-spinner--brand m-spinner--lg"></div>');

			var url = '{{ url("/RFP/") }}';
			$.post(url + '/' + id, function(response) {
			    if(response.success) 
			    	$('.received_rfps').html(response.view_data);
			}, 'json');
		});

		
		$(document).on("click", ".compare_cb", function(e) {
			var rfp_id = $(this).val();
			var arr=[];
			if(rfp_id.includes(',')){
			arr = rfp_id.split(',');

			}else{
				arr[0] = rfp_id;
			}

			
			if($( this ).prop( "checked" )) {
				//if(rfp_id.includes(',')){
					$.each(arr,function(key,value){
						rfp_ids_array.push(value);
					})
					console.log(rfp_ids_array.length);
				
				$(".compare-rfp").removeClass('btn-secondary');
				$(".compare-rfp span").html('('+rfp_ids_array.length+')');

				rfp_ids = rfp_ids_array;
				
			} else {

				rfp_ids = jQuery.grep(rfp_ids, function(value) {
				  return value != rfp_id;
				});

				//console.log(rfp_ids);
				if(rfp_ids.length) {
					$(".compare-rfp").removeClass('btn-secondary');
					$(".compare-rfp span").html('('+rfp_ids.length+')');
				}
				else {
					$(".compare-rfp").addClass('btn-secondary');
					$(".compare-rfp span").html('rfp_ids_array.length');
				}
			}
		});
		

		$(document).on("click", ".m-portlet__header .compare-rfp", function() {
			//var id = $(this).attr("id");
          console.log(rfp_ids.length);
        
			if(rfp_ids.length>1) {
				$('.m-portlet__body').html('<div class="m-spinner m-spinner--brand m-spinner--lg"></div>');
				 console.log(rfp_ids);
                
				var url = '{{ url("/compareRFP/") }}';
				$.post(url + '/' + rfp_ids, function(response) {
				    if(response.success) 
				    	$('#main-page .container .compare-result').html(response.view_data);
				}, 'json');
				
			} else {
				alert("Please select atleast two proposals to compare.");
			}


		});


		$(document).on("click", ".btn-rfp-accept", function() {
			var id = $(this).attr("title");
			var url = '{{ url("/acceptRFP/") }}' + '/' + id;

			$.post(url, function(response) {
			    if(response.success) {
			    	alert(response.view_data);
			    	location.reload();
			    }
			}, 'json');

		});


		$(document).on("click", ".btn-rfp-decline", function() {

			var id = $(this).attr("title");
			
			var e = document.getElementById ("decline_reason_select");
			var reason = e.options [e.selectedIndex] .value;
			//alert(reason);
			var url = '{{ url("/declineRFP/") }}' + '/' + id + '/' + reason;

			$.post(url,'/' + reason, function(response) {
			    if(response.success) {
			    	alert(response.view_data);
			    	location.reload();
		    	}
			}, 'json');

		});

	});

</script>
<style>
.hide {
    display: none;
}
.dropdown{
	border: 1px solid #18c942;
    font-size: 16px;
    padding: 5px 20px;
    border-radius: 5px;
    color: #000;
}
.dropdown a{
	color: #000;
    text-decoration: none;
    font-size: 14px;
    border-bottom: 1px solid #eee;
}

</style>


<div class="row compare-result">
	<div class="col-md-12">
		<a href="{{ URL::to('/') }}" class="btn btn-default btn-md" style="margin: 0 40px 40px 0; padding: 10px 40px; font-size: 18px;">Book a Hotel</a>
		<br />
  	</div>


	<div class="col-xl-4">
		<!--begin:: Widgets/Audit Log-->
		<div class="m-portlet m-portlet--full-height ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Planned Trips
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">

				<ul class="m-portlet__nav">
					<!--<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
						<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
							Filter
						</a>

					</li>-->
					<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filter <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a id="Information_click" href="#">View All</a></li>
			             <li role="separator" class="divider"></li>
			            <li><a id="pending-link" href="#">Pending</a></li>
			             <li role="separator" class="divider"></li>
			            <li><a id="accept-link" href="#">Accept</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a id="decline-link" href="#">Decline</a></li>
			            <li role="separator" class="divider"></li>
			             
			          </ul>
			        </li>
				</ul>
				</div>
			</div>
			<script>
			$(document).ready(function() {
		    $("#Information_click").on('click', function() {
		        $("#pages .page:not('.hide')").stop().fadeOut('fast', function() {
		            $(this).addClass('hide');
		            $('#information').fadeIn('slow').removeClass('hide');
		        });
		    });
		    $("#pending-link").on('click', function() {
		        $("#pages .page:not('.hide')").stop().fadeOut('fast', function() {
		            $(this).addClass('hide');
		            $('#pending').fadeIn('slow').removeClass('hide');
		        });
		    });
		    $("#accept-link").on('click', function() {
		        $("#pages .page:not('.hide')").stop().fadeOut('fast', function() {
		            $(this).addClass('hide');
		            $('#accept').fadeIn('slow').removeClass('hide');
		        });
		    });
		    $("#decline-link").on('click', function() {
		        $("#pages .page:not('.hide')").stop().fadeOut('fast', function() {
		            $(this).addClass('hide');
		            $('#decline').fadeIn('slow').removeClass('hide');
		        });
		    });
		});
			</script>
			<div id="pages" >
				<div id="information" class="page"  >
					<div class="tab-pane active" id="m_widget4_tab1_content">
						<div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="400" style="height: 400px; overflow: hidden;">
							<div class="m-list-timeline m-list-timeline--skin-light">
								<div class="planned-trips">
								@foreach ($rowData as $row)
                                   <?php
												$trip_status = DB::table('rfps')->where('user_trip_id', $row->id)->pluck('status');
												foreach($trip_status as $item_new) {
												$trip_status_id = $item_new;
												}
												$rfp_id = DB::table('rfps')->where('user_trip_id', $row->id)->pluck('id');
	
												
                                ?>
									<div class="planned-trip-content" id="{{ $row->id }}">
											<span style="width: 40px;">
										    <?php $rfp_value='';
										    if($rfp_id->count() > 0){
										    foreach($rfp_id as $rfp) { 
										    	$rfp_value.= $rfp.",";	
										    } 
										    $rfp_value = rtrim($rfp_value,',');
										    ?>
										    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
												<input type="checkbox" class="compare_cb" name="compare_cb" value="{{ $rfp_value }}" />&nbsp;
												<span></span>
											</label>
										<?php } ?>
										</span>
										<span class="planned-trip-heading">
										<b>{{ \Carbon\Carbon::parse($row->check_in)->format('m/d/Y') }} - {{ \Carbon\Carbon::parse($row->check_out)->format('m/d/Y')}}</b>
										<p>{{ $row->from_address_1 }} {{ $row->from_city }} {{ $row->from_zip }}</p>
                                        
										<p>
											
										@if(isset($rfp_counts[$row->id]))
											{{ $rfp_counts[$row->id] }}
										
										@else 
											0
										@endif

										RFPs Received 
										</p>

										<i class="la la-ellipsis-h m--font-brand"></i>
										</span>

										<span class="planned-trip-action">Needs review  </span>
									</div>
								
                                   
								@endforeach

								</div>
							</div>
						<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 245px;"></div></div></div>
					</div>
					<div class="tab-pane" id="m_widget4_tab2_content">
					
					</div>
					<div class="tab-pane" id="m_widget4_tab3_content">
					</div>
				</div>
				<?php  
                foreach($rfp_id as $rfp) { 
				if($rfp != ''){?>
                   <div>
				    <div id="pending" class="page hide">
			        	<div class="tab-pane active" id="m_widget4_tab1_content">
						<div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="400" style="height: 400px; overflow: hidden;">
							<div class="m-list-timeline m-list-timeline--skin-light">
								<div class="planned-trips">
								@foreach ($rowData as $row)
									<?php
												$trip_status = DB::table('rfps')->where('user_trip_id', $row->id)->pluck('status');
												foreach($trip_status as $item_new) {
												$trip_status_id = $item_new;
												}
                                    if($trip_status_id== 1){
									?>
									<div class="planned-trip-content" id="{{ $row->id }}">
									
										<span class="planned-trip-heading">
										<b>{{ \Carbon\Carbon::parse($row->check_in)->format('m/d/Y') }} - {{ \Carbon\Carbon::parse($row->check_out)->format('m/d/Y')}}</b>
										<p>{{ $row->from_address_1 }} {{ $row->from_city }} {{ $row->from_zip }}</p>
										
										<p>
										@if(isset($rfp_counts[$row->id]))

											{{ $rfp_counts[$row->id] }}
										@else 
											0
										@endif

										RFPs Received 
										</p>

										<i class="la la-ellipsis-h m--font-brand"></i>
										</span>

										<span class="planned-trip-action">Needs review </span>
									</div>
								<?php } ?>

								@endforeach

								</div>
							</div>
						<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 245px;"></div></div></div>
					</div>
			    </div>
			    <div id="accept" class="page hide">
			        	<div class="tab-pane active" id="m_widget4_tab1_content">
						<div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="400" style="height: 400px; overflow: hidden;">
							<div class="m-list-timeline m-list-timeline--skin-light">
								<div class="planned-trips">
								@foreach ($rowData as $row)
									<?php
												$trip_status = DB::table('rfps')->where('user_trip_id', $row->id)->pluck('status');
												foreach($trip_status as $item_new) {
												$trip_status_id = $item_new;
												}
                                    if($trip_status_id== 2){
									?>
									<div class="planned-trip-content" id="{{ $row->id }}">
										
										<span class="planned-trip-heading">
										<b>{{ \Carbon\Carbon::parse($row->check_in)->format('m/d/Y') }} - {{ \Carbon\Carbon::parse($row->check_out)->format('m/d/Y')}}</b>
										<p>{{ $row->from_address_1 }} {{ $row->from_city }} {{ $row->from_zip }}</p>
										
										<p>
										@if(isset($rfp_counts[$row->id]))

											{{ $rfp_counts[$row->id] }}
										@else 
											0
										@endif

										RFPs Received 
										</p>

										<i class="la la-ellipsis-h m--font-brand"></i>
										</span>

										<span class="planned-trip-action">Needs review </span>
									</div>
								<?php } ?>

								@endforeach

								</div>
							</div>
						<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 245px;"></div></div></div>
					</div>
			    </div>
			    <div id="decline" class="page hide">
			    	  <div class="tab-pane active" id="m_widget4_tab1_content">
						<div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="400" style="height: 400px; overflow: hidden;">
							<div class="m-list-timeline m-list-timeline--skin-light">
								<div class="planned-trips">
								@foreach ($rowData as $row)
									<?php
												$trip_status = DB::table('rfps')->where('user_trip_id', $row->id)->pluck('status');
												foreach($trip_status as $item_new) {
												$trip_status_id = $item_new;
												}
                                   if($trip_status_id== 3){
									?>
									<div class="planned-trip-content" id="{{ $row->id }}">
											
										<span class="planned-trip-heading">
										<b>{{ \Carbon\Carbon::parse($row->check_in)->format('m/d/Y') }} - {{ \Carbon\Carbon::parse($row->check_out)->format('m/d/Y')}}</b>
										<p>{{ $row->from_address_1 }} {{ $row->from_city }} {{ $row->from_zip }}</p>
										
										<p>
										@if(isset($rfp_counts[$row->id]))

											{{ $rfp_counts[$row->id] }}
										@else 
											0
										@endif

										RFPs Received 
										</p>

										<i class="la la-ellipsis-h m--font-brand"></i>
										</span>

										<span class="planned-trip-action">Needs review </span>
									</div>
								<?php } ?>

								@endforeach

								</div>
							</div>
						<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 245px;"></div></div></div>
					</div>
			    </div>

			</div>
		<?php } else{
			echo "No more Record for this trip";
		}
	} ?>

			</div>
		</div>

		<!--end:: Widgets/Audit Log-->
	</div>

	<div class="col-xl-8">
		<div class="m-portlet m-portlet--mobile received_rfps">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Received RFPs&nbsp;<span id="rfp_count_header"></span>
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">

				</div>
			</div>
			<div class="m-portlet__body">
				<!--begin: Datatable -->
				<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="">
				</div>
				<!--end: Datatable -->
			</div>

			<div class="rfp_footer">
				<ul>
					<li>
						<span>Group Name </span>
						<br />
						<p id="rfp_footer_group"> </p>
					</li>
					<li>
						<span>Event Address </span>
						<br />
						<p id="rfp_footer_address"> </p>
					</li>
					<li>
						<span>Budget </span>
						<br />
						<p id="rfp_footer_budget"> </p>
					</li>
					<li>
						<span>Check-In </span>
						<br />
						<p id="rfp_footer_checkin"> </p>
					</li>
					<li>
						<span>Total Rooms</span>
						<br />
						<p id="rfp_footer_rooms"> </p>
					</li>
				</ul>

			</div>

		</div>
	</div>


</div>



