@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row" style="margin-top: 30px;">
    <h1>Dashboard </h1><span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Invoices </span>
</section>

       
<div class="page-content row">
	<div class="page-content-wrapper no-margin">
<div class="sbox" style="border-top: none">
    <div class="sbox-content dashboard-container">
       
        <div class="row" style="border-bottom:1px solid #eee;">
            <h2 style="padding-bottom: 20px;">Invoice Overview</h2>
        </div>
        <div class="row" >
            <div class="col-md-6" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h5 style="font-size: 18px;">${{ $purchases_due }} <span style="font-size: 14px;font-weight: normal;">Last 365 Days</span></h5>
                </div>

                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:78%;height: 6px;background-color: #f4516c;">
                    </div>
                </div>
                 <h4 style="float: left;" >Overdue</h4>
                <p style="float: right;">${{ $purchases_due }} </p>
              
            </div>
            <div class="col-md-6" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                  
                    <h5 style="font-size: 18px;">${{ $purchases }}<span style="font-size: 14px;font-weight: normal;"> Paid This Month</span></h5>
                </div> 
                
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:84%;height: 6px;background-color: #44c8f5;">
                    </div>
                </div>
                <h4 style="float: left;" >Deposited</h4>
                <p style="float: right;">${{ $purchases }}</p>
                
            </div>
        
        </div>
    </div>
