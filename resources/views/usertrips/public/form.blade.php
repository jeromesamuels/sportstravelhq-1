

		 {!! Form::open(array('url'=>'usertrips', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Book a hotel now!</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Trip Name" class=" control-label col-md-4 text-left"> Trip Name <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='trip_name' id='trip_name' value='{{ $row['trip_name'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Address 1" class=" control-label col-md-4 text-left"> Address 1 <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='from_address_1' id='from_address_1' value='{{ $row['from_address_1'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="City" class=" control-label col-md-4 text-left"> City <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='from_city' id='from_city' value='{{ $row['from_city'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="State" class=" control-label col-md-4 text-left"> State <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='from_state_id' rows='5' id='from_state_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Zip" class=" control-label col-md-4 text-left"> Zip <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='from_zip' id='from_zip' value='{{ $row['from_zip'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Address 1" class=" control-label col-md-4 text-left"> Address 1 <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='to_address_1' id='to_address_1' value='{{ $row['to_address_1'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="City" class=" control-label col-md-4 text-left"> City <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='to_city' id='to_city' value='{{ $row['to_city'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="State" class=" control-label col-md-4 text-left"> State <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='to_state_id' rows='5' id='to_state_id' class='select2 '   ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Zip" class=" control-label col-md-4 text-left"> Zip <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='to_zip' id='to_zip' value='{{ $row['to_zip'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Check In" class=" control-label col-md-4 text-left"> Check In <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='check_in' id='check_in' value='{{ $row['check_in'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Check Out" class=" control-label col-md-4 text-left"> Check Out <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='check_out' id='check_out' value='{{ $row['check_out'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Budget From" class=" control-label col-md-4 text-left"> Budget From <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='budget_from' id='budget_from' value='{{ $row['budget_from'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Budget To" class=" control-label col-md-4 text-left"> Budget To <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='budget_to' id='budget_to' value='{{ $row['budget_to'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Double Queen Rooms" class=" control-label col-md-4 text-left"> Double Queen Rooms <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='double_queen_qty' rows='5' id='double_queen_qty' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Double King Rooms" class=" control-label col-md-4 text-left"> Double King Rooms <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='double_king_qty' rows='5' id='double_king_qty' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Amenities" class=" control-label col-md-4 text-left"> Amenities <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='amenity_ids' rows='5' id='amenity_ids' class='select2 '   ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Comment" class=" control-label col-md-4 text-left"> Comment <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <textarea name='comment' rows='5' id='comment' class='form-control input-sm '  
				           >{{ $row['comment'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> {!! Form::hidden('added', $row['added']) !!}{!! Form::hidden('status', $row['status']) !!}</fieldset>
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
		
		
		$("#from_state_id").jCombo("{!! url('usertrips/comboselect?filter=states:id:abbr|name') !!}",
		{  selected_value : '{{ $row["from_state_id"] }}' });
		
		$("#to_state_id").jCombo("{!! url('usertrips/comboselect?filter=states:id:abbr|name') !!}",
		{  selected_value : '{{ $row["to_state_id"] }}' });
		
		$("#amenity_ids").jCombo("{!! url('usertrips/comboselect?filter=hotel_amenities:id:title') !!}",
		{  selected_value : '{{ $row["amenity_ids"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
