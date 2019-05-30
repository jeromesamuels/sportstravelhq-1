<div class="table-responsive-sm">
<table class="table  table-hover usertrips_new display" id="usertrips" width="100%">
    <thead>
        <tr>
            <div class="m-portlet__header" style="padding: 20px;">
                <a href="#" class="btn btn-default btn-secondary btn-md compare-rfp" style="border: 1px solid #009688;border-radius: 5px;">Compare <span></span> </a>
                &nbsp;&nbsp;&nbsp;
                <i class="la la-ellipsis-h "></i>
            </div>
        </tr>
        <tr style="border-bottom-style: dashed;border-color: #eee;">
            <th></th>
            <th><b>Date Created</b></th>
            <th><b>Client </b></th>
            <th><b>Event Date</b></th>
            <th><b>Trip #</b></th>
            <th width="35%"><b>Progress</b></th>
            <th><b>Status </b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trips as $trip)
        <tr style="border-bottom-style: dashed;border-color: #eee;">
            <td>
                <span style="width: 40px;">
                @if ($trip->rfps->count() > 0)
                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                    <input type="checkbox" class="compare_cb" name="compare_cb" value="{{ $trip->rfps->pluck('user_trip_id')->implode(',') }}" />&nbsp;
                    <span></span>
                    </label>
                @endif
                </span>
            </td>
            <td> {{ date('d-M-Y',strtotime($trip->added)) }} </td>
            <td>
             
                <img src="{{ URL('/uploads/users') }}/<?php echo $trip->tripuser->avatar;?>" border="0" width="40" height="40" class="img-circle" style="margin-right:5px;"> {{ $trip->tripuser->first_name }} {{ $trip->tripuser->last_name }} 
               
            </td>
            <td>
                <!-- {{ count($trip->rfps) }} response--> 
                {{ date('d-M-Y',strtotime($trip->check_in)) }}
            </td>
            <td> {{ $trip->id }}</td>
            <td>
                <?php  
                    $rfpUserIds = [];
                    $rpf_count=$trip->rfps;
                    
                    if(count($rpf_count) > 0){
                    
                    foreach ($trip->rfps as $rfp){
                       
                    
                    $rfpUserIds[count($rfpUserIds)] = $rfp->user_id;
                    
                    $rfp_status=$rfp->status;
                    
                    if($rfp->status==1){
                    
                       ?>
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 3</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Hotel Manager send the proposal</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:25%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span> </p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4 </p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5</p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6</p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7</p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8</p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9</p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php } 
                    elseif($rfp_status== 5){ ?>
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 6</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Client Sign the hotel agreement</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:62.5%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7</p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8</p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9</p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php } 
                    elseif(count($rpf_count) >= 2) {
                       ?>
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 4</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Client review and compare proposals</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:37.5%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5</p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6</p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7</p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8</p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9</p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php 
                    }
                    
                     elseif($rfp->status ==4){ 
                     ?>
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 9</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Hotel manager upload the billing receipt</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:99%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php 
                    }
                    elseif($rfp->status ==8){ 
                       ?>
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 8</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Client Submit the Rooming List</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:87.5%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9 </p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php }
                    elseif($rfp_status== 2){
                           ?>
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 5</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Client Choose Winner</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:50%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5</p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6</p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7</p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8</p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9</p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php }
                    elseif($rfp->status ==6){ 
                    ?>  
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 7</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Hotel manager sign the contract</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:75%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8</p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9</p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php 
                    }
                          elseif($rfp->status ==5){ 
                          ?>
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 6</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Client Sign the hotel agreement</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:62.5%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#" style="color: #5dbbe0;font-weight: bold;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7</p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8</p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9</p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php } 
                    else{ 
                    ?>
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 4</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Client review and compare proposals</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:37.5%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#" style="color: #5dbbe0;font-weight: bold;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5</p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6</p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7</p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8</p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9</p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php }
                    } 
                    }
                   
                    elseif($trip->status ==6 && count($rpf_count) == 0){
                             
                       ?>
                <div class="body">
                    <div class="hotel_revenue" style="    padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #000">Step 2</p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Corporte Viewed RFP</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:25%;background-color: #000;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#" style="color: #5dbbe0;font-weight: bold;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3</p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4</p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5</p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6</p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7</p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8</p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9</p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php  }
                    else{  ?>
                <div class="body">
                    <div class="hotel_revenue" style=" padding: 20px 0px;">
                        <p style="float: left;top: -20px;position: relative;color: #44c8f5">Step 1 </p>
                        <p style="float: right;top: -20px;position: relative;color: #8a8888">Client Submitted RFP</p>
                        <div class="final_range">
                            <div class="skills hotel_range" style="width:12.5%;background-color: #44c8f5;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown trips-dropdown-new">
                    <a href="#" style="color: #5dbbe0;font-weight: bold;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-new">
                        <li>
                            <div class="row" id="show_div" >
                                <div class="col-md-12">
                                    <div class="progress"  >
                                        <div class="one success-color">
                                            <p>Step 1 <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            <h6>Client Submitted RFP</h6>
                                        </div>
                                        <div class="two no-color">
                                            <p>Step 2</p>
                                            <h6>Corporate Viewed RFP</h6>
                                        </div>
                                        <div class="three no-color">
                                            <p>Step 3</p>
                                            <h6>Hotel Manager Send Proposals</h6>
                                        </div>
                                        <div class="four no-color">
                                            <p>Step 4</p>
                                            <h6>Client review and compare proposals</h6>
                                        </div>
                                        <div class="five no-color">
                                            <p>Step 5</p>
                                            <h6>Client choose winner</h6>
                                        </div>
                                        <div class="six no-color">
                                            <p>Step 6</p>
                                            <h6>Client sign the hotel agreement</h6>
                                        </div>
                                        <div class="seven no-color">
                                            <p>Step 7</p>
                                            <h6>Hotel manager sign the contract</h6>
                                        </div>
                                        <div class="eight no-color">
                                            <p>Step 8</p>
                                            <h6>Client submit the rooming list</h6>
                                        </div>
                                        <div class="nine no-color">
                                            <p>Step 9</p>
                                            <h6>Hotel Manager upload the billing receipt</h6>
                                        </div>
                                        <div class="progress-bar no-color" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php
                    }?>
            </td>
            <td>
                <?php //echo $rfp->status;
                    $rpf_count=$trip->rfps;
                    
                    if(count($rpf_count) > 0){
                    
                    foreach ($trip->rfps as $rfp){
                       
                    $rfpUserIds[count($rfpUserIds)] = $rfp->user_id;
                    $rfp_status=$rfp->status;
                       if($rfp->status== 3){
                         echo '<i class="fa fa-eye-slash" aria-hidden="true" style=" font-size: 18px;color: #8c8585; margin: 10px 7px 0px;font-family: FontAwesome;"></i>'.' '."Unread";
                       }
                       elseif($rfp->status==1){
                         
                         echo '<i class="fa fa-spinner" aria-hidden="true" style=" font-size: 18px;color: #8c8585; margin: 10px 7px 0px;"></i>'.' '."Waiting to Send";
                       }
                        elseif($rfp->status== 5){
                          echo '<i class="fa fa-handshake-o" aria-hidden="true" style=" font-size: 18px;color: #8c8585; margin: 10px 7px 0px;"></i>'.' '."Bid Accepted";
                       }
                        elseif($rfp->status== 2){
                          echo '<i class="fa fa-check-square-o" aria-hidden="true" style=" font-size: 18px;color: #8c8585; margin: 10px 7px 0px;font-family: FontAwesome;"></i>'.' '."Proposal Submitted";
                       }
                       
                        elseif($rfp->status ==4){
                         
                           echo '<i class="fa fa-check-square" aria-hidden="true" style=" font-size: 18px;color: #5dbbe0; margin: 10px 7px 0px;font-family: FontAwesome;"></i>'.' '."Completed";
                       }
                       
                        elseif($rfp->status== 6){
                         
                           echo '<i class="fa fa-pencil-square-o" aria-hidden="true" style=" font-size: 18px;color: #8c8585; margin: 10px 7px 0px;font-family: FontAwesome;"></i>'.' '."Contract Signed";
                       }
                        elseif($rfp->status== 8){
                         
                           echo '<i class="fa fa-pencil-square-o" aria-hidden="true" style=" font-size: 18px;color: #8c8585; margin: 10px 7px 0px;font-family: FontAwesome;"></i>'.' '."Signed";
                       }
                       
                     
                       else{
                            
                             echo '<i class="fa fa-spinner" aria-hidden="true" style=" font-size: 18px;color: #8c8585; margin: 10px 7px 0px;"></i>'.' '."Waiting to Send";
                       }
                       
                       ?>
                <?php } 
                    }
                         elseif($trip->status == 6){
                            
                           echo '<i class="fa fa-eye" aria-hidden="true" style=" font-size: 18px;color: #8c8585; margin: 10px 7px 0px;font-family: FontAwesome;"></i>'.' '."Viewed";
                       }
                         else{
                            echo '<i class="fa fa-paper-plane" aria-hidden="true" style=" font-size: 18px;color: #5dbbe0; margin: 10px 7px 0px;"></i>'.' '."Sent";
                        }
                         ?>
            </td>
            <td>
                <div class="dropdown trips-dropdown">
                    <a href="#" style="color: #5dbbe0;font-weight: bold;" class="dropdown-toggle" data-toggle="dropdown">View Trip <i class="fa fa-chevron-down" aria-hidden="true" style="color: #000;padding-top: 5px;padding-left: 5px;"></i></a>
                    <ul class="dropdown-menu">
                        <li ><a href="{{ route('coordinator.trips.show',$trip->id) }}"  class="btn btn-light"  title="View Trips" >View Details</a></li>
                       
                        <li>
                            @if($trip->status==0 || $trip->status==6 && count($trip->rfps)=='')
                            <a  href="{{ url('usertrips/'.$trip->id.'/edit?return=') }}" class="tips" title="{{ __('core.btn_edit') }}">Edit Trip Details </a>
                              @else
                            <button  class="btn btn-light" id="custId" data-toggle="modal" data-id="{{ $trip->id }}"disabled=""> Edit Trip Details </button>
                            @endif
                        </li>
                      
                        @foreach ($trip->rfps as $rfp)
                        <li>
                            @if ($rfp->status != 4)
                            <a href="#confirm_decline" class="btn btn-light" id="custId" data-toggle="modal" data-id="{{ $rfp->id }}"> Declined RFP</a> 
                            @else
                            <button  class="btn btn-light" id="custId" data-toggle="modal" data-id="{{ $rfp->id }}"disabled=""> Declined RFP  </button>
                            @endif
                        </li>
                        @if ($rfp->status== 1 || $rfp->status== 3)
                        <li ><button data-toggle="modal"  data-target="#confirm_forword"  data-id="{{ $rfp->id }}" title="{{ $rfp->id }}" class="btn btn-light confirm_forword">Accept RFP</button>    </li>
                        @else
                        <li > <button data-toggle="modal" data-target="#confirm_forword"  data-id="{{ $rfp->id }}" title="{{ $rfp->id }}" class="btn btn-light " disabled="">Accept RFP</button>   </li>
                        @endif

                        @if ($rfp->status== 6)
                        <li > <button data-toggle="modal" data-target="#upload_roomingList"  data-id="{{ $rfp->id }}" title="{{ $rfp->id }}" class="btn btn-light ">Upload Rooming List</button></li>
                        @else
                        <li > <button data-toggle="modal" data-target="#upload_roomingList"  data-id="{{ $rfp->id }}" title="{{ $rfp->id }}" class="btn btn-light " disabled="">Upload Rooming List</button></li>
                        @endif

                        @if($rfp->status== 6)
                        <li ><button data-toggle="modal" data-target="#upload_roster" data-target="#upload_roster"  data-id="{{ $rfp->id }}" title="{{ $rfp->id }}" class="btn btn-light ">Upload Roster</button></li>
                        @else
                        <li ><button data-toggle="modal" data-target="#upload_roster" title="{{ $rfp->id }}" class="btn btn-light " disabled="">Upload Roster</button></li >
                        @endif

                        @if ($rfp->status== 4)
                        <li ><a href="{{ route('downloadReceipt',['download'=>'pdf', 'rfp_id' => $rfp->id]) }}"> <button id="download_receipt" title="{{ $rfp->id }}" class="btn btn-light ">Download Receipt</button></a></li>
                        @else
                        <li > <button  title="{{ $rfp->id }}" class="btn btn-light " disabled="">Download Receipt</button></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<script>
    $(document).ready(function(){
    $('#upload_roomingList').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        document.getElementById('trip_id').value = rowid;
        document.getElementById('upload_file').title = rowid;
       
     });
    
    $('#confirm_decline').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        document.getElementById('rfp_decline').title = rowid;
       
     });
     $('#confirm_forword').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        document.getElementById('rfp-accept-f').title = rowid;
     
    
       
     });
       $('#confirm_accept').on('show.bs.modal', function (e) {
        var title = $('.confirm_forword').attr('title');
        document.getElementById('rfp-accept').title = title;
       
     });
     $('#upload_roster').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        document.getElementById('btn-upload-roster').title = rowid;
       
     });
    });
    
