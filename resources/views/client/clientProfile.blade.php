@extends('layouts.app')
@section('content')
    <section class="page-header row">
        <h1>Dashboard </h1>
        <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Client Profile</span>
    </section>
    <div class="page-content row">
        <div class="page-content-wrapper no-margin">
            <div class="sbox" style="border-top: none">
                <div class="sbox-content dashboard-container">
                    <div class="row" style="border-bottom:1px solid #eee;">
                        <h2 style="padding-bottom: 20px;">Client Overview</h2>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #eee;">
                        <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                            <div class="info-boxes" style="background: #fff; color: #000;">
                                <h4>Total Booking</h4>
                                <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                            </div>
                            <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                                <h4 style="float:right;top: 50px;position: absolute;right: 10px;">{{ count($trip_booking) }}</h4>
                            </div>
                        </div>
                        <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                            <div class="info-boxes" style="background: #fff; color: #000;">
                                <h4>Paid Invoices</h4>
                                <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                            </div>
                            <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                                <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $purchases }}</h4>
                            </div>
                        </div>
                        <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                            <div class="info-boxes" style="background: #fff; color: #000;">
                                <h4>Open Balance</h4>
                                <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                            </div>
                            <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                                <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $purchases }}</h4>
                            </div>
                        </div>
                        <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                            <div class="info-boxes" style="background: #fff; color: #000;">
                                <h4>Estimated Revenue</h4>
                                <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                            </div>
                            <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                                <h4 style="float:right;top: 50px;position: absolute;right:10px;color: #5dbbe0;">${{ $purchases_due }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content row">
        <div class="page-content-wrapper no-margin">
            <div class="row">
                <div class="col-md-8">
                    <div class="sbox" style=" margin: 0;background: #fff;padding: 20px;margin-bottom: 25px;">
                        <div class="col-xs-6">
                            <div class="sbox-title">
                                <h1><b>Client Trips </b></h1>
                            </div>
                        </div>
                        <div class="col-xs-6 pull-right">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-sm "
                                            onclick="SximoModal('{{ url("/search") }}','Advance Search'); "><i class="fa fa-filter"></i> Filter
                                    </button>
                                </div>
                                <!-- /btn-group -->
                                <input type="text" class="form-control input-sm onsearch" data-target="http://13.92.240.159/demo/public/client" aria-label="..."
                                       placeholder=" Type And Hit Enter ">
                            </div>
                        </div>
                        <div class="sbox-content">
                            <!-- Toolbar Top -->
                            <div class="table-responsive">
                                {!! Form::open(array('url'=>'core/users?', 'class'=>'form-horizontal m-t' ,'id' =>'SximoTable' )) !!}
                                <table class="table table-hover " id="core/usersTable">
                                    <thead>
                                    <tr style="border-bottom-style: dashed;border-color: #eee;">
                                        <th>Date Created</th>
                                        <th>Event Date</th>
                                        <th>Trip #</th>
                                        <th>Progress</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($clientTrips as $client_value)
                                        <tbody>
                                        <tr style="border-bottom-style: dashed;border-color: #eee;">
                                            <td>{{ $client_value->added }}</td>
                                            <td>{{$client_value->added }}</td>
                                            <td>{{ $client_value->id }}</td>
                                            <td>
                                                @foreach($data_rfps as $data_new)
                                                    @switch($data_new->status)
                                                        {{-- WHERE IS STEP 2!? --}}

                                                        @case(\App\Models\Rfp::STATUS_PENDING)
                                                        <div class="body">
                                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                                <p style="float: left;top: -20px;position: relative;color: #44c8f5">Step 3</p>
                                                                <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Hotel Manager Send a Proposal</p>
                                                                <div class="final_range">
                                                                    <div class="skills hotel_range" style="width:25%;background-color: #44c8f5;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @break

                                                        @case(\App\Models\Rfp::STATUS_BID_SENT)
                                                        <div class="body">
                                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                                <p style="float: left;top: -20px;position: relative;color: #000">Step 4</p>
                                                                <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Client review and compare proposals</p>
                                                                <div class="final_range">
                                                                    <div class="skills hotel_range" style="width:37.5%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @break

                                                        @case(\App\Models\Rfp::STATUS_BID_SELECTED)
                                                        <div class="body">
                                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                                <p style="float: left;top: -20px;position: relative;color: #000">Step 5</p>
                                                                <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Client Sign the hotel agreement</p>
                                                                <div class="final_range">
                                                                    <div class="skills hotel_range" style="width:62.5%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @break

                                                        @case(\App\Models\Rfp::STATUS_AGREEMENT_CLIENT)
                                                        <div class="body">
                                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                                <p style="float: left;top: -20px;position: relative;color: #000">Step 6</p>
                                                                <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Client Sign the Hotel Aggreement</p>
                                                                <div class="final_range">
                                                                    <div class="skills hotel_range" style="width:62.5%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @break

                                                        @case(\App\Models\Rfp::STATUS_AGREEMENT_HOTEL)
                                                        <div class="body">
                                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                                <p style="float: left;top: -20px;position: relative;color: #000">Step 7</p>
                                                                <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Hotel Manager sign the Hotel
                                                                    Aggreement</p>
                                                                <div class="final_range">
                                                                    <div class="skills hotel_range" style="width:75%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @break

                                                        @case(\App\Models\Rfp::STATUS_ROOMING_LIST)
                                                        <div class="body">
                                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                                <p style="float: left;top: -20px;position: relative;color: #000">Step 8</p>
                                                                <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Client Upload the Rooming
                                                                    list</p>
                                                                <div class="final_range">
                                                                    <div class="skills hotel_range" style="width:82.5%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @break

                                                        @case(\App\Models\Rfp::STATUS_HOTEL_BILLING_RECEIPT)
                                                        <div class="body">
                                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                                <p style="float: left;top: -20px;position: relative;color: #000">Step 9</p>
                                                                <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Hotel manager upload the billing receipt</p>
                                                                <div class="final_range">
                                                                    <div class="skills hotel_range" style="width:99%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @break

                                                        @default
                                                        <div class="body">
                                                            <div class="hotel_revenue" style=" padding: 20px 0px;">
                                                                <p style="float: left;top: -20px;position: relative;color: #000">Step 1</p>
                                                                <p style="float: right;top: -20px;position: relative;font-size: 12px;color: #8a8888">Client Submitted RFP</p>
                                                                <div class="final_range">
                                                                    <div class="skills hotel_range" style="width:12.5%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endswitch
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> View Trip</button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ route('coordinator.trips.show',$client_value->id) }}" class="btn btn-light" title="View Trips">View
                                                                Details</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                {{ $clientTrips->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                        <div class="sbox-title">
                            <h4 style="font-size: 20px;">Client Profile</h4>
                        </div>
                        <div id="pages">
                            <div id="information" class="page">
                                <?php
                                $id = app('request')->segment(2);

                                foreach($data_client as $item) {
                                $data_client_new = $item;

                                $date1 = $data_client_new->created_at;
                                $date2 = date("Y/m/d");

                                $diff = abs(strtotime($date2) - strtotime($date1));

                                $years = floor($diff / (365 * 60 * 60 * 24));
                                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

                                if ($years != 0 && $months != 0 && $days != 0) {
                                    $membership = $years . ' Year' . ' ' . $months . ' Months' . ' ' . $days . ' Days' . '.';
                                } elseif ($years != 0 && $months != 0) {
                                    $membership = $years . ' Year' . ' ' . $months . ' Months' . '.';
                                } elseif ($years != 0 && $days != 0) {
                                    $membership = $years . ' Year' . ' ' . $days . ' Days' . '.';
                                } else {
                                    $membership = $days . ' Days' . '.';
                                }
                                ?>
                                <div class="body">
                                    <img alt="" src="../uploads/users/{{ $data_client_new->avatar }}" style=" margin: 20px 0px;" id="div_corporate_img_main" border="0" width="100"
                                         height="100" class="img-circle"/>
                                    <div class="hotel-info-section">
                                        <b>Name</b>
                                        <p style="color: #8c8787;font-weight: bold;">{{ $data_client_new->first_name }} {{ $data_client_new->last_name }}</p>
                                    </div>
                                    <div class="contact-info ">
                                        <b>Email</b>
                                        <p id="corporate_email_main"><a href="mailto:{{ $data_client_new->email }}" style="color:#5dbbe0;">{{ $data_client_new->email }}</a></p>
                                        <b>Phone Number</b>
                                        <p id="corporate_email_main"><a href="tel:{{ $data_client_new->phone_number }}"
                                                                        style="color:#5dbbe0;">{{ $data_client_new->phone_number }}</a></p>
                                        <b>Member Since</b>
                                        <p style="color:#5dbbe0;" id="corporate_created_at">{{ $membership }}</p>
                                    </div>
                                    @if($coordinator != '')
                                        <div class="contact-info ">
                                            <b>Parent coordinator</b>
                                            <p style="color: #8c8787;font-weight: bold;">{{$coordinator->first_name.' '.$coordinator->last_name}}</p>
                                            <b>Organization</b>
                                            <p style="color: #8c8787;font-weight: bold;">{{$coordinator->o_name}}</p>
                                        </div>
                                    @endif

                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.copy').click(function () {
                var total = $('input[class="ids"]:checkbox:checked').length;
                if (confirm('are u sure Copy selected rows ?')) {
                    $('input[name="action_task"]').val('copy');
                    $('#SximoTable').submit();// do the rest here
                }
            })

        });
    </script>
@stop
