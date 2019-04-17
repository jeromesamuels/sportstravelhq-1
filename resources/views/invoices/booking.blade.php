@extends('layouts.app')
@section('content')
<style type="text/css">
    .dashboard-container .info-boxes {
    background: #eae7ee; 
    color: #240849;
    margin: 10px 0;
    padding: 10px 0;
    font-size: 20px;
    }
    .dashboard-container .info-boxes h3 {
    line-height: 20px;
    margin: 5px 0;
    }
    .dashboard-container .widget-box {
    margin: 10px;
    }
    .dashboard-container .widget-box .head {
    border-bottom: solid 1px #EEE;
    }
    .dashboard-container .widget-box .body table {
    width: 95%;
    margin: 10px auto;
    }
    .dashboard-container .widget-box .body table tr th {
    padding: 10px;
    background: #240849; 
    color: #FFFFFF;
    }
    .dashboard-container .widget-box .body table tr td {
    padding: 10px;
    border-bottom: solid 1px #EEE;
    }
    .dashboard-container .widget-box .body ul {
    list-style: none;
    padding: 0px;
    margin: 0;
    }
    .dashboard-container .widget-box .body ul li {
    padding: 10px;
    border-bottom: dotted 1px #EEE;
    }
    .dashboard-container .widget-box .body ul li strong {
    color: #e9955f
    }
    .dashboard-container .widget-box .head span {
    color: #240849;
    font-size: 16px;
    font-weight: bold;
    line-height: 50px;
    padding: 10px;
    }
    .box-shadow {
    -webkit-box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
    -moz-box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
    box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
    }
    .page-header {
    margin-top: 25px;
    }
    .sbox b {
    text-align: left;
    }
    .state_report .details_button{
    border: 1px solid #eee !important;
    border-radius: 25px !important;
    width: 100px;
    color: #000;
    font-weight: normal;
    }
    .canvasjs-chart-toolbar{
    display: none;
    }
    .hotel_range{
    background-color: #000;
    height: 6px;
    border-radius: 5px;
    }
    .skills {
    text-align: right;
    padding: 0;
    color: #000;
    }
    .final_range{
    width: 100%;
    background-color: #ddd;
    }
    #map {
    height: 400px;
    }
    #listing {
    position: absolute;
    width: 300px;
    height: 400px;
    overflow: auto;
    left: 500px;
    top: 0px;
    cursor: pointer;
    overflow-x: hidden;
    }
    #findhotels {
    position: absolute;
    text-align: right;
    width: 100px;
    font-size: 14px;
    padding: 4px;
    z-index: 5;
    background-color: #fff;
    }
    #locationField {
    position: absolute;
    width: 300px;
    height: 25px;
    left: 120px;
    top: 0px;
    z-index: 5;
    background-color: #fff;
    }
    #controls {
    position: absolute;
    left: 430px;
    width: 200px;
    top: 0px;
    z-index: 5;
    background-color: #fff;
    }
    #autocomplete {
    width: 100%;
    }
    #country {
    width: 100%;
    height: 39px;
    }
    .placeIcon {
    width: 20px;
    height: 34px;
    margin: 4px;
    }
    .hotelIcon {
    width: 24px;
    height: 24px;
    }
    #resultsTable {
    border-collapse: collapse;
    width: 240px;
    }
    #rating {
    font-size: 13px;
    font-family: Arial Unicode MS;
    }
    .iw_table_row {
    height: 18px;
    }
    .iw_attribute_name {
    font-weight: bold;
    text-align: right;
    }
    .iw_table_icon {
    text-align: right;
    }
    .gm-style .gm-style-iw-c{
    transform: translate(-75%,-100%);
    }
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<section class="page-header row">
    <h1>Dashboard </h1>
    <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Booking </span>
