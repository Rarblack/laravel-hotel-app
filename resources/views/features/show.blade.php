@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <a class="" href="/hotels/{{ $hotel->id }}/features">Go back to features</a>
        </div>
        <div class="row justify-content-center pt-3">

            <div class="col-12 pt-3">
                <h1 class="text-center">{{ $feature->name }}</h1>
            </div>
            <div class="col-12">
                <p class="text-center">{{ $feature->description }}</p>
            </div>

        </div>
    </div>
@endsection
