@extends('layouts.login')

@section('content')


<style type="text/css">
	.form-signup {
		background: #FFF;
	}

	.form-signup h5 {
	  font-size: 20px;
	  font-weight: bold;
	  color: #223a40;
	  margin: 20px 0;
	}

</style>

<div class="home-banner">
	<div class="container">
		<div class="row">
      

			@if(!Auth::check()) 

			<div class="col-md-6">
				<div class="sbox text-center" > 
               <?php $user_id=$user_id;

               ?>

				<img src="{{ asset('frontend/sportstravel/assets/images/logo.png') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" height="50" >
			     

			     {!! Form::open(array('url'=>'user/signin', 'class'=>'form-vertical','id'=>'LoginAjax' , 'parsley-validate'=>'','novalidate'=>' ')) !!}
		    	
				<br><h5>Enter Activation Code for accessing the main page  </h5><br>

				<ul class="parsley-error-list">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
      
                 @if(Session::has('message'))
				    <div class="alert alert-danger">
				      {!! Session::get('message') !!}
				    </div>
				@endif
          <?php //echo $num;?>
			
			<div class="form-group has-feedback" style="margin-top: 0px;">
			 {!! Form::text('code', null, array('class'=>'form-control', 'required'=>'true','placeholder'=> __('Enter Activation code'))) !!}


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
		        	<input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
		        	<input type="hidden" name="send_code" id="send_code" value="1">
		        	<input type="hidden" name="email" id="email" value="{{$user_email}}">
		        	<input type="hidden" name="password" id="password" value="{{$user_password}}">
		        	 <div class="form-group has-feedback hidden animated fadeInRight delayp1">
		        	 
		           	<input type="checkbox" name="vcode" value="1" />
					<label> Don't send me verfication code again!! 	</label>
					
				   </div>
		          <button type="submit" id="signup" style="width:100%;margin-top: 20px;" class="btn btn-default pull-right"><i class="icon-user-plus"></i> Confirm	</button>
		       </div>
		      </div>

		  
			  
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

			  <script>window.location = "{{ URL::to('/') }}";</script>

			@endif  


<style type="text/css">

	.jconfirm .jconfirm-box div.jconfirm-title-c {
		line-height: 30px!important;
	}

	.btn-agree {
		background: #333;
		color: #EEE;
		text-transform: none!important;
	}

	.btn-decline {
		background: #EEE;
		columns: #333;
		text-transform: none!important;
		position: absolute;
		left: 10px;
	}


</style>

	  </div>
	</div>  
</div>




@stop