</section>
<div class="page-content row">
<div class="page-content-wrapper no-margin">
<div class="sbox" style="border-top: none">
    <div class="sbox-content dashboard-container">
        @foreach($data_hotel as $value)
        <?php 
            $name=$value->type;
            $currentMonth = date('m');
            /*Amount Paid*/
            $purchases = DB::table('invoices')->sum('invoices.amt_paid');    
            
              $sum_new =$purchases;
            
            /* pending amount*/
            $purchases_due = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->sum('invoices.est_amt_due');    
             $array[$name] = $purchases_due;
              $y = $array[$value->type];
              $sum_due =array_sum($array);
              $revenu_due=$sum_new-$sum_due;
            
            
            ?>
        @endforeach
        <div class="row" style="border-bottom:1px solid #eee;">
            <h2 style="padding-bottom: 20px;">Booking Overview</h2>
        </div>
        <div class="row" >
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4>Estimated Revenue</h4>
                    <p style="font-size: 14px;">Total Revenue </p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;color: #5dbbe0;">${{ $sum_due }}</h4>
                </div>
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:78%;height: 6px;background-color: #000000;">
                    </div>
                </div>
                <p style="float: left;">Processed RFP</p>
                <p style="float: right;">78%</p>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >State Revenue</h4>
                    <p style="font-size: 14px;">Total Revenue </p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                </div>
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:84%;height: 6px;background-color: #000000;">
                    </div>
                </div>
                <p style="float: left;">All Corporate</p>
                <p style="float: right;">84%</p>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Paid Invoice</h4>
                    <p style="font-size: 14px;">Total Revenue </p>
                </div>
                <?php 
                    $data2= DB::table('rfps')->get()->where("status",'!=',3)->all();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                </div>
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:69%;height: 6px;background-color: #000000;">
                    </div>
                </div>
                <p style="float: left;">All Manager</p>
                <p style="float: right;">69%</p>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Open Invoice</h4>
                    <p style="font-size: 14px;">Total Revenue</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right:10px;">${{ $sum_new }}</h4>
                </div>
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:50%;height: 6px;background-color: #5dbbe0;">
                    </div>
                </div>
                <p style="float: left;">All Proposals</p>
                <p style="float: right;">50%</p>
            </div>
        </div>
    </div>
</div>
@foreach($data_hotel as $value)
<?php 
    $name=$value->type;
    
     $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->sum('invoices.amt_paid');    
     $array[$name] = $purchases;
    
    ?>
