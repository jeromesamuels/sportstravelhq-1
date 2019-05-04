@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>View Agreement <small>  </small></h2>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
        
        <div class="sbox">
            <div class="sbox-title1">
                <h3>Agreement</h3><br />
            
                <h5>IATA number: # {{ $IATA_number }}</h5>
            </div>
            <div class="sbox-content">
                
                @include('includes.alerts')
                <div class="row">
                    <div class="col-sm-8">
                        <p>
                            <span>Hi {{ $agreement->hotelmanager->first_name." ".$agreement->hotelmanager->last_name }}</span><br>
                            
                        </p>
                    </div>
                </div>
                <table class="table table-striped" >
                    <tbody>
                        <tr>
                            <td width='30%' class='label-view text-right'>Travel Cordinator</td>
                            <td>{{ $agreement->cordinator->first_name." ".$agreement->cordinator->last_name }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>For RFP</td>
                            <td>
                                <a href="{{ route('hotelmanager.rfpDetails',$agreement->for_rfp) }}">View RFP Details</a>
                            </td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Hotel Name</td>
                            <td>{{ $agreement->hotel_name }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Hotel Details</td>
                            <td>{{ $agreement->hotel_details }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'><b>Agreement</b></td>
                            <td>{{ $agreement->agreement_text }}</td>
                        </tr>
                        
                        <tr>
                            <td width='30%' class='label-view text-right'>Agreement Sent At</td>
                            <td>{{ $agreement->agreement_sent }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Travel Cordinator Signed At</td>
                            <td>{{ $agreement->coordinator_sign }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Hotel Signed At</td>
                            <td>{{ $agreement->hotel_sign }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'><b>Download Agreement</b></td>
                            <td>
                                <a href="{{ route('hotelmanager.agreementDownload',$agreement->id) }}">Download</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@stop
