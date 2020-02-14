@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-end">
            <a class="pr-3" href="/hotels/{{$hotel->id}}/features/create">Create new feature</a>
            <a class="pr-3" href="/hotels/{{$hotel->id}}">Go back to hotel</a>
        </div>

        @if(count($features) > 0)
            <div class="row justify-content-center pt-3">
                @foreach($features as $feature)
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $feature->name }}</h5>
                            <p class="card-text">{{ $feature->description }}</p>
                            <div class="row justify-content-end pr-3">
                                <a href="/hotels/{{ $hotel->id }}/features/{{ $feature->id }}" class="btn btn-outline-dark">View the feature</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center pt-5">There is no any hotels available.</p>
        @endif
    </div>
@endsection
