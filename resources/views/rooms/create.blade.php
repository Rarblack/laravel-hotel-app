@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-end">
            <a class="pr-3" href="/hotels/">View hotels</a>
            <a class="pr-3" href="/hotels/{{ $hotel->id }}/rooms">Go back to rooms</a>
        </div>

        <div class="row justify-content-center">
            <h3 class="ml-3">Create a room</h3>
            <form class="w-100" action="/hotels/{{ $hotel->id }}/rooms" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group row">
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

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <div class="col-md-12">
                                <textarea
                                    id="description"
                                    type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="description">
                                </textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number" class="col-md-4 col-form-label">Number</label>

                    <div class="col-md-12">
                        <input
                            id="number"
                            type="number"
                            class="form-control @error('number') is-invalid @enderror"
                            name="number">

                        @error('number')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label">Image</label>

                    <div class="col-md-12">
                        <input
                            id="image"
                            type="file"
                            class="form-control-file @error('image') is-invalid @enderror"
                            name="image">

                        @error('image')
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
