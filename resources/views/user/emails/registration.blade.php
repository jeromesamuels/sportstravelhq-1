<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>

		<div style="background-color: #f5f5f5;padding: 30px; width:75%;margin:50px auto;box-shadow: 0px 1px 3px 2px #ccc;">
		<img src="{{ asset('frontend/sportstravel/assets/images/logo.png') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" height="50" ><br />
		<h2> Thanks For Registering at {{ config('sximo.cnf_appname') }}  </h2>
		<h3>Hi {{ $firstname }} , </h3>
		<p>Thank you for creating your account at {{ config('sximo.cnf_appname') }}. Your account details are as follows:</p>
		<p>
			<b>Email</b> : {{ $email }} <br />
			<b>Password</b> : {{ $password }}<br />
		</p>
		<p> To sign into your account, please visit  <a href="{{ URL::to('user/activation?code='.$code) }}">{{ URL::to('user/activation?code='.$code) }}</a>
			or <span><a href="{{ URL::to('user/activation?code='.$code) }}">Click here</a></span></p>

		<p> If you have any questions regarding your account, click 'Reply' in your emil client we'll be only to happy to help.</p>
		
		<br />
		<h3>{{ config('sximo.cnf_appname') }} </h3>
		<p><a href="http://13.92.240.159/demo/public">http://13.92.240.159/demo/public</a></p>
		<br /><p> Thank You </p>
		</div>
	</body>
</html>