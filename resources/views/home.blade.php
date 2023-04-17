@extends('layouts.main')
@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-md-8 col-sm-12 col-lg-8 py-5">
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
                    <a href="{{ route('management_dashboard.index') }}">
                        <div class="card" style="background-color: #903BAA;">
                            <div class="card-body text-center">
                                <div class="avatar avatar-md mx-auto mb-3">
                                    <span class="avatar-initial rounded-circle">
                                        <i class="fa fa-home fs-3"></i>
                                    </span>
                                </div>
                                <span class="d-block mb-1 text-nowrap text-white">
                                    Management
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
                    <a href="">
                        <div class="card" style="background-color: #17a023;">
                            <div class="card-body text-center">
                                <div class="avatar avatar-md mx-auto mb-3">
                                    <span class="avatar-initial rounded-circle bg-label-white">
                                        <i class="fa fa-phone fs-3 text-white"></i>
                                    </span>
                                </div>
                                <span class="d-block mb-1 text-nowrap text-white">
                                    Marketing Team
                                </span>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
                    <a href="">
                        <div class="card" style="background-color: #EF8B33;">
                            <div class="card-body text-center">
                                <div class="avatar avatar-md mx-auto mb-3">
                                    <span class="avatar-initial rounded-circle">
                                        <i class="fa fa-users fs-3"></i>
                                    </span>
                                </div>
                                <span class="d-block mb-1 text-nowrap text-white">
                                    Sale Team
                                </span>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
                    <a href="">
                        <div class="card" style="background-color: #306B62;">
                            <div class="card-body text-center">
                                <div class="avatar avatar-md mx-auto mb-3">
                                    <span class="avatar-initial rounded-circle">
                                        <i class='bx bx-dock-top fs-3'></i>
                                    </span>
                                </div>
                                <span class="d-block mb-1 text-nowrap text-white">
                                    File Manager
                                </span>
                            </div>
                        </div>
                    </a>
                </div>




            </div>
        </div>
    </div>
@endsection
