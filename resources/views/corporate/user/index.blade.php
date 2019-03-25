@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<style>
    .sbox-content {
    padding: 15px 20px 0px 20px;
    border-bottom: 1px solid #eee;
    } 
    .information_corporate td:hover {
    cursor: pointer;
    }
    .corporate-info-section{
    padding:0px 20px;
    background: #fff;
    color: #000;  
    }
    #div_corporate_img,#div_corporate_img_main{
    width: 100px;
    height: 100px;
    object-fit: cover;
    margin: 20px;
    }
</style>
<!-- <section class="page-header row">
    <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
    <ol class="breadcrumb">
        <li><a href="{{ url('') }}"> Dashboard </a></li>
        <li class="active"> {{ $pageTitle }} </li>
    </ol>
    </section> -->
<section class="page-header row" style="margin-top: 30px;">
    <h1>Dashboard </h1>
    <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Corporate </span>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
        <div class="sbox" style="border-top: none">
            <div class="sbox-content dashboard-container">
                <?php 
                    $data_hotel= DB::table('hotels')->groupBy('type')->get();
                    foreach($data_hotel as $value){
                       $name=$value->type;
                          
                        //$current_date= date('F');
                      $currentMonth = date('m');
                       // $year=date("Y",$time);  
                    /*Amount Paid*/
                    $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->whereRaw('MONTH(check_out) = ?',[$currentMonth])->sum('invoices.amt_paid');    
                        $array[$name] = $purchases;
                         $y = $array[$value->type];
                         $sum_new =array_sum($array);
                    
                    /* pending amount*/
                    $purchases_due = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->whereRaw('MONTH(check_out) = ?',[$currentMonth])->sum('invoices.est_amt_due');    
                        $array[$name] = $purchases_due;
                         $y = $array[$value->type];
                         $sum_due =array_sum($array);
                         $revenu_due=$sum_new-$sum_due;
                    
                    }
                    
                     /*Total Booking of this month*/
                    $trip_booking = DB::table('user_trips')->whereRaw('MONTH(added) = ?',[$currentMonth])->get();
                    
                    
                      
                    ?>
                <div class="row" style="border-bottom:1px solid #eee;">
                    <h2 style="padding-bottom: 20px;">Corporte Overview</h2>
                </div>
                <div class="row" >
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
                            <h4 >Paid Invoices</h4>
                            <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                        </div>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Open Balance</h4>
                            <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                        </div>
                        <?php 
                            $data2= DB::table('rfps')->get()->where("status",'!=',3)->all();
                            
                            ?>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $revenu_due }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Estimated Revenue</h4>
                            <p style="font-size: 14px;padding-top: 10px;">This Month</p>
                        </div>
                        <?php 
                            $data3= DB::table('rfps')->get()->where("status",2)->all();
                            
                            ?>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right:10px;color: #5dbbe0;">${{ $sum_new }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="sbox">
                    <div class="sbox-title">
                        <h1 style="font-size: 20px;">Corporate</h1>
                    </div>
                    <div class="sbox-content">
                        <!-- Toolbar Top -->
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    $user_id = session('uid');
                                                   /*$grp_id = DB::table('tb_users')->where('id', $user_id)->pluck('group_id');    
                                         
                                            foreach($grp_id as $item_grpid) {
                                                    $item_grpid_new = $item_grpid;
                                                }
                                              */
                                    ?>
                                @if($access['is_add'] ==1 && $user_id==5 || $user_id==1 || $user_id==2)
                                <a href="{{ url('corporate/user/create?return='.$return) }}" class="btn btn-default btn-sm"  
                                    title="{{ __('corporate/user.btn_create') }}"><i class=" fa fa-plus "></i> Create New </a>
                                @endif
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-menu5"></i> Bulk Action </button>
                                    <ul class="dropdown-menu">
                                        @if($access['is_excel'] ==1)
                                        <li><a href="{{ url( $pageModule .'/export?do=excel&return='.$return) }}"><i class="fa fa-download"></i> Export CSV </a></li>
                                        @endif
                                        @if($access['is_add'] ==1)
                                        <li><a href="{{ url($pageModule .'/import?return='.$return) }}" onclick="SximoModal(this.href, 'Import CSV'); return false;"><i class="fa fa-cloud-upload"></i> Import CSV</a></li>
                                        <li><a href="javascript://ajax" class=" copy " title="Copy" ><i class="fa fa-copy"></i> Copy selected</a></li>
                                        @endif  
                                        <li><a href="{{ url($pageModule) }}"  ><i class="fa fa-times"></i> Clear Search </a></li>
                                        <li role="separator" class="divider"></li>
                                        @if($access['is_remove'] ==1)
                                        <li><a href="javascript://ajax"  onclick="SximoDelete();" class="tips" title="{{ __('core.btn_remove') }}"><i class="fa fa-trash-o"></i>
                                            Remove Selected </a>
                                        </li>
                                        @endif 
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 pull-right">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-sm " 
                                        onclick="SximoModal('{{ url($pageModule."/search") }}','Advance Search'); " ><i class="fa fa-filter"></i> Filter </button>
                                    </div>
                                    <!-- /btn-group -->
                                    <input type="text" class="form-control input-sm onsearch" data-target="{{ url($pageModule) }}" aria-label="..." placeholder=" Type And Hit Enter ">
                                </div>
                            </div>
                        </div>
                        <!-- End Toolbar Top -->
                        <!-- Table Grid -->
                        <div class="table-responsive" style="padding-bottom: 70px;">
                            {!! Form::open(array('url'=>'corporate/user?'.$return, 'class'=>'form-horizontal m-t' ,'id' =>'SximoTable' )) !!}
                            <table class="table table-hover information_corporate" id="{{ $pageModule }}Table">
                                <thead>
                                    <tr style="border-bottom-style: dashed;border-color: #eee;">
                                        <th style="width: 3% !important;" class="number"> No </th>
                                        <th  style="width: 3% !important;"> <input type="checkbox" class="checkall minimal-green" /></th>
                                        @if($user_id==5 || $user_id==1 || $user_id==2)
                                        <th  style="width: 10% !important;">{{ __('core.btn_action') }}</th>
                                        @endif
                                        @foreach ($tableGrid as $t)
                                        @if($t['view'] =='1')               
                                        <?php $limited = isset($t['limited']) ? $t['limited'] :''; 
                                            if(SiteHelpers::filterColumn($limited ))
                                            {
                                                $addClass='class="tbl-sorting" ';
                                                if($insort ==$t['field'])
                                                {
                                                    $dir_order = ($inorder =='desc' ? 'sort-desc' : 'sort-asc'); 
                                                    $addClass='class="tbl-sorting '.$dir_order.'" ';
                                                }
                                                echo '<th align="'.$t['align'].'" '.$addClass.' width="'.$t['width'].'">'.\SiteHelpers::activeLang($t['label'],(isset($t['language'])? $t['language'] : array())).'</th>';              
                                            } 
                                            ?>
                                        @endif
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rowData as $row)
                                    <?php 
                                        $grp_id = DB::table('tb_users')->where('id', '=', $row->id)->pluck('group_id');  
                                         foreach($grp_id as $item_grpid) {
                                           $item_grpid_new = $item_grpid;
                                        }
                                        //echo $item_grpid_new;
                                        
                                         $grp_info = DB::table('tb_users')->where('id', '=', $item_grpid_new)->get();  
                                          foreach($grp_info as $item) {
                                           $item_new = $item;
                                        }
                                         //echo $item_new->username;
                                         $date1 = $item_new->created_at;
                                         $date2 = date("Y/m/d");
                                        
                                         $diff = abs(strtotime($date2) - strtotime($date1));
                                        
                                         $years = floor($diff / (365*60*60*24));
                                         $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                         
                                         if( $years != 0 && $months != 0 && $days != 0){
                                          $membership=$years.' Year'.' '.$months.' Months'.' '.$days.' Days'.'.';
                                        }
                                         elseif( $years != 0 && $months != 0 ){
                                         $membership=$years.' Year'.' '.$months.' Months'.'.';
                                        }
                                        elseif( $years != 0 && $days != 0 ){
                                          $membership=$years.' Year'.' '.$days.' Days'.'.';
                                        }
                                         else{
                                         $membership= $days.' Days'.'.';
                                        }
                                         
                                        
                                        ?>
                                    <tr >
                                        <!--get corporate user info -->
                                        <input type="hidden" id="checkbox" class="ids minimal-green" name="ids[]" value="{{ $row->id }}" />
                                        <input type="hidden" name="username" value="{{ $row->username }}" id="<?php echo $row->id; ?>username">
                                        <input type="hidden" name="first_name" value="{{ $row->first_name }}" id="<?php echo $row->id; ?>first_name">
                                        <input type="hidden" name="last_name" value="{{ $row->last_name }}" id="<?php echo $row->id; ?>last_name">
                                        <input type="hidden" name="email" value="{{ $row->email }}" id="<?php echo $row->id; ?>email">
                                        <input type="hidden" name="phone_number" value="{{ $row->phone_number }}" id="<?php echo $row->id; ?>phone_number">
                                        <input type="hidden" class="image" name="avatar" value="../uploads/users/{{ $row->avatar }}" id="<?php echo $row->id; ?>avatar" />
                                        <!--get corporate info -->
                                        <input type="hidden" name="first_name_main" value="{{ $item_new->first_name }}" id="<?php echo $item_new->id; ?>first_name">
                                        <input type="hidden" name="last_name_main" value="{{ $item_new->last_name }}" id="<?php echo $item_new->id; ?>last_name">
                                        <input type="hidden" name="email_main" value="{{ $item_new->email }}" id="<?php echo $item_new->id; ?>email">
                                        <input type="hidden" class="image" name="avatar_main" value="../uploads/users/{{ $item_new->avatar }}" id="<?php echo $item_new->id; ?>avatar_main" />
                                        <input type="hidden" name="created_at" value="{{ $membership }}" id="<?php echo $membership; ?>created_at">
                                        <td > {{ ++$i }}</td>
                                        <td><input type="checkbox" id="checkbox" class="ids minimal-green" name="ids[]" value="{{ $row->id }}" /> </td>
                                        @if($user_id==5 || $user_id==1 || $user_id==2)
                                        <td>
                                            <div class="dropdown">
                                                 <button class="btn btn-light btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> View Corporate </button>
                                                <ul class="dropdown-menu">
                                                    @if($access['is_detail'] ==1)
                                                    <?php //echo "id=".$row->id; ?>
                                                    <li><a href="{{ url('corporate/user/'.$row->id.'?return='.$return)}}" class="tips" title="{{ __('core.btn_view') }}" data-id="{{$row->id}}"> {{ __('core.btn_view') }} </a></li>
                                                    @endif
                                                    @if($access['is_edit'] ==1)
                                                    <li><a  href="{{ url('corporate/user/'.$row->id.'/edit?return='.$return) }}" class="tips" title="{{ __('core.btn_edit') }}" data-id="{{$row->id}}"> {{ __('core.btn_edit') }} </a></li>
                                                    @endif
                                                    <li class="divider" role="separator"></li>
                                                    @if($access['is_remove'] ==1)
                                                    <li><a href="javascript://ajax"  onclick="SximoDelete();" class="tips" title="{{ __('core.btn_remove') }}" data-id="{{$row->id}}">
                                                        Remove Selected </a>
                                                    </li>
                                                    @endif 
                                                </ul>
                                            </div>
                                        </td>
                                        @endif  
                                        @foreach ($tableGrid as $field)
                                        @if($field['view'] =='1')
                                        <?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
                                        @if(SiteHelpers::filterColumn($limited ))
                                        <?php $addClass= ($insort ==$field['field'] ? 'class="tbl-sorting-active" ' : ''); ?>
                                        <td align="{{ $field['align'] }}" width=" {{ $field['width'] }}"  {!! $addClass !!} >                    
                                        {!! SiteHelpers::formatRows($row->{$field['field']},$field ,$row ) !!}                       
                                        </td>
                                        @endif  
                                        @endif                   
                                        @endforeach     
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="action_task" value="" />
                            {!! Form::close() !!}
                            @include('footer')
                        </div>
                        <!-- End Table Grid -->
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                
                   $('.information_corporate tr').click(function(e) {
                        e.preventDefault();
                        var id = $(this).find("a").data("id");
                                 
                         var row_username = "#"+id+"username";
                         var username=$(row_username).val();
                
                         var row_first_name = "#"+id+"first_name";
                         var first_name=$(row_first_name).val();
                
                         var row_last_name = "#"+id+"last_name";
                         var last_name=$(row_last_name).val();
                         
                          var row_email = "#"+id+"email";
                         var email=$(row_email).val();
                
                          var row_phone_number = "#"+id+"phone_number";
                         var phone_number=$(row_phone_number).val();
                
                         var row_avatar = "#"+id+"avatar";
                         var avatar=$(row_avatar).val();
                
                          var row_first_name_main = "#"+id+"first_name_main";
                         var first_name=$(row_first_name_main).val();
                
                         var row_last_name_main = "#"+id+"last_name_main";
                         var last_name_main=$(row_last_name_main).val();
                         
                          var row_email_main = "#"+id+"email_main";
                         var email_main=$(row_email_main).val();
                
                         var row_email_main = "#"+id+"email_main";
                         var email_main=$(row_email_main).val();
                
                         var row_created_at = "#"+id+"created_at";
                         var created_at= $(row_created_at).val();
                      
                
                         $('#corporate_name').text(first_name);
                         $('#corporate_last').text(last_name);
                         $('#corporate_username').text(username);
                         $('#corporate_email').text(email);
                         $('#corporate_phone').text(phone_number);
                         $("#div_corporate_img").attr("src" , avatar);
                         $('#corporate_name_main').text(first_name_main);
                         $('#corporate_last_main').text(last_name_main);
                         $('#corporate_email_main').text(email_main);
                         $("#div_corporate_img_main").attr("src" , avatar_main);
                          $('#corporate_created_at').text(created_at)
                   });
                
                });
                
                
                      
                       
            </script>
            <div class="col-md-4 col-sm-12">
                <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                    <div class="sbox-title">
                        <h4 style="font-size: 20px;">Corporate User</h4>
                    </div>
                    <div id="pages" >
                        <div id="information" class="page"  >
                            <div class="body">
                                <img alt="" src="../uploads/users/{{ $row->avatar }}" id="div_corporate_img" border="0" width="100" class="img-circle" />
                                <div class="corporate-info-section">
                                    <ul style="list-style: none;padding-top: 20px;padding-bottom: 20px;">
                                        <li>
                                            <strong class="pull-right" style="">
                                                <div class="contact-info ">
                                                    <b>Email</b>
                                                    <p  id="corporate_email"><a href="mailto:{{ $row->email }}" style="color:#5dbbe0;">{{ $row->email }}</a></p>
                                                    <b>Phone Number</b>
                                                    <p style="color:#5dbbe0;" id="corporate_phone"><a href="tel:{{ $row->phone_number }}" style="color:#5dbbe0;">{{ $row->phone_number }}</a></p>
                                                </div>
                                            </strong>
                                            <b >Name</b>
                                            <p style="color:#5dbbe0; font-weight: bold;" ><span id="corporate_name">{{ $row->first_name }}</span> <span id="corporate_last">{{ $row->last_name }}</span></p>
                                            <p id="corporate_username" >{{ $row->username }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="body" style="list-style: none;border-top: 2px solid #a5a2a2;border-top-style: dashed;">
                                <img alt="" src="../uploads/users/{{ $item_new->avatar }}" id="div_corporate_img_main" border="0" width="100" class="img-circle" />
                                <div class="corporate-info-section">
                                    <ul style="list-style: none;padding-top: 20px;">
                                        <li>
                                            <strong class="pull-right" style="">
                                                <div class="contact-info ">
                                                    <b>Email</b>
                                                    <p  id="corporate_email_main"><a href="mailto:{{ $item_new->email }}" style="color:#5dbbe0;">{{ $item_new->email }}</a></p>
                                                    <b>Member Since</b>
                                                    <p style="color:#5dbbe0;" id="corporate_created_at">{{ $membership }}</p>
                                                </div>
                                            </strong>
                                            <b >Corporate</b>
                                            <p style="color:#5dbbe0; font-weight: bold;" ><span id="corporate_name_main">{{ $item_new->first_name }}</span> <span id="corporate_last_main">{{ $item_new->last_name }}</span></p>
                                            <b></b>
                                            <p style="color:#5dbbe0;margin-bottom: 50px;" id="corporate_created_at"></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
            <div class="sbox-content dashboard-container" style=" padding: 0;">
                <div class="row">
                    <?php 
                        $data_hotel= DB::table('hotels')->groupBy('type')->get();
                        foreach($data_hotel as $value){
                           $name=$value->type;
                        
                            $purchases = DB::table('invoices')->where('invoices.hotel_type', '=', $name)->sum('invoices.amt_paid');    
                            $array[$name] = $purchases;
                            $y = $array[$value->type];
                            $sum =array_sum($array);
                        }
                        
                        ?>
                    <div class="col-md-4">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #5dbbe0;padding: 20px;">
                            <div class="head">
                                <h3 style="color:#fff;">Revenue</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#fff;font-size: 40px;">${{ $sum }}</h1>
                                <p style="color:#fff;">Total Revenue till today</p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $data= DB::table('user_trips')->get();
                         
                          $rfps_new= DB::table('rfps')->where('status', 2)->get();     
                        ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                            <div class="head">
                                <h3>Booking</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($data)}}</h1>
                                <p>Total Booking </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                            <div class="head">
                                <h3 >Trips</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($rfps_new) }}</h1>
                                <p>Accepted Proposals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.copy').click(function() {
            var total = $('input[class="ids"]:checkbox:checked').length;
            if(confirm('are u sure Copy selected rows ?'))
            {
                $('input[name="action_task"]').val('copy');
                $('#SximoTable').submit();// do the rest here   
            }
        })  
        
    }); 
</script>   
@stop