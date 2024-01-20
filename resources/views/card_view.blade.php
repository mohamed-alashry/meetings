@extends('layouts.app')

@section('title', 'Calender')
@push('styles')
@endpush
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
                    <span class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                        <a href="{{ route('meetings.calendar_view') }}"
                            class="btn bg-body shadow-sm color-primary fw-bold w-100 h-100 rounded-4">
                            <i class="fa-regular fa-calendar-days"></i>
                            Calendar View
                        </a>
                    </span>
                    <span class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn text-light fw-bold shadow-sm w-100 h-100 rounded-4"
                            data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #C2203D;">
                            <i class="fa-regular fa-calendar-days"></i>
                            Book a New Meeting
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog ps-2 d-flex justify-content-end" style="max-width: 75%;">
                                <div class="modal-content rounded-4" style="height: fit-content;">
                                    <div
                                        class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white">
                                        <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                            Find a Meeting Room
                                        </h3>
                                        <p class="mb-1 fw-light text-white-50">
                                            Find Available Rooms Now
                                        </p>
                                        <div class="row g-3 p-1 w-100">
                                            <span class="col-lg-2 col-md-12 col-sm-12">
                                                <a class="bg-body shadow-sm text-decoration-none d-flex p-3 rounded-4 align-items-center justify-content-between"
                                                    id="messages" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" href="#">
                                                    <span class="px-2 color-primary d-flex align-items-center">
                                                        <i class="fa fa-calendar-days fa-lg" aria-hidden="true"></i>
                                                        <p class="m-0 px-2 fw-semibold">24 Nov 2023</p>
                                                    </span>
                                                    <i class="fa-solid fa-chevron-down fa-sm color-primary "></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu rounded-0 rounded-bottom-4 shadow border-0 mx-4"
                                                    aria-labelledby="messages">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </div>
                                            </span>
                                            <span class="col-lg-2 col-md-12 col-sm-12">
                                                <a class="bg-body shadow-sm text-decoration-none d-flex p-3 rounded-4 align-items-center justify-content-between"
                                                    id="messages" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" href="#">
                                                    <span class="px-2 color-primary d-flex align-items-center">
                                                        <i class="fa fa-clock fa-lg" aria-hidden="true"></i>
                                                        <p class="m-0 px-2 fw-semibold">12:00 pm</p>
                                                    </span>
                                                    <i class="fa-solid fa-chevron-down fa-sm color-primary "></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu rounded-0 rounded-bottom-4 shadow border-0 mx-4"
                                                    aria-labelledby="messages">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </div>
                                            </span>
                                            <span class="col-lg-2 col-md-12 col-sm-12">
                                                <a class="bg-body shadow-sm text-decoration-none d-flex p-3 rounded-4 align-items-center justify-content-between"
                                                    id="messages" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" href="#">
                                                    <span class="px-2 color-primary d-flex align-items-center">
                                                        <i class="fa fa-repeat fa-lg" aria-hidden="true"></i>
                                                        <p class="m-0 px-2 fw-semibold">No Repeat</p>
                                                    </span>
                                                    <i class="fa-solid fa-chevron-down fa-sm color-primary "></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu rounded-0 rounded-bottom-4 shadow border-0 mx-4"
                                                    aria-labelledby="messages">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </div>
                                            </span>
                                            <span class="col-lg-2 col-md-12 col-sm-12">
                                                <a class="bg-body shadow-sm text-decoration-none d-flex p-3 rounded-4 align-items-center justify-content-between"
                                                    id="messages" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" href="#">
                                                    <span class="px-2 color-primary d-flex align-items-center">
                                                        <i class="fa fa-hourglass-half fa-lg" aria-hidden="true"></i>
                                                        <p class="m-0 px-2 fw-semibold">60 min</p>
                                                    </span>
                                                    <i class="fa-solid fa-chevron-down fa-sm color-primary "></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu rounded-0 rounded-bottom-4 shadow border-0 mx-4"
                                                    aria-labelledby="messages">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </div>
                                            </span>
                                            <span class="col-lg-2 col-md-12 col-sm-12">
                                                <a class="bg-body shadow-sm text-decoration-none d-flex p-3 rounded-4 align-items-center justify-content-between"
                                                    id="messages" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" href="#">
                                                    <span class="px-2 color-primary d-flex align-items-center">
                                                        <i class="fa fa-users fa-lg" aria-hidden="true"></i>
                                                        <p class="m-0 px-2 fw-semibold">10</p>
                                                    </span>
                                                    <i class="fa-solid fa-chevron-down fa-sm color-primary "></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu rounded-0 rounded-bottom-4 shadow border-0 mx-4"
                                                    aria-labelledby="messages">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="m-3 color-primary">
                                            <p class="h6 fw-bold">Choose your Meeting Room</p>
                                            <p class="fs-6 m-0">Type here the meeting info</p>
                                        </div>
                                        <div class="row px-3">
                                            <div class="col-lg-3">
                                                <a class="text-white" href="#">
                                                    <div class="image-hover-text-container">
                                                        <div class="card-hover-image">
                                                            <div class="card mb-3 shadow border-0 rounded-4 w-100">
                                                                <div class="row g-0">
                                                                    <div class="col-md-5 col-sm-12">
                                                                        <img src="assets/img/room.png"
                                                                            style="width: -webkit-fill-available;"
                                                                            class="img-fluid border-img h-100"
                                                                            alt="...">
                                                                    </div>
                                                                    <div class="col-md-7 col-sm-12">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"
                                                                                style="font-size: 0.8rem;">Meeting
                                                                                Room 01</h5>
                                                                            <p class="card-text"
                                                                                style="font-size: 0.8rem;">The right
                                                                                one on floor one</p>
                                                                            <hr class="my-1">
                                                                            <p class="card-text m-0">
                                                                                <small class="text-body-secondary"
                                                                                    style="font-size: 0.8rem;">
                                                                                    <i
                                                                                        class="fa-regular fa-hourglass-half"></i>
                                                                                    Free for 60 min
                                                                                </small>
                                                                            </p>
                                                                            <p class="card-text m-0">
                                                                                <small class="text-body-secondary"
                                                                                    style="font-size: 0.7rem;">
                                                                                    <i class="fa-solid fa-users"></i>
                                                                                    Up to 20 Person
                                                                                </small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-hover-text" style="height: 91%;">
                                                            <div class="card-hover-text-bubble rounded-4">
                                                                <span
                                                                    class="card-hover-text-title d-flex justify-content-center align-items-center h-100">
                                                                    <i
                                                                        class="fa-regular fa-calendar-check fa-lg px-2"></i>
                                                                    Book Room Now
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card rounded-4 m-3 shadow border-0">
                                            <div class="card-body color-primary">
                                                <p class="card-title fw-light my-1">
                                                    <i class="fa-solid fa-wifi"></i>
                                                    <span class="text-secondary">
                                                        Guest Wifi
                                                    </span>
                                                </p>
                                                <small class="d-block px-4">
                                                    Network SSID:
                                                    <span class="fw-bold">OC</span>
                                                </small>
                                                <small class="d-block px-4">
                                                    Password:
                                                    <span class="fw-bold">Guest 2024</span>
                                                </small>
                                                <p class="my-1">
                                                    <i class="fa-solid fa-desktop"></i>
                                                    <span class="text-secondary">
                                                        Have a TV with HDMI or Wifi connection
                                                    </span>
                                                </p>
                                                <p class="my-1">
                                                    <i class="fa-solid fa-laptop-medical"></i>
                                                    <span class="text-secondary">
                                                        Online Meeting setup (360 Camera & Mics)
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row m-3 color-primary">
                                            <span class="col-lg-9 col-sm-12">
                                                <p class="h6 fw-bold">Send Meeting Invitations</p>
                                                <p class="fs-6 m-0">To your persons by email or Name</p>
                                            </span>
                                            <span class="col-lg-3 col-sm-12">
                                                <p class="fs-6 fw-bold text-end m-0">“You can choose from our employee
                                                    or send
                                                    external invitations
                                                    by Email”</p>
                                            </span>
                                        </div>
                                        <div class="input-form-login px-3 col-12 ">
                                            <i class="fa-solid fa-envelope icon fa-lg"></i>
                                            <input
                                                class="input-field form-control my-3 px-5 py-3 rounded-4 shadow border-0"
                                                placeholder="Type here email" type="email">
                                        </div>
                                        <div class="card rounded-4 m-3 shadow border-0">
                                            <div class="card-body color-primary">
                                                <p class="card-title fw-semibold my-1">
                                                    Remon Nabil
                                                    <span class="text-secondary fw-light">
                                                        (Senior UX Designer)
                                                    </span>
                                                </p>
                                                <p class="card-title fw-semibold my-1">
                                                    apple.remo95@one.com.sa
                                                    <span class="text-secondary fw-light">
                                                        (External Guest)
                                                    </span>
                                                </p>
                                                <p class="card-title fw-semibold my-1">
                                                    Obada Alseddig
                                                    <span class="text-secondary fw-light">
                                                        (IT Manger)
                                                    </span>
                                                </p>
                                                <div class="card-title fw-semibold my-1 d-flex justify-content-between">
                                                    <p class="m-0">
                                                        mohamed@one.com.sa
                                                        <span class="text-secondary fw-light">
                                                            (External Guest)
                                                        </span>
                                                    </p>
                                                    <p class="m-0">
                                                        4 out 10 Persons
                                                        <i class="fa-solid fa-users"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="m-3 color-primary">
                                            <p class="h6 fw-bold">Meeting Information</p>
                                            <p class="fs-6 m-0">Type here the meeting info</p>
                                        </div>
                                        <div class="input-form-login px-3 col-12 ">
                                            <i class="fa-solid fa-briefcase icon fa-lg"></i>
                                            <input
                                                class="input-field form-control my-3 px-5 py-3 rounded-4 shadow border-0"
                                                placeholder="Type here email" type="email">
                                        </div>
                                        <div class="input-form-login px-3 col-12">
                                            <i class="fa-solid fa-circle-info icon fa-lg z-1"></i>
                                            <textarea
                                                class="input-field form-control my-3 px-5 py-3 border-0 shadow rounded-4"
                                                placeholder="Type here info or notes..." type="text"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

@push('scripts')
@endpush
