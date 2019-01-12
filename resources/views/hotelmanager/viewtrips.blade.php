@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>View Trips <small> Here all trips are listed </small></h2>
</section>


    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h1> All Trips </h1>
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
                @include('hotelmanager.table')
                
                <!-- End Table Grid -->
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