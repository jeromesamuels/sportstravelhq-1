@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<style>
    form p,form label{
    font-size: 16px;
    }
</style>
@foreach($teams as $team)


<div class="container">
    <div class="page-content row">
        <div class="page-content-wrapper no-margin">
            <h2 style="margin: 30px 0 20px;">Upload a Roster</h2>
            <div class="sbox" style="padding:50px;">
                <div class="sbox-content">
                    @include('includes.alerts')
                    <form action="{{action('UsertripsController@uploadRostertore')}}" method="post" enctype="multipart/form-data">
                         <input type="hidden" class="form-control"  name="rfp_id" value="{{ $team->user_trip_id }}">
                        {{ csrf_field() }}
                        <div class="row">
                             <legend class="text-left">Upload a roster as CSV format! </legend>
                            <div class="col-md-1 col-sm-12" ></div>
                            
                            <div class="col-md-10 col-sm-12 left-section" style="padding:10px 30px;background-color: #c5e1ec;">
                               
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Team Trip Information </label>
                                        <input type="file" class="form-control" name="room_file" id="room_file" required=""> 
                                    </div>
                                </div>
                               
                                <div class="col-sm-4" style="margin-top:30px;">
                                    <div class="form-group text-left">
                                        <button type="submit" class="btn btn-success btn-md" style="padding:10px 30px;background-color: #62badd;">Upload</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-1 col-sm-12" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop
@section('pageLevelScripts')
@endsection