</script>
<!--begin::AcceptModal-->
<div class="modal fade" id="upload_roster" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Select a Team</h5>
                <select id="upload_roster_select" name='upload_roster_select' class='form-control'>
                    <option value="">--Please select a Team to be added--</option>
                    @foreach($team as $teams) 
                    <option value="{{ $teams->team_name }}">{{ $teams->team_name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-upload-roster" id="btn-upload-roster" title="" >Submit</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".btn-upload-roster", function() {

            var id = $(this).attr("title");
            var e = document.getElementById ("upload_roster_select");
            var team = e.options [e.selectedIndex] .value;
            var url = '{{ url("/uploadRoster/") }}' + '/' + id + '/' + team;

            $.post(url,'/' + team, function(response) {
                if(response.success) {
                    alert(response.view_data);
                     window.location = "{{ url('/uploadRosters') }}" + '/' + id ;

                }
            }, 'json');

        });
</script>
<div class="modal fade" id="confirm_forword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to accept this proposal ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button data-toggle="modal" data-target="#confirm_accept"   id="rfp-accept-f" title="" class="btn btn-light " >Yes Accept</button> 
                <!-- <button type="button" class="btn btn-primary" id="rfp-accept-f" title="" >Yes Accept</button> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirm_accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>"You are about to be forwarded to contract screen" are you sure?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-rfp-accept" id="rfp-accept" title="">Yes Forword</button>
            </div>
        </div>
    </div>
