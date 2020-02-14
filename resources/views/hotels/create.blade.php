@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <a class="" href="/hotels">Go back</a>
        </div>

        <div class="row justify-content-center">
            <h3 class="">Create a hotel</h3>
            <form class="w-100" action="\hotels" enctype="multipart/form-data" method="POST">
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

                <div class="form-group row">
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
