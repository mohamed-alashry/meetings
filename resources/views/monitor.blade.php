@extends('layouts.app')

@section('title', 'Monitor')
@section('content')
<section class="section-contct-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="line-bookings row mb-3 px-1 g-3">
                    <span class="col-lg-6 col-md-12 col-sm-12">
                        <h5 class="card-title">My Today Meetings</h5>
                        <p class="card-text">Don’t miss your appointments</p>
                    </span>
                    <span class="col-lg-3 col-md-12 col-sm-12">
                        <a class="bg-body shadow-sm text-decoration-none d-flex p-3 rounded-4 align-items-center justify-content-between"
                            id="messages2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            <span class="px-2 color-primary d-flex align-items-center">
                                <i class="fa-solid fa-calendar-days fa-lg" aria-hidden="true"></i>
                                <p class="px-2 fw-bolder m-0">Today, 24 Nov 2023</p>
                            </span>
                            <i class="fa-solid fa-chevron-down fa-sm color-primary "></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu rounded-0" aria-labelledby="messages2">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Action</a>
                        </div>
                    </span>
                    <span class="col-lg-3 col-md-12 col-sm-12">
                        <a class="bg-body shadow-sm text-decoration-none d-flex p-3 rounded-4 align-items-center justify-content-between"
                            id="messages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            <span class="px-2 color-primary d-flex align-items-center">
                                <i class="fa fa-users fa-lg" aria-hidden="true"></i>
                                <p class="m-0 px-2 fw-bolder">All Rooms</p>
                            </span>
                            <i class="fa-solid fa-chevron-down fa-sm color-primary "></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu rounded-0" aria-labelledby="messages">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Action</a>
                        </div>
                    </span>

                </div>
                <div class="line-cards mt-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3 text-white"
                                style="background-color: #5E1042;">
                                <div class="card-header rounded-top-4">
                                    <h5 class="card-title fw-bold">Design Meeting Sprint 01</h5>
                                    <p class="card-text">Meeting Room 02</p>
                                </div>
                                <div class="card-body text-white">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            Today, 04:00 PM
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Free for 60 min
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-solid fa-users"></i>
                                            Up to 20 Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="line-bookings row my-3 px-1">
                    <span class="col-lg-6 col-md-6 col-sm-12">
                        <h5 class="card-title">My Tomorrow Meetings</h5>
                        <p class="card-text">Don’t miss your appointments</p>
                    </span>

                </div>
                <div class="line-cards">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3 text-white"
                                style="background-color: #5E1042;">
                                <div class="card-header rounded-top-4">
                                    <h5 class="card-title fw-bold">Design Meeting Sprint 01</h5>
                                    <p class="card-text">Meeting Room 02</p>
                                </div>
                                <div class="card-body text-white">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            Today, 04:00 PM
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Free for 60 min
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-solid fa-users"></i>
                                            Up to 20 Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3">
                                <div class="card-header bg-body rounded-top-4">
                                    <h5 class="card-title color-primary fw-bold">Design Meeting Sprint 01</h5>
                                    <p class="card-text color-primary">Meeting Room 02</p>
                                </div>
                                <div class="card-body color-primary">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            Today, 04:00 PM
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Free for 60 min
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-solid fa-users"></i>
                                            Up to 20 Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3">
                                <div class="card-header bg-body rounded-top-4">
                                    <h5 class="card-title color-primary fw-bold">Design Meeting Sprint 01</h5>
                                    <p class="card-text color-primary">Meeting Room 02</p>
                                </div>
                                <div class="card-body color-primary">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            Today, 04:00 PM
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Free for 60 min
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-solid fa-users"></i>
                                            Up to 20 Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="line-bookings row my-3 px-1">
                    <span class="col-lg-6 col-md-6 col-sm-12">
                        <h5 class="card-title">My Upcomming Meetings</h5>
                        <p class="card-text">Don’t miss your appointments</p>
                    </span>

                </div>
                <div class="line-cards ">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3 text-white"
                                style="background-color: #5E1042;">
                                <div class="card-header rounded-top-4">
                                    <h5 class="card-title fw-bold">Design Meeting Sprint 01</h5>
                                    <p class="card-text">Meeting Room 02</p>
                                </div>
                                <div class="card-body text-white">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            Today, 04:00 PM
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Free for 60 min
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-solid fa-users"></i>
                                            Up to 20 Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3">
                                <div class="card-header bg-body rounded-top-4">
                                    <h5 class="card-title color-primary fw-bold">Design Meeting Sprint 01</h5>
                                    <p class="card-text color-primary">Meeting Room 02</p>
                                </div>
                                <div class="card-body color-primary">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            Today, 04:00 PM
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Free for 60 min
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-solid fa-users"></i>
                                            Up to 20 Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3">
                                <div class="card-header bg-body rounded-top-4">
                                    <h5 class="card-title color-primary fw-bold">Design Meeting Sprint 01</h5>
                                    <p class="card-text color-primary">Meeting Room 02</p>
                                </div>
                                <div class="card-body color-primary">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            Today, 04:00 PM
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Free for 60 min
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-solid fa-users"></i>
                                            Up to 20 Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3">
                                <div class="card-header bg-body rounded-top-4">
                                    <h5 class="card-title color-primary fw-bold">Design Meeting Sprint 01</h5>
                                    <p class="card-text color-primary">Meeting Room 02</p>
                                </div>
                                <div class="card-body color-primary">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            Today, 04:00 PM
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Free for 60 min
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-solid fa-users"></i>
                                            Up to 20 Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="pe-0 d-none d-lg-flex">
                <img src="assets/img/Frame-end-footer.png" class="img-fluid position-fixed bottom-0 end-0 z-n1"
                    alt="Frame-end-footer">
            </div>
        </div>
    </div>

</section>
@endsection