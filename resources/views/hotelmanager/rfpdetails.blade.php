@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>RFP Details <small> View Details of RFP</small></h2>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">

        <div class="sbox">
            <div class="sbox-title">
                <h1> RFP Detail</h1>
            </div>
            <div class="sbox-content">
                
                @include('includes.alerts')
                <div class="row">
                    <div class="col-sm-8">
                        <p>
                            <span>Hi Hotel Manager</span><br>
                            Here are the details for RFP
                        </p>
                    </div>
                </div>
                <table class="table table-striped" >
                    <tbody>
                        <tr>
                            <td width='30%' class='label-view text-right'>RFP Sent At</td>
                            <td>{{ $rfp->added }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Accepted</td>
                            <td>{{ $rfp->status == 1 ? "Not Accepted" : "Accepted" }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Destination</td>
                            <td>{{ $rfp->destination }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Hotel Information</td>
                            <td>{{ $rfp->hotel_information }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Distance</td>
                            <td>{{ $rfp->distance_event }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Offer Rate</td>
                            <td>{{ $rfp->offer_rate }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>CC Authorization</td>
                            <td>{{ $rfp->cc_authorization == 1 ? "Not Authorized" : "Authorized" }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Offer Validity</td>
                            <td>{{ $rfp->offer_validity }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Check In</td>
                            <td>{{ $rfp->check_in }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Check Out</td>
                            <td>{{ $rfp->check_out }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>king Bedrooms</td>
                            <td>{{ $rfp->king_beedrooms }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Queen Bedrooms</td>
                            <td>{{ $rfp->queen_beedrooms }}</td>
                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Message</td>
                            <td>{{ $rfp->hotels_message }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@stop
