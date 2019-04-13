@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h3>Hotel Listing <small> Here all Blackout Hotels are listed </small></h3>
</section>
<div class="page-content row">
<div class="page-content-wrapper no-margin">
    <div class="sbox">
        <div class="sbox-title">
            <div class="row">
                <div class="col-sm-2">
                    <h3>Blakout Hotel Listing </h3>
                </div>
            </div>
        </div>
        <div class="sbox-content">
            <div class="table-responsive" style="padding-bottom: 70px;">
                <table class="table table-hover ">
                    <tr style="border-bottom-style: dashed;border-color: #eee;">
                        <th>Sr</th>
                        <th>Hotel Code</th>
                        <th>Hotel Name</th>
                        <th>Hotel Brand</th>
                        <th>Black Out Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($hotel as $hotels)
                    <tr style="border-bottom-style: dashed;border-color: #eee;">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <h6 style="color:#000;" id="div_hotel_name">{{ $hotels->hotel_code }}</h6>
                        </td>
                        <td>
                            <h6 style="color:#000;" id="div_hotel_name">{{ $hotels->name }}</h6>
                        </td>
                        <td>
                            <h6>{{ $hotels->type }}</h6>
                        </td>
                        <td>
                            <h6>{{ $hotels->blackout_start }} to {{ $hotels->blackout_end }}</h6>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <!-- End Table Grid -->
            </div>
        </div>
    </div>
</div>
@stop
@section('pageLevelScripts')
@endsection