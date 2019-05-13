<style type="text/css">
    .compare-rfp-table{
    background:#eff8fa;
    }
    .compare-rfp-table tr:nth-child(odd){
    background-color: #d7ecf1;
    color: #000;
    }
    .compare-rfp-table tr:last-child,.compare-rfp-table tr:first-child{
    background-color: #fff;
    color: #000;
    }
    .compare-rfp-table table tr th {
    padding: 0px;
    background: transparent;
    font-weight: normal;
    color: #000;
    }
    .compare-rfp-table tr td,.m-portlet-comparerfp table tr th, .m-portlet-comparerfp table tr td{
    padding: 0;
    border-right: 0;
    }
    .compare-rfp-table .rfp-inner-table tr td{
    border-right: 1px solid #cecccc;
    padding: 10px 30px;
    vertical-align: top;
    }
    .compare-rfp-table h1{
    color:#fff;
    padding: 15px;
    }
    .compare-rfp-table tr td img{
    width:100%;
    height:150px;
    object-fit: cover;
    margin: 0px auto;
    }
    .m-portlet--full-height {
    width:98%; 
    margin:1%;
    }
    .compare-rfp-table,.rfp-inner-table {
    text-align:center; 
    margin-left:auto; 
    margin-right:auto; 
    width:100%;
    }
    .rfp-inner-heading{
    width: 250px;
    margin-top: 40px;
    }
    .btn.btn-default, .btn.btn-secondary{
    color: #000;
    }
    .compare-head{margin-top:77px;}
    .compare-rfp-table tr,td {text-align:left;}
</style>
<div class="m-portlet m-portlet--full-height ">
    <div class="m-portlet-comparerfp  table-responsive" >
        <table class="compare-rfp-table table">
            <tr>
                <th><a href="{{ URL::to('/trips') }}"><i class="la la-angle-left"></i> Back </a></th>
                <th colspan="10">
                    <div class="row">
                        <h2 style="padding: 25px 0px;">Compare Hotel Proposals</h2>
                    </div>
                </th>
            </tr>
            <tr>
                <td>
                    <table class="tabel rfp-inner-table rfp-inner-heading">
                        <tr>
                            <td >
                                <h4 class="compare-head">Compare</h4>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom:10px;"><b>Hotel Name</b></td>
                        </tr>
                        <tr>
                            <td ><b>Address</b></td>
                        </tr>
                        <tr>
                            <td><b>Destination: </b></td>
                        </tr>
                        <tr>
                            <td><b>Hotel Information: </b></td>
                        </tr>
                        <tr>
                            <td><b>Distance to Event: </b></td>
                        </tr>
                        <tr>
                            <td><b>Rate Offer: </b></td>
                        </tr>
                        <tr>
                            <td ><b>Hotel CC Authorization: </b></td>
                        </tr>
                        <tr>
                            <td><b>Offer Good Until: </b></td>
                        </tr>
                        <tr>
                            <td><b>Sales Manager: </b></td>
                        </tr>
                        <tr>
                            <td><b>King bedrooms: </b></td>
                        </tr>
                        <tr>
                            <td ><b>Queen Double bedroom: </b></td>
                        </tr>
                        <tr>
                            <td><b>Total # of Rooms: </b></td>
                        </tr>
                        <tr>
                            <td height="60"><b>Requested Amenities: </b></td>
                        </tr>
                        <tr>
                            <td><b>Rating: </b></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                </td>
                @foreach ($rfps as $rfp)
                <td>
                    <table class="rfp-inner-table">
                        <tr>
                            <td ><img alt="" src="../public/uploads/users/{{ $rfp->userInfo->hotel->property }}"  class="img-responsive" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom:0px;">
                                <h5>{{ $rfp->userInfo->hotel->name }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $rfp->userInfo->hotel->address }}</td>
                        </tr>
                        <tr>
                            <td>{{ $rfp->destination }}</td>
                        </tr>
                        <tr>
                            <td>{{ $rfp->distance_event }}</td>
                        </tr>
                        <tr>
                            <td>${{ $rfp->offer_rate }}</td>
                        </tr>
                        <tr>
                            <td >Supported {{$rfp->user_id}}</td>
                        </tr>
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($rfp->offer_validity)->format('m/d/Y') }}</td>
                        </tr>
                        <tr>
                            <td>{{ $rfp->sales_manager }} (Contact: <b>{{$rfp->userInfo->phone_number}}</b> )</td>
                        </tr>
                        <tr>
                            <td>{{ $rfp->king_beedrooms }}</td>
                        </tr>
                        <tr>
                            <td >{{ $rfp->queen_beedrooms }}</td>
                        </tr>
                        <tr>
                            <td>{{ $rfp->queen_beedrooms + $rfp->king_beedrooms }}</td>
                        </tr>
                        <tr>
                            <td height="60"> 
                                <?php 
                                    $aminities=$rfp->amenitie_ids;
                                    $myaar=explode(',' , $aminities);
                                    
                                    foreach ($myaar as $key => $value) {
                                    
                                    $string = $value;
                                    $res = preg_replace("/[^0-9]/", "", $value );
                                    
                                    $hotel_aminities = DB::table('hotel_amenities')->where("id", $res)->pluck('title'); 
                                     
                                    ?>
                                {{ $hotel_aminities}},
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @for ($i = 0; $i < $rfp->userInfo->hotel->rating; $i++)
                                <span class="fa fa-star" style="color:#a9a902"></span>
                                @endfor
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <div class="row">
                                    <div class="col-md-6">
                                        <button data-toggle="modal" data-target="#confirm_decline" data-id="{{ $rfp->id }}" title="{{ $rfp->id }}" class="btn btn-default btn-secondary btn-md">Decline</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button data-toggle="modal" data-target="#confirm_accept"  data-id="{{ $rfp->id }}" title="{{ $rfp->id }}" class="btn btn-default btn-md">Accept</button>       
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                @endforeach
            </tr>
        </table>
        <script>
            $(document).ready(function(){
            $('#myModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //$('#trip_id').value=rowid;
                document.getElementById('trip_id').value = rowid;
                document.getElementById('rfp_decline').title = rowid;
               
             });
            
            $('#confirm_decline').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //$('#trip_id').value=rowid;
                document.getElementById('rfp_decline').title = rowid;
               
             });
            $('#confirm_accept').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //$('#trip_id').value=rowid;
                document.getElementById('rfp-accept').title = rowid;
               
             });
            });
            
        </script>
        <div class="modal fade" id="confirm_decline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Select a Reason</h5>
                        <select id="decline_reason_select" name='decline_reason_select' rows='5' class='select2'>
                            <option value="">--Please select a reason for Declining--</option>
                            <option value="1">No availability for dates requested</option>
                            <option value="2">Budget too low</option>
                            <option value="3">To many Concessions</option>
                            <option value="4">Property under renovation</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-rfp-decline" id="rfp_decline" title="" >Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).on("click", ".btn-rfp-decline", function() {
            
                var id = $(this).attr("title");
                
                var e = document.getElementById ("decline_reason_select");
                var reason = e.options [e.selectedIndex] .value;
                //alert(reason);
                var url = '{{ url("/declineRFP/") }}' + '/' + id + '/' + reason;
            
                $.post(url,'/' + reason, function(response) {
                    if(response.success) {
                      alert(response.view_data);
                      location.reload();
                    }
                }, 'json');
            
              });
        </script>
        <!--begin::AcceptModal-->
        <div class="modal fade" id="confirm_accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to accept this proposal ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-rfp-accept" id="rfp-accept" title="" >Yes Accept</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>