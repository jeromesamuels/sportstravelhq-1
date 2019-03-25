@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<style>
    form p,form label{
    font-size: 16px;
    }
</style>
<div class="container">
    <div class="page-content row">
        <div class="page-content-wrapper no-margin">
            <h2> Create Team </h2>
            <div class="sbox" style="padding:50px;">
                <div class="sbox-content">
                    @include('includes.alerts')
                    <form action="{{action('UsertripsController@getTeamstore')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-1 col-sm-12" ></div>
                            <div class="col-md-5 col-sm-12 left-section" >
                                <legend> Create a new Team! </legend>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Team Name </label>
                                        <input type="text" class="form-control" placeholder="Enter Team Name" name="team_name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Age Group (U1 - U20)</label>
                                        <input type="text" class="form-control" placeholder="Enter Age Group" name="age_group">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                        <input type="radio" name="gender" value="true" class="minimal-red">
                                        Male
                                        </label>
                                        <label>
                                        <input type="radio" name="gender" value="false" class="minimal-red">
                                        Female
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top:30px;">
                                    <div class="form-group text-left">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12 right-section">
                                <h4>Sports Venue Location </h4>
                                <p>We'll find the best fit hotel closest to your event(s). </p>
                                <br /><br />
                                <h4>Budget Range </h4>
                                <p>We'll make sure you'll get exactly what was promised. </p>
                                <br /><br />
                                <h4>Room Types  </h4>
                                <p>We'll make sure you'll get exactly what was promised. </p>
                            </div>
                            <div class="col-md-1 col-sm-12" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('pageLevelScripts')
@endsection