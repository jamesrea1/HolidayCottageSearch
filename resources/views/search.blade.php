@extends('master')

@section('content')

<div class="col-12 col-md-auto bg-white rounded  m-2 p-4">
    <div class="">

        <h3>Find a Cottage</h3>
        <!-- @if($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li>{!!$error!!}</li>
            @endforeach
            </ul>
        @endif -->

        <form action="{{ route('search') }}" method="get" >

            <div class="form-group">
                <label for="locationID">Location</label>
                <select class="form-control @error('locationID') is-invalid @enderror" name="locationID"  id="locationID">
                    <option value="choose">Choose..</option>
                    @foreach($locations as $location)
                        <option value="{{$location->__pk}}" {{ (($oldData['locationID']??null) == $location->__pk) ? 'selected' : '' }} >
                            {{$location->location_name}}
                        </option>
                    @endforeach    
                </select>     
                <div class="invalid-feedback">
                    Please choose a location
                </div>
            </div>

            <div class="form-group">
                <label for="features">Features</label>
                <div class="form-check features">
                    <div>
                        <input class="form-check-input" type="checkbox" name="nearBeach" id="nearBeach" {{ (($oldData['nearBeach']??null) == 'on') ? 'checked' : '' }} >
                        <label class="form-check-label" for="nearBeach">Near Beach</label>
                    </div>
                </div>
                <div class="form-check">
                    <div>
                        <input class="form-check-input" type="checkbox" name="acceptsPets" id="acceptsPets" {{ (($oldData['acceptsPets']??null) == 'on') ? 'checked' : '' }} >
                        <label class="form-check-label" for="acceptsPets">Accepts Pets</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="numGuests">Number of Guests</label>
                <select class="form-control @error('numGuests') is-invalid @enderror" name="numGuests" id="numGuests">
                    <option value="choose">Choose..</option>
                    @for ($i = 1; $i <= 8; $i++)
                        <option value="{{$i}}" {{ (($oldData['numGuests']??null) == $i) ? 'selected' : '' }} >
                            {{$i}}
                        </option>
                    @endfor
                </select>     
                <div class="invalid-feedback">
                    Please choose a number of guests
                </div>
            </div>

            <div class="form-group">
                <label for="startDate">Start Date</label>
                <div class="input-group">              
                    <input type="text" class="form-control sy-date @error('startDate') is-invalid @enderror" name="startDate" placeholder="Choose.." autocomplete="off">
                    <div class="input-group-append bg-white ">
                        <span class="input-group-text  bg-white"><img src="{{ asset('img/calendar.png') }}"  style="height:1rem;"/></span>
                    </div>
                    <div class="invalid-feedback">
                        Please choose a start date
                    </div>  
                </div>
            </div>
            
            <div class="form-group">
                <label for="numNights">Number of Nights</label>
                <select class="form-control @error('numNights') is-invalid @enderror" name="numNights" id="numNights">
                    <option value="choose">Choose..</option>
                    @for ($i = 1; $i <= 14; $i++)
                        <option value="{{$i}}" {{ (($oldData['numNights']??null) == $i) ? 'selected' : '' }} >
                            {{$i}}
                        </option>
                    @endfor
                </select>     
                <div class="invalid-feedback">
                    Please choose a number of nights
                </div>            
            </div>

            @csrf

            <button type="submit" class="btn btn-primary">Search</button>
            
        </form>

    </div>
</div>
 
<div class="col-12 col-md grow bg-white rounded m-2 p-4">
    <div class="">

        <h3>Results</h3> 

        <div class=searchResultItems>
            @foreach($results as $property)         
                <div class="searchResultItem clearfix">
                    <div class="searchResultImage"></div>                
                    <div class="searchResultItemDetails">
                        <h5 class="mt-0"><a href="">{{ $property->property_name }}</a></h5>
                        <h6 class=><a href="">{{ $property->location->location_name }}</a></h6>
                        <div class="features">
                            @if($property->near_beach || $property->accepts_pets)
                                @if($property->near_beach)
                                    <span class="featureItem">Near Beach</span>
                                @endif
                                @if($property->accepts_pets)
                                    <span class="featureItem">Pets Allowed</span>
                                @endif
                            @endif
                        </div>
                        <div class="guestDetails">
                            <span>Sleeps {{ $property->sleeps }}</span> - 
                            <span>Bedrooms {{ $property->beds }}</span>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm">View Cottage</button>
                    </div>
                </div>      
            @endforeach
        </div>

    </div>
</div>


@endsection