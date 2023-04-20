<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col-md-12 col-lg-12 col-xl-12">
                <h5 class="card-title mb-0">
                    Buyer / Customer Information
                </h5>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4 order-0">
                <div class="card-body pb-3">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3">
                            <div class="avatar avatar-sm flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-circle bg-label-primary">
                                    <i class="fa fa-users"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <p class="mb-0 lh-1">
                                        SALE GROUP / TEAM
                                    </p>
                                    <small class="text-black">
                                        {{ $house_showing->sale_team->code ?? '' }}
                                        @
                                        {{ $house_showing->sale_team->title ?? '' }}
                                    </small>
                                </div>
                            </div>
                        </li>

                        <li class="d-flex mb-3">
                            <div class="avatar avatar-sm flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-circle bg-label-info">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <p class="mb-0 lh-1">
                                        Date
                                    </p>
                                    <small class="text-black">
                                        {{ $house_showing->showing_date ?? '' }}
                                    </small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4 order-0">
                <div class="card-body pb-3">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3">
                            <div class="avatar avatar-sm flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-circle bg-label-primary">
                                    <i class="bx bx-user"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <p class="mb-0 lh-1">
                                        Name
                                    </p>
                                    <small class="text-black">
                                        {{ $house_showing->name ?? '' }}
                                    </small>
                                </div>
                            </div>
                        </li>

                        <li class="d-flex mb-3">
                            <div class="avatar avatar-sm flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-circle bg-label-info">
                                    <i class="bx bx-phone"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <p class="mb-0 lh-1">
                                        Phone
                                    </p>
                                    <small class="text-black">
                                        {{ $house_showing->phone ?? '-' }}
                                    </small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4 order-0">
                <div class="card-body pb-3">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3">
                            <div class="avatar avatar-sm flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-circle bg-label-primary">
                                    <i class="bx bx-map-alt"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <p class="mb-0 lh-1">
                                        Address
                                    </p>
                                    <small class="text-black">
                                        {{ $house_showing->address ?? '-' }}
                                    </small>
                                </div>
                            </div>
                        </li>

                        <li class="d-flex mb-3">
                            <div class="avatar avatar-sm flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-circle bg-label-info">
                                    <i class="bx bx-map"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <p class="mb-0 lh-1">
                                        Region
                                    </p>
                                    <small class="text-black">
                                        {{ $house_showing->region->region ?? '-' }}
                                    </small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
