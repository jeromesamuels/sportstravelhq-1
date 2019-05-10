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


				<img src="{{ asset('frontend/sportstravel/assets/images/logo.png') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" height="50" >
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
				
			<!--   {!! Form::text('user_type', null, array('class'=>'form-control','required'=>'true'  ,'placeholder'=> __('Type') )) !!} -->
				<select class="selectpicker form-control" name="user_type" id="user_type">
					<option value="0">Please select user type</option>
  					<option value="1">Hotel Manager</option>
   					<option value="2">Coordinator</option>
   				</select>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
				    $('#user_type').on('change', function() {
				      if ( this.value == '1')
				      //.....................^.......
				      {
				        $("#hotel_manager").show();
				         $("#coordinator").hide();
				      }
				      else if(this.value == '2')
				      {
				      	$("#coordinator").show();
				      	 $("#hotel_manager").hide();
				      
				      }
				      else{
				      	 $("#hotel_manager").hide();
				      	 $("#coordinator").hide();
				      }
				    });
				});
			</script>

				<div id="hotel_manager" style='display:none;'>
						
					<div class="form-group has-feedback">
					<select class="selectpicker form-control" name="hotel_type" id="hotel_type" >
						<option value="" >Please select Hotel type</option>
						<?php 
                          foreach ($hotel_type as $value_type) {
                           $hotel_type_new=ucfirst($value_type->type);
						?>
	  					<option value="{{ $value_type->type }}" >{{ $hotel_type_new }} </option>

	   					<?php } ?>
	   				</select>
					</div>

					<div class="form-group has-feedback">
					
					  {!! Form::text('hotel_code', null, array('class'=>'form-control' ,'placeholder'=> __('Hotel Code') )) !!}
				  	</div>
 
					<div class="form-group has-feedback" style="display:none">
						
					 {!! Form::text('hotel_address', null, array('class'=>'form-control' ,'placeholder'=> __('Hotel Address') )) !!}
				 	</div>
					
					<div class="form-group has-feedback">
					<select class="selectpicker form-control" name="service_type" id="service_type" >
						<option value="">Please select the service provide </option>
	  					<option value="1" title="Prepared Meals (Full Service)">Full service </option>
	   					<option value="2" title="Limited service">Limited service</option>
	   				</select>
					</div>


				</div>
				<div id="coordinator" style='display:none;'>
						<div class="form-group has-feedback">
					  {!! Form::text('o_name', null, array('class'=>'form-control', 'placeholder'=> __('Organization name') )) !!}
						
					</div>
				</div>


			<div class="form-group has-feedback">
				
			  {!! Form::text('username', null, array('class'=>'form-control','required'=>'true'  ,'placeholder'=> __('core.username') )) !!}
				
			</div>

			<div class="form-group has-feedback">
			
			  {!! Form::text('firstname', null, array('class'=>'form-control','required'=>'true' ,'placeholder'=> __('core.firstname') )) !!}
		  	</div>

			<div class="form-group has-feedback">
				
			 {!! Form::text('lastname', null, array('class'=>'form-control', 'required'=>'' ,'placeholder'=> __('core.lastname') )) !!}
		 	</div>
		 	<div class="form-group has-feedback">
				
			 {!! Form::text('address', null, array('class'=>'form-control', 'required'=>'' , 'id'=>'autocomplete','placeholder'=>' Address' )) !!}
		 	</div>
		 	<div class="form-group has-feedback">
				
			 {!! Form::text('state', null, array('class'=>'form-control', 'required'=>'' ,'id'=>'state','placeholder'=> 'State' )) !!}
		 	</div>
		 	<div class="form-group has-feedback">
				
			 {!! Form::text('city', null, array('class'=>'form-control', 'required'=>'' ,'id'=>'city','placeholder'=> 'City' )) !!}
		 	</div>
		 	<div class="form-group has-feedback">
				
			 {!! Form::text('zip', null, array('class'=>'form-control', 'required'=>'' ,'id'=>'zip','placeholder'=> 'Zip Code')) !!}
		 	</div>
			
			<div class="form-group has-feedback">
			 {!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email' ,'required'=>'true', 'placeholder'=> __('core.email'))) !!}
			</div>
			<p id="show_error" style="color:red;display: none;">Email must be a Hotel type related e-mail address </p>
			<div class="form-group has-feedback">
			 {!! Form::text('phone', null, array('class'=>'form-control', 'required'=>'true','placeholder'=> __('Phone Number'))) !!}
			</div>

			<div class="form-group has-feedback">
	 		{!! Form::password('password', array('class'=>'form-control','required'=>'true' ,'placeholder'=> __('core.password'))) !!}
	 		</div>

			<div class="form-group has-feedback">
			{!! Form::password('password_confirmation', array('class'=>'form-control','required'=>'true' ,'placeholder'=> __('core.repassword'))) !!}
			</div>
             <div id="map" class="trip-map" ></div>

				@if(config('sximo.cnf_recaptcha') =='true') 
				<div class="form-group has-feedback  animated fadeInLeft delayp1">
					<label class="text-left"> Are u human ? </label>	
					<div class="g-recaptcha" data-sitekey="6Le2bjQUAAAAABascn2t0WsRjZbmL6EnxFJUU1H_"></div>
					
					<div class="clr"></div>
				</div>	
			 	@endif						
             	
		      <div class="row form-group">
		        <div class="col-sm-12">
		          <button type="submit" id="signup" style="width:100%;" class="btn btn-default pull-right"><i class="icon-user-plus"></i> @lang('core.signup')	</button>
		       </div>
		      </div>
			  <p style="padding:10px 0" class="text-center">
			  Already a user? <a href="{{ URL::to('user/login')}}"> @lang('core.signin')   </a>
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

			  <script>window.location = "{{ URL::to('/') }}";</script>

			@endif  

<?php 

$agreement_text = '<div id="Translation"><h3>The standard Lorem Ipsum passage, used since the 1500s</h3><p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><h3>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3><p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p><h3>1914 translation by H. Rackham</h3><p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p><h3>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3><p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</p><h3>1914 translation by H. Rackham</h3><p>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</p></div>';


?>

             <script>
            function initMap() {
              var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 25.790654, lng: -80.1300455},
                zoom: 13
              });
              var card = document.getElementById('pac-card');
              var input = document.getElementById('autocomplete');
              var input2 = document.getElementById('to_address_1');
              var types = document.getElementById('type-selector');
              var strictBounds = document.getElementById('strict-bounds-selector');
            
              map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
            
              var autocomplete = new google.maps.places.Autocomplete(input);
              var autocomplete2 = new google.maps.places.Autocomplete(input2);
            
            
            
              autocomplete.bindTo('bounds', map);
              autocomplete2.bindTo('bounds', map);
              // Set the data fields to return when the user selects a place.
              autocomplete.setFields(
                  ['address_components', 'geometry', 'icon', 'name']);
              autocomplete2.setFields(
                  ['address_components', 'geometry', 'icon', 'name']);
            
              var infowindow = new google.maps.InfoWindow();
              var infowindowContent = document.getElementById('infowindow-content');
              infowindow.setContent(infowindowContent);
              var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
              });
            
              
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
            
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                  window.alert("No details available for input: '" + place.name + "'");
                  return;
                }
                
               
               
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
                 
                } else {
                  map.setCenter(place.geometry.location);
                 
                  map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
               
                marker.setVisible(true);
            
                var address = '';
                if (place.address_components ) {
                  address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name ||''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                   
                  ].join(' ');
            
                  this.addressArray = place.address_components;
                 if(this.addressArray.length === 9) {
                    this.street_number = this.addressArray[5].long_name;
                    //this.country = this.addressArray[6].short_name;
                    this.zipcode = this.addressArray[7].short_name;
                    this.city=this.addressArray[3].short_name;
                    document.getElementById('city').value=this.addressArray[3].short_name;
                    document.getElementById('zip').value=this.addressArray[7].short_name;
                   document.getElementById('state').value=this.addressArray[5].long_name;
                 } 
                
                 else{
                     this.street_number = this.addressArray[4].long_name;
                    //this.country = this.addressArray[5].short_name;
                     this.zipcode = this.addressArray[6].short_name;
                     this.city=this.addressArray[2].short_name;
                   document.getElementById('city').value=this.addressArray[2].short_name;
                   document.getElementById('zip').value=this.addressArray[6].short_name;
                   document.getElementById('state').value=this.addressArray[4].long_name;
                 }
                }
            
                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
                infowindowContent.children['place-address'].textContent = address;
            
            
                infowindow.open(map, marker);
              });
            
            
                google.maps.event.addListener(autocomplete2, 'place_changed', function() {
            
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete2.getPlace();
                if (!place.geometry) {
                  window.alert("No details available for input: '" + place.name + "'");
                  return;
                }
                
               
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
                 
                } else {
                  map.setCenter(place.geometry.location);
                 
                  map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
               
                marker.setVisible(true);
            
                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
              
                infowindowContent.children['place-address'].textContent = address;
            
                  
            
                infowindow.open(map, marker);
              });
            
            
              // Sets a listener on a radio button to change the filter type on Places
              // Autocomplete.
              function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);
                radioButton.addEventListener('click', function() {
                  autocomplete.setTypes(types);
                });
              }
            
              setupClickListener('changetype-all', []);
              setupClickListener('changetype-address', ['address']);
              setupClickListener('changetype-establishment', ['establishment']);
              setupClickListener('changetype-geocode', ['geocode']);
            
              document.getElementById('use-strict-bounds')
                  .addEventListener('click', function() {
                    console.log('Checkbox clicked! New state=' + this.checked);
                    autocomplete.setOptions({strictBounds: this.checked});
                  });
            }
            
            
            $(document).ready(function() {
            $("input[id^=from_zip]").keypress(function(event) {
                if (event.which && (event.which < 46 || event.which > 57 || event.which == 47) && event.keyCode != 8) {
                    event.preventDefault();
                }
                if (event.which == 46 && $(this).val().indexOf('.') != -1) {
                    event.preventDefault();
                }
            });
            });
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCM3IVfk3icA92tlWTGZRMg__v7dKnDaWc&libraries=places&callback=initMap"
            async defer></script>
