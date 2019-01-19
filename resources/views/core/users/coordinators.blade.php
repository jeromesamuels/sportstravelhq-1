@extends('layouts.app')

@section('content')
<section class="page-header row">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
  <ol class="breadcrumb">
    <li><a href="{{ url('') }}"> Dashboard </a></li>
    <li class="active"> {{ $pageTitle }} </li>    
  </ol>
</section>
<div class="page-content row">
  <div class="page-content-wrapper no-margin">
    <div class="sbox"> 
      <div class="sbox-content clearfix">

   <!-- Start blast email -->

    {!! Form::open(array('url'=>'core/users/doinvite/', 'class'=>'form-horizontal ')) !!}
          <div class="form-group  " >
          <label for="ipt" class=" control-label col-md-3">  </label>
          <div class="col-md-12">
              <ul class="parsley-error-list">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>                
           </div> 
          </div> 
      

      <div class="col-sm-12">
          <div class="form-group" >
          <label for="ipt" class=" control-label col-md-3">
          Travel coordinator's email
          </label>
          <div class="col-md-9">
             {!! Form::text('email',null,array('class'=>'form-control input-sm', 'placeholder'=>'','required'=>'true')) !!} 
          </div> 
          </div>
      </div>

       <div class="col-sm-12">
          <div class="form-group" >
          <label for="ipt" class=" control-label col-md-3"> </label>
          <div class="col-md-9">
              <button type="submit" name="submit" class="btn btn-primary">{{ Lang::get('core.sb_send') }} Mail </button>
           </div> 
          </div> 
       </div>
     {!! Form::close() !!}

     <!-- / blast email -->

      </div>
    </div>
  </div>
</div>

@stop