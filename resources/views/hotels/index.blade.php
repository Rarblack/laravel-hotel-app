@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-end">
            <a class="" href="/hotels/create">Create new hotel</a>
        </div>

        <h3 class="text-center">Advanced search hotels</h3>


        <form class="form-row justify-content-center" action="\hotels" method="GET">
            <div class="form-group">
                <label for="name" class="col-md-4 col-form-label">Name</label>

                <div class="col-md-12">
                    <input id="name"
                           type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           value="{{ old('name') }}"
                           autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="city" class="col-md-4 col-form-label">City</label>

                <div class="col-md-12">
                    <input
                        id="city"
                        type="text"
                        class="form-control @error('city') is-invalid @enderror"
                        name="city">

                    @error('city')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="country" class="col-md-4 col-form-label">Country</label>

                <div class="col-md-12">
                    <input
                        id="country"
                        type="text"
                        class="form-control @error('country') is-invalid @enderror"
                        name="country">

                    @error('country')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="feature" class="col-md-4 col-form-label">Feature</label>

                <div class="col-md-12">
                    <input id="feature"
                           type="text"
                           class="form-control @error('feature') is-invalid @enderror"
                           name="feature"
                           value="{{ old('feature') }}"
                           autocomplete="feature" autofocus>

                    @error('feature')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 col-form-label" style="color: #F8FAFC;">Search</label>
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-dark">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row justify-content-center pt-5">
        @if(count($hotels) > 0)
            @foreach($hotels as $hotel)
                <div class="card m-2" style="width: 18rem;">
                    <img src="/storage/{{ $hotel->image }}" class="card-img-top border" alt="{{ $hotel->image }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucwords($hotel->name) }}</h5>
                        <p class="card-text">{{ $hotel->description }}</p>
                        <div class="row align-items-center">
                            <div class="col-6">
                                <p class="card-text" style="font-size: 14px;">{{ ucwords($hotel->city) }}, {{ ucwords($hotel->country) }}</p>
                            </div>
                            <div class="col-6">
                                <a href="/hotels/{{ $hotel->id }}" class="btn btn-outline-dark float-right">Visit hotel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center pt-5">There is no any hotels.
                <a class="" href="/hotels/create">Create first one.</a></p>
        @endif
    </div>
@endsection
