@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <a class="pr-3" href="/hotels/{{ $hotel->id }}/rooms">View rooms</a>
            <a class="pr-3" href="/hotels/{{ $hotel->id }}/features">View features</a>
            <a class="" href="/hotels">Go back to hotels</a>
        </div>

        <div class="row justify-content-center pt-3 border-bottom">
            <div class="col-8">
                <img class="text-center border-bottom pb-3 w-100 " src="/storage/{{ $hotel->image }}" alt="">

                <div class="col-12 pt-3">
                    <h1 class="text-center">{{ ucwords($hotel->name) }}</h1>
                </div>
                <div class="col-12">
                    <p class="text-center">{{ $hotel->description }}</p>
                </div>
                <div class="col-12">
                    <p class="text-center">{{ ucwords($hotel->city) }}, {{ ucwords($hotel->country) }}</p>
                </div>
            </div>

            <div class="col-4">
                @if(count($features) > 0)
                    <div class="flex-column pre-scrollable">
                        @foreach($features as $feature)
                            <div class="card m-2" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ ucwords($feature->name) }}</h5>
                                    <p class="card-text">{{ $feature->description }}</p>
                                    <div class="row justify-content-end pr-3">
                                        <a href="/hotels/{{ $hotel->id }}/features/{{ $feature->id }}" class="btn btn-outline-dark">View the feature</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center pt-5">There is no any feature.
                        <a class="" href="/hotels/{{ $hotel->id }}/features/create">Create the first one.</a></p>
                @endif
            </div>
        </div>

        <div class="row justify-content-center pt-3">
            <h1>Available Rooms</h1>
        </div>

        @if(count($rooms) > 0)
            <div class="row justify-content-center pt-3">
                @foreach($rooms as $room)
                    <div class="card m-2 border" style="width: 18rem;">
                        <img src="/storage/{{ $room->image }}" class="card-img-top border" alt="{{ $room->image }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ ucwords($room->name) }}</h3>
                            <p class="card-text"><span class="font-weight-bold">Description: </span>{{ $room->description }}</p>
                            <p class="card-text"><span class="font-weight-bold">Room number:</span> {{ $room->number }}</p>
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <p class="card-text">@if($room->available) Available @else Unavailable @endif</p>
                                </div>
                                <div class="col-6">
                                    <a href="/hotels/{{ $hotel->id }}/rooms/{{ $room->id }}" class="btn btn-outline-dark float-right">Visit room</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center pt-3">There is no any available room.
                <a class="" href="/hotels/{{ $hotel->id }}/rooms/create">Create new one.</a></p>
        @endif
    </div>
@endsection
