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
                        
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left"> Invoice ID: </label>
                                  @if($row['invoice_id'] != '')
                                  #<input  type='text' name='invoice_id' id='invoice_id' value='{{ $row['invoice_id'] }}' class='form-control input-sm ' readonly/>
                                  @else
                                  #<input  type='text' name='invoice_id' id='invoice_id' value='{{$invoice_id}}' class='form-control input-sm ' readonly/> 
                                  @endif
                            </div>
                             <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left"> IATA: </label>
                                # 11725383
                            </div>
                        </div>
                      
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Check In Date: </label>
                                <input  type='text' name='check_in' id='check_in' value='{{ $row['check_in'] }}' class='form-control input-sm ' />
                               
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Check Out Date: </label>
                                  <input  type='text' name='check_out' id='check_out' value='{{ $row['check_out'] }}' class='form-control input-sm ' />
                                
                            </div>
                            <div class="col-md-4">
                                <label for="Check Out" class="control-label text-left">Trip Request #: </label>
                                 <input  type='text' name='rfp_id' id='rfp_id' value='{{ $row['rfp_id'] }}' class='form-control input-sm ' />
                               
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Hotel Name" class="control-label text-left">Hotel Name: </label>
                                 <select name="hotel_name" id="hotel_name" class="form-control input-sm"  >
                                 <option value="{{ $row['hotel_name'] }}" selected=""> {{ $row['hotel_name'] }}</option>

                                @foreach($hotel as $hotels) 
                                 <option value="{{ $hotels['id'] }}" >{{  $hotels['name'] }}</option>
                                @endforeach
                                 </select>
                               
                            </div>
                            <div class="col-md-4">
                                <label for="Address" class="control-label text-left">Address: </label>
                                 <input  type='text' name='hotel_add' id='hotel_add' value='{{ $row['hotel_add'] }}' class='form-control input-sm ' />
                               
                            </div>
                            <div class="col-md-4">
                                <label for="Amount" class="control-label text-left">Amount: </label>
                                $<input  type='text' name='amt_paid' id='amt_paid' value='{{ $row['amt_paid'] }}' class='form-control input-sm ' />
                               
                                
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Hotel Manager" class="control-label text-left">Hotel Manager: </label>
                                 <input  type='text' name='hotel_manager' id='hotel_manager' value='{{ $row['hotel_manager'] }}' class='form-control input-sm ' />
                                
                            </div>
                            <div class="col-md-4">
                                <label for="Email" class="control-label text-left">Email: </label>
                                 <input  type='text' name='email' id='email' value='{{ $row['email'] }}' class='form-control input-sm ' />
                               
                            </div>
                            <div class="col-md-4">
                                <label for="Phone" class="control-label text-left">Phone: </label>
                                 <input  type='text' name='phone' id='phone' value='{{ $row['phone'] }}' class='form-control input-sm ' />
                                
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-4">
                                <label for="Total Room" class="control-label text-left">Total Room: </label>
                                 <input  type='text' name='total_room' id='total_room' value='{{ $row['total_room'] }}' class='form-control input-sm ' />
                                
                            </div>
                            <div class="col-md-4">
                                <label for="Room Rate" class="control-label text-left">Room Rate: </label>
                                  <input  type='text' name='room_rate' id='room_rate' value='{{ $row['room_rate'] }}' class='form-control input-sm ' />
                               
                            </div>
                            <div class="col-md-4">
                                <label for="Actualized Room" class="control-label text-left">Actualized Room: </label>
                                   <select name="actualized_room_count" id="actualized_room_count" class="form-control input-sm"  >
                                     <option value="{{ $row['actualized_room_count'] }}" selected=""> {{ $row['actualized_room_count'] }}</option>
                                    @foreach($room_qty as $room_qtys) 
                                     <option value="{{  $room_qtys }}" >{{  $room_qtys }}</option>
                                    @endforeach
                                     </select>
                               
                            </div>
                        </div>
                        <div class="form-group" >
                             <div class="col-md-4">
                             <label for="Amt Paid" class=" control-label text-left" style="" > Amount to Paid: </label>
                            @if($row['amt_paid']!='')
                            <input  type='text' name='amt_paid' id='amt_paid' value='{{ $row['amt_paid'] }}' class='form-control input-sm ' />
                            @else
                               <input  type='text' name='amt_paid' id='amt_paid_new' value='{{ $row['amt_paid'] }}' class='form-control input-sm ' />
                            @endif
                           
                        </div>
                            <div class="col-md-4">
                                <label for="Commission" class="control-label text-left">Commission Rate %: </label>
                                <select name="commissoin_rate" id="commissoin_rate" class="form-control input-sm"  >
                                 <option value="{ $row['commissoin_rate'] }}" selected=""> {{ $row['commissoin_rate'] }}</option>
                                 <option value="10" >10%</option>
                                 <option value="20" >20%</option>
                                 <option value="30" >30%</option>
                                 <option value="40" >40%</option>
                                 <option value="50" >50%</option>
                                 <option value="60" >60%</option> 
                                 <option value="70" >70%</option>
                                 <option value="80" >80%</option> 
                                 <option value="90" >90%</option>
                                  </select>
                                
                            </div>
                             <div class="col-md-4">
                                <label for="Amount" class="control-label text-left"> Amount Paid ($) After Commission Rate {{ $row['commissoin_rate'] }}% </label>
                                  <input  type='text' name='room_total' id='room_total' value='' class='form-control input-sm ' />
                             
                            </div>
                            
                          
                        </div>
                       
                        <div class="form-group" >
                            <label for="Est Amt Due" class=" control-label col-md-3 text-left" style="text-align: left;" > Estmiated Amount Due: 
                            <input  type='text' name='est_amt_due' id='est_amt_due' value='{{ $row['est_amt_due'] }}' class='form-control input-sm ' /> 
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
        @if($invoice_id!='' && session('level')==1)
         <a href="#myModal" class="btn btn-success" id="custId_new" data-toggle="modal" data-id="" title="" style="float:right;margin-bottom: 40px;">Send Email </a> 
         @else
            <button type="button" class="btn btn-success" disabled>Send Email</button>
        @endif
    </div>
  
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send a Invoice</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('invoices.sendInvoice') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="invoice_id"  id="invoice_id" value="{{ $row['invoice_id'] }}">
                 
 -->
                    <div class="form-group">
                        <label>Enter Email Address </label>
                        <input type="text" class="form-control" name="email" id="email" required="">
                    </div>


                     
                   
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="upload_invoice" title="">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
 $(document).ready(function() { 
    $( "#actualized_room_count" ).change(function() {
       
        var room_rate = $('#room_rate').val();
        var actualized_room_count = $('#actualized_room_count').val();
        var amt=room_rate * actualized_room_count;
        //alert(amt);
        
        document.getElementById('amt_paid_new').value= amt;
     
    });
       $( "#commissoin_rate" ).change(function() {
       
        var room_rate = $('#room_rate').val();
        var actualized_room_count = $('#actualized_room_count').val();
        var commission_rate = $(this).val();
       
         var amt=room_rate * actualized_room_count;
    
         var cms=amt* commission_rate ;
        
         var room_total=cms / 100;
         
         console.log(room_total);
        
        document.getElementById('room_total').value= room_total;
    });
    });
</script>
<script>
 //defining jquery function for validations
jQuery(function($){
  
    //Ajax form for calling
    $( "#hotel_name" ).on("change",function( event ) {
 
    var hotel_name = $('#hotel_name').val();
    
   
      event.preventDefault();
      
            $.ajax({
                  type : "POST",
                  //url: ajaxurl,
                  url:"hotel",
                    data: { "id": hotel_name},
                
                  success: function(result){
                  if(result.trim() != "error"){
                     
                        console.log(result);
                        var obj = $.parseJSON(result); //parse data with array
                        //console.log(obj['phone_number']);
                        document.getElementById('phone').value= obj['phone'];
                         document.getElementById('hotel_add').value= obj['address'];
                        document.getElementById('email').value= obj['email'];
                        document.getElementById('hotel_manager').value= obj['name'];
                  }

                  else{
                  }
                   
                  },
                  error: function(response){
                        //alert(response);
                 }
                });
       });
      
    });


</script>

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