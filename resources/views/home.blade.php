@extends('layouts.app')

@section('title', 'Home')
@section('content')
<section class="section-contct-body">
    <div class="container-fluid">
        <div class="card mb-3 background-primary border-0">
            <div class="card-body background-primary text-light shadow-lg rounded-4">
                <h5 class="card-title">Find a Meeting Room</h5>
                <p class="card-text">Find and Book Now</p>
                <div class="row g-3">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                        <div class="dropdown">
                            <button class="btn bg-secondary dropdown-toggle w-100 bg-opacity-50 text-light px-0"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-calendar-days"></i>
                                Meeting Date
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                        <div class="dropdown">
                            <button class="btn bg-secondary dropdown-toggle w-100 bg-opacity-50 text-light px-0"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-clock"></i>
                                Meeting Time
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                        <div class="dropdown">
                            <button class="btn bg-secondary dropdown-toggle w-100 bg-opacity-50 text-light px-0"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-hourglass-half"></i>
                                Choose Duration
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                        <div class="dropdown">
                            <button class="btn bg-secondary dropdown-toggle w-100 bg-opacity-50 text-light px-0"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-users "></i>
                                How Many Persons
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-8 col-sm-12">
                        <button type="button" class="btn btn-light w-100">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Find Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h5 class="card-title">Available Meeting Rooms</h5>
        <p class="card-text">Find Available Rooms Now</p>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <a class="text-white" href="#">
                    <div class="image-hover-text-container">
                        <div class="card-hover-image">
                            <div class="card mb-3 shadow border-0 rounded-4 w-100">
                                <div class="row g-0">
                                    <div class="col-md-5 col-sm-12">
                                        <img src="assets/img/room.png" style="width: -webkit-fill-available;"
                                            class="img-fluid border-img h-100" alt="...">
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                        <div class="card-body">
                                            <h5 class="card-title">Meeting Room 01</h5>
                                            <p class="card-text">The right one on floor one</p>
                                            <hr>
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
                        <div class="card-hover-text" style="height: 93%;">
                            <div class="card-hover-text-bubble rounded-4">
                                <span
                                    class="card-hover-text-title d-flex justify-content-center align-items-center h-100">
                                    <i class="fa-regular fa-calendar-check fa-lg px-2"></i>
                                    Book Room Now
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <a class="text-white" href="#">
                    <div class="image-hover-text-container">
                        <div class="card-hover-image">
                            <div class="card mb-3 shadow border-0 rounded-4 w-100">
                                <div class="row g-0">
                                    <div class="col-md-5 col-sm-12">
                                        <img src="assets/img/room.png" style="width: -webkit-fill-available;"
                                            class="img-fluid border-img h-100" alt="...">
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                        <div class="card-body">
                                            <h5 class="card-title">Meeting Room 01</h5>
                                            <p class="card-text">The right one on floor one</p>
                                            <hr>
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
                        <div class="card-hover-text" style="height: 93%;">
                            <div class="card-hover-text-bubble rounded-4">
                                <span
                                    class="card-hover-text-title d-flex justify-content-center align-items-center h-100">
                                    <i class="fa-regular fa-calendar-check fa-lg px-2"></i>
                                    Book Room Now
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <a class="text-white" href="#">
                    <div class="image-hover-text-container">
                        <div class="card-hover-image">
                            <div class="card mb-3 shadow border-0 rounded-4 w-100">
                                <div class="row g-0">
                                    <div class="col-md-5 col-sm-12">
                                        <img src="assets/img/room.png" style="width: -webkit-fill-available;"
                                            class="img-fluid border-img h-100" alt="...">
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                        <div class="card-body">
                                            <h5 class="card-title">Meeting Room 01</h5>
                                            <p class="card-text">The right one on floor one</p>
                                            <hr>
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
                        <div class="card-hover-text" style="height: 93%;">
                            <div class="card-hover-text-bubble rounded-4">
                                <span
                                    class="card-hover-text-title d-flex justify-content-center align-items-center h-100">
                                    <i class="fa-regular fa-calendar-check fa-lg px-2"></i>
                                    Book Room Now
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="line-bookings row mt-3">
                    <span class="col-lg-8 col-md-6 col-sm-12">
                        <h5 class="card-title">Upcomming Bookings</h5>
                        <p class="card-text">Don’t miss your appointments</p>
                    </span>
                    <span class="col-lg-4 col-md-6 col-sm-12">
                        <button type="button" class="btn text-light w-100 h-100 rounded-4"
                            style="background-color: #C2203D;">
                            <i class="fa-regular fa-calendar-days"></i>
                            View All
                        </button>
                    </span>
                </div>
                <div class="line-cards mt-4">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
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
                        <div class="col-lg-4 col-md-6 col-sm-12">
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
                        <div class="col-lg-4 col-md-6 col-sm-12">
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
