@extends('layouts.menus.marketing')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Township
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <div class="card-header-elements ms-auto" hidden>
                                <form action="{{ route('region.index') }}" method="get">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search"
                                        name="q" />
                                </form>
                            </div>

                            <a href="{{ route('region.create') }}" class="dt-button create-new btn btn-primary btn-sm"
                                hidden>
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
                                <th class="tbbg" style="text-align: center;">Name English</th>
                                <th class="tbbg" style="text-align: center;">Name Myanmar</th>
                                <th class="tbbg" style="text-align: center;">Region</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($townships as $key => $value)
                                <tr>
                                    <td style="text-align: center;">
                                        {{ $key + 1 }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $value->township }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $value->township_mm }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $value->region_table->region ?? '' }}
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
