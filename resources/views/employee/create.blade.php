@extends('layouts.menus.management')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <h5 class="card-header">Employee</h5>
                <div class="card-body">

                    <form action="{{ route('employee.store') }}" method="POST" autocomplete="off" id="create-form"
                        role="form" enctype="multipart/form-data">
                        <h6 class="mb-b fw-normal">1. Account Details</h6>
                        <hr>
                        @csrf

                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Employee
                                ID</label>
                            <div class="col-md-9">
                                <input class="form-control @error('employee_id') is-invalid @enderror" type="text"
                                    name="employee_id" value="{{ old('employee_id') }}" />
                                @error('employee_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name') }}" />
                                @error('name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Phone</label>
                            <div class="col-md-9">
                                <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                    name="phone" value="{{ old('phone') }}" />
                                @error('phone')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">NRC Number</label>
                            <div class="col-md-9">
                                <input class="form-control @error('nrc_number') is-invalid @enderror" type="text"
                                    name="nrc_number" value="{{ old('nrc_number') }}" />
                                @error('nrc_number')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Gender</label>
                            <div class="col-md-9">
                                <select name="gender" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Address</label>
                            <div class="col-md-9">
                                <input class="form-control @error('address') is-invalid @enderror" type="text"
                                    name="address" value="{{ old('address') }}" />
                                @error('address')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="select2Multiple" class="col-md-3 form-label">
                                Role
                            </label>
                            <div class="col-md-9">
                                <select class="select2 form-control" multiple name="roles[]">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Password</label>
                            <div class="col-md-9">
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                    name="password" value="{{ old('password') }}" />
                                @error('password')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Employment
                                Type</label>
                            <div class="col-md-9">
                                <select name="employment_type" class="form-control">
                                    <option value="Probation">Probation</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('employment_type')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Join
                                Date</label>
                            <div class="col-md-9">
                                <input class="form-control date_picker @error('join_date') is-invalid @enderror"
                                    type="text" name="join_date" value="{{ old('join_date') }}" />
                                @error('join_date')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Employee Photo
                            </label>
                            <div class="col-md-9">
                                <input type="file" name="employee_photo"
                                    class="@error('employee_photo') is-invalid @enderror" id="files"
                                    accept="image/.png,.jpg,.jpeg,.png">
                                @error('employee_photo')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                                <div class="preview_img my-2"></div>
                            </div>
                        </div>

                        <h6 class="mb-b fw-normal">2. Emergency Contact</h6>
                        <hr>

                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Contact
                                Person</label>
                            <div class="col-md-9">
                                <input class="form-control @error('contact_person') is-invalid @enderror" type="text"
                                    name="contact_person" value="{{ old('contact_person') }}" />
                                @error('contact_person')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Contact
                                Number</label>
                            <div class="col-md-9">
                                <input class="form-control @error('emergency_contact') is-invalid @enderror"
                                    type="text" name="emergency_contact" value="{{ old('emergency_contact') }}" />
                                @error('emergency_contact')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreUsers', '#create-form') !!}
@endsection
