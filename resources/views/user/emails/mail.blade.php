<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>

		<div style="background-color: #f5f5f5;padding: 30px; width:75%;margin:50px auto;box-shadow: 0px 1px 3px 2px #ccc;">
		<img src="{{ asset('frontend/sportstravel/assets/images/logo.png') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" height="50" ><br />
		<h1>Hi, {{ $data['name'] }}</h1>
        <p>Coordinator Uploaded the rooming list of trip id - #{{$data['trip_id']}}</p>
        <h4>CSV send as a attachment, please have a look and make a Invoice </h4>
      
		<p><a href="http://13.92.240.159/demo/public">http://13.92.240.159/demo/public</a></p>
		<br /><p> Thank You. </p>
		</div>
	</body>
</html>