@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row" style="margin-top: 30px;">
    <h1>Dashboard </h1><span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Invoices </span>
</section>
<!-- <section class="page-header row">
	<h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
	<ol class="breadcrumb">
		<li><a href="{{ url('') }}"> Dashboard </a></li>
		<li class="active"> {{ $pageTitle }} </li>		
	</ol>
</section> -->
       <?php 
           $currentMonth = date('m');
        /*Amount Paid*/
           $purchases = DB::table('invoices')->whereRaw('MONTH(check_out) = ?',[$currentMonth])->sum('invoices.amt_paid');    
              
           /* pending amount*/
            $purchases_due = DB::table('invoices')->sum('invoices.est_amt_due');    
            
                 //$revenu_due=$sum_new-$sum_due;

            ?>
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
						<th  style="width: 3% !important;"> <input type="checkbox" class="checkall minimal-green" /></th>
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
										$dir_order = ($inorder =='desc' ? 'sort-desc' : 'sort-asc'); 
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
		            //echo $row->hotel_name;
		            $hotel_type = DB::table('hotels')->where('name', $row->hotel_name)->pluck('type');
					foreach($hotel_type as $item_new) {
					 $hotel_type_new = $item_new;
					}

					   /* $room_rate=$row->room_rate * $row->actualized_room_count;
                        $room_total=($room_rate * ($row->commissoin_rate/100));*/
					    	
					?>
					<?php


					/*include '../config/fpdf.php';

					$image = dirname(__FILE__).DIRECTORY_SEPARATOR.$row->invoice_file;
					$pdf = new FPDF();
					$pdf->AddPage();
					$pdf->Image($image,20,40,170,170);
					echo $pdf->Output();
					die;*/
					?>
		                <tr style="border-bottom-style: dashed;border-color: #eee;">
							<td> {{ ++$i }} </td>
							<td ><input type="checkbox" class="ids minimal-green" name="ids[]" value="{{ $row->id }}" />  </td>
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
                             @if($row->invoice_file=='')
							 	<div class="dropdown">
									<a href="{{ url('invoices/'.$row->id.'/edit?return='.$return) }}" class="btn btn-primary btn-xs " title="{{ __('core.btn_edit') }}"> View Details </a>

								</div>
                             @else
                               <div class="dropdown">
									<a href="uploads/users/{{ $row->invoice_file }}" class="btn btn-info btn-xs " title="{{ __('core.btn_edit') }}" target="_blank"> View Invoice </a>

									<!-- <a download="{{$row->invoice_file}}" href="/uploads/users/" title="Invoice Download">
									    <img alt="Invoice Download" src="/uploads/users/">
									</a>
 -->
								</div>
                           @endif

							</td>	
							
		                </tr>
						
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

 <div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
    <div class="sbox-content dashboard-container" style=" padding: 0;">
        <div class="row">
            <div class="col-md-4">
                <div class="widget-box box-shadow" style=" margin: 0;background: #5dbbe0;padding: 20px;">
                    <div class="head">
                        <h3 style="color:#fff;">Revenue</h3>                        
                    </div><br />
                    <?php 
                    $purchases = DB::table('invoices')->sum('invoices.amt_paid');    
                    ?>
                    <div class="body">
                       <h1 style="color:#fff;font-size: 40px;">${{ $purchases }}</h1>
                       <p style="color:#fff;">Total Revenue this month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3>Booking</h3>
                    </div><br />
                     <?php 
		              $data= DB::table('user_trips')->get();
		                    
		            ?>
                    <div class="body">
                           <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data)}}</h1>
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
                           <h1 style="color:#5dbbe0;font-size: 40px;">800</h1>
                       <p>Total Customers</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

	</div>
</div>


<script>
$(document).ready(function(){
	$('.copy').click(function() {
		var total = $('input[class="ids"]:checkbox:checked').length;
		if(confirm('are u sure Copy selected rows ?'))
		{
			$('input[name="action_task"]').val('copy');
			$('#SximoTable').submit();// do the rest here	
		}
	})	
	
});	
</script>	
	
@stop
