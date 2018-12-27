
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
		padding: 10px;
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
	}

	.m-portlet__body ul li h4 {
		position: absolute;right: 10px; top: 20px;
	}

	.rfp_footer {
		min-height: 100px;
		background: #DDD; 
	}

	.rfp_footer ul {
		list-style: none;
	}

	.m-portlet__body a {
		text-decoration: none;
		color: #333;
		display: inline-block;
		border-bottom: solid 1px #ddd;
		padding: 20px 0;
		width: 100%;
	}
	.m-portlet__body a:hover {
		background: #eee;
	}

	.rfp_footer ul li {
		float: left;
		font-weight: bold;
		min-width: 20%;
	}

	.rfp_footer ul li span {
		font-weight: normal;
	}


</style>


<script type="text/javascript">
	
	$(document).ready(function() {
		$(".planned-trips .planned-trip-content").on("click", function() {
			var id = $(this).attr("id");

			$('.m-portlet__body').html('<div class="m-spinner m-spinner--brand m-spinner--lg"></div>');

			var url = '{{ url("/RFPs/") }}' ;
			$.post(url + '/' + id, function(response) {

			    if(response.success)
			    {
			    	$('.m-portlet__body').html("");
			    	if(!response.rfps.length) 
				        $('.m-portlet__body').html("<ul><li><b>No RFP Records Found!</b></li></ul>");
			        $.each(response.rfps, function(k, res){
			            $('.m-portlet__body').append('<a href="?view=1"><ul><li><b>'+res.added+'</b></li><li><b>'+res.destination+'</b></li><li>'+res.hotel_information+'</li><li>conact: <br /><b>'+res.sales_manager+'</b></li><li><h4> $'+res.offer_rate+'/room </h4></li></ul></a>');
			        })
			    }
			}, 'json');
		});
	});

</script>

<div class="row">
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
					<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
								Filter
							</a>
						</li>
					</ul>
				</div>
			</div>



			<div class="">
				<div class="tab-content">
					<div class="tab-pane active" id="m_widget4_tab1_content">
						<div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="400" style="height: 400px; overflow: hidden;">
							<div class="m-list-timeline m-list-timeline--skin-light">
								<div class="planned-trips">
								@foreach ($rowData as $row)
									<!--{{ dump($row) }}-->
									<div class="planned-trip-content" id="{{ $row->id }}">
										<span class="planned-trip-heading">
										<b>{{ \Carbon\Carbon::parse($row->check_in)->format('d/m/Y')}} - {{ \Carbon\Carbon::parse($row->check_out)->format('d/m/Y')}}</b>
										<p>{{ $row->from_address_1 }} {{ $row->from_city }} {{ $row->from_zip }}</p>

										<p>3 RPFs Received</p>

										<i class="la la-ellipsis-h m--font-brand"></i>
										</span>

										<span class="planned-trip-action">Needs review </span>
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
			</div>
		</div>

		<!--end:: Widgets/Audit Log-->
	</div>

	<div class="col-xl-8">
		<div class="m-portlet m-portlet--mobile ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Received RFPs 3
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
					<li><span>Group Name </span><br />Concorde Fire</li>
					<li><span>Event Address </span><br />1320 Birkshire <br />Ave Tampa <br />FL 33213</li>
					<li><span>Budget </span><br />$89 - $120</li>
					<li><span>Check-In </span><br />12/26/18</li>
					<li><span>Total Rooms</span><br />10 DQ / 8 King</li>
				</ul>

			</div>

		</div>
	</div>
</div>



