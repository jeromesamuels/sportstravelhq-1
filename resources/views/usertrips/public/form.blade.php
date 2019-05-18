{!! Form::open(array('url'=>'usertrips', 'class'=>'form-horizontal','id'=>'usertrips_form', 'files' => true , 'parsley-validate'=>'', 'autocomplete'=>'off' )) !!}
@if(Session::has('messagetext'))
{!! Session::get('messagetext') !!}
@endif
@if(count($errors->all()))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    <ul class="parsley-error-list">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@php
ini_set('max_execution_time', 3000);
@endphp
<style type="text/css">
    .error {
    border: 2px solid red;
    }
    .unstyled {
    list-style: none;
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    padding: 0;
    }
    .styled-checkbox {
    position: absolute;
    opacity: 0;
    }
    .styled-checkbox + label {
    position: relative;
    cursor: pointer;
    padding: 0;
    }
    .styled-checkbox + label:before {
    content: '';
    margin-right: 10px;
    display: inline-block;
    vertical-align: text-top;
    width: 20px;
    height: 20px;
    background: white;
    border: solid #AAA 1px;
    border-radius: 4px;
    }
    .styled-checkbox:hover + label:before {
    background: #0bd641;
    }
    .styled-checkbox:focus + label:before {
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
    }
    .styled-checkbox:checked + label:before {
    background: #0bd641;
    }
    .styled-checkbox:disabled + label {
    color: #b8b8b8;
    cursor: auto;
    }
    .styled-checkbox:disabled + label:before {
    box-shadow: none;
    background: #ddd;
    }
    .styled-checkbox:checked + label:after {
    content: '';
    position: absolute;
    left: 5px;
    top: 9px;
    background: white;
    width: 2px;
    height: 2px;
    box-shadow: 2px 0 0 white, 4px 0 0 white, 4px -2px 0 white, 4px -4px 0 white, 4px -6px 0 white, 4px -8px 0 white;
    transform: rotate(45deg);
    }
    .rs-container *{box-sizing:border-box;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.rs-container{font-family:Arial,Helvetica,sans-serif;height:45px;position:relative}.rs-container .rs-bg,.rs-container .rs-selected{background-color:#eee;border:1px solid #ededed;height:10px;left:0;position:absolute;top:5px;width:100%;border-radius:3px}.rs-container .rs-selected{background-color:#00b3bc;border:1px solid #00969b;transition:all .2s linear;width:0}.rs-container.disabled .rs-selected{background-color:#ccc;border-color:#bbb}.rs-container .rs-pointer{background-color:#fff;border:1px solid #bbb;border-radius:4px;cursor:pointer;height:20px;left:-10px;position:absolute;top:0;transition:all .2s linear;width:30px;box-shadow:inset 0 0 1px #FFF,inset 0 1px 6px #ebebeb,1px 1px 4px rgba(0,0,0,.1)}.rs-container.disabled .rs-pointer{border-color:#ccc;cursor:default}.rs-container .rs-pointer::after,.rs-container .rs-pointer::before{content:'';position:absolute;width:1px;height:9px;background-color:#ddd;left:12px;top:5px}.rs-container .rs-pointer::after{left:auto;right:12px}.rs-container.sliding .rs-pointer,.rs-container.sliding .rs-selected{transition:none}.rs-container .rs-scale{left:0;position:absolute;top:5px;white-space:nowrap}.rs-container .rs-scale span{float:left;position:relative}.rs-container .rs-scale span::before{background-color:#ededed;content:"";height:8px;left:0;position:absolute;top:10px;width:1px}.rs-container.rs-noscale span::before{display:none}.rs-container.rs-noscale span:first-child::before,.rs-container.rs-noscale span:last-child::before{display:block}.rs-container .rs-scale span:last-child{margin-left:-1px;width:0}.rs-container .rs-scale span ins{color:#333;display:inline-block;font-size:12px;margin-top:20px;text-decoration:none}.rs-container.disabled .rs-scale span ins{color:#999}.rs-tooltip{color:#333;width:auto;min-width:60px;height:30px;background:#fff;border:1px solid #00969b;border-radius:3px;position:absolute;transform:translate(-50%,-35px);left:13px;text-align:center;font-size:13px;padding:6px 10px 0}.rs-container.disabled .rs-tooltip{border-color:#ccc;color:#999}
    #map {
    height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    }
    #description {
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    }
  
    .pac-card {
    margin: 10px 10px 0 0px;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    width: 100%;
    }
    #pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
    }
    .pac-controls {
    display: inline-block;
    padding: 5px 11px;
    }
    .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
    }
    #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
    }
    #pac-input:focus {
    border-color: #4d90fe;
    }
    #title {
    color: #fff;
    background-color: #4d90fe;
    font-size: 22px;
    font-weight: 500;
    padding: 6px 12px;
    text-align: center;
    width: 100%;
    margin-left: 30px;
    }
    .trip-map{
    width: 100%;
    margin-left: 30px;
    }
    /*loadin css*/
    #load{
    border: 1px solid #18c942;
    padding: 7px 20px;
    border-radius: 25px;
    font-weight: bold;
    bottom: 6px;
    position: relative;
    }
    .load.spinning {
    background-color: transparent;
    padding-right:30px !important;
    }
    .load.spinning:after {
    content: '';
    position: absolute;
    left: 0px;
    width: 0;
    height: 0;
    box-shadow: 0px 0px 0 1px darken(#212121,10%);
    position: absolute;
    border-radius: 50%;
    animation: rotate360 .5s infinite linear, exist .5s forwards ease;
    }
    .load.spinning:before {
    content: "";
    width: 0px;
    height: 0px;
    top: 17px;
    border-radius: 50%;
    left: 90px;
    position: absolute;
    border: 2px solid darken(#212121,40%);
    border-right: 3px solid #27ae60;
    animation: rotate360 .5s infinite linear, exist .1s forwards ease ;
    }
    @keyframes rotate360 { 
    100% {
    transform: rotate(360deg);
    }
    }
    @keyframes exist { 
    100% {
    width: 15px;
    height: 15px;
    margin: -8px 5px 0 0;
    }
    }
    #trip_name-error,#from_address_1-error,#from_state_id-error,#from_city-error,#check_in-error,#check_out-error,#comment-error,#double_queen_qty-error,#double_king_qty-error,#slider3-error,#from_zip-error {
    color: red;
    font-weight: 400;
    }
    .m-header--fixed .m-body {
    padding-top: 20px !important;
    }
    .form-group .form-control {
    width: 100%;
    border: none;
    box-shadow: none;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0;
    padding-left: 0;
    }
    form .form-control, .form-control {
    border: none;
    border-bottom: solid 1px #eee !important;
    font-size: 13px;
    box-shadow: none;
    background: none;
    border-radius: 0px;
    }
    form .form-control {
    border: 1px solid #d4d4d4;
    font-weight: bold;
    }
    .form-group .select2 ,.form-group .select2-selection{
    width: 100%;
    border: none;
    box-shadow: none;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0;
    padding-left: 0;
    }
    form .select2, .select2 ,.select2-selection {
    border: none;
    border-bottom: solid 1px #eee !important;
    font-size: 13px;
    box-shadow: none;
    background: none;
    border-radius: 0px;
    }
    form .select2  {
    border: 1px solid #d4d4d4;
    color: #5a5a5a;
    }
    form label {
    color: #414141!important;
    }
    label {
    font-weight: 400!important;
    text-transform: none!important;
    font-size: 13px!important;
    }
    form .form-group {
    margin-bottom: 1.5rem;
    }
    .searchcontainer{
    background: #5dbbe0;
    margin: 0px 30px;
    width: 100%;
    padding: 20px;
    color: #fff;
    }
    .searchcontainer h4{
    color: #fff; 
    padding-bottom: 15px;
    font-size: 16px;
    cursor: pointer;
    }
    .gm-style .gm-style-iw-t::after {
    background: #5dbbe0;
    }
</style>
<div class="row book-hotel-block">
<legend> Book a hotel now! </legend>
<div class="col-md-6 left-section" >
    {!! Form::hidden('id', $row['id']) !!}
    <div class="form-group" >
        <h4>Trip Name</h4>
        <label for="Trip Name" class="control-label col-md-8 text-left"> Name this trip 
        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Check in date - General Location - how many nights" style="border:0;"> <i class="fa fa-info-circle" aria-hidden="true"></i></button></label>
        <div class="col-md-11">
            <input  type='text' autocomplete='off' name='trip_name' id='trip_name' value='{{ $row['trip_name'] }}' required placeholder="Example: 10/24/19 - Tampa, Fl - 3 Nights" class='form-control input-sm ' /> 
        </div>
    </div>
    <div class="form-group " >
        <h4>Sports Venue Location</h4>
        <label for="Address 1" class=" control-label col-md-8 text-left"> Address 1 </label>
        <div class="col-md-11">
            <input  type='text' autocomplete='off' name='from_address_1' id='from_address_1' value='{{ $row['from_address_1'] }}' required class='form-control input-sm ' /> 
        </div>
    </div>
    <div class="form-group" >
        <label for="State" class=" control-label col-md-3 text-left"> State 
        <input  type='text' autocomplete='off' name='from_state_id' id='from_state_id' value='{{ $row['from_state_id'] }}' required class='form-control input-sm' /> 
        </label>
        <label for="City" class=" control-label col-md-3 text-left"> City 
        <input  type='text' autocomplete='off' name='from_city' id='from_city' value='{{ $row['from_city'] }}' required class='form-control input-sm' /> 
        </label>
        <label for="Zip" class=" control-label col-md-3 text-left"> Zip 
        <input  type='text' autocomplete='off' name='from_zip' maxlength="5" id='from_zip' value='{{ $row['from_zip'] }}' required class='form-control input-sm ' /> 
        </label>
    </div>
    <div class="form-group" >
        <div class="col-md-11">
            <input class="styled-checkbox" id="between_locations" type="checkbox" value="1">
            <label for="between_locations">Check here to book a location between two locations</label>
        </div>
    </div>
    <div class="another_location">
        <div class="form-group" >
            <label for="Address 1" class=" control-label col-md-8 text-left"> Address 1 </label>
            <div class="col-md-11">
                <input  type='text' autocomplete='off' name='to_address_1' id='to_address_1' value='{{ $row['to_address_1'] }}' class='form-control input-sm' /> 
            </div>
        </div>
        <div class="form-group" >
            <label for="State" class=" control-label col-md-3 text-left"> State 
            <input  type='text' autocomplete='off' name='to_state_id' id='to_state_id' value='{{ $row['to_state_id'] }}'  class='form-control input-sm' /> 
            </label>
            <label for="City" class=" control-label col-md-3 text-left"> City 
            <input type='text' autocomplete='off' name='to_city' id='to_city' value='{{ $row['to_city'] }}' class='form-control input-sm' /> 
            </label>
            <label for="Zip" class=" control-label col-md-3 text-left"> Zip 
            <input  type='text' autocomplete='off' name='to_zip' id='to_zip' value='{{ $row['to_zip'] }}' class='form-control input-sm' /> 
            </label>
        </div>
    </div>
    <div class="form-group" >
        <h4>Travel Dates</h4>
        <label for="Check In" class=" control-label col-md-5 text-left"> Check In Date
        <input  type='text' autocomplete='off' name='check_in' id='check_in' value='{{ $row['check_in'] }}' required class='form-control input-sm ' data-datepicker="separateRange" /> 
        </label>
        <label for="Check Out" class=" control-label col-md-5 text-left"> Check Out Date
        <input  type='text' autocomplete='off' name='check_out' id='check_out' value='{{ $row['check_out'] }}' required class='form-control input-sm ' data-datepicker="separateRange" /> 
        </label>
    </div>
    <div class="form-group" >
        <h4>Budget Range - Price per Room</h4>
        <label for="Budget From" class=" control-label col-md-8 text-left">  </label><br /><br />
        <div class="col-md-8 offset-1">
            <div class="slider-container">
                <input type="text" id="slider3" class="slider" />
            </div>
            <input type='hidden' name='budget_from' id='budget_from' value='{{ $row['budget_from'] }}' required class='form-control input-sm ' /> 
            <input type='hidden' name='budget_to' id='budget_to' value='{{ $row['budget_to'] }}' required class='form-control input-sm ' /> 
        </div>
    </div>
    <div class="form-group" >
        <h4>Room Types - Select all that apply</h4>
        <label for="Double Queen Rooms" class="control-label col-md-5 text-left"> Double Queen Rooms 
        <select name='double_queen_qty' rows='5' id='double_queen_qty' class='select2' ></select> 
        </label>
        <label for="Double King Rooms" class=" control-label col-md-5 text-left"> Double King Rooms 
        <select name='double_king_qty' rows='5' id='double_king_qty' class='select2' ></select> 
        </label>
    </div>
    <div class="form-group" >
        <h4>Amenities</h4>
        <div class="col-md-11">
            {!! Helper::showAmenities() !!}
        </div>
        <br />
        <a href="" class="btn-light load" id="load" >Load More</a>
    </div>
    <div id='welcomeDiv'  style='display:none;' class='answer_list'>{!! Helper::showAmenitiesall() !!}</div>
    <script>
        $(document).ready(function(){
        
        $("#load").click(function(e){
          e.preventDefault();
            load.innerHTML = "Load Less";
            load.classList.add('spinning');
          
             setTimeout( 
          function  (){  
              load.classList.remove('spinning');
              load.innerHTML = "Load More";
              $("#welcomeDiv").show();
              
          }, 1000);
        });
        });
    </script>
    <div class="form-group" >
        <h4>Comments/Needs</h4>
        <label for="Comment" class="control-label col-md-8 text-left"> Anything we missed? </label>
        <div class="col-md-11">
            <textarea name='comment' rows='5' id='comment' class='form-control input-sm' >{{ $row['comment'] }}</textarea> 
        </div>
    </div>
    {!! Form::hidden('added', $row['added']) !!}
    {!! Form::hidden('status', $row['status']) !!}
    <div class="form-group">
        <label class="col-sm-4 text-right">&nbsp;</label>
        <div class="col-md-11">
            <button type="submit" name="submit" id="submit" class="btn btn-default btn-md pull-right" >Finalize </button>
        </div>
    </div>
    <input type="hidden" name="action_task" value="public" />
    {!! Form::close() !!}
</div>
<div class="col-md-6 right-section">
    <div class="pac-card" id="pac-card">
        <div>
            <div id="title">
                Autocomplete search Address
            </div>
            <div class="searchcontainer"></div>
        </div>
        <div id="map" class="trip-map" style="height:400px;"></div>
        <!--  <div id="infowindow-content">
            <img src="" width="16" height="16" id="place-icon">
            <span id="place-name"  class="title"></span><br>
            <span id="place-address"></span>
            </div> -->
        <script>
            var autocomplete = '';
            var map = '';
            var infowindow;
            var temp_infowindow = "";
            var markers = [];
            var locations=[];
            function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 25.790654, lng: -80.1300455},
                zoom: 4,
            
              });
              var card = document.getElementById('pac-card');
              var input = document.getElementById('from_address_1');
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
            
               infowindow = new google.maps.InfoWindow();
              var infowindowContent = document.getElementById('infowindow-content');
          
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
            
                infowindow.close();
               // marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                  window.alert("No details available for input: '" + place.name + "'");
                  return;
                }
                
            
            
                var address = '';
                if (place.address_components ) {
                  address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name ||''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                   
                  ].join(' ');
            
                this.addressArray = place.address_components;
                 if(this.addressArray.length === 9) {
                 
                    document.getElementById('from_city').value=this.addressArray[3].short_name;
                    document.getElementById('from_zip').value=this.addressArray[7].short_name;
                    document.getElementById('from_state_id').value=this.addressArray[5].long_name;
                 } 
                
                 else{
                    var zip=this.addressArray[6].short_name;
                    if(zip.match(/^\d+$/)) {
                      document.getElementById('from_zip').value=this.addressArray[6].short_name;  
                    }
                    else{
                        document.getElementById('from_zip').value='';   
                    }

                   document.getElementById('from_city').value=this.addressArray[2].short_name;
                   document.getElementById('from_state_id').value=this.addressArray[4].long_name;
                 }

                }
                 var from_zipcode = $('#from_zip').val();
                    $.ajax({
                  type : "POST",
                  //url: ajaxurl,
                  url:"zipHotel",
                    data: { "from_zip": from_zipcode},
                
                  success: function(result){
                      var obj = JSON.parse(result); //parse data with array
                      var i=0;
                       var global_customfn_ctn = 0;
                       $.each(obj, function(key1, value1) {
                         //var temp=[];
                           console.log(value1.address);
                           //temp[4]=value1.address;
                            geocoder = new google.maps.Geocoder();
                            geocoder.geocode( { 'address': value1.address}, function(results, status) {
                              if (status == google.maps.GeocoderStatus.OK) {
            
                              console.log("Latitude: "+results[0].geometry.location.lat());
                              console.log("Longitude: "+results[0].geometry.location.lng());
                                   var logo="uploads/users/"+ value1.logo;
                                 var img="uploads/users/"+ value1.property; 
                                 if(value1.service_type==1){
                                    var service='Full Service';
                                 }
                                 else{
                                     var service='Limited Service';
                                 }
                        var info_html = '<div class="info_pop_text">'+'<img alt="" src="'+logo+'" width="120" height="70" class="img-responsive" />'+ '<span style="padding:20px;">'+value1.name+'</span>'+'</img>'+ '<h5>Address: '+value1.address+'</h5>'+'<h5>Photo: '+'<img alt="" src="'+ img+'" width="70%" height="150" class="img-responsive" />'+'</h5>'+  '<h5>Service: '+service+'</h5>'+'</div>';
            
                  var temp=[];
                       temp[0]=value1.address;
                       temp[1]=results[0].geometry.location.lat();
                       temp[2]=results[0].geometry.location.lng();
                       temp[3]=value1.name;
                       temp[4]=logo;
                       temp[5]=img;
                       temp[6]=service;
                             
                       locations[key1]=temp; 
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng()),
                                    map: map
                                    
                                });
                                
                
            
                var searchresult = '<div class="location-text" onclick="return customfn(' + global_customfn_ctn + ');"><h4>' + value1.address + '</h4></div>';
                global_customfn_ctn++;
                jQuery(".searchcontainer").append(searchresult);
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(value1.lat,value1.long),
                    map: map,
                   
                });
                                markers.push(marker);
                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                
                    infowindow.close();
                    return function() {
                  
                        infowindow.setContent(info_html);
                        infowindow.open(map, marker);
                        //temp_infowindow = infowindow;
                    }
                })(marker, i));
                               
                          }
            
                        });
                    
                     i++;  
                   });
                   
                   
                  },
                     complete: function(){   
                    console.log(markers); 
            
                 },
            
                  error: function(response){
                        //alert(response);
                 }
                });
                    
                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
                infowindowContent.children['place-address'].textContent = address;
            
              });
            
            
                google.maps.event.addListener(autocomplete2, 'place_changed', function() {
            
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete2.getPlace();
                if (!place.geometry) {
                  window.alert("No details available for input: '" + place.name + "'");
                  return;
                }
                
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
                    document.getElementById('to_city').value=this.addressArray[3].short_name;
                    document.getElementById('to_zip').value=this.addressArray[7].short_name;
                   document.getElementById('to_state_id').value=this.addressArray[5].long_name;
                 } 
                
                 else{
                     this.street_number = this.addressArray[4].long_name;
                    //this.country = this.addressArray[5].short_name;
                     this.zipcode = this.addressArray[6].short_name;
                     this.city=this.addressArray[2].short_name;
                     document.getElementById('to_city').value=this.addressArray[2].short_name;
                     document.getElementById('to_zip').value=this.addressArray[6].short_name;
                     document.getElementById('to_state_id').value=this.addressArray[4].long_name;
                 }
                }
               
                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
              
                infowindowContent.children['place-address'].textContent = address;
            
                infowindow.open(map, marker);
              });
            
            
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
        <br /><br /><br /><br />
        <span>Sports Venue Location </span>
        <p>We'll find the best fit hotel closest to your event(s). </p>
        <br /><br />
        <span>Budget Range </span>
        <p>We'll make sure you'll get exactly what was promised. </p>
        <br /><br />
        <span>Room Types  </span>
        <p>We'll make sure you'll get exactly what was promised. </p>
    </div>
