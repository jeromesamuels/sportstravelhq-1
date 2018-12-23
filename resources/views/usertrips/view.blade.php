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
		   		<a href="{{ ($prevnext['prev'] != '' ? url('usertrips/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm"><i class="fa fa-arrow-left"></i>  </a>	
				<a href="{{ ($prevnext['next'] != '' ? url('usertrips/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm "> <i class="fa fa-arrow-right"></i>  </a>					
			</div>	

			<div class="sbox-tools" >
				@if($access['is_add'] ==1)
		   		<a href="{{ url('usertrips/'.$id.'/edit?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
				@endif
				<a href="{{ url('usertrips?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>		
			</div>
		</div>
		<div class="sbox-content">
			<div class="table-responsive">
				<table class="table table-striped " >
					<tbody>	
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Entry By', (isset($fields['entry_by']['language'])? $fields['entry_by']['language'] : array())) }}</td>
						<td>{{ $row->entry_by}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Trip Name', (isset($fields['trip_name']['language'])? $fields['trip_name']['language'] : array())) }}</td>
						<td>{{ $row->trip_name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('From Address 1', (isset($fields['from_address_1']['language'])? $fields['from_address_1']['language'] : array())) }}</td>
						<td>{{ $row->from_address_1}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('From City', (isset($fields['from_city']['language'])? $fields['from_city']['language'] : array())) }}</td>
						<td>{{ $row->from_city}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('From State Id', (isset($fields['from_state_id']['language'])? $fields['from_state_id']['language'] : array())) }}</td>
						<td>{{ $row->from_state_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('From Zip', (isset($fields['from_zip']['language'])? $fields['from_zip']['language'] : array())) }}</td>
						<td>{{ $row->from_zip}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('To Address 1', (isset($fields['to_address_1']['language'])? $fields['to_address_1']['language'] : array())) }}</td>
						<td>{{ $row->to_address_1}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('To City', (isset($fields['to_city']['language'])? $fields['to_city']['language'] : array())) }}</td>
						<td>{{ $row->to_city}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('To State Id', (isset($fields['to_state_id']['language'])? $fields['to_state_id']['language'] : array())) }}</td>
						<td>{{ $row->to_state_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('To Zip', (isset($fields['to_zip']['language'])? $fields['to_zip']['language'] : array())) }}</td>
						<td>{{ $row->to_zip}} </td>
						
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Budget From', (isset($fields['budget_from']['language'])? $fields['budget_from']['language'] : array())) }}</td>
						<td>{{ $row->budget_from}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Budget To', (isset($fields['budget_to']['language'])? $fields['budget_to']['language'] : array())) }}</td>
						<td>{{ $row->budget_to}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Double Queen Qty', (isset($fields['double_queen_qty']['language'])? $fields['double_queen_qty']['language'] : array())) }}</td>
						<td>{{ $row->double_queen_qty}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Double King Qty', (isset($fields['double_king_qty']['language'])? $fields['double_king_qty']['language'] : array())) }}</td>
						<td>{{ $row->double_king_qty}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Amenity Ids', (isset($fields['amenity_ids']['language'])? $fields['amenity_ids']['language'] : array())) }}</td>
						<td>{{ $row->amenity_ids}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Comment', (isset($fields['comment']['language'])? $fields['comment']['language'] : array())) }}</td>
						<td>{{ $row->comment}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Added', (isset($fields['added']['language'])? $fields['added']['language'] : array())) }}</td>
						<td>{{ $row->added}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Status', (isset($fields['status']['language'])? $fields['status']['language'] : array())) }}</td>
						<td>{{ $row->status}} </td>
						
					</tr>
				
					</tbody>	
				</table>   

			 	

			</div>
		</div>
	</div>
	</div>
</div>
@stop
