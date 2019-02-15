<div class="m-portlet__header" style="padding: 20px;">
	<div class="row">

		<div class="col-md-7">
			Received RFPs&nbsp;<span id="rfp_count_header"># {{ count($rfps) }}</span>
		</div>

		<div class="col-md-3">
			<a href="#" class="btn btn-default btn-secondary btn-md compare-rfp">Compare <span></span> </a>
			&nbsp;&nbsp;&nbsp;
			<i class="la la-ellipsis-h "></i>
		</div>

		<div class="col-md-2">
			<a href="#" class="m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
				Filter
			</a>
		</div>

	</div>
</div>


<div class="m-portlet__body">
	<div class="m-portlet__body">

		<table class="rfp_detail" >
     
		@foreach ($rfps as $rfp)
		<tr>
			<td>
				<span style="width: 40px;">
				<label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
					<input type="checkbox" class="compare_cb" name="compare_cb" value="{{ $rfp->id }}" />&nbsp;
					<span></span>
				</label></span>
			</td>

			<td width="45%">
				<b>{{ $rfp->added }}</b><br />
				<b>{{ $rfp->destination }}</b><br />
				<i class="fa fa-map-marker-alt"></i> {{ $rfp->hotel_information }}
			</td>
			<td>conact: <br><b>{{ $rfp->sales_manager }}</b></td>
			<td><h4> ${{ $rfp->offer_rate }}/room </h4></td>
			<td class="rfp_show_detail" id="{{ $rfp->id }}"><i class="la la-angle-right"></i></td>
		</tr>
		@endforeach

		</table>

	</div>
</div>


<div class="rfp_footer">
	<ul>
		<li>
			<span>Group Name </span>
			<br>
			<p>{{ $trip_detail->trip_name }}</p>
		</li>
		<li>
			<span>Event Address </span>
			<br>
			<p>
				{{ $trip_detail->from_address_1 }}<br />
				{{ $trip_detail->from_city }}<br />
				{{ $trip_detail->from_zip }}
			</p>
		</li>
		<li>
			<span>Budget </span>
			<br>
			<p>${{ $trip_detail->budget_from }} - ${{ $trip_detail->budget_to }}</p>
		</li>
		<li>
			<span>Check-In </span>
			<br>
			<p>{{ \Carbon\Carbon::parse($trip_detail->check_in)->format('m/d/Y') }}</p>
		</li>
		<li>
			<span>Total Rooms</span>
			<br>
			<p>{{ $trip_detail->double_queen_qty }} DQ / {{ $trip_detail->double_king_qty }} King</p>
		</li>
	</ul>

</div>