@endforeach
<div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
    <div class="sbox-content dashboard-container" style=" padding: 0;">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <span>Booking By Corporate</span>                        
                    </div>
                    <div class="body">
                        <table class="table">
                            @foreach($data_hotel as $value)
                            <?php  
                                $sum=0;
                                $hotel_type=$value->type; 
                                 $y = $array[$value->type];
                                 $sum =array_sum($array);
                                
                                 //$count = count( $value->type);
                                $purchases_all = DB::table('invoices')->where('hotel_type', $value->type)->get();
                                
                                
                                 ?>
                            <tr>
                                <td style="width: 20%;">  <img alt="" src="../uploads/users/<?php echo $value->logo;?>" id="div_corporate_img" border="0" width="60" style="margin-top: 30px;" class="img-responsive"></td>
                                <td>
                                    <div class="hotel_revenue" style=" padding: 15px;">
                                        <h4 >{{ count($purchases_all) }} <span style="font-size: 15px;color: #7b7777;padding-left: 5px;">Bookings</span></h4>
                                        <p style="float: right;float: right;top: -25px;position: relative;color: #5dbbe0;    font-weight: bold;font-size: 16px;"><?php echo  $y; ?>$</p>
                                        <?php 
                                            $playerson = $y;
                                             $maxplayers = $sum;
                                            
                                             $percentage =($playerson / $maxplayers) * 100; // floor (round down) optional
                                             $type_percent=round($percentage);
                                            ?>
                                        <div class="final_range">
                                            <div class="skills hotel_range" style="width:<?php echo  $type_percent; ?>%">
                                            </div>
                                            <h5 style="float: left; padding-top: 10px;"><?php echo  $hotel_type; ?></h5>
                                            <p style="float: right;right: 70px;padding-top: 10px;position: absolute;"><?php echo  $type_percent; ?>%</p>
                                        </div>
                                    </div>
                                    <br /><br />
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="head">
                                <span>Booking by Hotels</span>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div id="findhotels">
                                Find hotels in:
                            </div>
                            <div id="locationField">
                                <input id="autocomplete" placeholder="Search By Address" type="text" class="form-control input-sm onsearch" >
                            </div>
                            <div id="controls" >
                                <select id="country" class="form-control input-sm onsearch">
                                    <option value="all">All</option>
                                    <option value="au">Australia</option>
                                    <option value="br">Brazil</option>
                                    <option value="ca">Canada</option>
                                    <option value="fr">France</option>
                                    <option value="de">Germany</option>
                                    <option value="mx">Mexico</option>
                                    <option value="nz">New Zealand</option>
                                    <option value="it">Italy</option>
                                    <option value="za">South Africa</option>
                                    <option value="es">Spain</option>
                                    <option value="pt">Portugal</option>
                                    <option value="us" selected>U.S.A.</option>
                                    <option value="uk">United Kingdom</option>
                                </select>
                            </div>
                            <div style="display: none">
                                <div id="info-content">
                                    <table>
                                        <tr id="iw-url-row" class="iw_table_row">
                                            <td id="iw-icon" class="iw_table_icon"></td>
                                            <td id="iw-url"></td>
                                        </tr>
                                        <tr id="iw-photo-row" class="iw_table_row">
                                            <td class="iw_attribute_name">Photo:</td>
                                            <td id="iw-photo"></td>
                                        </tr>
                                        <tr id="iw-address-row" class="iw_table_row">
                                            <td class="iw_attribute_name">Address:</td>
                                            <td id="iw-address"></td>
                                        </tr>
                                        <tr id="iw-phone-row" class="iw_table_row">
                                            <td class="iw_attribute_name">Telephone:</td>
                                            <td id="iw-phone"></td>
                                        </tr>
                                        <tr id="iw-rating-row" class="iw_table_row">
                                            <td class="iw_attribute_name">Rating:</td>
                                            <td id="iw-rating"></td>
                                        </tr>
                                        <!--  <tr id="iw-website-row" class="iw_table_row">
                                            <td class="iw_attribute_name">Website:</td>
                                            <td id="iw-website"></td>
                                            </tr>  -->
                                        <tr id="btn_acess" class="iw_table_row">
                                            <td></td>
                                            <td class="btn_acess"><a href="http://13.92.240.159/demo/public/systemadmin/hotels"><button class="btn btn-small btn-info" style="border-radius: 25px;">Details</button></a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <script>
                                var map, places, infoWindow;
                                var markers = [];
                                var autocomplete;
                                var countryRestrict = {'country': 'us'};
                                var MARKER_PATH = 'https://developers.google.com/maps/documentation/javascript/images/marker_green';
                                var hostnameRegexp = new RegExp('^https?://.+?/');
                                
                                var countries = {
                                  'au': {
                                    center: {lat: -25.3, lng: 133.8},
                                    zoom: 4
                                  },
                                  'br': {
                                    center: {lat: -14.2, lng: -51.9},
                                    zoom: 3
                                  },
                                  'ca': {
                                    center: {lat: 62, lng: -110.0},
                                    zoom: 3
                                  },
                                  'fr': {
                                    center: {lat: 46.2, lng: 2.2},
                                    zoom: 5
                                  },
                                  'de': {
                                    center: {lat: 51.2, lng: 10.4},
                                    zoom: 5
                                  },
                                  'mx': {
                                    center: {lat: 23.6, lng: -102.5},
                                    zoom: 4
                                  },
                                  'nz': {
                                    center: {lat: -40.9, lng: 174.9},
                                    zoom: 5
                                  },
                                  'it': {
                                    center: {lat: 41.9, lng: 12.6},
                                    zoom: 5
                                  },
                                  'za': {
                                    center: {lat: -30.6, lng: 22.9},
                                    zoom: 5
                                  },
                                  'es': {
                                    center: {lat: 40.5, lng: -3.7},
                                    zoom: 5
                                  },
                                  'pt': {
                                    center: {lat: 39.4, lng: -8.2},
                                    zoom: 6
                                  },
                                  'us': {
                                    center: {lat: 37.1, lng: -95.7},
                                    zoom: 3
                                  },
                                  'uk': {
                                    center: {lat: 54.8, lng: -4.6},
                                    zoom: 5
                                  }
                                };
                                
                                function initMap() {
                                  map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: countries['us'].zoom,
                                    center: countries['us'].center,
                                    mapTypeControl: false,
                                    panControl: false,
                                    zoomControl: false,
                                    streetViewControl: false
                                  });
                                
                                  infoWindow = new google.maps.InfoWindow({
                                    content: document.getElementById('info-content')
                                  });
                                
                                  // Create the autocomplete object and associate it with the UI input control.
                                  // Restrict the search to the default country, and to place type "cities".
                                  autocomplete = new google.maps.places.Autocomplete(
                                      /** @type {!HTMLInputElement} */ (
                                          document.getElementById('autocomplete')), {
                                        types: ['address'],
                                        componentRestrictions: countryRestrict
                                      });
                                  places = new google.maps.places.PlacesService(map);
                                
                                  autocomplete.addListener('place_changed', onPlaceChanged);
                                
                                  // Add a DOM event listener to react when the user selects a country.
                                  document.getElementById('country').addEventListener(
                                      'change', setAutocompleteCountry);
                                }
                                
                                // When the user selects a city, get the place details for the city and
                                // zoom the map in on the city.
                                function onPlaceChanged() {
                                  var place = autocomplete.getPlace();
                                  if (place.geometry) {
                                    map.panTo(place.geometry.location);
                                    map.setZoom(15);
                                    search();
                                  } else {
                                    document.getElementById('autocomplete').placeholder = 'Search By Address';
                                  }
                                }
                                
                                // Search for hotels in the selected city, within the viewport of the map.
                                function search() {
                                  var search = {
                                    bounds: map.getBounds(),
                                    types: ['lodging']
                                  };
                                
                                  places.nearbySearch(search, function(results, status) {
                                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                                      clearResults();
                                      clearMarkers();
                                      
                                      for (var i = 0; i < results.length; i++) {
                                        var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
                                        var markerIcon = MARKER_PATH + markerLetter + '.png';
                                      
                                        markers[i] = new google.maps.Marker({
                                          position: results[i].geometry.location,
                                          animation: google.maps.Animation.DROP,
                                          icon: markerIcon
                                        });
                                        // If the user clicks a hotel marker, show the details of that hotel
                                        // in an info window.
                                        markers[i].placeResult = results[i];
                                        google.maps.event.addListener(markers[i], 'click', showInfoWindow);
                                        setTimeout(dropMarker(i), i * 100);
                                        addResult(results[i], i);
                                         
                                      }
                                    }
                                  });
                                }
                                
                                function clearMarkers() {
                                  for (var i = 0; i < markers.length; i++) {
                                    if (markers[i]) {
                                      markers[i].setMap(null);
                                    }
                                  }
                                  markers = [];
                                }
                                
                                // Set the country restriction based on user input.
                                // Also center and zoom the map on the given country.
                                function setAutocompleteCountry() {
                                  var country = document.getElementById('country').value;
                                  if (country == 'all') {
                                    autocomplete.setComponentRestrictions({'country': []});
                                    map.setCenter({lat: 15, lng: 0});
                                    map.setZoom(2);
                                  } else {
                                    autocomplete.setComponentRestrictions({'country': country});
                                    map.setCenter(countries[country].center);
                                    map.setZoom(countries[country].zoom);
                                  }
                                  clearResults();
                                  clearMarkers();
                                }
                                
                                function dropMarker(i) {
                                  return function() {
                                    markers[i].setMap(map);
                                  };
                                }
                                
                                function addResult(result, i) {
                                
                                  var results = document.getElementById('results');
                                  var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
                                  var markerIcon = MARKER_PATH + markerLetter + '.png';
                                  
                                  var tr = document.createElement('tr');
                                  tr.style.backgroundColor = (i % 2 === 0 ? '#F0F0F0' : '#FFFFFF');
                                  tr.onclick = function() {
                                    google.maps.event.trigger(markers[i], 'click');
                                  };
                                
                                  var iconTd = document.createElement('td');
                                  var nameTd = document.createElement('td');
                                  var icon = document.createElement('img');
                                 
                                  icon.src = markerIcon;
                                  icon.setAttribute('class', 'placeIcon');
                                  icon.setAttribute('className', 'placeIcon');
                                  var name = document.createTextNode(result.name);
                                  iconTd.appendChild(icon);
                                  nameTd.appendChild(name);
                                  tr.appendChild(iconTd);
                                  tr.appendChild(nameTd);
                                  results.appendChild(tr);
                                }
                                
                                function clearResults() {
                                  var results = document.getElementById('results');
                                  while (results.childNodes[0]) {
                                    results.removeChild(results.childNodes[0]);
                                  }
                                }
                                
                                // Get the place details for a hotel. Show the information in an info window,
                                // anchored on the marker for the hotel that the user selected.
                                function showInfoWindow() {
                                  var marker = this;
                                  places.getDetails({placeId: marker.placeResult.place_id},
                                      function(place, status) {
                                        console.log(place);
                                        if (status !== google.maps.places.PlacesServiceStatus.OK) {
                                          return;
                                        }
                                        infoWindow.open(map, marker);
                                        buildIWContent(place);
                                      });
                                }
                                
                                // Load the place information into the HTML elements used by the info window.
                                function buildIWContent(place) {
                                  document.getElementById('iw-icon').innerHTML = '<img class="hotelIcon" ' +
                                      'src="' + place.icon + '"/>';
                                  document.getElementById('iw-url').innerHTML = '<b><a href="' + place.url +
                                      '">' + place.name + '</a></b>';
                                  document.getElementById('iw-address').textContent = place.vicinity;
                                
                                
                                  if (place.formatted_phone_number) {
                                    document.getElementById('iw-phone-row').style.display = '';
                                    document.getElementById('iw-phone').textContent =
                                        place.formatted_phone_number;
                                  } else {
                                    document.getElementById('iw-phone-row').style.display = 'none';
                                  }
                                 
                                  var photos = place.photos[0].getUrl({
                                                maxWidth: 100
                                              });
                                  
                                  if (photos) {
                                      
                                        /*  var hotelPhoto = '<img src="' + photos  + '" />';
                                          $("#hotel").html(hotelPhoto); */
                                          document.getElementById('iw-photo-row').style.display = '';
                                         document.getElementById('iw-photo').innerHTML = '<img class="" ' +
                                      'src="' + photos+ '"/>';
                                   }
                                   else{
                                      document.getElementById('iw-photo-row').style.display = 'none';
                                   }
                                 
                                 
                                  if (place.rating) {
                                    var ratingHtml = '';
                                    for (var i = 0; i < 5; i++) {
                                      if (place.rating < (i + 0.5)) {
                                        ratingHtml += '&#10025;';
                                      } else {
                                        ratingHtml += '&#10029;';
                                      }
                                    document.getElementById('iw-rating-row').style.display = '';
                                    document.getElementById('iw-rating').innerHTML = ratingHtml;
                                    }
                                  } else {
                                    document.getElementById('iw-rating-row').style.display = 'none';
                                  }
                                
                                  if (place.website) {
                                    var fullUrl = place.website;
                                    var website = hostnameRegexp.exec(place.website);
                                    if (website === null) {
                                      website = 'http://' + place.website + '/';
                                      fullUrl = website;
                                    }
                                    document.getElementById('iw-website-row').style.display = '';
                                    document.getElementById('iw-website').textContent = website;
                                  } else {
                                    document.getElementById('iw-website-row').style.display = 'none';
                                  }
                                }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCM3IVfk3icA92tlWTGZRMg__v7dKnDaWc&libraries=places&callback=initMap"
                                async defer></script>
                        </div>
                        <div class="col-sm-12">
                            <div class="body">
                                <div id="map" ></div>
                                <div id="listing">
                                    <table id="resultsTable">
                                        <tbody id="results"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
    <div class="sbox-content dashboard-container" style=" padding: 0;">
        <div class="row">
            <div class="col-md-4">
                <div class="widget-box box-shadow" style=" margin: 0;background: #5dbbe0;padding: 20px;">
                    <div class="head">
                        <h3 style="color:#fff;">Revenue</h3>
                    </div>
                    <br />
                    <div class="body">
                        <h1 style="color:#fff;font-size: 40px;">${{ $sum }}</h1>
                        <p style="color:#fff;">Total Revenue till today</p>
                    </div>
                </div>
            </div>
            <?php 
                $data= DB::table('user_trips')->get();
                      
                ?>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3>Booking</h3>
                    </div>
                    <br />
                    <div class="body">
                        <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data)}}</h1>
                        <p>Total Booking till today</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                   
                    <div class="head">
                        <h3 >Users</h3>
                    </div>
                    <br />
                    <div class="body">
                        <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data_user) }}</h1>
                        <p>Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
    
    });
    
</script>
@stop