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
                <h1> All Trips </h1>
            </div>
            <div class="sbox-content">
            
            <div class="table-responsive" style="padding-bottom: 70px;">
            <table class="table table-striped table-hover " id="s">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Date/Title</th>
                        <th>Responses</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trips as $trip)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <p>
                                    {{ date('d-M-Y',strtotime($trip->check_in)) }}
                                </p>
                                {{ $trip->trip_name }}
                            </td>
                            <td>4</td>
                            <td>Bids Sent Out</td>
                            <td>
                                <div class="dropdown">
                                      <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="{{ route('hotelmanager.trips.show',$trip->id) }}" class="tips" title="View Trips">View Details</a></li>
                                      </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- End Table Grid -->
            </div>
        </div>
    </div>
</div>

    
@stop
