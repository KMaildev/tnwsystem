@extends('layouts.menus.sale_team')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card mb-4">
                <h5 class="card-header">
                    House Showing
                </h5>
                <div class="card-body">

                    <form action="{{ route('house_showing.store') }}" method="POST" autocomplete="off" id="create-form"
                        role="form">
                        @csrf

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Sale Group / Team
                            </label>
                            <div class="col-md-9">
                                <select class="select2 form-control" name="sale_team_id" required>
                                    @foreach ($sale_teams as $sale_team)
                                        <option value="{{ $sale_team->id }}">
                                            {{ $sale_team->code ?? '' }}
                                            @
                                            {{ $sale_team->title ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sale_team_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Buyer / Customer Name
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name') }}" placeholder="Name" />
                                @error('name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Phone
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                    name="phone" value="{{ old('phone') }}" placeholder="Phone" />
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Address
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('address') is-invalid @enderror" type="text"
                                    name="address" value="{{ old('address') }}" placeholder="Address" />
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Region
                            </label>
                            <div class="col-md-9">
                                <select class="select2 form-control" name="region_id" required>
                                    <option value="">
                                        --Select Region--
                                    </option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}">
                                            {{ $region->region ?? '' }}
                                            @
                                            {{ $region->region_mm ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('region_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Showing Date
                            </label>
                            <div class="col-md-9">
                                <input class="date_picker form-control @error('showing_date') is-invalid @enderror"
                                    type="text" name="showing_date" value="{{ old('showing_date') }}" />
                                @error('showing_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Remark
                            </label>
                            <div class="col-md-9">
                                <textarea name="remark" id="" cols="20" rows="5"
                                    class="form-control @error('remark') is-invalid @enderror">{{ old('remark') }}</textarea>
                                @error('remark')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label"></label>
                            <div class="col-md-9">

                                <button type="submit" class="btn btn-success btn-lg" name="button_type" value="show_now">
                                    Save & Show Now
                                    &nbsp;
                                    <i class="fa-solid fa-circle-right"></i>
                                </button>

                                <button type="submit" class="btn btn-info btn-lg" name="button_type" value="save">
                                    Just Save
                                    &nbsp;
                                    <i class="fa-solid fa-check-double"></i>
                                </button>

                                <button type="reset" class="btn btn-danger btn-lg">
                                    Reset Data
                                    &nbsp;
                                    <i class="fa-solid fa-xmark"></i>
                                </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreSaleTeam', '#create-form') !!}
@endsection
