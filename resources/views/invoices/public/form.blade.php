

		 {!! Form::open(array('url'=>'invoices', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Invoices</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Check Out" class=" control-label col-md-4 text-left"> Check Out <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('check_out', $row['check_out'],array('class'=>'form-control input-sm date')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Trip Request #" class=" control-label col-md-4 text-left"> Trip Request # <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='rfp_id' rows='5' id='rfp_id' class='select2 '   ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Hotel Name" class=" control-label col-md-4 text-left"> Hotel Name <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='hotel_name' id='hotel_name' value='{{ $row['hotel_name'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Hotel Add" class=" control-label col-md-4 text-left"> Hotel Add <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='hotel_add' id='hotel_add' value='{{ $row['hotel_add'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Payment Status" class=" control-label col-md-4 text-left"> Payment Status <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='payment_status' id='payment_status' value='{{ $row['payment_status'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Est Amt Due" class=" control-label col-md-4 text-left"> Est Amt Due <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='est_amt_due' id='est_amt_due' value='{{ $row['est_amt_due'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Amt Paid" class=" control-label col-md-4 text-left"> Amt Paid <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='amt_paid' id='amt_paid' value='{{ $row['amt_paid'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Payment Ref Num" class=" control-label col-md-4 text-left"> Payment Ref Num <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='payment_ref_num' id='payment_ref_num' value='{{ $row['payment_ref_num'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> </fieldset>
			</div>
			
			

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-default btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-default btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 <input type="hidden" name="action_task" value="public" />
		 {!! Form::close() !!}
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#rfp_id").jCombo("{!! url('invoices/comboselect?filter=rfps:id:id') !!}",
		{  selected_value : '{{ $row["rfp_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
