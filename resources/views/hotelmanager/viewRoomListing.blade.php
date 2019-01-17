@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>Room Listing <small> Here all room listings are listed </small></h2>
</section>


    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h1> Room Listing </h1>
                        </div>
                    </div>
                </div>
                <div class="sbox-content">
                
                <div class="table-responsive" style="padding-bottom: 70px;">
                    <table class="table table-striped table-hover ">
                        <tr>
                            <th>Sr</th>
                            <th>Travel Cordinator</th>
                            <th>Room Listing CSV</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($roomListings as $roomListing)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $roomListing->travelCordinator->first_name." ".$roomListing->travelCordinator->last_name }}</td>
                                <td><a href="{{ route('hotelmanager.roomListingDownload',$roomListing->id) }}">Download</a></td>
                                <td>
                                    <div class="dropdown">
                                      <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                                      <ul class="dropdown-menu">
                                        <li>
                                            <form action="{{ route('hotelmanager.destroyRoomListing',$roomListing->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field("DELETE") }}
                                                <button type="submit" class="btn btn-block btn-danger">Delete</button>
                                            </form>
                                        </li>
                                      </ul>
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