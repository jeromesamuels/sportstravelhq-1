@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>Create Hotels</h2>
</section>


    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h1> Create a new Hotel </h1>
                        </div>
                    </div>
                </div>
                <div class="sbox-content">
                    @include('includes.alerts')
                    
                    <form action="{{ route('systemadmin.storeHotels') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Code</label>
                                    <input type="text" class="form-control" placeholder="Enter Hotel Code" name="hotel_code">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>IATA Number</label>
                                    <input type="number" class="form-control" placeholder="Enter IATA number for hotel" name="IATA_number" id="IATA" maxlength="8">
                                    <p class="res" style="color:red;"></p>
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Service Type</label>
                                    <select class=" form-control" name="service_type" id="service_type" >
                                    <option value="">Please select the service provide </option>
                                    <option value="1" title="Prepared Meals (Full Service)">Full service </option>
                                     <option value="2" title="Limited service">Limited service</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Hotel Name" name="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Zip</label>
                                    <input type="number" class="form-control" placeholder="Enter Zip Code" name="zip">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Address</label>
                                    <input type="text" class="form-control" placeholder="Enter Hotel Address" name="address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Rating</label>
                                    <select name="rating" class="form-control">
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="4">4 Stars</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel City</label>
                                    <input type="text" class="form-control" placeholder="Enter City Name" name="city">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Type</label>
                                    <select name="type" class="form-control">
                                        <option disabled>Select Hotel Type</option>
                                        <option value="hilton">Hilton</option>
                                        <option value="marriott">Marriott</option>
                                        <option value="ihg">IHG</option>
                                      
                                    </select>
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Type Logo</label>
                                   <input type="file" name="logo" id="logo" class="inputfile" />
                                </div>
                            </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Type Property</label>
                                     <input type="file" name="property" id="property" class="inputfile" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>Select Amenities</label>
                            </div>
                            @foreach ($amenities as $amenity)
                               <div class="col-sm-3">
                                   <div class="form-group">
                                       <label>
                                           <input type="checkbox" value="{{ $amenity->id }}" name="amenities[]" style="opacity: 1;position: static"> {{ $amenity->title}}
                                       </label>
                                   </div>
                               </div>
                            @endforeach
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="active" value="true" class="minimal-red">
                                        Active
                                    </label>
                                    <label>
                                        <input type="radio" name="active" value="false" class="minimal-red">
                                        In-Active
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>    
                    <script>
             
                    var minLength = 8;
                    var maxLength = 8;

                    $("#IATA").on("keydown", function(){
                        var value = $(this).val();
                        if (value.length < minLength)
                            $(".res").text("IATA number is short");
                        else if (value.length > maxLength)
                            $(".res").text("IATA number is long");
                        else
                            $(".res").text("IATA number is valid");
                    });  
                    
                    </script>       
                </div>
            </div>
        </div>
    </div>
    
@stop


@section('pageLevelScripts')
    
@endsection