@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row" style="margin-top: 30px;">
    <h1>Dashboard </h1><span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Trip Status </span>
</section>
<style>
    .usertrips .pagination li.active a{
     background-color: #5dbbe0;
    border-color: #5dbbe0;
    }
    #usertrips_wrapper .row{
        width:100%;
    }
</style>

<script type="text/javascript">
    
    $(document).ready(function() {

        var rfp_ids = [];
        var rfp_ids_array = [];

        $(".planned-trips .planned-trip-content").on("click", function() {
            rfp_ids = [];
            var id = $(this).attr("id");

            $('.m-portlet__body').html('<div class="m-spinner m-spinner--brand m-spinner--lg"></div>');

            var url = '{{ url("/RFPs/") }}';
            $.post(url + '/' + id, function(response) {
                if(response.success) 
                    $('.received_rfps').html(response.view_data);
            }, 'json');
        });

        $(document).on("click", ".m-portlet__body .rfp_detail .rfp_show_detail", function() {
            var id = $(this).attr("id");

            $('.m-portlet__body').html('<div class="m-spinner m-spinner--brand m-spinner--lg"></div>');

            var url = '{{ url("/RFP/") }}';
            $.post(url + '/' + id, function(response) {
                if(response.success) 
                    $('.received_rfps').html(response.view_data);
            }, 'json');
        });

        
        $(document).on("click", ".compare_cb", function(e) {
            var rfp_id = $(this).val();
            var arr=[];
            if(rfp_id.includes(',')){
            arr = rfp_id.split(',');

            }else{
                arr[0] = rfp_id;
            }
            
 
            
            if($( this ).prop( "checked" )) {
                //if(rfp_id.includes(',')){
                    $.each(arr,function(key,value){
                        rfp_ids_array.push(value);
                    })
                    console.log(rfp_ids_array.length);
                
                $(".compare-rfp").removeClass('btn-secondary');
                $(".compare-rfp span").html('('+rfp_ids_array.length+')');

                rfp_ids = rfp_ids_array;
                
            } else {

                rfp_ids = jQuery.grep(rfp_ids, function(value) {
                  return value != rfp_id;
                });

                console.log(rfp_ids);
                if(rfp_ids.length) {
                    $(".compare-rfp").removeClass('btn-secondary');
                    $(".compare-rfp span").html('('+rfp_ids.length+')');
                }
                else {
                    $(".compare-rfp").addClass('btn-secondary');
                    $(".compare-rfp span").html('rfp_ids_array.length');
                }
            }
        });
        

        $(document).on("click", ".m-portlet__header .compare-rfp", function() {
            //var id = $(this).attr("id");
          console.log(rfp_ids.length);
        
            if(rfp_ids.length>1) {
                $('.m-portlet__body').html('<div class="m-spinner m-spinner--brand m-spinner--lg"></div>');
                 console.log(rfp_ids);
                
                var url = '{{ url("/compareRFP/") }}';
                $.post(url + '/' + rfp_ids, function(response) {
                    if(response.success) 
                        //$('#main-page .container .compare-result').html(response.view_data);
                      $('div.compare-result').html(response.view_data);
                      $('html, body').animate({
                            'scrollTop' : $("#dynamictabstrp").position().top
                      });
                }, 'json');
                
            } else {
                alert("Please select atleast two proposals to compare.");
            }


        });


        $(document).on("click", ".btn-rfp-accept", function() {
            var id = $(this).attr("title");
            var url = '{{ url("/acceptRFP/") }}' + '/' + id;

            $.post(url, function(response) {
                if(response.success) {
                    alert(response.view_data);
                    window.location.href=response.redirect;
                    //location.reload();
                }
            }, 'json');

        });


        $(document).on("click", ".btn-rfp-decline", function() {

            var id = $(this).attr("title");
            
            var e = document.getElementById ("decline_reason_select");
            var reason = e.options [e.selectedIndex] .value;
            //alert(reason);
            var url = '{{ url("/declineRFP/") }}' + '/' + id + '/' + reason;

            $.post(url,'/' + reason, function(response) {
                if(response.success) {
                    alert(response.view_data);
                    location.reload();
                }
            }, 'json');

        });

    });

</script>

<div class="page-content row">
<div class="page-content-wrapper no-margin">
<div class="sbox" style="border-top: none">
    <div class="sbox-content dashboard-container">
       
        <div class="row" style="border-bottom:1px solid #eee;">
            <h2 style="padding-bottom: 20px;">Trips Status Overview</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL('/') }}" class="btn btn-default btn-md" style="margin: 10px 0px; background: #5dbbe0!important; color: #fff;">Book a Hotel</a>
                <br>
            </div>

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
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($data_submit) }}</h3>
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
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($get_invoice) }}</h3>
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
             
                <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                    <h3 style="float:right;top: 30px;position: absolute;right: 25px;">{{ count($data_accept) }}</h3>
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
                        <div class="col-sm-12 col-xs-12">
                            <h1 style="font-size: 20px;"> Trips Status </h1>
                        </div>
                      
                    </div>
                  
                    
                </div>
                <div class="sbox-content">
                
                <div class="table-responsive usertrips"  style="padding-bottom: 70px;">
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
    </div>

<div class="page-content row compare-result " id="dynamictabstrp"></div>

@stop


@section('pageLevelScripts')

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#usertrips').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );
</script>

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