</div>
<div id="display_res" style=" color: #62bddf;font-size: 16px; padding: 10px 15px;width: 100%;"></div>
<script type="text/javascript">
    $(function() {
      $('#usertrips_form').validate({
     
       });
       });
</script>
<script type="text/javascript">
    $(document).ready(function() { 
    
        $("#from_state_id").jCombo("{!! url('usertrips/comboselect?filter=states:id:abbr|name') !!}",
        {  selected_value : '{{ $row["from_state_id"] }}' });
        
        $("#to_state_id").jCombo("{!! url('usertrips/comboselect?filter=states:id:abbr|name') !!}",
        {  selected_value : '{{ $row["to_state_id"] }}' });
        
        $("#double_queen_qty").jCombo("{!! url('UserTrip/comboselect?filter=room_qty:id:title') !!}",
        {  selected_value : '{{ $row["double_queen_qty"] }}' });
        
        $("#double_king_qty").jCombo("{!! url('UserTrip/comboselect?filter=room_qty:id:title') !!}",
        {  selected_value : '{{ $row["double_king_qty"] }}' });
        
    
        $('.removeCurrentFiles').on('click',function(){
            var removeUrl = $(this).attr('href');
            $.get(removeUrl,function(response){});
            $(this).parent('div').empty();  
            return false;
        }); 
    
    
        $('.select2').select2();
    
        var separator = ' - ', dateFormat = 'MM/DD/YYYY';
        var options = {
            autoUpdateInput: false,
            autoApply: true,
            locale: {
                format: dateFormat,
                separator: separator,
            },
            
            opens: "right"
        };
        
    
        $('[data-datepicker=separateRange]')
        .daterangepicker(options)
        .on('apply.daterangepicker' ,function(ev, picker) {
            var boolStart = this.name.match(/check_in/g) == null ? false : true;
            var boolEnd = this.name.match(/check_out/g) == null ? false : true;
        
            var mainName = this.name.replace('check_in', '');
            if(boolEnd) {
                mainName = this.name.replace('check_out', '');
                $(this).closest('form').find('[name=check_out'+ mainName +']').blur();
            }
        
            $(this).closest('form').find('[name=check_in'+ mainName +']').val(picker.startDate.format(dateFormat));
            $(this).closest('form').find('[name=check_out'+ mainName +']').val(picker.endDate.format(dateFormat));
        
            $(this).trigger('change').trigger('keyup');
        })
        .on('show.daterangepicker', function(ev, picker) {
            var boolStart = this.name.match(/check_in/g) == null ? false : true;
            var boolEnd = this.name.match(/check_out/g) == null ? false : true;
            var mainName = this.name.replace('check_in', '');
            if(boolEnd) {
                mainName = this.name.replace('check_out', '');
            }
        
            var startDate = $(this).closest('form').find('[name=check_in'+ mainName +']').val();
            var endDate = $(this).closest('form').find('[name=check_out'+ mainName +']').val();
        
            $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
            $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');
            
            if(boolEnd) {
                $('[name=daterangepicker_end]').focus();
            }
        });
    
    
    });
    
    (function () {
       'use strict';
    
       var init = function () {                
           var slider3 = new rSlider({
               target: '#slider3',
               values: {min: 10, max: 550},
               step: 10,
               range: true,
               set: [70, 350],
               scale: true,
               labels: false,
               onChange: function (vals) {
                   console.log(vals);
                   var result = vals.split(',');
    
                   $("#budget_from").val(result[0]);
                   $("#budget_to").val(result[1]);
               }
           });
       };
       window.onload = init;
    
    
       $(".another_location").hide("slow");
       $("#between_locations").on("click", function() {
        $(".another_location").toggle("slow");
       });
    })();
    
    
    
    !function(){"use strict";var t=function(t){this.input=null,this.inputDisplay=null,this.slider=null,this.sliderWidth=0,this.sliderLeft=0,this.pointerWidth=0,this.pointerR=null,this.pointerL=null,this.activePointer=null,this.selected=null,this.scale=null,this.step=0,this.tipL=null,this.tipR=null,this.timeout=null,this.valRange=!1,this.values={start:null,end:null},this.conf={target:null,values:null,set:null,range:!1,width:null,scale:!0,labels:!0,tooltip:!0,step:null,disabled:!1,onChange:null},this.cls={container:"rs-container",background:"rs-bg",selected:"rs-selected",pointer:"rs-pointer",scale:"rs-scale",noscale:"rs-noscale",tip:"rs-tooltip"};for(var i in this.conf)t.hasOwnProperty(i)&&(this.conf[i]=t[i]);this.init()};t.prototype.init=function(){return"object"==typeof this.conf.target?this.input=this.conf.target:this.input=document.getElementById(this.conf.target.replace("#","")),this.input?(this.inputDisplay=getComputedStyle(this.input,null).display,this.input.style.display="none",this.valRange=!(this.conf.values instanceof Array),!this.valRange||this.conf.values.hasOwnProperty("min")&&this.conf.values.hasOwnProperty("max")?this.createSlider():console.log("Missing min or max value...")):console.log("Cannot find target element...")},t.prototype.createSlider=function(){return this.slider=i("div",this.cls.container),this.slider.innerHTML='<div class="rs-bg"></div>',this.selected=i("div",this.cls.selected),this.pointerL=i("div",this.cls.pointer,["dir","left"]),this.scale=i("div",this.cls.scale),this.conf.tooltip&&(this.tipL=i("div",this.cls.tip),this.tipR=i("div",this.cls.tip),this.pointerL.appendChild(this.tipL)),this.slider.appendChild(this.selected),this.slider.appendChild(this.scale),this.slider.appendChild(this.pointerL),this.conf.range&&(this.pointerR=i("div",this.cls.pointer,["dir","right"]),this.conf.tooltip&&this.pointerR.appendChild(this.tipR),this.slider.appendChild(this.pointerR)),this.input.parentNode.insertBefore(this.slider,this.input.nextSibling),this.conf.width&&(this.slider.style.width=parseInt(this.conf.width)+"px"),this.sliderLeft=this.slider.getBoundingClientRect().left,this.sliderWidth=this.slider.clientWidth,this.pointerWidth=this.pointerL.clientWidth,this.conf.scale||this.slider.classList.add(this.cls.noscale),this.setInitialValues()},t.prototype.setInitialValues=function(){if(this.disabled(this.conf.disabled),this.valRange&&(this.conf.values=s(this.conf)),this.values.start=0,this.values.end=this.conf.range?this.conf.values.length-1:0,this.conf.set&&this.conf.set.length&&n(this.conf)){var t=this.conf.set;this.conf.range?(this.values.start=this.conf.values.indexOf(t[0]),this.values.end=this.conf.set[1]?this.conf.values.indexOf(t[1]):null):this.values.end=this.conf.values.indexOf(t[0])}return this.createScale()},t.prototype.createScale=function(t){this.step=this.sliderWidth/(this.conf.values.length-1);for(var e=0,s=this.conf.values.length;e<s;e++){var n=i("span"),l=i("ins");n.appendChild(l),this.scale.appendChild(n),n.style.width=e===s-1?0:this.step+"px",this.conf.labels?l.innerHTML=this.conf.values[e]:0!==e&&e!==s-1||(l.innerHTML=this.conf.values[e]),l.style.marginLeft=l.clientWidth/2*-1+"px"}return this.addEvents()},t.prototype.updateScale=function(){this.step=this.sliderWidth/(this.conf.values.length-1);for(var t=this.slider.querySelectorAll("span"),i=0,e=t.length;i<e;i++)t[i].style.width=this.step+"px";return this.setValues()},t.prototype.addEvents=function(){var t=this.slider.querySelectorAll("."+this.cls.pointer),i=this.slider.querySelectorAll("span");e(document,"mousemove touchmove",this.move.bind(this)),e(document,"mouseup touchend touchcancel",this.drop.bind(this));for(var s=0,n=t.length;s<n;s++)e(t[s],"mousedown touchstart",this.drag.bind(this));for(var s=0,n=i.length;s<n;s++)e(i[s],"click",this.onClickPiece.bind(this));return window.addEventListener("resize",this.onResize.bind(this)),this.setValues()},t.prototype.drag=function(t){if(t.preventDefault(),!this.conf.disabled){var i=t.target.getAttribute("data-dir");return"left"===i&&(this.activePointer=this.pointerL),"right"===i&&(this.activePointer=this.pointerR),this.slider.classList.add("sliding")}},t.prototype.move=function(t){if(this.activePointer&&!this.conf.disabled){var i=("touchmove"===t.type?t.touches[0].clientX:t.pageX)-this.sliderLeft-this.pointerWidth/2;return(i=Math.round(i/this.step))<=0&&(i=0),i>this.conf.values.length-1&&(i=this.conf.values.length-1),this.conf.range?(this.activePointer===this.pointerL&&(this.values.start=i),this.activePointer===this.pointerR&&(this.values.end=i)):this.values.end=i,this.setValues()}},t.prototype.drop=function(){this.activePointer=null},t.prototype.setValues=function(t,i){var e=this.conf.range?"start":"end";return t&&this.conf.values.indexOf(t)>-1&&(this.values[e]=this.conf.values.indexOf(t)),i&&this.conf.values.indexOf(i)>-1&&(this.values.end=this.conf.values.indexOf(i)),this.conf.range&&this.values.start>this.values.end&&(this.values.start=this.values.end),this.pointerL.style.left=this.values[e]*this.step-this.pointerWidth/2+"px",this.conf.range?(this.conf.tooltip&&(this.tipL.innerHTML=this.conf.values[this.values.start],this.tipR.innerHTML=this.conf.values[this.values.end]),this.input.value=this.conf.values[this.values.start]+","+this.conf.values[this.values.end],this.pointerR.style.left=this.values.end*this.step-this.pointerWidth/2+"px"):(this.conf.tooltip&&(this.tipL.innerHTML=this.conf.values[this.values.end]),this.input.value=this.conf.values[this.values.end]),this.values.end>this.conf.values.length-1&&(this.values.end=this.conf.values.length-1),this.values.start<0&&(this.values.start=0),this.selected.style.width=(this.values.end-this.values.start)*this.step+"px",this.selected.style.left=this.values.start*this.step+"px",this.onChange()},t.prototype.onClickPiece=function(t){if(!this.conf.disabled){var i=Math.round((t.clientX-this.sliderLeft)/this.step);return i>this.conf.values.length-1&&(i=this.conf.values.length-1),i<0&&(i=0),this.conf.range&&i-this.values.start<=this.values.end-i?this.values.start=i:this.values.end=i,this.slider.classList.remove("sliding"),this.setValues()}},t.prototype.onChange=function(){var t=this;this.timeout&&clearTimeout(this.timeout),this.timeout=setTimeout(function(){if(t.conf.onChange&&"function"==typeof t.conf.onChange)return t.conf.onChange(t.input.value)},500)},t.prototype.onResize=function(){return this.sliderLeft=this.slider.getBoundingClientRect().left,this.sliderWidth=this.slider.clientWidth,this.updateScale()},t.prototype.disabled=function(t){this.conf.disabled=t,this.slider.classList[t?"add":"remove"]("disabled")},t.prototype.getValue=function(){return this.input.value},t.prototype.destroy=function(){this.input.style.display=this.inputDisplay,this.slider.remove()};var i=function(t,i,e){var s=document.createElement(t);return i&&(s.className=i),e&&2===e.length&&s.setAttribute("data-"+e[0],e[1]),s},e=function(t,i,e){for(var s=i.split(" "),n=0,l=s.length;n<l;n++)t.addEventListener(s[n],e)},s=function(t){var i=[],e=t.values.max-t.values.min;if(!t.step)return console.log("No step defined..."),[t.values.min,t.values.max];for(var s=0,n=e/t.step;s<n;s++)i.push(t.values.min+s*t.step);return i.indexOf(t.values.max)<0&&i.push(t.values.max),i},n=function(t){return!t.set||t.set.length<1?null:t.values.indexOf(t.set[0])<0?null:!t.range||!(t.set.length<2||t.values.indexOf(t.set[1])<0)||null};window.rSlider=t}();
    
    
