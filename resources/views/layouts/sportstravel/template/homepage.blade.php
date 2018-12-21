<style type="text/css">
	.form-signup {
		background: #FFF;

	}

</style>

<div class="home-banner">
	<div class="container">
		<div class="row">


			@if(!Auth::check()) 

			<div class="col-md-6">
				<div class="sbox" > 

			 {!! Form::open(array('url'=>'user/create', 'class'=>'form-signup','parsley-validate'=>'','novalidate'=>' ','id'=>'register-form' )) !!}
			    	@if(Session::has('message'))
						{!! Session::get('message') !!}
					@endif
				<h5>Enter your name and contact information to register</h5>
				<ul class="parsley-error-list">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>

			<div class="form-group has-feedback">
				
			  {!! Form::text('username', null, array('class'=>'form-control','required'=>'true'  ,'placeholder'=> __('core.username') )) !!}
				
			</div>	
			<div class="form-group has-feedback row">
				<div class="col-md-6">
				
				  {!! Form::text('firstname', null, array('class'=>'form-control','required'=>'true' ,'placeholder'=> __('core.firstname') )) !!}
					
				</div>
				<div class="col-md-6">
					
				 {!! Form::text('lastname', null, array('class'=>'form-control', 'required'=>'' ,'placeholder'=> __('core.lastname') )) !!}
					
				</div>	
			</div>
			
			
			<div class="form-group has-feedback">
			 {!! Form::text('email', null, array('class'=>'form-control', 'required'=>'true','placeholder'=> __('core.email'))) !!}
			</div>

			<div class="form-group has-feedback row">
				<div class="col-md-6">
					
			 		{!! Form::password('password', array('class'=>'form-control','required'=>'true' ,'placeholder'=> __('core.password'))) !!}
					
				</div>
				<div class="col-md-6">
					
					{!! Form::password('password_confirmation', array('class'=>'form-control','required'=>'true' ,'placeholder'=> __('core.repassword'))) !!}
					
				</div>	
			</div>

				@if(config('sximo.cnf_recaptcha') =='true') 
				<div class="form-group has-feedback  animated fadeInLeft delayp1">
					<label class="text-left"> Are u human ? </label>	
					<div class="g-recaptcha" data-sitekey="6Le2bjQUAAAAABascn2t0WsRjZbmL6EnxFJUU1H_"></div>
					
					<div class="clr"></div>
				</div>	
			 	@endif						

		      <div class="row form-group">
		        <div class="col-sm-12">
		          <button type="submit" style="width:100%;" class="btn btn-primary pull-right"><i class="icon-user-plus"></i> @lang('core.signup')	</button>
		       </div>
		      </div>
			  <p style="padding:10px 0" class="text-center">
			  <a href="{{ URL::to('user/login')}}"> @lang('core.signin')   </a>
		   		</p>
			{!! Form::close() !!}

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

		@else



		<div class="col-md-12">
			<div class="sbox">
				<h3>Book a hotel now!</h3>

				<p>form goes here ... </p>
			</div>
		</div>


		@endif  


<script type="text/javascript">
	$(document).ready(function(){
		$('#register-form').parsley();
	})
</script>



			  	
	  </div>
	</div>  
</div>
