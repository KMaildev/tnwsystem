@extends('layouts.menus.sale_team')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Teams
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="{{ route('sale_team.create') }}" class="dt-button create-new btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">
                                        Create
                                    </span>
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
                                <th class="tbbg" style="text-align: center; width: 1%;">
                                    #
                                </th>
                                <th class="tbbg" style="text-align: center;">
                                    Team CODE
                                </th>
                                <th class="tbbg" style="text-align: center;">
                                    GROUP / TEAM TITLE
                                </th>
                                <th class="tbbg" style="text-align: center;">
                                    AREA OF RESPONSIBILITY
                                </th>
                                <th class="tbbg" style="text-align: center;">
                                    REMARK
                                </th>
                                <th class="tbbg" style="text-align: center;">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale_teams as $key => $sale_team)
                                <tr style="background-color: #b38a5b">
                                    <td class="text-white text-center">
                                        {{ $key + 1 }}
                                    </td>

                                    <td class="text-white text-center">
                                        {{ $sale_team->code ?? '' }}
                                    </td>

                                    <td class="text-white text-center">
                                        {{ $sale_team->title ?? '' }}
                                    </td>

                                    <td class="text-white text-center">
                                        {{ $sale_team->area ?? '' }}
                                    </td>

                                    <td class="text-white text-center">
                                        {{ $sale_team->remark ?? '' }}
                                    </td>

                                    <td class="text-white text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-xs dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('sale_team.edit', $sale_team->id) }}"
                                                        role="menuitem">
                                                        <i class="icon md-edit" aria-hidden="true"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                @foreach ($sale_team->sale_team_users as $key => $sale_team_user)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $sale_team_user->user->employee_id ?? '' }}
                                        </td>

                                        <td>
                                            {{ $sale_team_user->user->name ?? '' }}
                                        </td>

                                        <td>
                                            {{ $sale_team_user->user->email ?? '' }}
                                        </td>

                                        <td>
                                            {{ $sale_team_user->user->phone ?? '' }}
                                        </td>

                                        <td class="text-center">
                                            <form action="{{ route('sale_team.destroy', $sale_team_user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm del_confirm"
                                                    id="confirm-text" data-toggle="tooltip">
                                                    <i class="icon md-delete" aria-hidden="true"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
