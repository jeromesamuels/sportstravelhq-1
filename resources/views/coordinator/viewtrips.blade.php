@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row" style="margin-top: 30px;">
    <h1>Dashboard </h1><span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Trip Status </span>
</section>
<div class="page-content row">
<div class="page-content-wrapper no-margin">
<div class="sbox" style="border-top: none">
    <div class="sbox-content dashboard-container">
       
        <div class="row" style="border-bottom:1px solid #eee;">
            <h2 style="padding-bottom: 20px;">Trips Status Overview</h2>
        </div>
        <div class="row">
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h3>Total RFP</h3>
                    <p style="font-size: 14px;">Customers</p>
                </div>
                 <?php 
                    $data_all= DB::table('rfps')->get();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($data_all) }}</h3>
                </div>
                <div class="progress" style="margin-bottom: 10px;height: 6px; ">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:78%;height: 6px;background-color: #000000;">
                    </div>
                </div>
                <p style="float: left;">All Customers</p>
                <p style="float: right;">78%</p>
            </div>
            <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                <div class="info-boxes" style="background: #fff; color: #000;">
                    <h4 >Processed RFP</h4>
                    <p style="font-size: 14px;">Corporate</p>
                </div>
                <?php 
                    $data= DB::table('rfps')->get()->where("status", 1)->all();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($data) }}</h3>
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
                    <h4 >Active Proposals</h4>
                    <p style="font-size: 14px;">Hotel Managers</p>
                </div>
                <?php 
                    $data2= DB::table('rfps')->get()->where("status",'!=',3)->all();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($data2) }}</h3>
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
                    <h4 >Accepted Proposals</h4>
                    <p style="font-size: 14px;">Customers</p>
                </div>
                <?php 
                    $data3= DB::table('rfps')->get()->where("status",2)->all();
                    
                    ?>
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($data3) }}</h3>
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

    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h1 style="font-size: 20px;"> Trips Status </h1>
                        </div>
                        <div class="col-sm-1 col-xs-2 col-sm-offset-5">
                            <p class="text-right">
                                Filter
                            </p>
                        </div>
                        <div class="col-sm-4 col-xs-10">
                            <select class="amenityFilter" multiple="multiple" style="width:100%;" class="form-control">
                            @foreach ($amenities as $amenity)
                                <option value="{{ $amenity->id }}">{{ $amenity->title }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                  
                    
                </div>
                <div class="sbox-content">
                
                <div class="table-responsive usertrips" style="padding-bottom: 70px;">
                @include('coordinator.table')
                
                <!-- End Table Grid -->
                </div>
             <?php  //dd($trips); ?>
                
            </div>
        </div>

  <div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
    <div class="sbox-content dashboard-container" style=" padding: 0;">
        <div class="row">
            <div class="col-md-4">
                <div class="widget-box box-shadow" style=" margin: 0;background: #5dbbe0;padding: 20px;">
                    <div class="head">
                        <h3 style="color:#fff;">Revenue</h3>                        
                    </div><br />
                     <?php 
                    $purchases = DB::table('invoices')->sum('invoices.amt_paid');    
                    ?>
                    <div class="body">
                       <h1 style="color:#fff;font-size: 40px;">${{ $purchases }}</h1>
                       <p style="color:#fff;">Total Revenue this month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3>Booking</h3>
                    </div><br />
                     <?php 
                      $data= DB::table('user_trips')->get();
                            
                    ?>
                    <div class="body">
                           <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data) }}</h1>
                       <p>Total Booking this month</p>
                    </div>
                </div>
            </div>

              <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3 >Clients</h3>
                    </div><br />
                    <div class="body">
                           <h1 style="color:#5dbbe0;font-size: 40px;">800</h1>
                       <p>Total Customers</p>
                    </div>
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
    <script>
        $(document).ready(function($) {
            $('.amenityFilter').select2();

            $('.amenityFilter').on('change', e => {
                ajax('POST','{{ route("filter-amenities") }}', 'data='+$('.amenityFilter').val()).done(function(r){
                    $('.usertrips').html(r);
                });

            });


            
            function ajax(type,url,data)
            {
                return $.ajax({
                    type: type,
                    url: url,
                    data: data,

                });
            }
        });
    </script>
@endsection