</div>
<div id="upload_roomingList" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" style="text-transform: uppercase;">Upload Rooming List</h3>
            </div>
            <div class="modal-body">
                <form action="{{ route('hotelmanager.uploadRoomingList') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="trip_id"  id="trip_id" value="">
                    <div class="form-group">
                        <a href="http://13.92.240.159/demo/uploads/users/SportTravelHQ_rooming_list_template.xls" >
                        Click here to see the Romming list template </a>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="rooming_file" id="rooming_file" required="">
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="upload_file" title="">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--begin::DeclineModal-->
<div class="modal fade" id="confirm_decline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Select a Reason</h5>
                <select id="decline_reason_select" name='decline_reason_select' rows='5' class='select2'>
                    <option value="">--Please select a reason for Declining--</option>
                    <option value="1">No availability for dates requested</option>
                    <option value="2">Budget too low</option>
                    <option value="3">To many Concessions</option>
                    <option value="4">Property under renovation</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-rfp-decline" id="rfp_decline" title="" >Submit</button>
            </div>
        </div>
    </div>
</div>

<script>

    /*decline RFP */
     $(document).on("click", ".btn-rfp-decline", function() {
    
        var id = $(this).attr("title");
        
        var e = document.getElementById ("decline_reason_select");
        var reason = e.options [e.selectedIndex] .value;
        //alert(reason);
        var url = '{{ url("/declineRFP/") }}' + '/' + id + '/' + reason;
    
        $.post(url,'/' + reason, function(response) {
            if(response.success) {
              alert(result);
            
            }
        }, 'json');
    
      });
</script>
