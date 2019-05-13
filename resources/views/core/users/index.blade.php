@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}

<section class="page-header row" style="margin-top: 30px;">
   <h1>Dashboard</h1><span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - Users  </span>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
                <div class="sbox" style="border-top: none">
            <div class="sbox-content dashboard-container">
             @foreach($data_hotel as $value)
                <?php 
                        $name=$value->type;
                        $array[$name] = $purchases;
                        $y = $array[$value->type];
                        $sum_new =array_sum($array);
                    /* pending amount*/
                        $array[$name] = $purchases_due;
                        $y = $array[$value->type];
                        $sum_due =array_sum($array);
                        $revenu_due=$sum_new-$sum_due;
                        $sum =array_sum($array);
                    
                ?>
            @endforeach
                <div class="row" style="border-bottom:1px solid #eee;">
                    <h2 style="padding-bottom: 20px;">User Overview</h2>
                </div>
                <div class="row" style="border-bottom: 1px solid #eee;">
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4>Total Booking</h4>
                            <p style="font-size: 14px;padding-top: 10px;">Total Booking</p>
                        </div>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right: 10px;">{{ count($trip_booking) }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Paid Invoices</h4>
                            <p style="font-size: 14px;padding-top: 10px;">Till Today</p>
                        </div>
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $purchases }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Open Balance</h4>
                            <p style="font-size: 14px;padding-top: 10px;">Till Today</p>
                        </div>
                      
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right: 10px;">${{ $purchases }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right: 1px solid #c3bfbf;">
                        <div class="info-boxes" style="background: #fff; color: #000;">
                            <h4 >Estimated Revenue</h4>
                            <p style="font-size: 14px;padding-top: 10px;">Till Today</p>
                        </div>
                      
                        <div class="info-boxes" style="background: #fff; color: #000;float:right;">
                            <h4 style="float:right;top: 50px;position: absolute;right:10px;color: #5dbbe0;">${{ $purchases_due }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sbox">
            <div class="sbox-title">
                <h1> All Records </h1>
            </div>
            <div class="sbox-content">
                <!-- Toolbar Top -->
                <div class="row">
                    <div class="col-md-6">
                        @if($access['is_add'] ==1)
                        <a href="{{ url('core/users/create?return='.$return) }}" class="btn btn-default btn-sm"  
                            title="{{ __('core.btn_create') }}"><i class=" fa fa-plus "></i> Create New </a>
                        @endif
                        <div class="sbox-tools">
                       
                    </div>
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
                    {!! Form::open(array('url'=>'core/users?'.$return, 'class'=>'form-horizontal m-t' ,'id' =>'SximoTable' )) !!}
                    <table class="table table-striped table-hover " id="{{ $pageModule }}Table">
                        <thead>
                            <tr style="border-bottom-style: dashed;border-color: #eee;">
                                <th style="width: 3% !important;" class="number"> No </th>
                                <th  style="width: 3% !important;"> <input type="checkbox" class="checkall minimal-green" /></th>
                               
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
                                 <th  style="width: 10% !important;">{{ __('core.btn_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rowData as $row)
                            <tr style="border-bottom-style: dashed;border-color: #eee;">
                                <td > {{ ++$i }} </td>
                                <td ><input type="checkbox" class="ids minimal-green" name="ids[]" value="{{ $row->id }}" />  </td>
                           
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
                                     <td>
                                    <div class="dropdown">
                                     
                                        <a href="#" style="color: #5dbbe0;font-weight: bold;" class="dropdown-toggle" data-toggle="dropdown">View User <i class="fa fa-chevron-down" aria-hidden="true" style="color: #000;padding-top: 5px;padding-left: 5px;"></i></a>
                                        <ul class="dropdown-menu">
                                            @if($access['is_detail'] ==1)
                                            <li><a href="{{ url('core/users/'.$row->id.'?return='.$return)}}" class="tips" title="{{ __('core.btn_view') }}"> {{ __('core.btn_view') }} </a></li>
                                            @endif
                                            @if($access['is_edit'] ==1)
                                            <li><a  href="{{ url('core/users/'.$row->id.'/edit?return='.$return) }}" class="tips" title="{{ __('core.btn_edit') }}"> {{ __('core.btn_edit') }} </a></li>
                                            @endif
                                            <li class="divider" role="separator"></li>
                                            @if($access['is_remove'] ==1)
                                            <li><a href="javascript://ajax"  onclick="SximoDelete();" class="tips" title="{{ __('core.btn_remove') }}">
                                                Remove Selected </a>
                                            </li>
                                            @endif 
                                        </ul>
                                    </div>
                                </td>		 
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

         <div class="sbox" style="border-top: none;padding: 0;background: transparent; box-shadow: none;">
            <div class="sbox-content dashboard-container" style=" padding: 0;">
                <div class="row">
                  
                    <div class="col-md-4">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #5dbbe0;padding: 20px;">
                            <div class="head">
                                <h3 style="color:#fff;">Revenue</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#fff;font-size: 40px;">${{ $purchases }}</h1>
                                <p style="color:#fff;">Total Revenue till today</p>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-4 col-sm-12">
                        <div class="widget-box box-shadow" style=" margin: 0;background: #fff;padding: 20px;">
                            <div class="head">
                                <h3>Booking</h3>
                            </div>
                            <br />
                            <div class="body">
                                <h1 style="color:#5dbbe0;font-size: 40px;">{{ count($trip_booking)}}</h1>
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
          if(total != ''){
    		if(confirm('are u sure Copy selected rows ?'))
    		{
               
    			$('input[name="action_task"]').val('copy');
    			$('#SximoTable').submit();// do the rest here	
               
    		}
           }
            else{
             alert('Please select the Row')
            }
    	})	
    	
    });	
</script>	
@stop