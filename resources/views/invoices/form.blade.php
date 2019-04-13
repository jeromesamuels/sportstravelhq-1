@extends('layouts.app')
@section('content')
<section class="page-header row">
    <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
    <ol class="breadcrumb">
        <li><a href="{{ url('') }}"> Dashboard </a></li>
        <li><a href="{{ url($pageModule) }}"> {{ $pageTitle }} </a></li>
        <li class="active"> Form  </li>
    </ol>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">
        {!! Form::open(array('url'=>'invoices?return='.$return, 'class'=>'form-horizontal validated','files' => true )) !!}
        <div class="sbox">
            <div class="sbox-title clearfix">
                <div class="sbox-tools " >
                    <a href="{{ url($pageModule.'?return='.$return) }}" class="tips btn btn-sm "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a> 
                </div>
                <div class="sbox-tools pull-left" >
                    <button name="apply" class="tips btn btn-sm btn-default  "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-check"></i> {{ __('core.sb_apply') }} </button>
                    <button name="save" class="tips btn btn-sm btn-default"  title="{{ __('core.btn_back') }}" ><i class="fa  fa-paste"></i> {{ __('core.sb_save') }} </button> 
                </div>
            </div>
            <div class="sbox-content clearfix">
                <ul class="parsley-error-list">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="col-md-12">
                    <fieldset>
                        <legend> Invoices</legend>
                        {!! Form::hidden('id', $row['id']) !!}
                        <div class="form-group" >
                            <?php 
                         
                         if($row['room_rate'] !='' && $row['actualized_room_count'] !='' && $row['commissoin_rate'] !=''){
                            $room_rate=$row['room_rate'] * $row['actualized_room_count'];
                            $room_total=($room_rate * ($row['commissoin_rate']/100));
                        }
                        else{
                             $room_total=0;
                        }
                            ?>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left"> Invoice ID: </label>
                                # {{ $row['invoice_id'] }}
                            </div>
                             <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left"> IATA: </label>
                                # 11725383
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left"> Trip Status: </label>
                                {{ $row['trip_status'] }}
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Check In Date: </label>
                                {{ $row['check_in'] }}
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Check Out Date: </label>
                                {{ $row['check_out'] }}
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Trip Request #: </label>
                                {{ $row['rfp_id'] }}
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Hotel Name: </label>
                                {{ $row['hotel_name'] }}
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Address: </label>
                                {{ $row['hotel_add'] }}
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Amount: </label>
                                ${{ $row['amt_paid'] }}
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Hotel Manager: </label>
                                {{ $row['hotel_manager'] }}
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Email: </label>
                                {{ $row['email'] }}
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Phone: </label>
                                {{ $row['phone'] }}
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Total Room: </label>
                                {{ $row['total_room'] }}
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Room Rate: </label>
                                {{ $row['room_rate'] }}
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Actualized Room: </label>
                                {{ $row['actualized_room_count'] }}
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Commission Rate: </label>
                                {{ $row['commissoin_rate'] }}%
                            </div>
                             <div class="col-md-4">
                                <label for="Amount" class="control-label text-left"> Amount Paid (In Doller) After Commission Rate {{ $row['commissoin_rate'] }}% </label>
                                {{ $room_total }}$
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Payment Status: </label>
                                {{ $row['payment_status'] }}
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Due Date: </label>
                                {{ $row['due_date'] }}
                            </div>
                        </div>
                       
                        <div class="form-group" >
                            <label for="Est Amt Due" class=" control-label col-md-3 text-left" style="text-align: left;" > Estmiated Amount Due: 
                            <input  type='text' name='est_amt_due' id='est_amt_due' value='{{ $row['est_amt_due'] }}' class='form-control input-sm ' /> 
                            </label>
                            <label for="Amt Paid" class=" control-label col-md-3 text-left" style="text-align: left;" > Amount to Paid:
                            <input  type='text' name='amt_paid' id='amt_paid' value='{{ $row['amt_paid'] }}' class='form-control input-sm ' /> 
                            </label>
                            <label for="payment_mode" class=" control-label col-md-3 text-left" style="text-align: left;" > Payment Mode :
                            <input  type='text' name='payment_mode' id='payment_mode' value='{{ $row['payment_mode'] }}' class='form-control input-sm ' /> 
                            </label>
                            <label for="Payment Ref Num" class=" control-label col-md-3 text-left" style="text-align: left;" > Direct Deposit/Cheque ID:
                            <input  type='text' name='payment_ref_num' id='payment_ref_num' value='{{ $row['payment_ref_num'] }}' class='form-control input-sm ' /> 
                            </label>
                           
                        </div>
                        <div class="form-group" >
                            <div class="col-md-12">
                                <textarea placeholder="Enter Notes" style="width: 100%;" name='notes' id='notes' value='{{ $row['notes'] }}' ></textarea> 
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <input type="hidden" name="action_task" value="save" />
        {!! Form::close() !!}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {    
        $('.removeMultiFiles').on('click',function(){
            var removeUrl = '{{ url("invoices/removefiles?file=")}}'+$(this).attr('url');
            $(this).parent().remove();
            $.get(removeUrl,function(response){});
            $(this).parent('div').empty();  
            return false;
        });     
        
    });
</script>        
@stop