<script type="text/javascript">
	$(document).ready(function() {

		$("#signup").on("click", function(e) {

		    e.preventDefault();

			$.confirm({
			    columnClass: 'col-md-10 terms-condition',
			    title: 'Your Agreement with Sports Travel HQ!',
			    minHeight: 120,
            	maxHeight: 200,
			    content: '<?php echo $agreement_text ?>',
			    buttons: {
			        confirm: {
	    	            text: 'I agree/Register',
	    	            btnClass: 'btn-agree',
	    	            action: function () {
				        	$("#register-form").submit();
				        },
			        }, 
			        cancel: {
	    	            text: 'Decline/Cancel',
	    	            btnClass: 'btn-decline',
			        },
			    }
			});


		});

	});

	$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
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
<script type="text/javascript">
				$(document).ready(function() {
				 	//e.preventDefault();
				
                  $("#email").keyup(function(e){
		          e.preventDefault();
			       validateEmail($('#email').val());
	               return false;
				    
	            });
	          });
				function validateEmail(email) {
					var htype=document.getElementById("hotel_type").value;
					
				    var re = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
	               
				    if (re.test(email)) {
				        if (email.indexOf('@'+htype, email.length - '@'+htype.length) !== -1) {
				          
				            $("#show_error").hide();
				            $("#email").val();
	                        
				        } else {
				           $("#show_error").show();
				           $("#email").val("");
				        }
				    } 
				}
			</script>
	  </div>
	</div>  
</div>

@stop
