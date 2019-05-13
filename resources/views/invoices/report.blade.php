@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h3>Report Listing <small> Here all {{ $user_data->type}} brand Hotels are listed </small></h3>
</section>
<div class="page-content row">
<div class="page-content-wrapper no-margin">
    <div class="sbox">
        <div class="sbox-title">
            <div class="row">
                <div class="col-sm-2">
                 
                    <h3>{{ $user_data->type}} Brand Report</h3>
                 
                </div>
            </div>
        </div>
        <div class="sbox-content">
            <div class="table-responsive" style="padding-bottom: 70px;">
                <table class="table table-hover ">
                    <tr style="border-bottom-style: dashed;border-color: #eee;">
                        <th>Sr</th>
                        <th>Hotel Code</th>
                        <th>Hotel Name</th>
                        <th>Revenue by Month</th>
                        <th>Revenue by Year</th>
                        <th>Action</th>
                    </tr>
                   
                    @foreach ($hotel as $hotel_data)
                   <?php  
                   $monthly_purchase=DB::table('invoices')->where('invoices.hotel_name', '=', $hotel_data->id)->whereRaw('MONTH(created_at) = ?',$date_month)->whereRaw('YEAR(created_at) = ?',$date_new)->sum('invoices.amt_paid');
                   $yearly_purchase=DB::table('invoices')->where('invoices.hotel_name', '=', $hotel_data->id)->whereRaw('YEAR(created_at) = ?',$date_new)->sum('invoices.amt_paid');?>
                    <tr style="border-bottom-style: dashed;border-color: #eee;">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <h6 style="color:#000;" id="div_hotel_name">{{ $hotel_data->hotel_code }}</h6>
                        </td>
                        <td>
                            <h6 style="color:#000;" id="div_hotel_name">{{ $hotel_data->name }}</h6>
                        </td>
                         <td>
                            <h6>{{ $monthly_purchase}}$ </h6>
                        </td>
                        <td>
                            <h6>{{ $yearly_purchase }}$</h6>
                        </td>
                       
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
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