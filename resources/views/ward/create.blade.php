@extends('layouts.menus.marketing')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <h5 class="card-header">
                    Ward
                </h5>
                <div class="card-body">

                    <form action="{{ route('ward.store') }}" method="POST" autocomplete="off" id="create-form" role="form">
                        @csrf

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Township
                            </label>
                            <div class="col-md-9">
                                <select class="form-control" data-plugin="select2" name="township_id" required>
                                    @foreach ($regions as $region)
                                        <optgroup label="{{ $region->region ?? '' }}">
                                            @foreach ($region->townships_table as $township)
                                                <option value="{{ $township->id ?? '' }}">
                                                    - {{ $township->township ?? '' }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                @error('township_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Ward No
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('ward_no') is-invalid @enderror" type="text"
                                    name="ward_no" value="{{ old('ward_no') }}" required />
                                @error('ward_no')
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreWard', '#create-form') !!}
@endsection
