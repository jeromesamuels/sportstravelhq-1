<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>

		<div style="background-color: #f5f5f5;padding: 30px; width:75%;margin:50px auto;box-shadow: 0px 1px 3px 2px #ccc;">
		<img src="{{ asset('frontend/sportstravel/assets/images/logo.png') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" height="50" ><br />
		<h1>Hi, there</h1>
		<h3> {{ $data_guest['coordinator_name'] }}  added a new trip </h3>
      
        <h4>Here is the Details of the trip  </h4>
             <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #f5f5f5; border-radius: 3px;margin:10px 40px auto;box-shadow: 0px 1px 3px 2px #ccc; padding: 20px;">

              <!-- START MAIN CONTENT AREA -->
            
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Trip ID : #{{ $data_guest['trip_id']}} </tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Trip Name:  {{ $data_guest['trip_name']}}</tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Address: {{ $data_guest['adddress']}} </tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">City: {{ $data_guest['city']}}</tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">State: {{ $data_guest['state']}} </tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Zipcode: {{ $data_guest['zip_code']}} </tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Check In-Check Out:  {{ $data_guest['check_in']}} to {{$data_guest['check_out']}} </tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Budget from-Budget to: {{ $data_guest['budget_from']}} to {{$data_guest['budget_to']}} </tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Double Queen Quantity:  {{ $data_guest['double_queen_qty']}}</tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Double King Quantity:  {{ $data_guest['double_king_qty']}}</tr>
                      <tr style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Added Date: {{ $data_guest['added']}}</tr>

                     
                   
            <!-- END MAIN CONTENT AREA -->
            </table>

            <a href="{{ route('hotelmanager.trips.guestShow',[$data_guest['trip_id'],$data_guest['email']]) }}" style=" background-color: #4CAF50;border: none; color: white;padding: 8px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;font-family: sans-serif;">Bid Now</a>

		<p><a href="http://13.92.240.159/demo/public">http://13.92.240.159/demo/public</a></p>
		<p> Thank You. </p>
		</div>
	</body>
</html>