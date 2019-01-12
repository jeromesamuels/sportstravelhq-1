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
                                <td>4</td>
                                <td>Bids Sent Out</td>
                                <td>
                                    <div class="dropdown">
                                          <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Action </button>
                                          <ul class="dropdown-menu">
                                            <li><a href="{{ route('hotelmanager.trips.show',$trip->id) }}" class="tips" title="View Trips">View Details</a></li>
                                          </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>