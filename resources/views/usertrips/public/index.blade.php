
@if(Session::has('messagetext'))

<script type="text/javascript">
$(document).ready(function() {
    swal("Good job!", "{!! Session::get('messagetext') !!}", "success");
});
</script>

@endif






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
			<div class="m-portlet__body">
				<div class="tab-content">
					<div class="tab-pane active" id="m_widget4_tab1_content">
						<div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="400" style="height: 400px; overflow: hidden;">
							<div class="m-list-timeline m-list-timeline--skin-light">
								<div class="m-list-timeline__items">
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
										<span class="m-list-timeline__text">
										<b>12/26/18 - 12/29/18</b>
										<p>Concorde Fire U-13 Tampa Sunbowl</p>
										<p>3 RPFs Received</p>
										</span>
										<span class="m-list-timeline__time">Needs review</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
										<span class="m-list-timeline__text">
										<b>11/12/18 - 11/19/18</b>
										<p>Concorde Fire U-13 Tampa Sunbowl</p>
										<p>5 RPFs Received</p>
										</span>
										<span class="m-list-timeline__time">Approved</span>
									</div>
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
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
								<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
									<i class="la la-ellipsis-h m--font-brand"></i>
								</a>
								<div class="m-dropdown__wrapper" style="z-index: 101;">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21.5px;"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__section m-nav__section--first">
														<span class="m-nav__section-text">Quick Actions</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">Create Post</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-chat-1"></i>
															<span class="m-nav__link-text">Send Messages</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-multimedia-2"></i>
															<span class="m-nav__link-text">Upload File</span>
														</a>
													</li>
													<li class="m-nav__section">
														<span class="m-nav__section-text">Useful Links</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-info"></i>
															<span class="m-nav__link-text">FAQ</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-lifebuoy"></i>
															<span class="m-nav__link-text">Support</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit m--hide">
													</li>
													<li class="m-nav__item m--hide">
														<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">

				<!--begin: Datatable -->
				<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="">
	<table class="m-datatable__table" style="display: block; min-height: 300px; max-height: 380px;">
			<tbody class="m-datatable__body ps ps--active-x ps--active-y" style="max-height: 329px;">
				<tr data-row="10" class="m-datatable__row" style="left: 0px;">
					<td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check" data-field="RecordID">
						<span style="width: 40px;">
							<label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
								<input type="checkbox" value="187">&nbsp;
									<span></span>
								</label>
							</span>
						</td>
						<td class="m-datatable__cell--sorted m-datatable__cell" data-field="OrderID">
							<span style="width: 150px;">0093-2046 - PT</span>
						</td>
						<td data-field="ShipName" class="m-datatable__cell">
							<span style="width: 150px;">Russel, Harber and Hamill</span>
						</td>
						<td data-field="ShipDate" class="m-datatable__cell">
							<span style="width: 110px;">4/8/2018</span>
						</td>
						<td data-field="Actions" class="m-datatable__cell">
							<span style="overflow: visible; position: relative; width: 110px;">
								<div class="dropdown ">
									<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">
											<i class="la la-edit"></i> Edit Details
										</a>
										<a class="dropdown-item" href="#">
											<i class="la la-leaf"></i> Update Status
										</a>
										<a class="dropdown-item" href="#">
											<i class="la la-print"></i> Generate Report
										</a>
									</div>
								</div>
								<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
									<i class="la la-edit"></i>
								</a>
								<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
									<i class="la la-trash"></i>
								</a>
							</span>
						</td>
					</tr>
					<tr data-row="11" class="m-datatable__row m-datatable__row--even" style="left: 0px;">
						<td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check" data-field="RecordID">
							<span style="width: 40px;">
								<label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
									<input type="checkbox" value="304">&nbsp;
										<span></span>
									</label>
								</span>
							</td>
							<td class="m-datatable__cell--sorted m-datatable__cell" data-field="OrderID">
								<span style="width: 150px;">0093-3123 - ZA</span>
							</td>
							<td data-field="ShipName" class="m-datatable__cell">
								<span style="width: 150px;">Stehr-Bins</span>
							</td>
							<td data-field="ShipDate" class="m-datatable__cell">
								<span style="width: 110px;">8/20/2017</span>
							</td>
							<td data-field="Actions" class="m-datatable__cell">
								<span style="overflow: visible; position: relative; width: 110px;">
									<div class="dropdown ">
										<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
											<i class="la la-ellipsis-h"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">
												<i class="la la-edit"></i> Edit Details
											</a>
											<a class="dropdown-item" href="#">
												<i class="la la-leaf"></i> Update Status
											</a>
											<a class="dropdown-item" href="#">
												<i class="la la-print"></i> Generate Report
											</a>
										</div>
									</div>
									<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
										<i class="la la-edit"></i>
									</a>
									<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
										<i class="la la-trash"></i>
									</a>
								</span>
							</td>
						</tr>
						<tr data-row="12" class="m-datatable__row" style="left: 0px;">
							<td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check" data-field="RecordID">
								<span style="width: 40px;">
									<label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
										<input type="checkbox" value="26">&nbsp;
											<span></span>
										</label>
									</span>
								</td>
								<td class="m-datatable__cell--sorted m-datatable__cell" data-field="OrderID">
									<span style="width: 150px;">0093-5142 - CN</span>
								</td>
								<td data-field="ShipName" class="m-datatable__cell">
									<span style="width: 150px;">Romaguera-Greenholt</span>
								</td>
								<td data-field="ShipDate" class="m-datatable__cell">
									<span style="width: 110px;">3/6/2018</span>
								</td>
								<td data-field="Actions" class="m-datatable__cell">
									<span style="overflow: visible; position: relative; width: 110px;">
										<div class="dropdown ">
											<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
												<i class="la la-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">
													<i class="la la-edit"></i> Edit Details
												</a>
												<a class="dropdown-item" href="#">
													<i class="la la-leaf"></i> Update Status
												</a>
												<a class="dropdown-item" href="#">
													<i class="la la-print"></i> Generate Report
												</a>
											</div>
										</div>
										<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
											<i class="la la-edit"></i>
										</a>
										<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
											<i class="la la-trash"></i>
										</a>
									</span>
								</td>
							</tr>

							<div class="ps__rail-x" style="width: 786px; left: 0px; bottom: 0px;">
								<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 686px;"></div>
							</div>
							<div class="ps__rail-y" style="top: 0px; height: 329px; right: 0px;">
								<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 193px;"></div>
							</div>
						</tbody>
					</table>
				</div>

				<!--end: Datatable -->
			</div>
		</div>
	</div>
</div>





<div class="container" style="padding-top:25px;">	
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="container m-t">		
<div class="table-responsive">    
    <table class="table table-striped table-bordered">
        <thead>
			<tr>
				<th> No </th>
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')				
						<?php $limited = isset($t['limited']) ? $t['limited'] :''; ?>
						@if(SiteHelpers::filterColumn($limited ))
						
							<th>{{ $t['label'] }}</th>			
						@endif 
					@endif
				@endforeach
				<th>

				</th>
				
			  </tr>
        </thead>

        <tbody>        						
            @foreach ($rowData as $row)
                <tr>
				<td> {{ ++$i }}</td>									
				 @foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
					 	@if(SiteHelpers::filterColumn($limited ))
						 <td>					 
						 	{!! SiteHelpers::formatRows($row->{$field['field']},$field,$row) !!}						 
						 </td>
						@endif	
					 @endif					 
				 @endforeach
				 <td>
					<a href="?view={{ $row->id }}" oncl> <i class="fa fa-search"></i></a> 				
					
				</td>				 
                </tr>
				
            @endforeach
              
        </tbody>        

    </table>  
</div>  



</div> 