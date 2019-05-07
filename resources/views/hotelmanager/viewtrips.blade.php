@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<style>
    .usertrips .pagination li.active a{
     background-color: #5dbbe0;
    border-color: #5dbbe0;
    }
     #usertrips_wrapper .row{
        width:100%;
    }
</style>

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
               
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($trip_booking) }}</h3>
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
               
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($active_rfp) }}</h3>
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
                    <p style="font-size: 14px;">Client</p>
                </div>
                
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($accepted_rfp) }}</h3>
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
                    
                    </div>
                  
                    
                </div>
                <div class="sbox-content">
                
                <div class="table-responsive usertrips" style="padding-bottom: 70px;">
                @include('hotelmanager.table')
                
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
                    
                    <div class="body">
                       <h1 style="color:#fff;font-size: 40px;">${{ $purchases }}</h1>
                       <p style="color:#fff;">Total Revenue</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3>Booking</h3>
                    </div><br />
                   
                    <div class="body">
                           <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($trips) }}</h1>
                       <p>Total Bookings</p>
                    </div>
                </div>
            </div>

              <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="head">
                        <h3 >Clients</h3>
                    </div><br />
                    
                    <div class="body">
                           <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data_grp) }}</h1>
                       <p>Total Coordinators</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    $('#usertrips').DataTable( {
        "order": [ 1, "desc" ]
    } );
} );
</script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
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

