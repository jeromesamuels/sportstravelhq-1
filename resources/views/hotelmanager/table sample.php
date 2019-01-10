@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>View Trips <small> Here all trips are listed </small></h2>
</section>
<div class="page-content row">
    <div class="page-content-wrapper no-margin">

        <div class="sbox">
            <div class="sbox-title">
                <h1> All Trips </h1>
            </div>
            <div class="sbox-content">
            
            <div class="table-responsive" style="padding-bottom: 70px;">
            <table class="table table-striped table-hover " id="s">
                <thead>
                    <tr>
                        <th style="width: 3% !important;" class="number"> No </th>
                        <th  style="width: 3% !important;"> <input type="checkbox" class="checkall minimal-green" /></th>
                        <th  style="width: 10% !important;">123</th>
                      </tr>
                </thead>

                <tbody>                             
                   
                        <tr>
                            <td > 1 </td>
                            <td ><input type="checkbox" class="ids minimal-green" name="ids[]" value="1" />  </td>
                            <td>

                                <div class="dropdown">
                                  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                                  <ul class="dropdown-menu">
                                    
                                    <li><a href="#" class="tips" title=""></a></li>
                                   
                                    
                                    <li><a  href="#" class="tips" title="#"> asd</a></li>
                                   
                                    <li class="divider" role="separator"></li>
                                   
                                         <li><a href="javascript://ajax"  onclick="SximoDelete();" class="tips" title="#">
                                        Remove Selected </a></li>
                                   
                                  </ul>
                                </div>

                            </td>                                                       
                        </tr>
                        
                 
                      
                </tbody>
              
            </table>
            
            <!-- End Table Grid -->
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    $('.copy').click(function() {
        var total = $('input[class="ids"]:checkbox:checked').length;
        if(confirm('are u sure Copy selected rows ?'))
        {
            $('input[name="action_task"]').val('copy');
            $('#SximoTable').submit();// do the rest here   
        }
    })  
    
}); 
</script>   
    
@stop
