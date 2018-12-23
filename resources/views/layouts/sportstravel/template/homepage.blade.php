<style type="text/css">
	.form-signup {
		background: #FFF;

	}

</style>

<div class="home-banner">
	<div class="container">
		<div class="row">


		@if(!Auth::check()) 
		  <script>window.location = "{{ URL::to('/user/register') }}";</script>
		@else



		<div class="col-md-12">
			<div class="sbox">
				<b>Powered by: <img src="{{ asset('frontend/sportstravel/assets/images/logo_white.png') }}" /></b>
				<?php echo $content ;?>
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
