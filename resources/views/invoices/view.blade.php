@extends('layouts.app')
@section('content')
<section class="page-header row">
    <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
    <ol class="breadcrumb">
        <li><a href="{{ url('') }}"> Dashboard </a></li>
        <li><a href="{{ url($pageModule) }}"> {{ $pageTitle }} </a></li>
        <li class="active"> View  </li>
    </ol>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
        <div class="sbox">
            <div class="sbox-title clearfix">
                <div class="sbox-tools pull-left" >
                    <a href="{{ ($prevnext['prev'] != '' ? url('invoices/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm"><i class="fa fa-arrow-left"></i>  </a>	
                    <a href="{{ ($prevnext['next'] != '' ? url('invoices/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm "> <i class="fa fa-arrow-right"></i>  </a>					
                </div>
                <div class="sbox-tools" >
                    @if($access['is_add'] ==1)
                    <a href="{{ url('invoices/'.$id.'/edit?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
                    @endif
                    <a href="{{ url('invoices?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>		
                </div>
            </div>
            <div class="sbox-content">
                <div class="table-responsive">
                    <table class="table table-striped " >
                        <tbody>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
                                <td>{{ $row->id}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Trip Status', (isset($fields['trip_status']['language'])? $fields['trip_status']['language'] : array())) }}</td>
                                <td>{!! SiteHelpers::formatRows($row->trip_status,$fields['trip_status'],$row ) !!} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Check In', (isset($fields['check_in']['language'])? $fields['check_in']['language'] : array())) }}</td>
                                <td>{{ date('',strtotime($row->check_in)) }} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Check Out', (isset($fields['check_out']['language'])? $fields['check_out']['language'] : array())) }}</td>
                                <td>{{ date('',strtotime($row->check_out)) }} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Trip Request #', (isset($fields['rfp_id']['language'])? $fields['rfp_id']['language'] : array())) }}</td>
                                <td>{{ SiteHelpers::formatLookUp($row->rfp_id,'rfp_id','1:rfps:id:id') }} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Address', (isset($fields['hotel_name']['language'])? $fields['hotel_name']['language'] : array())) }}</td>
                                <td>{{ $row->hotel_name}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Hotel Add', (isset($fields['hotel_add']['language'])? $fields['hotel_add']['language'] : array())) }}</td>
                                <td>{{ $row->hotel_add}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Hotel Manager', (isset($fields['hotel_manager']['language'])? $fields['hotel_manager']['language'] : array())) }}</td>
                                <td>{{ $row->hotel_manager}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Email', (isset($fields['email']['language'])? $fields['email']['language'] : array())) }}</td>
                                <td>{{ $row->email}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Phone', (isset($fields['phone']['language'])? $fields['phone']['language'] : array())) }}</td>
                                <td>{{ $row->phone}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Total Room', (isset($fields['total_room']['language'])? $fields['total_room']['language'] : array())) }}</td>
                                <td>{{ $row->total_room}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Room Rate', (isset($fields['room_rate']['language'])? $fields['room_rate']['language'] : array())) }}</td>
                                <td>{{ $row->room_rate}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Actualized Room Count', (isset($fields['actualized_room_count']['language'])? $fields['actualized_room_count']['language'] : array())) }}</td>
                                <td>{{ $row->actualized_room_count}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Commissoin Rate', (isset($fields['commissoin_rate']['language'])? $fields['commissoin_rate']['language'] : array())) }}</td>
                                <td>{{ $row->commissoin_rate}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Payment Status', (isset($fields['payment_status']['language'])? $fields['payment_status']['language'] : array())) }}</td>
                                <td>{{ $row->payment_status}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Due Date', (isset($fields['due_date']['language'])? $fields['due_date']['language'] : array())) }}</td>
                                <td>{{ $row->due_date}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Est Amt Due', (isset($fields['est_amt_due']['language'])? $fields['est_amt_due']['language'] : array())) }}</td>
                                <td>{{ $row->est_amt_due}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Amt Paid', (isset($fields['amt_paid']['language'])? $fields['amt_paid']['language'] : array())) }}</td>
                                <td>{{ $row->amt_paid}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Payment Mode', (isset($fields['payment_mode']['language'])? $fields['payment_mode']['language'] : array())) }}</td>
                                <td>{{ $row->payment_mode}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Payment Ref Num', (isset($fields['payment_ref_num']['language'])? $fields['payment_ref_num']['language'] : array())) }}</td>
                                <td>{{ $row->payment_ref_num}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Notes', (isset($fields['notes']['language'])? $fields['notes']['language'] : array())) }}</td>
                                <td>{{ $row->notes}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Added', (isset($fields['added']['language'])? $fields['added']['language'] : array())) }}</td>
                                <td>{{ $row->added}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Updated', (isset($fields['updated']['language'])? $fields['updated']['language'] : array())) }}</td>
                                <td>{{ $row->updated}} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop