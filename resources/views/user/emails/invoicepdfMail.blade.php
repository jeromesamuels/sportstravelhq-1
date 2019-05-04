
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<style>
	.trip-details tbody tr td, .trip-details tbody tr th {
	    padding: 6px;
	    border-top: 0;
	    border-bottom: 0;
	}
	.sbox-title{
	    padding: 10px 0px 10px;
	}
	.page-header {
	    margin-top: 0px;
	    margin-bottom: 25px;
	    padding: 5px 25px;
	    border-bottom: 5px solid #95d1ea;
	}
	.sbox-content{
	      border-bottom: 5px solid #eee;  
	}
	.table-bordered thead tr th,.table-bordered tbody tr td, .table-bordered tbody tr th{
	    padding: 10px;
	    border: 1px solid #080707;
	}
   
   
		</style>
	</head>
	<body>
      
		<div style="background-color: #eee;padding: 30px; width:75%;margin:50px auto;box-shadow: 0px 1px 3px 2px #ccc;">
		<img src="{{ asset('frontend/sportstravel/assets/images/logo.png') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" height="50" ><br />
		 <h3>Hi, {{ $data['email'] }}</h3>
  
         <h4 class="invoice-details">{{ $data['name'] }} send a Invoices</h4>
         
           <div class="sbox-content">
                
                @include('includes.alerts')

                <div class="row">
                	
                   <p>Please see the attachement</p>
               
				    <div style="font-size: 14px;">
					   <br />
      
                    <p><a href="http://13.92.240.159/demo/public">http://13.92.240.159/demo/public</a></p>
                    <p> Thank You. </p>

				
				</div>
                </div>
                
              </div>
            </div>
       
	</div>
	</body>
</html>