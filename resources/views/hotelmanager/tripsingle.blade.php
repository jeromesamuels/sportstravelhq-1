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
                <h1> Trip Detail</h1>
            </div>
            <div class="sbox-content">
                <div class="row">
                    <div class="col-sm-8">
                        <p>
                            <span>Hi Hotel Manager</span><br>
                            Us Dev Co. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, maiores error. Iste amet voluptatibus magni, dolorem optio debitis dolor ipsam asperiores exercitationem. Amet ut deserunt atque. Commodi corrupti, sint beatae!
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-right">
                            <span>{{ $trip->check_in }} To {{ $trip->check_out }}</span><br>
                            <span>3 RFPs Reserved For this Trip</span>
                        </p>
                    </div>
                </div>
                <table class="table table-striped" >
                    <tbody>
                        <tr>
                            <td width='30%' class='label-view text-right'>Contact Name</td>
                            <td>{{ $trip->tripuser->first_name." ".$trip->tripuser->last_name }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Contact Email</td>
                            <td>{{ $trip->tripuser->email }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Contact Number</td>
                            <td>{{ $trip->tripuser->phone_number }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Destination</td>
                            <td>{{ $trip->from_city }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Check In Date</td>
                            <td>{{ $trip->check_in }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Check Out Date</td>
                            <td>{{ $trip->check_out }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Total King Bedrooms</td>
                            <td>{{ $trip->double_king_qty }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Total Doubel Queen Bedrooms</td>
                            <td>{{ $trip->double_queen_qty }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Requested Amenties</td>
                            <td>
                                @foreach ($trip->amenities as $amenity)
                                    <b>{{ $amenity->title }}, &nbsp;</b>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-right">
                            <button class="btn btn-danger">Canel</button>
                            <button class="btn btn-success">Bid Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@stop
