@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>View Agreements <small> Note: Agreement Form Automatically Deleted After 72 Hours </small></h2>
</section>


    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h1> View Agreements </h1>
                        </div>
                    </div>
                </div>
                <div class="sbox-content">

                @include('includes.alerts')
                <div class="table-responsive usertrips" style="padding-bottom: 70px;">

                    <table class="table table-striped table-hover " id="s">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Sent At</th>
                                <th>Travel Cordinator</th>
                                <th>Hotel</th>
                                <th>Form</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agreements as $agreement)
                               <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ Carbon\Carbon::createFromTimeStamp(strtotime($agreement->agreement_sent) )->diffForHumans() }}</td>
                                   <td>
                                    {{ $agreement->cordinator->first_name." ".$agreement->cordinator->last_name }}
                                   </td>
                                   <td>{{ $agreement->hotel_name }}</td>
                                   <td>
                                       <a href="{{ route('hotelmanager.agreementDownload',$agreement->id) }}">Download</a>
                                   </td>
                                   <td>
                                       <div class="dropdown">
                                             <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                                             <ul class="dropdown-menu">
                                               <li><a href="{{ route('hotelmanager.agreementDetails',$agreement->id) }}" class="tips" title="View Trips">View Details</a></li>
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


@section('pageLevelScripts')
    
@endsection