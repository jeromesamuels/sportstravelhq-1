<style type="text/css">
	.form-signup {
		background: #FFF;

	}
    .m-page .m-page__container {
    padding: 0 0px;
    }
</style>

<div class="home-banner">
	<div class="m-container m-container--responsive m-container--xxl">
		<div class="row">


		@if(!Auth::check()) 
		  <script>window.location = "{{ URL::to('/user/register') }}";</script>
		@else



		<div class="col-md-12">
			<div class="sbox">
				
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
