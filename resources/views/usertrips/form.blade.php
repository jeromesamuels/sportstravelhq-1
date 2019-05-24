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
        {!! Form::open(array('url'=>'usertrips?return='.$return, 'class'=>'form-horizontal validated','files' => true )) !!}
        <div class="sbox">
            <div class="sbox-title clearfix">
                <div class="sbox-tools " >
                    <a href="{{ url('usertrips'.'?return='.$return) }}" class="tips btn btn-sm "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a> 
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
                        <legend> Book a hotel now!</legend>
                        {!! Form::hidden('id', $row['id']) !!}					
                        <div class="form-group  " >
                            <label for="Trip Name" class=" control-label col-md-4 text-left"> Trip Name <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='trip_name' id='trip_name' value='{{ $row['trip_name'] }}' 
                                required     class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Address 1" class=" control-label col-md-4 text-left"> From Address <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                            <input  type='text' name='from_address_1' id='from_address_1' value='{{ $row['from_address_1'] }}' 
                                required     class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="City" class=" control-label col-md-4 text-left"> City <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='from_city' id='from_city' value='{{ $row['from_city'] }}' 
                                required     class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="State" class=" control-label col-md-4 text-left"> State</label>
                            <div class="col-md-6">
                              <input  type='text' name='from_state_id' id='from_state_id' value='{{ $row['from_state_id'] }}'    class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Zip" class=" control-label col-md-4 text-left"> Zip </label>
                            <div class="col-md-6">
                                <input  type='text' name='from_zip' id='from_zip' value='{{ $row['from_zip'] }}' 
                                 class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Address 1" class=" control-label col-md-4 text-left"> To Address <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='to_address_1' id='to_address_1' value='{{ $row['to_address_1'] }}' 
                                class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="City" class=" control-label col-md-4 text-left"> City <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='to_city' id='to_city' value='{{ $row['to_city'] }}' 
                                class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="State" class=" control-label col-md-4 text-left"> State </label>
                            <div class="col-md-6">
                                 <input  type='text' name='to_state_id' id='to_state_id' value='{{ $row['to_state_id'] }}' class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Zip" class=" control-label col-md-4 text-left"> Zip </label>
                            <div class="col-md-6">
                                <input  type='text' name='to_zip' id='to_zip' value='{{ $row['to_zip'] }}' 
                                class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Check In" class=" control-label col-md-4 text-left"> Check In <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='check_in' id='check_in' value='{{ $row['check_in'] }}' 
                                required     class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Check Out" class=" control-label col-md-4 text-left"> Check Out <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='check_out' id='check_out' value='{{ $row['check_out'] }}' 
                                required     class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Budget From" class=" control-label col-md-4 text-left"> Budget From <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='budget_from' id='budget_from' value='{{ $row['budget_from'] }}' 
                                required     class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Budget To" class=" control-label col-md-4 text-left"> Budget To <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='budget_to' id='budget_to' value='{{ $row['budget_to'] }}' 
                                required     class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Double Queen Rooms" class=" control-label col-md-4 text-left"> Double Queen Rooms <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <select name='double_queen_qty' rows='5' id='double_queen_qty' class='select2 ' required  ></select> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Double King Rooms" class=" control-label col-md-4 text-left"> Double King Rooms <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <select name='double_king_qty' rows='5' id='double_king_qty' class='select2 ' required  ></select> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Amenities" class=" control-label col-md-4 text-left"> Amenities <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <select name='amenity_ids' rows='5' id='amenity_ids' class='select2 '   ></select> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Comment" class=" control-label col-md-4 text-left"> Comment <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <textarea name='comment' rows='5' id='comment' class='form-control input-sm'>{{ $row['comment'] }}</textarea> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        {!! Form::hidden('added', $row['added']) !!}{!! Form::hidden('status', $row['status']) !!}
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
    	
    	$("#from_state_id").jCombo("{!! url('usertrips/comboselect?filter=states:id:abbr|name') !!}",
    	{  selected_value : '{{ $row["from_state_id"] }}' });
    	
    	$("#to_state_id").jCombo("{!! url('usertrips/comboselect?filter=states:id:abbr|name') !!}",
    	{  selected_value : '{{ $row["to_state_id"] }}' });
    	
    	$("#double_queen_qty").jCombo("{!! url('usertrips/comboselect?filter=room_qty:id:title') !!}",
    	{  selected_value : '{{ $row["double_queen_qty"] }}' });
    	
    	$("#double_king_qty").jCombo("{!! url('usertrips/comboselect?filter=room_qty:id:title') !!}",
    	{  selected_value : '{{ $row["double_king_qty"] }}' });
    	
    	$("#amenity_ids").jCombo("{!! url('usertrips/comboselect?filter=hotel_amenities:id:title') !!}",
    	{  selected_value : '{{ $row["amenity_ids"] }}' });
    	 		 
    
    	$('.removeMultiFiles').on('click',function(){
    		var removeUrl = '{{ url("usertrips/removefiles?file=")}}'+$(this).attr('url');
    		$(this).parent().remove();
    		$.get(removeUrl,function(response){});
    		$(this).parent('div').empty();	
    		return false;
    	});		
    	
    });
</script>		 
@stop