@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-end">
            <a class="pr-3" href="/hotels/{{ $hotel->id }}/rooms/{{ $room->id }}/prices">View prices</a>
            <a class="" href="/hotels/{{ $hotel->id }}/rooms">Go back to rooms</a>
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


        <div class="row justify-content-center border-top pt-3">
            <h1>Prices</h1>
        </div>

        @if(count($prices) > 0)
            <div class="row justify-content-center pt-3">
                @foreach($prices as $price)
                    <div class="card m-2 border" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text"><span class="font-weight-bold">Price: </span>{{ $price->amount }}</p>
                            <p class="card-text"><span class="font-weight-bold">Currency: </span> {{ $price->currency }}</p>
                            <p class="card-text"><span class="font-weight-bold">Date: </span> {{ $price->date }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else

            <div class="row justify-content-center pt-3">
                <p class="">There is none prices set.
                    <a class="" href="/hotels/{{ $hotel->id }}/rooms/{{ $room->id }}/prices/create">Create first one.</a></p>
            </div>
        @endif
    </div>
@endsection
