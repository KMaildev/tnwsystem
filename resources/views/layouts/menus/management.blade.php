@include('layouts.includes.header')
@include('layouts.includes.top')

<div class="layout-page">
    <div class="content-wrapper">

        <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
            <div class="container-xxl d-flex h-100">
                <ul class="menu-inner">

                    <li class="menu-item">
                        <a href="{{ route('management_dashboard.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons fa fa-home"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('employee.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons fa fa-users"></i>
                            Employees
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
                            Setting
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="{{ route('role.index') }}" class="menu-link">
                                    Role
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="{{ route('permission.index') }}" class="menu-link">
                                    Permission
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </aside>

        <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.includes.footer')
