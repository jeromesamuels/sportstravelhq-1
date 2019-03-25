@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
    <h2>Edit Hotel</h2>
</section>


    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h1> Edit  Hotel </h1>
                        </div>
                    </div>
                </div>
                <div class="sbox-content">
                    @include('includes.alerts')
                    
                    <form action="{{ route('systemadmin.updateHotels',$hotel->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field("PUT") }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Hotel Name" name="name" value="{{ $hotel->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Zip</label>
                                    <input type="number" class="form-control" placeholder="Enter Zip Code" name="zip" value="{{ $hotel->zip }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Adress</label>
                                    <input type="text" class="form-control" placeholder="Enter Hotel Address" name="address" value="{{ $hotel->address }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Rating</label>
                                    <select name="rating" class="form-control">
                                        <option value="1" {{ $hotel->rating == 1 ? "selected" : "" }}>1 Star</option>
                                        <option value="2" {{ $hotel->rating == 2 ? "selected" : "" }}>2 Stars</option>
                                        <option value="3" {{ $hotel->rating == 3 ? "selected" : "" }}>3 Stars</option>
                                        <option value="4" {{ $hotel->rating == 4 ? "selected" : "" }}>4 Stars</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel City</label>
                                    <input type="text" class="form-control" placeholder="Enter City Name" name="city" value="{{ $hotel->city }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Type</label>
                                    <select name="type" class="form-control">
                                        <option disabled>Select Hotel Type</option>
                                        <option value="Hilton" {{ $hotel->type == "Hilton" ? "selected" : "" }}>Hilton</option>
                                        <option value="Marriott" {{ $hotel->type == "Marriott" ? "selected" : "" }}>Marriott</option>
                                        <option value="IHG" {{ $hotel->type == "IHG" ? "selected" : "" }}>IHG</option>
                                       
                                    </select>
                                </div>
                            </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Type Logo</label>
                                   <input type="file" name="logo" id="logo" class="inputfile" value="{{ $hotel->logo }}" />
                                </div>
                            </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hotel Type Property</label>
                                     <input type="file" name="property" id="property" class="inputfile" value="{{ $hotel->property }}" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>Select Amenities</label>
                            </div>
                            @foreach ($amenities as $amenity)
                               <div class="col-sm-3">
                                   <div class="form-group">
                                       <label>
                                           <input type="checkbox" value="{{ $amenity->id }}" name="amenities[]" style="opacity: 1;position: static" 
                                            @foreach ($hotel->amenities as $amenityItem)
                                                @if($amenityItem->id == $amenity->id)
                                                    checked 
                                                @endif
                                            @endforeach
                                           > {{ $amenity->title}}
                                       </label>
                                   </div>
                               </div>
                            @endforeach
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="active" value="true" class="minimal-red" {{ $hotel->active == 1 ? "checked" : "" }}>
                                        Active
                                    </label>
                                    <label>
                                        <input type="radio" name="active" value="false" class="minimal-red" {{ $hotel->active == 0 ? "checked" : "" }}>
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
                </div>
            </div>
        </div>
    </div>
    
@stop


@section('pageLevelScripts')
    
@endsection