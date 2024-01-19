<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn text-light fw-bold shadow-sm w-100 h-100 rounded-4"
        style="background-color: #C2203D;" wire:click="toggleCreateModal">
        <i class="fa-regular fa-calendar-days"></i>
        Book a New Meeting
    </button>

    @if ($openCreateModal)
        <!-- Modal -->
        <div class="modal fade show bg-dark bg-opacity-50" id="createModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" style="display: block;" aria-modal="true" role="dialog"
            wire:clickAway="toggleCreateModal">
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
                        <div class="row w-100 d-flex justify-content-center">
                            {{-- <span class="col-lg-2 col-md-12 col-sm-12">
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
                    </span> --}}

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <i class="fa fa-calendar-days fa-lg icon mt-3 text-dark"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    type="date" wire:model="start_date">
                                @error('start_date')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <i class="fa fa-clock fa-lg icon mt-3 text-dark"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    type="time" wire:model="start_time">
                                @error('start_time')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <i class="fa fa-repeat fa-lg icon mt-3 text-dark"></i>
                                {{-- <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm" type="time" wire:model="form.name"> --}}
                                <select class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    wire:model="repeatable">
                                    <option value="1">No Repeat</option>
                                    <option value="2">Daily</option>
                                    <option value="3">Weekly</option>
                                    <option value="4">Monthly</option>
                                    <option value="5">Yearly</option>
                                </select>
                                @error('repeatable')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <i class="fa fa-hourglass-half fa-lg icon mt-3 text-dark"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    type="number" wire:model="duration" placeholder="Duration">
                                @error('duration')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <i class="fa fa-users fa-lg icon mt-3 text-dark"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    type="number" wire:model="person_capacity" placeholder="Person Capacity">
                                @error('person_capacity')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            {{-- <span class="col-lg-2 col-md-12 col-sm-12">
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
                    </span> --}}
                            {{-- <span class="col-lg-2 col-md-12 col-sm-12">
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
                    </span> --}}
                            {{-- <span class="col-lg-2 col-md-12 col-sm-12">
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
                    </span> --}}
                        </div>
                    </div>
                    <div class="modal-body p-0">
                        <div class="m-3 color-primary">
                            <p class="h6 fw-bold">Choose your Meeting Room</p>
                            <p class="fs-6 m-0">Type here the meeting info</p>
                        </div>

                        <div class="row px-3">
                            @forelse ($rooms as $room)
                            @dd($room)
                                <div class="col-lg-3" wire:key='room-{{ $room->id }}'>
                                    <label class="text-white">
                                        <input type="radio" class="btn-check" value="{{ $room->id }}"
                                            wire:model='room_id'>
                                        <div class="image-hover-text-container">
                                            <div class="card-hover-image">
                                                <div class="card mb-3 shadow border-0 rounded-4 w-100">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 col-sm-12">
                                                            <img src="assets/img/room.png"
                                                                style="width: -webkit-fill-available;"
                                                                class="img-fluid border-img h-100" alt="...">
                                                        </div>
                                                        <div class="col-md-8 col-sm-12">
                                                            <div class="card-body">
                                                                <h5 class="card-title" style="font-size: 0.8rem;">
                                                                    {{ $room->name }}</h5>
                                                                <p class="card-text" style="font-size: 0.8rem;">
                                                                    {{ $room->location }}</p>
                                                                <hr class="my-1">
                                                                <p class="card-text m-0">
                                                                    <small class="text-body-secondary"
                                                                        style="font-size: 0.8rem;">
                                                                        <i class="fa-regular fa-hourglass-half"></i>
                                                                        Free for 60 min
                                                                    </small>
                                                                </p>
                                                                <p class="card-text m-0">
                                                                    <small class="text-body-secondary"
                                                                        style="font-size: 0.7rem;">
                                                                        <i class="fa-solid fa-users"></i>
                                                                        Up to {{ $room->capacity }} Person
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
                                                        <i class="fa-regular fa-calendar-check fa-xl px-2"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            @empty
                                <p class="h6 fw-bold">No rooms found</p>
                            @endforelse
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
                            <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow border-0"
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
                            <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow border-0"
                                placeholder="Type here your meeting name" type="text" wire:model="title">

                            @error('title')
                                <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="input-form-login px-3 col-12">
                            <i class="fa-solid fa-circle-info icon fa-lg z-1"></i>
                            <textarea class="input-field form-control my-3 px-5 py-3 border-0 shadow rounded-4"
                                placeholder="Type here info or notes..." type="text" wire:model="brief"></textarea>

                            @error('brief')
                                <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                    </div>

                    <div class="actions d-flex justify-content-center">
                        <div class="col-xl-3 col-sm-12 px-lg-2 p-0">
                            <button type="button"
                                class="btn bg-white py-3 rounded-4 my-3 w-100 shadow fw-bold btn-color-2"
                                wire:click="toggleCreateModal">
                                Cancel
                            </button>
                        </div>
                        <div class="col-xl-4 col-sm-12 px-lg-2 p-0">
                            <button type="button" wire:click="store"
                                class="btn my-3 w-100 shadow text-white fs-6 rounded-4 py-3 fw-bold btn-bg-color-2">
                                <i class="fa-solid fa-check fa-fw fa-lg"></i>
                                Add Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
