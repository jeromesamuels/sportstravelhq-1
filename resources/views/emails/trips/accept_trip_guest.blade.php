<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

    <div style="background-color: #f5f5f5;padding: 30px; width:75%;margin:50px auto;box-shadow: 0px 1px 3px 2px #ccc;">
    <img src="{{ asset('frontend/sportstravel/assets/images/logo.png') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" height="50" ><br />
    <h1>Hi, there</h1>
    <h3> Coordinator has  Accepted your trip  #{{ $data_guest['trip_id']}}</h3>
      
    
            <p>For More details and Accept the aggreemet need to login with SportTravelHQ</p>


           <a href="{{ URL::to('/') }}/user/register_tc?tc_email={{ $data_guest['to_guest'] }}&group_id={{ $data_guest['group'] }}" >Click Here to Register</a>

    <p><a href="http://13.92.240.159/demo/public">http://13.92.240.159/demo/public</a></p>
    <p> Thank You. </p>
    </div>
  </body>
</html>