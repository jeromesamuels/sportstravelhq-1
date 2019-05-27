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
        {!! Form::open(array('url'=>'team?return='.$return, 'class'=>'form-horizontal validated','files' => true )) !!}
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
                        <legend> Team</legend>
                    
                        <div class="form-group  " >
                            <label for="Team Name" class=" control-label col-md-4 text-left"> Team Name <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='team_name' id='team_name' value='{{ $row['team_name'] }}' 
                                class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="First Name" class=" control-label col-md-4 text-left"> First Name <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='first_name' id='first_name' value='{{ $row['first_name'] }}' 
                                class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Last Name" class=" control-label col-md-4 text-left"> Last Name <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='last_name' id='last_name' value='{{ $row['last_name'] }}' 
                                class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Email" class=" control-label col-md-4 text-left"> Email <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='email' id='email' value='{{ $row['email'] }}' 
                                class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="Phone" class=" control-label col-md-4 text-left"> Phone <span class="asterix"> * </span></label>
                            <div class="col-md-6">
                                <input  type='text' name='phone' id='phone' value='{{ $row['phone'] }}' 
                                class='form-control input-sm ' /> 
                            </div>
                            <div class="col-md-2">
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
    		var removeUrl = '{{ url("team/removefiles?file=")}}'+$(this).attr('url');
    		$(this).parent().remove();
    		$.get(removeUrl,function(response){});
    		$(this).parent('div').empty();	
    		return false;
    	});		
    	
    });
</script>		 
@stop