@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-end">
            <a class="" href="/hotels/{{ $hotel->id }}/rooms/{{ $room->id }}prices">Go back to prices</a>
        </div>

        <div class="row justify-content-center">
            <h3 class="ml-3">Set a price</h3>
            <form class="w-100" action="/hotels/{{ $hotel->id }}/rooms/{{ $room->id }}/prices" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Amount</label>

                    <div class="col-md-12">
                        <input id="amount"
                               type="number"
                               class="form-control @error('amount') is-invalid @enderror"
                               name="amount"
                               value="{{ old('amount') }}"
                               autocomplete="amount" autofocus>

                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="currency" class="col-md-4 col-form-label">Currency</label>

                    <div class="col-md-12">
                                <input
                                    id="currency"
                                    type="text"
                                    class="form-control @error('currency') is-invalid @enderror"
                                    name="currency">

                        @error('currency')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label">Date</label>

                    <div class="col-md-12">
                        <input
                            id="date"
                            type="date"
                            class="form-control @error('date') is-invalid @enderror"
                            name="date">

                        @error('date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0 justify-content-end">
                    <button type="submit" class="btn btn-primary mr-3">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
