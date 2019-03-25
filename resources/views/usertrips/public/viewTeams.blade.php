@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>Team Listing <small> Here all Team listings are listed </small></h2>
</section>

    

    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                       <div class="col-md-12">
            <a href="{{ action("UsertripsController@getTeam") }}" class="btn btn-success btn-md" style="margin: 0 20px 20px 0; padding: 10px 20px; font-size: 16px;">Create New</a>
           
        </div>
                    </div>
                </div>
                <div class="sbox-content">

                <div class="table-responsive" style="padding-bottom: 70px;">
                    <table class="table table-striped table-hover ">
                        <tr>
                            <th>Sr</th>
                            <th>Team Name</th>
                            <th>Age Group</th>
                            <th>Gender</th>
                            
                            <th>Action</th>
                        </tr>
                        @foreach ($teams as $team)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $team->team_name }}</td>
                                <td>{{ $team->age_group }}</td>
                              
                                <td>
                                    @if ($team->gender)
                                        <span class="label label-info" style="padding:4px 8px; font-size:12px">Male</span>
                                    @else
                                        <span class="label label-info" style="padding:4px 8px; font-size:12px">Female</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                      <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                                      <ul class="dropdown-menu">
                                        <!--<li>
                                            <a href="{{ route('systemadmin.editHotels',$team->id) }}">Edit</a>
                                        </li>-->
                                        <li>
                                            <form action="{{ action('UsertripsController@getTeamdelete',$team->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field("DELETE") }}
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" style="border:none;background:transparent;outline:none;display: block;padding-left:20px">Delete</button>
                                            </form>
                                        </li>
                                      </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                    </table>
                </div>
                <!-- End Table Grid -->
                </div>
            </div>
        </div>
    </div>

    
@stop


@section('pageLevelScripts')
    
@endsection