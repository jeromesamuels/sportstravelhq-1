@extends('layouts.app')

@section('content')
<section class="page-header row">
  <h2> Invite {{ $roleTitle }} <small> Send email to {{ $roleTitle }} </small></h2>
  <ol class="breadcrumb">
    <li><a href="{{ url('') }}"> Dashboard </a></li>
    <li class="active"> Invite {{ $roleTitle }} </li>
  </ol>
</section>
<div class="page-content row">
  <div class="page-content-wrapper no-margin">
    <div class="sbox"> 
      <div class="sbox-content clearfix">

      <!-- Start blast email -->

      {!! Form::open(array('url'=>'core/users/doinvite/', 'class'=>'form-horizontal ')) !!}
          <div class="form-group" >
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
          {{ $roleTitle }}'s email
          </label>
          <div class="col-md-9">
             {!! Form::text('email',null,array('class'=>'form-control input-sm', 'placeholder'=>'','required'=>'true')) !!} 

            {!! Form::hidden('group_id',$roleID,array()) !!} 
            {!! Form::hidden('redirect_to',$slug,array()) !!} 
          </div> 
          </div>
      </div>

       <div class="col-sm-12">
          <div class="form-group" >
          <label for="ipt" class=" control-label col-md-3"> </label>
          <div class="col-md-9">
              <button type="submit" name="submit" class="btn btn-primary"> Invite </button>
           </div> 
          </div> 
       </div>
     {!! Form::close() !!}

     <!-- / blast email -->

      </div>





@if(count($invitations)) 

<table class="table table-striped table-hover " id="core/usersTable">
    <thead>
      <tr>
        <th style="width: 3% !important;" class="number"> No </th>
        <th>Email</th>
        <th>Sent On</th>
        <th>Status</th>
      </tr>
    </thead>


    <tbody>
      <?php $i = 0 ?>
        @foreach ($invitations as $inv)

          <tr>
            <td> {{ ++$i }} </td>
            <td> {{ $inv->email }} </td>
            <td> {{ \Carbon\Carbon::parse($inv->sent)->format('m/d/Y H:i A') }} </td>
            <td> 
              @if($inv->status==1) 
                <span class="label label-primary"> Registered  </span> 
              @else 
                <span class="label label-danger"> Not Registered </span>
              @endif

            </td>
          </tr>

        @endforeach 

    </tbody>
</table>


@else 

<div style="color: #FFF; background: #cc0000; margin: 20px; padding: 10px;">
  No Invitations sent yet!
</div>

@endif





    </div>
  </div>
</div>

@stop