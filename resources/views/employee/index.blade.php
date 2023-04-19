@extends('layouts.menus.management')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">Employees</h5>
                        <div class="card-title-elements ms-auto">
                            <div class="card-header-elements ms-auto">
                                <form action="{{ route('employee.index') }}" method="get">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search"
                                        name="q" />
                                </form>
                            </div>

                            <a href="{{ route('employee.create') }}" class="dt-button create-new btn btn-primary btn-sm">
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
                                <th class="tbbg" style="text-align: center;">Photo</th>
                                <th class="tbbg" style="text-align: center;">ID</th>
                                <th class="tbbg" style="text-align: center;">Name</th>
                                <th class="tbbg" style="text-align: center;">Email</th>
                                <th class="tbbg" style="text-align: center;">Phone</th>
                                <th class="tbbg" style="text-align: center;">NRC Number</th>
                                <th class="tbbg" style="text-align: center;">Join Date</th>
                                <th class="tbbg" style="text-align: center;">Role</th>
                                <th class="tbbg" style="text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="row_position" id="tablecontents">
                            @foreach ($employees as $key => $value)
                                <tr class="row1" data-id="{{ $value->id }}">

                                    <td style="text-align: center;">
                                        <i class="fa fa-sort"></i>
                                    </td>

                                    <td style="text-align: justify">
                                        @if ($value->employee_photo)
                                            <img src="{{ Storage::url($value->employee_photo) }}" alt=""
                                                style="width: 50px; height: 50px; background-position: center; background-size: contain; object-fit: cover;">
                                        @endif
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->employee_id }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->name }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->email }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->phone }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->nrc_number }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->join_date }}
                                    </td>

                                    <td style="text-align: center;">
                                        @foreach ($value->roles as $role)
                                            <span class="badge bg-primary">{{ $role->name }}</span>
                                        @endforeach
                                    </td>

                                    <td style="text-align: center;">
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-xs dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('employee.edit', $value->id) }}" role="menuitem">
                                                        <i class="icon md-edit" aria-hidden="true"></i>
                                                        Edit
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                                        <i class="icon md-eye" aria-hidden="true"></i>
                                                        View Profile
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
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



@section('script')
    <script type="text/javascript">
        $(function() {
            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1,
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    // url: "{{ url('employeesortable') }}",
                    url: "/employeesortable",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                            alert(response)
                        } else {
                            console.log(response);
                            alert(response)
                        }
                    }
                });
            }
        });
    </script>
@endsection
