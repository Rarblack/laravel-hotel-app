@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <a class="pr-3" href="/hotels/{{ $hotel->id }}/rooms/create">Create new room</a>
            <a class="pr-3" href="/hotels/{{ $hotel->id }}">Go back to hotel</a>
        </div>
        <div class="row justify-content-center pt-5">
            @if(count($rooms) > 0)
                @foreach($rooms as $room)
                    <div class="card m-2 border" style="width: 18rem;">
                        <img src="/storage/{{ $room->image }}" class="card-img-top border" alt="{{ $room->image }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $room->name }}</h3>
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
            @else
                <p class="text-center pt-5">There is no any rooms.</p>
            @endif
        </div>
    </div>
@endsection
