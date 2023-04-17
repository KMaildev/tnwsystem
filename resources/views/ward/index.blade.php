@extends('layouts.menus.marketing')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Ward
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="{{ route('ward.create') }}" class="dt-button create-new btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Create</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll" role="region"
                    aria-labelledby="HeadersCol" tabindex="0">
                    <table class="table table-bordered main-table">
                        <thead class="tbbg">
                            <tr>
                                <th class="tbbg" style="text-align: center; width: 1%;">#</th>
                                <th class="tbbg" style="text-align: center;">Township</th>
                                <th class="tbbg" style="text-align: center;">Ward</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($wards as $key => $ward)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td class="text-center">
                                        {{ $ward->township_table->township ?? '' }}
                                    </td>

                                    <td class="text-center">
                                        {{ $ward->ward_no }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
