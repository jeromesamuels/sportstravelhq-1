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
<div class="page-content  row">
	<div class="page-content-wrapper no-margin">

	<div class="sbox">
		<div class="sbox-title">
			<h1> Form Update </h1>
			<div class="sbox-tools" >
				<a href="{{ url($pageModule.'?return='.$return) }}" class="tips btn btn-sm  "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a> 
			</div>

		</div>	
		<div class="sbox-content">
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>	

{!! Form::open(array('url'=>'core/users?return='.$return, 'class'=>'form-horizontal validated','files' => true )) !!}
		<div class="col-md-6">
			  <div class="form-group hidethis " style="display:none;">
				<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
				<div class="col-md-6">
				  {!! Form::text('id', $row['id'],array('class'=>'form-control input-sm', 'placeholder'=>'',   )) !!} 
				 </div> 
				 <div class="col-md-2">
				 	
				 </div>
			  </div>
			  <div class="form-group  " >
				<label for="group_id" class=" control-label col-md-4 text-left"> Group / Level <span class="asterix"> * </span> </label>
				<div class="col-md-6">

				  {{ Form::select('group_id', ['2'=>'Administrator', '3'=>'Users / Client', '4' => 'Travel Coordinator', '5' => 'Hotel Manager', '6' => 'Corporate'], $row['group_id'], ['id' => 'group_id', 'class' => 'select2 -- form-control input-sm select2-hidden-accessible']) }}

				 </div> 
				 <div class="col-md-2">
				 </div>
			  </div>


			  <div class="form-group choose_hotel_dd hide " >
				<label for="hotel_id" class="control-label col-md-4 text-left"> Hotel <span class="asterix"> * </span> </label>
				<div class="col-md-6">

	              <?php $hotel_select[0] = 'Choose Hotel'; ?>
	              @foreach ($hotels as $hotel)
	                <?php $hotel_select[$hotel->id] = $hotel->name ?>
	              @endforeach 

					{{ Form::select('hotel_id', $hotel_select, $row['hotel_id'], ['id' => 'hotel_id', 'class' => 'select2 -- form-control input-sm select2-hidden-accessible']) }}
				 </div> 
				 <div class="col-md-2">
				 </div>
			  </div>



              



			  <div class="form-group  " >
				<label for="Username" class=" control-label col-md-4 text-left"> Username <span class="asterix"> * </span></label>
				<div class="col-md-6">
				  {!! Form::text('username', $row['username'], array('class'=>'form-control input-sm', 'placeholder'=>'', 'required'=>'true' )) !!} 
				 </div> 
				 <div class="col-md-2">
				 </div>
			  </div>
			  <div class="form-group" >
				<label for="First Name" class=" control-label col-md-4 text-left"> First Name <span class="asterix"> * </span></label>
				<div class="col-md-6">
				  {!! Form::text('first_name', $row['first_name'],array('class'=>'form-control  input-sm', 'placeholder'=>'', 'required'=>'true'  )) !!} 
				 </div> 
				 <div class="col-md-2">
				 </div>
			  </div>
			  <div class="form-group  " >
				<label for="Last Name" class=" control-label col-md-4 text-left"> Last Name </label>
				<div class="col-md-6">
				  {!! Form::text('last_name', $row['last_name'],array('class'=>'form-control  input-sm', 'placeholder'=>'',   )) !!} 
				 </div> 
				 <div class="col-md-2">
				 	
				 </div>
			  </div>
			  <div class="form-group  " >
				<label for="Email" class=" control-label col-md-4 text-left"> Email <span class="asterix"> * </span></label>
				<div class="col-md-6">
				  {!! Form::text('email', $row['email'],array('class'=>'form-control  input-sm', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'email' )) !!} 
				 </div> 
				 <div class="col-md-2">
				 	
				 </div>
			  </div>
               <div class="form-group  " >
				<label for="Phone Number" class=" control-label col-md-4 text-left"> Phone Number <span class="asterix"> * </span></label>
				<div class="col-md-6">
				  {!! Form::text('phone', $row['phone_number'],array('class'=>'form-control  input-sm', 'placeholder'=>'', 'required'=>'true' )) !!} 
				 </div> 
				 <div class="col-md-2">
				 	
				 </div>
			  </div>
			  <div class="form-group  " >
				<label for="Status" class=" control-label col-md-4 text-left"> Status <span class="asterix"> * </span></label>
				<div class="col-md-6">
					<input type='radio' name='active' value ='1' required @if($row['active'] == '1') checked="checked" @endif class="minimal-red" > Active 

					<input type='radio' name='active' value ='0' required @if($row['active'] == '0') checked="checked" @endif class="minimal-red" > Inactive

					<input type='radio' name='active' value ='2' required @if($row['active'] == '2') checked="checked" @endif class="minimal-red" > Banned
				 </div> 
				 <div class="col-md-2">
				 	
				 </div>
			  </div> 


			  <div class="form-group  " >
				<label for="Avatar" class=" control-label col-md-4 text-left"> Avatar </label>
				<div class="col-md-6">
				  <input  type='file' name='avatar' id='avatar' @if($row['avatar'] =='') class='required' @endif style='width:150px !important;'  />
			 	<div >
				{!! SiteHelpers::showUploadedFile($row['avatar'],'/uploads/users/') !!}	
				</div>

				 </div> 
				 <div class="col-md-2">
				 	
				 </div>
			  </div> 
			</div>
			


			<div class="col-md-6">	  
		
		<div class="form-group">
			
			<label for="ipt" class=" control-label col-md-4 text-left" > </label>
			<div class="col-md-8">
				@if($row['id'] !='')
					{{ Lang::get('core.notepassword') }}
				@else
					Create Password
				@endif	 
			</div>
		</div>	


		<div class="form-group">
			<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.newpassword') }} </label>
			<div class="col-md-8">
			<input name="password" type="password" id="password" class="form-control input-sm" value=""
			@if($row['id'] =='')
				required
			@endif
			 /> 
			 </div> 
		</div>  
		  
		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.conewpassword') }} </label>
			<div class="col-md-8">
			<input name="password_confirmation" type="password" id="password_confirmation" class="form-control input-sm" value=""
			@if($row['id'] =='')
				required
			@endif
			 />
			 </div> 
		  </div> 

		 </div>			

			<div style="clear:both"></div>
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('core/users?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>
				  </div> 

		 <input type="hidden" name="action_task" value="save" />
		 {!! Form::close() !!}

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">

  $(document).ready(function() { 

    $("#group_id").on("change", function() {
    	console.log($(this).val());
    	if($(this).val()>=5) {
	    	$(".choose_hotel_dd").removeClass('hide');
    	} else {
    		$("#hotel_id").val(0);
	    	$(".choose_hotel_dd").addClass('hide');
    	}
    });

    $("#group_id").trigger("change");


  });

</script>

@stop


