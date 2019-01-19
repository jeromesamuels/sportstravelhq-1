@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>Hotels Listing <small> Here all hotel listings are listed </small></h2>
</section>
    

    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h1> Search Hotel</h1>
                        </div>
                    </div>
                </div>
                <div class="sbox-content">
                @include('includes.alerts')
                    
                    <form action="{{ route('systemadmin.viewHotels') }}" method="get">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-10">
                                <input type="text" class="form-control" placeholder="Enter Hotel Name You Want To Search" name="searchField" value="{{ $searchField }}">
                            </div>
                            <div class="col-xs-2">
                                <button class="btn btn-block btn-success">Search</button>    
                            </div>
                        </div>
                    </form>
                    
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
                            <h1> Hotel Listing </h1>
                        </div>
                    </div>
                </div>
                <div class="sbox-content">

                <div class="table-responsive" style="padding-bottom: 70px;">
                    <table class="table table-striped table-hover ">
                        <tr>
                            <th>Sr</th>
                            <th>Hotel Name</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Zip</th>
                            <th>Type</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($hotels as $hotel)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $hotel->name }}</td>
                                <td>{{ $hotel->city }}</td>
                                <td>{{ $hotel->address }}</td>
                                <td>{{ $hotel->zip }}</td>
                                <td>{{ $hotel->type }}</td>
                                <td>
                                    @for ($i = 0; $i < $hotel->rating; $i++)
                                        <span class="fa fa-star" style="color:#a9a902"></span>
                                    @endfor
                                </td>
                                <td>
                                    @if ($hotel->active)
                                        <span class="label label-success" style="padding:4px 8px; font-size:12px">Active</span>
                                    @else
                                        <span class="label label-danger" style="padding:4px 8px; font-size:12px">In-Active</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                      <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                                      <ul class="dropdown-menu">
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
    </div>

    
@stop


@section('pageLevelScripts')
    
@endsection