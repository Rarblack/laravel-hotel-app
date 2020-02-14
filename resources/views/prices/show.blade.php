@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-end">
            <a class="pr-3" href="/hotels/">View hotels</a>
            <a class="pr-3" href="/hotels/{{ $hotel->id }}/rooms">Go back</a>
        </div>

        <div class="row justify-content-center pt-3">

            <img class="text-center border-bottom pb-3  " src="/storage/{{ $room->image }}" alt="">

            <div class="col-12 pt-3">
                <h1 class="text-center">{{ $room->name }}</h1>
            </div>
            <div class="col-12">
                <p class="text-center">{{ $room->description }}</p>
            </div>
            <div class="col-12">
                <p class="text-center font-italic">{{ $room->number }}</p>
            </div>
        </div>
    </div>
@endsection
