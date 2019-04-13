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
                            {!! Form::hidden('group_name',$roleTitle,array()) !!} 
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
            @if(($roleTitle=='Corporate') && count($corporates)) 
            <h4 class="text-center">Assign Hotel to Corporate Users</h4>
            <table class="table table-striped table-hover " id="core/usersTable">
                <thead>
                    <tr>
                        <th style="width: 3% !important;" class="number"> No </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Assign Hotel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0 ?>
                    @foreach ($corporates as $users)
                    <tr>
                        <td> {{ ++$i }} </td>
                        <td> {{ $users->first_name }} {{ $users->last_name }} </td>
                        <td> {{ $users->email }} </td>
                        <td> 
                            @if($users->active==1) 
                            <span class="label label-primary"> Active </span> 
                            @else 
                            <span class="label label-danger"> Not Active </span>
                            @endif
                        </td>
                        <td>
                            <?php $hotel_select[0] = 'Choose Hotel'; ?>
                            @foreach ($hotels as $hotel)
                            <?php $hotel_select[$hotel->id] = $hotel->name ?>
                            @endforeach 
                            {!! Form::open(array('url'=>'user/corporate_hotel', 'class'=>'form-horizontal validated','files' => true )) !!}
                            {!! Form::hidden('user_id',$users->id,array()) !!} 
                            {{ Form::select('hotel_id', $hotel_select, $users->hotel_id, ['id' => 'hotel_id', 'class' => 'select2 input-xs select2-hidden-accessible']) }}
                            <input type="submit" name="assign_hotel" class="btn btn-primary btn-xs" value="Assign">
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@stop