</div>
		<div class="sbox">
			<div class="sbox-title">
				<h1> All Records <small> </small></h1>
				<div class="sbox-tools">
					@if(Session::get('gid') ==1 )
						<a href="{{ url($pageModule) }}" class="tips btn btn-sm  " title=" {{ __('core.btn_reload') }}" ><i class="fa  fa-refresh"></i></a>
						<a href="{{ url('sximo/module/config/'.$pageModule) }}" class="tips btn btn-sm  " title=" {{ __('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
					@endif 	
				</div>				
			</div>
			<div class="sbox-content">
			<!-- Toolbar Top -->
			<div class="row">
				<div class="col-md-4"> 	
					@if($access['is_add'] ==1)
					<a href="{{ url('invoices/create?return='.$return) }}" class="btn btn-default btn-sm"  
						title="{{ __('core.btn_create') }}"><i class=" fa fa-plus "></i> Create New </a>
					@endif

					<div class="btn-group">
						<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-menu5"></i> Bulk Action </button>
				        <ul class="dropdown-menu">
				         @if($access['is_excel'] ==1)
							<li><a href="{{ url( $pageModule .'/export?do=excel&return='.$return) }}"><i class="fa fa-download"></i> Export CSV </a></li>	
						@endif
						@if($access['is_add'] ==1)
							<li><a href="{{ url($pageModule .'/import?return='.$return) }}" onclick="SximoModal(this.href, 'Import CSV'); return false;"><i class="fa fa-cloud-upload"></i> Import CSV</a></li>
							<li><a href="javascript://ajax" class=" copy " title="Copy" ><i class="fa fa-copy"></i> Copy selected</a></li>
						@endif	
							<li><a href="{{ url($pageModule) }}"  ><i class="fa fa-times"></i> Clear Search </a></li>
				          	<li role="separator" class="divider"></li>
				         @if($access['is_remove'] ==1)
							 <li><a href="javascript://ajax"  onclick="SximoDelete();" class="tips" title="{{ __('core.btn_remove') }}"><i class="fa fa-trash-o"></i>
							Remove Selected </a></li>
						@endif 
						 <li><a href="#myModal" class="tips multiple_invoices" id="custId_new" data-toggle="modal" data-id="" title="" ><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Email </a> </li>

				          
				        </ul>
				    </div>    
				</div>
				<div class="col-md-8 pull-right">
					<div class="input-group">
					      <div class="input-group-btn">
					        <button type="button" class="btn btn-default btn-sm " 
					        onclick="SximoModal('{{ url($pageModule."/search") }}','Advance Search'); " ><i class="fa fa-filter"></i> Filter </button>
					      </div><!-- /btn-group -->
					      <input type="text" class="form-control input-sm onsearch" data-target="{{ url($pageModule) }}" aria-label="..." placeholder=" Type And Hit Enter ">
					    </div>
				</div>    
			</div>					
			<!-- End Toolbar Top -->

			<!-- Table Grid -->
			
			<div class="table-responsive" >
 			{!! Form::open(array('url'=>'invoices?'.$return, 'class'=>'form-horizontal m-t' ,'id' =>'SximoTable' )) !!}
			
		    <table class="table  table-hover " id="{{ $pageModule }}Table">
		        <thead>
					<tr style="border-bottom-style: dashed;border-color: #eee;">
						<th style="width: 3% !important;" class="number"> No </th>
						<th  style="width: 3% !important;"> 
							<input type="checkbox" class="checkall minimal-green" /></th>
						<th style="width: 7% !important;" class="number">Date Created </th>
						<th style="width: 7% !important;" class="number"> Date Modified  </th>
						<th style="width: 7% !important;" class="number">Hotel Type </th>
						<th style="width: 7% !important;" class="number">Commission Amount %</th>
						@foreach ($tableGrid as $t)
						<?php 
                         //dd($tableGrid);
						?>
							@if($t['view'] =='1')	

								<?php $limited = isset($t['limited']) ? $t['limited'] :''; 
								
								if(SiteHelpers::filterColumn($limited ))
								{
									$addClass='class="tbl-sorting" ';
									if($insort ==$t['field'])
									{
										$dir_order = ($inorder =='desc' ? 'sort-desc' : 'sort-desc'); 
										$addClass='class="tbl-sorting '.$dir_order.'" ';
									}
									echo '<th align="'.$t['align'].'" '.$addClass.' width="'.$t['width'].'">'.\SiteHelpers::activeLang($t['label'],(isset($t['language'])? $t['language'] : array())).'</th>';				
								} 
								?>
							@endif
						@endforeach

						<th  style="width: 10% !important;"></th>
						
					  </tr>
		        </thead>
             
		        <tbody>        						
		            @foreach ($rowData as $row)
		           <?php 
		           
		            	$hotel_id=$user->hotel_id;
		          
                    if($row->hotel_name==$hotel_id){

					?>
		                <tr style="border-bottom-style: dashed;border-color: #eee;">
							<td> {{ ++$i }} </td>
							<td ><input type="checkbox" class="ids minimal-green send_invoices" name="ids[]" value="{{ $row->id }}" />  </td>
							<td > {{ $row->created_at }} </td>
							<td > {{ $row->updated_at }} </td>	
							<td > {{ $hotel_type_new }} </td>	
							<td > {{ $row->commissoin_rate }} </td>			
						 @foreach ($tableGrid as $field)
							 @if($field['view'] =='1')

							 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
							 	@if(SiteHelpers::filterColumn($limited ))
							 	 <?php $addClass= ($insort ==$field['field'] ? 'class="tbl-sorting-active" ' : ''); ?>
								 <td align="{{ $field['align'] }}" width=" {{ $field['width'] }}"  {!! $addClass !!} >					 
								 	{!! SiteHelpers::formatRows($row->{$field['field']},$field ,$row ) !!}						 
								 </td>
								@endif	
							 @endif					 
						 @endforeach

							<td>
                       
	                           <div class="dropdown trips-dropdown">
	                   
			                    <a href="#" style="color: #5dbbe0;font-weight: bold;font-size: 14px;" class="dropdown-toggle" data-toggle="dropdown">Invoice <i class="fa fa-chevron-down" aria-hidden="true" style="color: #000;padding-top: 5px;"></i></a>
			                    <ul class="dropdown-menu">
			                    <li ><a href="{{ url('invoices/'.$row->id.'/edit?return='.$return) }}" class="btn btn-light " title="{{ __('core.btn_edit') }}"> View Details </a></li>
			                     @if($row->invoice_file!=='')
			                    <li ><a href="uploads/users/{{ $row->invoice_file }}" class="btn btn-light " title="{{ __('core.btn_edit') }}" target="_blank">  Invoice File </a>
			                    </li>
			                    @else
			                    <li ><button href="uploads/users/{{ $row->invoice_file }}" class="btn btn-light  " title="{{ __('core.btn_edit') }}" target="_blank" style="padding: 10px 0;text-align: center;margin: 0 auto;display: block;" disabled>  Invoice File </button></li>
			                    @endif
				                </ul>

				              </div>

							</td>	
							
		                </tr>
						<?php 
                        }
						elseif(session('level')==1 || session('level')==2){ ?>
						    <tr style="border-bottom-style: dashed;border-color: #eee;">
							<td> {{ ++$i }} </td>
							<td ><input type="checkbox" class="ids minimal-green send_invoices" name="ids[]" value="{{ $row->id }}" />  </td>
							<td > {{ $row->created_at }} </td>
							<td > {{ $row->updated_at }} </td>	
							<td > {{ $row->hotel_type }} </td>	
							<td > {{ $row->commissoin_rate }} </td>			
						 @foreach ($tableGrid as $field)
							 @if($field['view'] =='1')

							 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
							 	@if(SiteHelpers::filterColumn($limited ))
							 	 <?php $addClass= ($insort ==$field['field'] ? 'class="tbl-sorting-active" ' : ''); ?>
								 <td align="{{ $field['align'] }}" width=" {{ $field['width'] }}"  {!! $addClass !!} >					 
								 	{!! SiteHelpers::formatRows($row->{$field['field']},$field ,$row ) !!}						 
								 </td>
								@endif	
							 @endif					 
						 @endforeach

							<td>
                              <div class="dropdown trips-dropdown">
	                   
			                    <a href="#" style="color: #5dbbe0;font-weight: bold;font-size: 14px;" class="dropdown-toggle" data-toggle="dropdown">Invoice <i class="fa fa-chevron-down" aria-hidden="true" style="color: #000;padding-top: 5px;"></i></a>
			                    <ul class="dropdown-menu">
			                    <li ><a href="{{ url('invoices/'.$row->id.'/edit?return='.$return) }}" class="btn btn-light " title="{{ __('core.btn_edit') }}"> View Details </a></li>
			                     @if($row->invoice_file!=='')
			                    <li ><a href="uploads/users/{{ $row->invoice_file }}" class="btn btn-light " title="{{ __('core.btn_edit') }}" target="_blank">  Invoice File </a>
			                    </li>
			                    @else
			                    <li ><button href="uploads/users/{{ $row->invoice_file }}" class="btn btn-light  " title="{{ __('core.btn_edit') }}" target="_blank" style="padding: 10px 0;text-align: center;margin: 0 auto;display: block;" disabled>  Invoice File </button></li>
			                    @endif
				                </ul>

				              </div>

							</td>	
							
		                </tr>
		               <?php } else{ 
                         if($row->hotel_type==$user->type){
		               	?>
                               <tr style="border-bottom-style: dashed;border-color: #eee;">
							<td> {{ ++$i }} </td>
							<td ><input type="checkbox" class="ids minimal-green send_invoices" name="ids[]" value="{{ $row->id }}" />  </td>
							<td > {{ $row->created_at }} </td>
							<td > {{ $row->updated_at }} </td>	
							<td > {{ $user->type }} </td>	
							<td > {{ $row->commissoin_rate }} </td>			
						 @foreach ($tableGrid as $field)
							 @if($field['view'] =='1')

							 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
							 	@if(SiteHelpers::filterColumn($limited ))
							 	 <?php $addClass= ($insort ==$field['field'] ? 'class="tbl-sorting-active" ' : ''); ?>
								 <td align="{{ $field['align'] }}" width=" {{ $field['width'] }}"  {!! $addClass !!} >					 
								 	{!! SiteHelpers::formatRows($row->{$field['field']},$field ,$row ) !!}						 
								 </td>
								@endif	
							 @endif					 
						 @endforeach

							<td>
                       
	                           <div class="dropdown trips-dropdown">
	                   
			                    <a href="#" style="color: #5dbbe0;font-weight: bold;font-size: 14px;" class="dropdown-toggle" data-toggle="dropdown">Invoice <i class="fa fa-chevron-down" aria-hidden="true" style="color: #000;padding-top: 5px;"></i></a>
			                    <ul class="dropdown-menu">
			                    <li ><a href="{{ url('invoices/'.$row->id.'/edit?return='.$return) }}" class="btn btn-light " title="{{ __('core.btn_edit') }}"> View Details </a></li>
			                     @if($row->invoice_file!=='')
			                    <li ><a href="uploads/users/{{ $row->invoice_file }}" class="btn btn-light " title="{{ __('core.btn_edit') }}" target="_blank">  Invoice File </a>
			                    </li>
			                    @else
			                    <li ><button href="uploads/users/{{ $row->invoice_file }}" class="btn btn-light  " title="{{ __('core.btn_edit') }}" target="_blank" style="padding: 10px 0;text-align: center;margin: 0 auto;display: block;" disabled>  Invoice File </button></li>
			                    @endif
				                </ul>

				              </div>

							</td>	
							
		                </tr>

		               <?php }
                             }
		               ?>
						
		            @endforeach
		              
		        </tbody>
		      
		    </table>
			<input type="hidden" name="action_task" value="" />
			
			{!! Form::close() !!}
			@include('footer')
			</div>
			<!-- End Table Grid -->


			</div>
		</div>
