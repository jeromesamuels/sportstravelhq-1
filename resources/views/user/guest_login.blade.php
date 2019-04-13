@extends('layouts.login')

@section('content')

<style type="text/css">
	.form-signup {
		background: #FFF;
	}
</style>

<div class="home-banner">
	<div class="container">
		<div class="row">

	<div class="col-md-6">
		<div class="sbox" > 

	    <h5 class="text-center m-t" style="text-transform: uppercase;"> {{ config('sximo.cnf_appdesc') }}  </h5> 
		
			<div class="ajaxLoading"></div>
			<p class="message alert alert-danger " style="display:none;"></p>

		    	@if(Session::has('status'))
		    		@if(session('status') =='success')
		    			<p class="alert alert-success">
							{!! Session::get('message') !!}
						</p>
					@else
						<p class="alert alert-danger">
							{!! Session::get('message') !!}
						</p>
					@endif		
				@endif

			<ul class="parsley-error-list">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>		
			

		<div class="tab-content" >
			<div class="tab-pane active m-t" id="tab-sign-in">
	 		{!! Form::open(array('url'=>'user/guestLoginStore', 'class'=>'form-vertical','id'=>'LoginAjax' , 'parsley-validate'=>'','novalidate'=>' ')) !!}
				<div class="form-group has-feedback animated fadeInLeft delayp1">
					<input type="text" name="email" placeholder="{{ Lang::get('core.email') }}" class="form-control" required="email" />
				</div>
				
				

				<div class="form-group has-feedback hidden animated fadeInRight delayp1">
					<label> Remember  ?	</label>
					<input type="checkbox" name="remember" value="1" />
				</div>


				@if(config('sximo.cnf_recaptcha') =='true') 
				<div class="form-group has-feedback  animated fadeInLeft delayp1">
					<label class="text-left"> Are u human ? </label>	
					<div class="g-recaptcha" data-sitekey="6Le2bjQUAAAAABascn2t0WsRjZbmL6EnxFJUU1H_"></div>
					
					<div class="clr"></div>
				</div>	
			 	@endif	

				<div class="form-group animated fadeInRight delayp1">
					<input type="hidden" name="group_id" value="3">
					<button type="submit" class="btn btn-default btn-block"> Submit </button>
				</div>			 	

			<!-- 	<div class="animated fadeInLeft delayp1" >					       
						<p class="text-center ">						
							<a href="javascript:void(0)" class="forgot"> @lang('core.forgotpassword') ? </a> | 
							<a href="{{ url('user/register')}}"> @lang('core.registernew') </a>|
							<a href="{{ url('user/trips')}}">Send a Bid Request </a>
						</p>
				</div>	 -->
			
			   </form>			
			</div>
		
		

		<div class="tab-pane  m-t" id="tab-forgot" style="display: none">	

			
			{!! Form::open(array('url'=>'user/request', 'class'=>'form-vertical', 'parsley-validate'=>'','novalidate'=>' ')) !!}
			   <div class="form-group has-feedback">
			   <div class="">
					<label>{{ Lang::get('core.enteremailforgot') }}</label>
					<input type="text" name="credit_email" placeholder="{{ Lang::get('core.email') }}" class="form-control" required/>
				</div> 	
				</div>
				<div class="form-group has-feedback">    
					<a href="javascript:;" class="forgot btn btn-warning"> Cancel </a>     
			      <button type="submit" class="btn btn-primary pull-right"> {{ Lang::get('core.sb_submit') }} </button>        
			  </div>
			  
			  <div class="clr"></div>

			  
			</form>		
		</div>
		
	</div>

		</div>
	</div>
 		<div class="col-md-6">
			<div class="registration-side">
				<h3>Sign Up</h3>
				<span>Here's why ...</span>
				<ol>
					<li>Free</li>
					<li>Sports Team-focused (10 or more rooms)</li>
					<li>Best Rates Available</li>
				</ol>
			</div>
		</div>

	  </div>
	</div>  
</div>






<script type="text/javascript">
$(document).ready(function(){

	$('.forgot').on('click',function(){
		$('#tab-forgot').toggle();
		$('#tab-sign-in').toggle();
	})
	var form = $('#LoginAjax'); 
	form.parsley();
	form.submit(function(){
		
		if(form.parsley().isValid()){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  showRequest,
				success:       showResponse  
			}  
			$(this).ajaxSubmit(options); 
			return false;
						
		} else {
			return false;
		}		
	
	});

});

function showRequest()
{
	$('.ajaxLoading').show(); 
}

function showResponse(data) {
	
	if(data.status == 'success')
	{
		window.location.href = data.url;
		$('.ajaxLoading').hide();
	} else {
		$('.message').html(data.message);
		$('.ajaxLoading').hide();
		$('.message').show(data.message);	
		return false;
	}	
}	
</script>

@stop