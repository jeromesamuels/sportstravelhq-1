@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<style>
    .sbox-content {
    padding: 15px 20px 0px 20px;
    border-bottom: 1px solid #eee;
    } 
    .hotel-info-section{
    padding: 20px;
    background: #5dbbe0;
    color: #fff;  
    }
</style>
<?php  $hotel_manager_id=Session::get('uid');
    $user_group_id= DB::table('tb_users')->where('id', $hotel_manager_id)->pluck('group_id');
    foreach($user_group_id as $item_new) {
    $user_group_id_new = $item_new;
    }
     ?>
<section class="page-header row" style="margin-top: 30px;">
    <h1>Dashboard </h1>
    <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Hotel </span>
</section>
<div class="sbox" style="border-top: none">
    <div class="sbox-content dashboard-container">
        <?php 
            $data_hotel= DB::table('hotels')->groupBy('type')->get();
            foreach($data_hotel as $value){
               $name=$value->type;
               
              $currentMonth = date('m');
              
            $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->whereRaw('MONTH(check_out) = ?',[$currentMonth])->sum('invoices.amt_paid');    
                $array[$name] = $purchases;
                 $y = $array[$value->type];
                 $sum_new =array_sum($array);
            
            /* pending amount*/
            $purchases_due = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->whereRaw('MONTH(check_out) = ?',[$currentMonth])->sum('invoices.est_amt_due');    
                $array[$name] = $purchases_due;
                 $y = $array[$value->type];
                 $sum_due =array_sum($array);
                 $revenu_due=$sum_new-$sum_due;
            
            }
            
             /*Total Booking of this month*/
            $trip_booking = DB::table('user_trips')->whereRaw('MONTH(added) = ?',[$currentMonth])->get();
            
            
              
            ?>
        <div class="row" style="border-bottom:1px solid #eee;">
            <h2 style="padding-bottom: 20px;">Hotel Overview</h2>
        </div>
        <div class="row" >
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4>Total Booking</h4>
                    <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">{{ count($trip_booking) }}</h4>
                </div>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Paid Invoices</h4>
                    <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                </div>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                </div>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Open Balance</h4>
                    <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                </div>
                <?php 
                    $data2= DB::table('rfps')->get()->where("status",'!=',3)->all();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                </div>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Estimated Revenue</h4>
                    <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                </div>
                <?php 
                    $data3= DB::table('rfps')->get()->where("status",2)->all();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h4 style="float:right;top: 50px;position: absolute;right:10px;color: #5dbbe0;">${{ $sum_new }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <div class="sbox">
                    <div class="sbox-title">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 style="font-size: 20px;"> Hotel </h4>
                            </div>
                            <div class="col-sm-8">
                                @include('includes.alerts')
                                <form action="{{ route('systemadmin.viewHotels') }}" method="get" style="background: #f5f5f5;">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <input type="text" class="form-control" placeholder="Enter Hotel Name You Want To Search" name="searchField" value="{{ $searchField }}">
                                        </div>
                                        <div class="col-xs-2">
                                            <button class="btn" style="font-size: 14px;padding-bottom: 15px;background: transparent;"><i class="fa fa-search" aria-hidden="true"></i></button>    
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="sbox-content">
                        <div class="table-responsive" >
                            <table class="table table-hover " >
                                <tr style="border-bottom-style: dashed;border-color: #eee;">
                                    <th>Sr</th>
                                    <th>Logo</th>
                                    <th>Hotel Name</th>
                                    <th>IATA Number</th>
                                    <th>Service Type</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Zip</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($hotels as $hotel)
                                <?php 
                                    if($hotel->service_type== 1 ){
                                       $service_type='Full service';
                                     }
                                       else{
                                      $service_type='Limited service';
                                       }
                                    ?>
                                <tr style="border-bottom-style: dashed;border-color: #eee;">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>  <a class="Information_click" href="#" onclick="" data-id="{{$hotel->id}}" title="{{ $hotel->name }}">
                                        <input type="hidden" class="image" name="image" value="../uploads/users/{{ $hotel->property }}" id="<?php echo $hotel->id; ?>_img" />
                                        <input type="hidden" name="address" value="{{ $hotel->address }}" id="<?php echo $hotel->id; ?>address">
                                        <input type="hidden" name="rating" value="{{ $hotel->rating }}" id="<?php echo $hotel->id; ?>rating">
                                        <img alt="" src="../uploads/users/{{ $hotel->logo }}" width="70" height="70" class="img-responsive" /> 
                                        </a>
                                    </td>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->IATA_number }}</td>
                                    <td>{{ $service_type }}</td>
                                    <td>{{ $hotel->city }}</td>
                                    <td>{{ $hotel->address }}</td>
                                    <td>{{ $hotel->zip }}</td>
                                    <td>{{ $hotel->type }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> View Hotel </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('systemadmin.hotelProfile',$hotel->id) }}">View</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('systemadmin.editHotels',$hotel->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('systemadmin.deleteHotels',$hotel->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" style="border:none;background:transparent;outline:none;display: block;padding-left:20px">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- End Table Grid -->
                    </div>
                </div>
            </div>
            <script>
                $(document).on("click", ".Information_click", function(e) {
                 e.preventDefault();
                       var title = $(this).attr("title");
                        
                       //alert(title);
                       var id = $(this).data("id");
                       var row_id = "#"+id+"_img";
                       var img = $(row_id).val();
                       var row_idnew = "#"+id+"address";
                       var address=$(row_idnew).val();
                       var row_rating = "#"+id+"rating";
                      
                       $("#div_hotel_img").attr("src" , img);
                       $("#div_hotel_name").text(title);
                       $('#div_hotel_adress').text(address);
                      
                  
                 });
                
                
                
            </script>
        </div>
    </div>
</div>
<div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
    <div class="sbox-content dashboard-container" style=" padding: 0;">
        <div class="row">
            <?php 
                $data_hotel= DB::table('hotels')->groupBy('type')->get();
                foreach($data_hotel as $value){
                   $name=$value->type;
                
                    $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->sum('invoices.amt_paid');    
                    $array[$name] = $purchases;
                    $y = $array[$value->type];
                    $sum =array_sum($array);
                }
                
                ?>
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
                 
                  $rfps_new= DB::table('rfps')->where('status', 2)->get();     
                ?>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3>Booking</h3>
                    </div>
                    <br />
                    <div class="body">
                        <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data)}}</h1>
                        <p>Total Booking </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3 >Trips</h3>
                    </div>
                    <br />
                    <div class="body">
                        <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($rfps_new) }}</h1>
                        <p>Accepted Proposals</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@stop
@section('pageLevelScripts')
@endsection