@extends('layouts.app')

@section('content')
<section class="page-header row">
	<h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
	<ol class="breadcrumb">
		<li><a href="{{ url('') }}"> Dashboard </a></li>
		<li><a href="{{ url($pageModule) }}"> {{ $pageTitle }} </a></li>
		<li class="active"> Form  </li>		
	</ol>
</section>
<div class="page-content row">
	<div class="page-content-wrapper no-margin">

	{!! Form::open(array('url'=>'rpfs?return='.$return, 'class'=>'form-horizontal validated','files' => true )) !!}
	<div class="sbox">
		<div class="sbox-title clearfix">
			<div class="sbox-tools " >
				<a href="{{ url($pageModule.'?return='.$return) }}" class="tips btn btn-sm "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a> 
			</div>
			<div class="sbox-tools pull-left" >
				<button name="apply" class="tips btn btn-sm btn-default  "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-check"></i> {{ __('core.sb_apply') }} </button>
				<button name="save" class="tips btn btn-sm btn-default"  title="{{ __('core.btn_back') }}" ><i class="fa  fa-paste"></i> {{ __('core.sb_save') }} </button> 
			</div>
		</div>	
		<div class="sbox-content clearfix">
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		
<div class="col-md-12">
						<fieldset><legend> RPFs</legend>
									
									  <div class="form-group  " >
										<label for="Id" class=" control-label col-md-4 text-left"> Id <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='id' id='id' value='{{ $row['id'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="User Trip Id" class=" control-label col-md-4 text-left"> User Trip Id <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='user_trip_id' id='user_trip_id' value='{{ $row['user_trip_id'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="User Id" class=" control-label col-md-4 text-left"> User Id <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='user_id' id='user_id' value='{{ $row['user_id'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Added" class=" control-label col-md-4 text-left"> Added <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('added', $row['added'],array('class'=>'form-control input-sm datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Status" class=" control-label col-md-4 text-left"> Status <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='status' id='status' value='{{ $row['status'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Destination" class=" control-label col-md-4 text-left"> Destination <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='destination' id='destination' value='{{ $row['destination'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Hotel Information" class=" control-label col-md-4 text-left"> Hotel Information <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='hotel_information' id='hotel_information' value='{{ $row['hotel_information'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Distance Event" class=" control-label col-md-4 text-left"> Distance Event <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='distance_event' id='distance_event' value='{{ $row['distance_event'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Offer Rate" class=" control-label col-md-4 text-left"> Offer Rate <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='offer_rate' id='offer_rate' value='{{ $row['offer_rate'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cc Authorization" class=" control-label col-md-4 text-left"> Cc Authorization <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='cc_authorization' id='cc_authorization' value='{{ $row['cc_authorization'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Offer Validity" class=" control-label col-md-4 text-left"> Offer Validity <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='offer_validity' id='offer_validity' value='{{ $row['offer_validity'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Check In" class=" control-label col-md-4 text-left"> Check In <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='check_in' id='check_in' value='{{ $row['check_in'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Check Out" class=" control-label col-md-4 text-left"> Check Out <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='check_out' id='check_out' value='{{ $row['check_out'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Sales Manager" class=" control-label col-md-4 text-left"> Sales Manager <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='sales_manager' id='sales_manager' value='{{ $row['sales_manager'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="King Beedrooms" class=" control-label col-md-4 text-left"> King Beedrooms <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='king_beedrooms' id='king_beedrooms' value='{{ $row['king_beedrooms'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Queen Beedrooms" class=" control-label col-md-4 text-left"> Queen Beedrooms <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='queen_beedrooms' id='queen_beedrooms' value='{{ $row['queen_beedrooms'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Amenitie Ids" class=" control-label col-md-4 text-left"> Amenitie Ids <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='amenitie_ids' id='amenitie_ids' value='{{ $row['amenitie_ids'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Hotels Message" class=" control-label col-md-4 text-left"> Hotels Message <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <textarea name='hotels_message' rows='5' id='hotels_message' class='form-control input-sm '  
				           >{{ $row['hotels_message'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> </fieldset>
			</div>
			
			

		</div>
	</div>
	<input type="hidden" name="action_task" value="save" />
	{!! Form::close() !!}
	</div>
</div>		
	
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		 		 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("rpfs/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop