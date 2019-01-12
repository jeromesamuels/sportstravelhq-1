<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<p>Hello  ,</p>
		<p> You are invited to join <b>{{ $cnf_appname }}</b>, Bellow is the link for registering with us:  </p>

		<a href="{{ URL::to('/') }}/user/register_tc?tc_email={{ $to }}&group_id={{ $group_id }}" >Click Here</a>
		
		<p> Thank You </p><br /><br />
		
		<h3>{{ $cnf_appname }}</h3> 
	</body>
</html>