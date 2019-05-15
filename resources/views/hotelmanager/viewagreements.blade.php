@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>View Agreements <small> Note: Agreement Form Automatically Deleted After 72 Hours </small></h2>
</section>


    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h1> View Agreements </h1>
                        </div>
                    </div>
                </div>
                <div class="sbox-content">

                @include('includes.alerts')
                <div class="table-responsive usertrips" style="padding-bottom: 70px;">

                    <table class="table table-striped table-hover " id="s">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Sent At</th>
                                <th>Travel Cordinator</th>
                                <th>Hotel</th>
                                <th>Form</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agreements as $agreement)

                               <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ Carbon\Carbon::createFromTimeStamp(strtotime($agreement->agreement_sent) )->diffForHumans() }}</td>
                                   <td>
                                    {{ $agreement->cordinator->first_name." ".$agreement->cordinator->last_name }}
                                   </td>
                                   <td>{{ $agreement->hotel_name }}</td>
                                   <td>
                                       <a href="{{ route('hotelmanager.agreementDownload',$agreement->id) }}">Download</a>
                                   </td>
                                   <td>
                                  
                                       <div class="dropdown">
                                             <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                                             <ul class="dropdown-menu">
                                               <li><a href="{{ route('hotelmanager.agreementDetails',$agreement->id) }}" class="tips" title="View Trips">View Details</a></li>
                                               <?php if(session('level')==4 && $agreement->agreementRfp->status !=5 && $agreement->agreementRfp->status !=6 && $agreement->agreementRfp->status !=4){?>
                                                <li > <button data-toggle="modal" data-target="#confirm_agree"  data-id="{{ $agreement->for_rfp }}" title="{{ $agreement->for_rfp }}" class="btn btn-light ">Accept Aggreement(For client)</button> </li>
                                               <?php }
                                                 elseif(session('level')==5 && $agreement->agreementRfp->status ==5 && $agreement->agreementRfp->status !=6 && $agreement->agreementRfp->status !=4){  ?>
                                                <li > <button data-toggle="modal" data-target="#confirm_agree"  data-id="{{ $agreement->for_rfp }}" title="{{ $agreement->for_rfp }}" class="btn btn-light ">Accept Aggreement(For Manager)</button> </li>
                                               <?php } 
                                                else{
                                               ?>
                                               <li > <button data-toggle="modal" data-target="#confirm_agree"  data-id="{{ $agreement->for_rfp }}" title="{{ $agreement->for_rfp }}" class="btn btn-light " disabled="">Accept Aggreement</button> </li>
                                               <?php }?>
                                             </ul>
                                       </div>
                                    
                                   </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                <!-- End Table Grid -->
                </div>
            </div>
<script>
    $(document).ready(function(){
  
     $('#confirm_agree').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //$('#trip_id').value=rowid;
        document.getElementById('rfp-agree').title = rowid;
       
     });

      $(document).on("click", ".btn-rfp-agree", function() {
            var id = $(this).attr("title");
            var url = '{{ url("/acceptAgree/") }}' + '/' + id;

            $.post(url, function(response) {
                if(response.success) {
                    alert(response.view_data);
                    location.reload();
                }
            }, 'json');

        });

    });
    
</script>
<div class="modal fade" id="confirm_agree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to accept this Aggreement ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-rfp-agree" id="rfp-agree" title="" >Yes Accept</button>
            </div>
        </div>
    </div>
</div>

  </div>
 </div>
    
@stop


@section('pageLevelScripts')
    
@endsection