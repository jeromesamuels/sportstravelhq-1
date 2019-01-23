@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>Invoices <small> Here all invoices are listed </small></h2>
</section>

    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h1>Create Invoice</h1>
                        </div>
                    </div>
                </div>
                <div class="sbox-content">
                @include('includes.alerts')
                <form action="{{ route('invoice.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Trip Status</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select name="trip_status" class="form-control">
                                    <option selected disabled>Trip Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Check In Date</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="date" class="form-control" name="check_in">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Check Out Date</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="date" class="form-control" name="check_out">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Trip Request #</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="trip_request_num">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                            
                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Hotel Name</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="hotel_name">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Address</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="hotel_addr">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Amount</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="amount">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Hotel Manager</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="hotel_manager">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Email</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Phone</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Total Room</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="total_rooms">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Room Rate</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="room_rate">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Actualized Room</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="actual_rooms">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Commision Rate</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="commision_rate">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Payment Status</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select name="payment_status" class="form-control">
                                    <option selected disabled>Payment Status</option>
                                    <option value="Due">Due</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Due Date</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="date" class="form-control" name="due_date">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Estimated Due Amount</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="estimated_amount_due">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Amount Paid</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="amount_paid">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Payment Mode</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="payment_mode">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Direct Deposit Check ID</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="check_number">
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-2 text-right">
                            <label style="margin-top:8px; font-weight: bold">Notes</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <textarea name="notes" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-offset-2 col-sm-6 text-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    
@stop


@section('pageLevelScripts')
    
@endsection