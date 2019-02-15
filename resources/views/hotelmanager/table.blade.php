<style>
.trips-dropdown ul li a,.trips-dropdown ul li button{
   padding: 7px 50px;
}
</style>

<table class="table table-striped table-hover " id="s">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Date/Title</th>
                            <th>Responses</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trips as $trip)

                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <p>
                                        {{ date('d-M-Y',strtotime($trip->check_in)) }}
                                    </p>
                                    {{ $trip->trip_name }}
                                </td>
                                <td>{{ count($trip->rfps) }}</td>
                                <td>
                                    @php
                                        $rfpUserIds = [];
                                        foreach ($trip->rfps as $rfp){
                                            $rfpUserIds[count($rfpUserIds)] = $rfp->user_id;
                                        }
                                    @endphp
                                    @if (in_array(Session::get('uid'), $rfpUserIds))
                                        Bid Sent Out

                                    @else
                                        No Bid Sent
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown trips-dropdown">
                                        <?php  $invoice_id=$trip->id;
                                      $invoice_user_id=$rfp->user_id; 
                                   

                                       ?>
                                          <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                                          <ul class="dropdown-menu">
                                            <li ><a href="{{ route('hotelmanager.trips.show',$trip->id) }}" class="tips" title="View Trips" >View Details</a></li>
                                            <!--<li><a href="{{ route('tripInvoice',$invoice_id) }}" class="trips_invoice" title="Trip Invoice">Complete Trip </a></li>-->
                                            @if ($invoice_user_id==4)
                                            <li > <a href="#myModal" class="btn btn-success" id="custId" data-toggle="modal" data-id="{{ $trip->id }}"> Complete Trip </a> </li>
                                          
                                             @else
                                            <li ><button class="btn btn-success" data-toggle="modal" data-target="#myModal" disabled=""> Complete Trip  </button></li>
                                             @endif
                                          </ul>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(document).ready(function(){
                    $('#myModal').on('show.bs.modal', function (e) {
                        var rowid = $(e.relatedTarget).data('id');
                        //$('#trip_id').value=rowid;
                        document.getElementById('trip_id').value = rowid;
                     
                     });
                });

                </script>

       
          <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Make a  Invoice</h4>
              </div>
              <div class="modal-body">

                 <form action="{{ route('hotelmanager.makeInvoice') }}" method="post">
                    {{ csrf_field() }}
                   
                    <input type="hidden" name="trip_id"  id="trip_id" value="">

                    <div class="form-group">
                        <label>Actualized Room </label>

                        <input type="number" class="form-control" name="actualized_room_count" min="0">
                    </div>
                    <div class="form-group">
                        <label>Room Rate</label>
                        <input type="text" class="form-control" name="room_rate">
                    </div>
                    <div class="form-group">
                        <label>Amount (In Dollars)</label>
                        <input type="text" class="form-control" name="amt_paid" >
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
               
              </div>
            </div>

          </div>
        </div>