</script>
<?php 
    function getDatesFromRange($start, $end, $format = 'm/d/Y') { 
     // Declare an empty array 
         $array = array(); 
        
         $interval = new DateInterval('P1D'); 
         $realEnd = new DateTime($end); 
         $realEnd->add($interval); 
         $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
         foreach($period as $date) {                  
             $array[] = $date->format($format);  
         } 
       
         return $array; 
        } 
    
        $data_hotel=DB::table('hotels')->where('blackout_start','!=','')->get();
        foreach($data_hotel as $value){
        $name=$value->name;
        $hotel = DB::table('hotels')->where('hotels.name', '=', $name)->get();  
        
        $array[$name] = $value->blackout_start;
        foreach ($hotel as $hotels => $value) {
         $blackout=$value->blackout_start;
         $blackoutend=$value->blackout_end;
        $DB_Blackout_Date = getDatesFromRange($blackout, $blackoutend); 
        $date_new=implode('", "', $DB_Blackout_Date);
        }
    }
    ?>
<script type="text/javascript">
    $(document).ready(function() { 
    $('#check_in').on('keyup', function() {
    var check_in = $('#check_in').val();
    var check_out = $('#check_out').val();
    var startDate = formatDate(new Date(check_in)); //YYYY-MM-DD
    var endDate = formatDate(new Date(check_out)); //YYYY-MM-DD
    
    var getDateArray = function(start, end) {
    var arr = new Array();
    var dt = start;//new Date(start);
    while (dt <= end) {
      arr.push(dt);
      var dt = new Date(dt);
      var dtt = formatDate(dt.setDate(dt.getDate() + 1));
       dt=dtt;
    }
    return arr;
    }
    function formatDate(date) {
    var d = new Date(date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();
    
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    
    return [month,day, year].join('/');
    }
    
    var dateArr = getDateArray(startDate, endDate);
    
    var blackout_dates = []; 
    var blackout_dates1 = []; 
    <?php foreach ($DB_Blackout_Date as $bo_date) { ?>
        blackout_dates.push("<?php echo $bo_date; ?>")
    <?php } ?>
    
    for(var i=0; i<blackout_dates.length;i++){
        if(dateArr.includes(blackout_dates[i])){
           blackout_dates1.push(blackout_dates[i]);
         }
    }
    if(blackout_dates1 !=''){
     alert('You have selected following blackout dates for your booking requests, this may impact availability'+'\n'+blackout_dates1);
    }
    else{
       alert('No blackout dates for your booking requests!!');  
    }
        var blackin = '<?php echo $blackout; ?>';
        var blackout = '<?php echo $blackoutend; ?>';
         
    
       
    });
    });
</script>
<script>
    function customfn(id) {
        if (infowindow) {
            infowindow.close();
        }
        var latlong = {
            lat: locations[id][1],
            lng: locations[id][2]
        };
       var info_html='<div class="info_pop_text">'+'<img alt="" src="'+ locations[id][4]+'" width="120" height="70" class="img-responsive" />'+ '<span style="padding:20px;">'+ locations[id][3]+'</span>'+'</img>'+ '<h5>Address: '+ locations[id][0]+'</h5>'+'<h5>Photo: '+'<img alt="" src="'+  locations[id][5]+'" width="70%" height="150" class="img-responsive" />'+'</h5>'+  '<h5>Service: '+ locations[id][6]+'</h5>'+'</div>';
                     
        var infowindow = new google.maps.InfoWindow({
          content: info_html
        });
       var image='uploads/users/google-map-marker.png';
        for (var j = markers.length - 1; j >= 0; j--) {
           
            google.maps.event.addListener(markers[j], "click", function(e) {
                infowindow.close();
                for (var p = markers.length - 1; p >= 0; p--) {
                   markers[p].setIcon(image);
    
                }
                
            });
        }
        google.maps.event.addListener(infowindow, 'closeclick', function() {
            var infolan = infowindow.position.lng();
            for (var p = markers.length - 1; p >= 0; p--) {
                if (markers[p].position.lng() == infolan) {
                    markers[p].setIcon(image);
                   
                }
            }
        });
    
        if(temp_infowindow != ""){
            temp_infowindow.close();
        }
    
        infowindow.open(map, markers[id]);
        temp_infowindow = infowindow;
        
    }
</script>