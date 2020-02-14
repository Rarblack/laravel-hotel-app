@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <a class="pr-3" href="/hotels/{{ $hotel->id }}/rooms/{{ $room->id }}/prices/create">Create new price</a>
            <a class="" href="/hotels/{{ $hotel->id }}/rooms/{{ $room->id }}">Go back to room</a>
        </div>
        <div class="row justify-content-center pt-5">
            @if(count($prices) > 0)
                @foreach($prices as $price)
                    <div class="card m-2 border" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text"><span class="font-weight-bold">Price: </span>{{ $price->amount }}</p>
                            <p class="card-text"><span class="font-weight-bold">Currency: </span> {{ $price->currency }}</p>
                            <p class="card-text"><span class="font-weight-bold">Date: </span> {{ $price->date }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center pt-5">There is none prices set.
                    <a class="" href="/hotels/{{ $hotel->id }}/rooms/{{ $room->id }}/prices/create">Create first one.</a></p>
            @endif
        </div>
    </div>
@endsection
