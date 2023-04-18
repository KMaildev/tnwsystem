@extends('layouts.menus.sale_team')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card mb-4">
                <h5 class="card-header">
                    Team
                </h5>
                <div class="card-body">

                    <form action="{{ route('sale_team.store') }}" method="POST" autocomplete="off" id="create-form"
                        role="form">
                        @csrf

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Code
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('code') is-invalid @enderror" type="text"
                                    name="code" value="{{ old('code') }}" placeholder="T-000001" />
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Group / Team Title
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('title') is-invalid @enderror" type="text"
                                    name="title" value="{{ old('title') }}" placeholder="Team A" />
                                @error('title')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Area of responsibility
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('area') is-invalid @enderror" type="text"
                                    name="area" value="{{ old('area') }}" placeholder="Yangon, Mandalay" />
                                @error('area')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Team Member
                            </label>
                            <div class="col-md-9">
                                <select class="select2 form-control" multiple name="users[]" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('users')
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreSaleTeam', '#create-form') !!}
@endsection
