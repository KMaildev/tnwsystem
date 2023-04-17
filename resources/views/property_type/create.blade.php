@extends('layouts.menus.marketing')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <h5 class="card-header">
                    Property Type
                </h5>
                <div class="card-body">

                    <form action="{{ route('property_type.store') }}" method="POST" autocomplete="off" id="create-form"
                        role="form">
                        @csrf

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Property Type English
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('property_type') is-invalid @enderror" type="text"
                                    name="property_type" value="{{ old('property_type') }}" />
                                @error('property_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Property Type Myanmar
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('property_type_mm') is-invalid @enderror" type="text"
                                    name="property_type_mm" value="{{ old('property_type_mm') }}" />
                                @error('property_type_mm')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-secondary">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StorePropertyTypes', '#create-form') !!}
@endsection
