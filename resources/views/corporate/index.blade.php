@extends('layouts.app')

@section('content')

<style type="text/css">

    .dashboard-container .info-boxes {
        background: #eae7ee; 
        color: #240849;
        margin: 10px;
        padding: 10px;
        font-size: 20px;
    }

    .dashboard-container .info-boxes h3 {
        line-height: 20px;
        margin: 5px 0;
    }

    .dashboard-container .widget-box {
        margin: 10px;
    }

    .dashboard-container .widget-box .head {
        border-bottom: solid 1px #EEE;
    }

    .dashboard-container .widget-box .body table {
        width: 95%;
        margin: 10px auto;
    }

    .dashboard-container .widget-box .body table tr th {
        padding: 10px;
        background: #240849; 
        color: #FFFFFF;
    }

    .dashboard-container .widget-box .body table tr td {
        padding: 10px;
        border-bottom: solid 1px #EEE;
    }

    .dashboard-container .widget-box .body ul {
        list-style: none;
        padding: 0px;
        margin: 0;
    }

    .dashboard-container .widget-box .body ul li {
        padding: 10px;
        border-bottom: dotted 1px #EEE;
    }

    .dashboard-container .widget-box .body ul li strong {
        color: #e9955f
    }

    .dashboard-container .widget-box .head span {
        color: #240849;
        font-size: 16px;
        font-weight: bold;
        line-height: 50px;
        padding: 10px;
    }


    .box-shadow {
        -webkit-box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
        -moz-box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
        box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
    }


</style>


<div class="sbox" style="border-top: none">
    <div class="sbox-title"> <b>Corporate's Dashboard</b></div>
    <div class="sbox-content dashboard-container"> 
        <div class="row">
            @if (Session::get('level') == 6)
                <div class="col-sm-12">
                    @if($hotel_info)
                    <h1>Hotel {{ $hotel_info->name }} ({{ $hotel_info->type }})</h1>
                    <h4>{{ $hotel_info->address }}</h4>
                    <h5>{{ $hotel_info->city }} - {{ $hotel_info->zip }}</h5>
                    @endif
                </div>
            @endif

            <div class="col-md-6">
                <div class="info-boxes" style="background: #088fc9; color: #ffffff;">
                    Corporate Users
                    <h3>4</h3>
                    <br />
                    RFPs Received 
                    <h3>18</h3>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-boxes" style="background: #24034a; color: #ffffff;">
                    Total Billing  
                    <h3>$ 12,350</h3>
                    <br />
                    Hotel/Brand Booked
                    <h3>24</h3>
                </div>
            </div>

        </div>




        <div class="row">
            <div class="col-md-6">
                <div class="widget-box box-shadow">
                    <div class="head">
                        <span>Activity</span>                        
                    </div>
                    <div class="body">
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="widget-box box-shadow">
                    <div class="head">
                        <span>Support Tickets</span>
                    </div>
                    <div class="body">
                        <ul>
                            <li>
                                <b>User Name</b>
                                <strong class="pull-right">Pending</strong>
                                <br /> Date 
                                <p>Note about what was wrong A Fairly long message goes here and then gets cut..</p>
                            </li>

                            <li>
                                <b>User Name</b>
                                <strong class="pull-right">Pending</strong>
                                <br /> Date 
                                <p>Note about what was wrong A Fairly long message goes here and then gets cut..</p>
                            </li>

                            <li>
                                <b>User Name</b>
                                <strong class="pull-right">Pending</strong>
                                <br /> Date 
                                <p>Note about what was wrong A Fairly long message goes here and then gets cut..</p>
                            </li>

                            <li>
                                <b>User Name</b>
                                <strong class="pull-right">Pending</strong>
                                <br /> Date 
                                <p>Note about what was wrong A Fairly long message goes here and then gets cut..</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>



<script>

    $(function () {

    });

</script>
  
                     
@stop