<script>

     $(document).ready(function() {
        $(".multiple_invoices").click(function(){
            var invoices = [];
            $.each($("input[name='ids[]']:checked"), function(){            
                invoices.push($(this).val());
            });
            console.log("invoice_ids " + invoices);
            console.log(invoices.length);
           document.getElementById('invoice_id').value = invoices;
            if(invoices.length>=1) {
          
            } else {
                alert("Please select the Invoices!!");
                  window.location.reload();
            }

        });
    });
    </script>
 <div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
    <div class="sbox-content dashboard-container" style=" padding: 0;">
        <div class="row">
            <div class="col-md-4">
                <div class="widget-box box-shadow" style=" margin: 0;background: #5dbbe0;padding: 20px;">
                    <div class="head">
                        <h3 style="color:#fff;">Revenue</h3>                        
                    </div><br />
                    
                    <div class="body">
                       <h1 style="color:#fff;font-size: 40px;">${{ $purchases_all }}</h1>
                       <p style="color:#fff;">Total Revenue this month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3>Booking</h3>
                    </div><br />
                    
                    <div class="body">
                           <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data_trips)}}</h1>
                       <p>Total Booking this month</p>
                    </div>
                </div>
            </div>
              <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3 >Clients</h3>
                    </div><br />
                    <div class="body">
                           <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($client)}}</h1>
                       <p>Total Customers</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send a Invoice</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('invoices.multipleInvoice') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="invoice_id"  id="invoice_id" value="">
                 
                    <div class="form-group">
                        <label>Enter Email Address </label>
                        <input type="text" class="form-control" name="email" id="email" required="">
                    </div>


                    <div class="form-group text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="upload_invoice" title="">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
	$('.copy').click(function() {
		var total = $('input[class="ids[]"]:checkbox:checked').length;

		if(confirm('are u sure Copy selected rows ?'))
		{
			$('input[name="action_task"]').val('copy');
			$('#SximoTable').submit();// do the rest here	
		}
	})	
	
});	
</script>	
	
@stop
