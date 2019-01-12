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
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error:</strong> {{ $error }}
                    </div>
                @endforeach

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success:</strong> {{ Session::get('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-8">
                        <p>
                            <span>Hi Hotel Manager</span><br>
                            {{ $trip->comment }}
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-right">
                            <span>{{ $trip->check_in }} To {{ $trip->check_out }}</span><br>
                            <span>{{ count($trip->rfps) }} RFPs Reserved For this Trip</span>
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
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Bid Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bid Form</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('hotelmanager.saveBid') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="trip_id" value="{{ $trip->id }}">
            <div class="form-group">
                <label>Enter Your Offer Rate (In Dollars)</label>
                <input type="number" class="form-control" name="offer_rate" min="0">
            </div>
            <div class="form-group">
                <label>Hotel Details</label>
                <input type="text" class="form-control" name="hotelDetails">
            </div>
            <div class="form-group">
                <label>Distance From Event (Unit Kilometers)</label>
                <input type="number" class="form-control" name="eventDistance" min="0">
            </div>
            <div class="form-group">
                <label>Your offer will be valid till ?</label>
                <input type="date" class="form-control" name="offerValidityDate">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group text-right">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>


@stop
