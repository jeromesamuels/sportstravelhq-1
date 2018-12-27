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
		   		<a href="{{ ($prevnext['prev'] != '' ? url('rpfs/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm"><i class="fa fa-arrow-left"></i>  </a>	
				<a href="{{ ($prevnext['next'] != '' ? url('rpfs/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm "> <i class="fa fa-arrow-right"></i>  </a>					
			</div>	

			<div class="sbox-tools" >
				@if($access['is_add'] ==1)
		   		<a href="{{ url('rpfs/'.$id.'/edit?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
				@endif
				<a href="{{ url('rpfs?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>		
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('User Trip Id', (isset($fields['user_trip_id']['language'])? $fields['user_trip_id']['language'] : array())) }}</td>
						<td>{{ $row->user_trip_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('User Id', (isset($fields['user_id']['language'])? $fields['user_id']['language'] : array())) }}</td>
						<td>{{ $row->user_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Added', (isset($fields['added']['language'])? $fields['added']['language'] : array())) }}</td>
						<td>{{ $row->added}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Status', (isset($fields['status']['language'])? $fields['status']['language'] : array())) }}</td>
						<td>{{ $row->status}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Destination', (isset($fields['destination']['language'])? $fields['destination']['language'] : array())) }}</td>
						<td>{{ $row->destination}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Hotel Information', (isset($fields['hotel_information']['language'])? $fields['hotel_information']['language'] : array())) }}</td>
						<td>{{ $row->hotel_information}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Distance Event', (isset($fields['distance_event']['language'])? $fields['distance_event']['language'] : array())) }}</td>
						<td>{{ $row->distance_event}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Offer Rate', (isset($fields['offer_rate']['language'])? $fields['offer_rate']['language'] : array())) }}</td>
						<td>{{ $row->offer_rate}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Cc Authorization', (isset($fields['cc_authorization']['language'])? $fields['cc_authorization']['language'] : array())) }}</td>
						<td>{{ $row->cc_authorization}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Offer Validity', (isset($fields['offer_validity']['language'])? $fields['offer_validity']['language'] : array())) }}</td>
						<td>{{ $row->offer_validity}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Check In', (isset($fields['check_in']['language'])? $fields['check_in']['language'] : array())) }}</td>
						<td>{{ $row->check_in}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Check Out', (isset($fields['check_out']['language'])? $fields['check_out']['language'] : array())) }}</td>
						<td>{{ $row->check_out}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Sales Manager', (isset($fields['sales_manager']['language'])? $fields['sales_manager']['language'] : array())) }}</td>
						<td>{{ $row->sales_manager}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('King Beedrooms', (isset($fields['king_beedrooms']['language'])? $fields['king_beedrooms']['language'] : array())) }}</td>
						<td>{{ $row->king_beedrooms}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Queen Beedrooms', (isset($fields['queen_beedrooms']['language'])? $fields['queen_beedrooms']['language'] : array())) }}</td>
						<td>{{ $row->queen_beedrooms}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Amenitie Ids', (isset($fields['amenitie_ids']['language'])? $fields['amenitie_ids']['language'] : array())) }}</td>
						<td>{{ $row->amenitie_ids}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Hotels Message', (isset($fields['hotels_message']['language'])? $fields['hotels_message']['language'] : array())) }}</td>
						<td>{{ $row->hotels_message}} </td>
						
					</tr>
				
					</tbody>	
				</table>   

			 	

			</div>
		</div>
	</div>
	</div>
</div>
@stop
