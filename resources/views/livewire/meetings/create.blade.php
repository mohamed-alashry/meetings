<div>
    @if (!$in_home)
        <!-- Button trigger modal -->
        <button type="button" class="btn text-light fw-bold shadow-sm w-100 h-100 rounded-4"
            style="background-color: #C2203D;" wire:click="toggleCreateModal">
            <i class="fa-regular fa-calendar-days"></i>
            Book a New Meeting
        </button>
    @endif

    @if ($openCreateModal)
        <!-- Modal -->
        <div class="modal fade show bg-dark bg-opacity-50" tabindex="-1" aria-labelledby="exampleModalLabel"
            style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog ps-2 d-flex justify-content-end" style="max-width: 75%;">
                <div class="modal-content rounded-4" style="height: fit-content;">
                    <div
                        class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white">
                        <i class="fa-solid fa-xmark text-light position-absolute top-0 end-0 m-3 fs-3"
                            wire:click="toggleCreateModal" role="button"></i>
                        <h3 class="modal-title fs-5" id="staticBackdropLabel">
                            Find a Meeting Room
                        </h3>
                        <p class="mb-1 fw-light text-white-50">
                            Find Available Rooms Now
                        </p>
                        {{-- filters --}}
                        <div class="row w-100 d-flex justify-content-center">

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                {{-- <i class="fa fa-calendar-days fa-lg icon mt-3 text-dark"></i> --}}
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    type="date" wire:model.live="start_date" min="{{ date('Y-m-d') }}">
                                @error('start_date')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <select class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    wire:model="start_time">
                                    <option value="">Start time</option>
                                    @foreach ($times as $key => $time)
                                        <option value="{{ $key }}">{{ $time }}</option>
                                    @endforeach

                                </select>
                                @error('start_time')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <select class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    wire:model="end_time">
                                    <option value="">End time</option>
                                    @foreach ($times as $key => $time)
                                        <option value="{{ $key }}">{{ $time }}</option>
                                    @endforeach

                                </select>
                                @error('end_time')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                {{-- <i class="fa fa-repeat fa-lg icon mt-3 text-dark"></i> --}}
                                <select class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    wire:model="repeatable">
                                    <option value="1">No Repeat</option>
                                    <option value="2">Daily</option>
                                    <option value="3">Weekly</option>
                                    <option value="4">Monthly</option>
                                </select>
                                @error('repeatable')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            {{-- <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <i class="fa fa-hourglass-half fa-lg icon mt-3 text-dark"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    type="number" wire:model.live="duration" placeholder="Duration" min="1">
                                @error('duration')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div> --}}

                            {{-- <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <i class="fa fa-users fa-lg icon mt-3 text-dark"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    type="number" wire:model.live="person_capacity" placeholder="Person Capacity"
                                    min="1">
                                @error('person_capacity')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div> --}}
                        </div>
                        {{-- end filters --}}
                    </div>
                    <div class="modal-body p-0">
                        <div class="m-3 color-primary">
                            <p class="h6 fw-bold">Choose your Meeting Room</p>
                            <p class="fs-6 m-0">Type here the meeting info</p>
                        </div>

                        {{-- rooms --}}
                        <div class="row px-3">
                            @forelse ($rooms as $room)
                                <div class="col-lg-3" wire:key='room-{{ $room->id }}'>
                                    <label class="text-white">
                                        <input type="radio" class="btn-check" value="{{ $room->id }}"
                                            wire:model.live='room_id'>
                                        <div class="image-hover-text-container">
                                            <div class="card-hover-image">
                                                <div class="card mb-3 shadow border-0 rounded-4 w-100">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 col-sm-12">
                                                            <img src="{{ asset($room->media->first()->file_name) }}"
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
                                                                        End at: {{ $end_time }}
                                                                    </small>
                                                                </p>
                                                                {{-- <p class="card-text m-0">
                                                                    <small class="text-body-secondary"
                                                                        style="font-size: 0.7rem;">
                                                                        <i class="fa-solid fa-users"></i>
                                                                        Up to {{ $room->capacity }} Person
                                                                    </small>
                                                                </p> --}}
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
                        {{-- end rooms --}}
                        <hr>
                        <div class="card rounded-4 m-3 shadow border-0">
                            <div class="card-body color-primary">
                                @forelse ($roomFeatures as $feature)
                                    @if ($feature->name == 'wifi' && $feature->value)
                                        <p class="card-title fw-light my-1">
                                            <i class="fa-solid fa-wifi"></i>
                                            <span class="text-secondary px-2">
                                                Guest Wifi
                                            </span>
                                        </p>
                                    @endif
                                    @if ($feature->name == 'online_meeting' && $feature->value)
                                        <p class="card-title fw-light my-1">
                                            <i class="fa-solid fa-earth-africa"></i>
                                            <span class="text-secondary px-2">
                                                Online meeting
                                            </span>
                                        </p>
                                    @endif
                                    @if ($feature->name == 'projector' && $feature->value)
                                        <p class="card-title fw-light my-1">
                                            <i class="fa-solid fa-video"></i>
                                            <span class="text-secondary px-2">
                                                Projector
                                            </span>
                                        </p>
                                    @endif
                                    @if ($feature->name == 'tv' && $feature->value)
                                        <p class="card-title fw-light my-1">
                                            <i class="fa-solid fa-tv"></i>
                                            <span class="text-secondary px-2">
                                                TV
                                            </span>
                                        </p>
                                    @endif
                                    @if ($feature->name == 'sound_system' && $feature->value)
                                        <p class="card-title fw-light my-1">
                                            <i class="fa-solid fa-volume-high"></i>
                                            <span class="text-secondary px-2">
                                                Sound System
                                            </span>
                                        </p>
                                    @endif
                                @empty
                                @endforelse

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
                        <div class="input-form-login px-3 col-12">
                            <i class="fa-solid fa-envelope icon fa-lg"></i>
                            <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow border-0"
                                placeholder="Type here email" type="email" wire:model.live="inviteeEmail">

                            @error('inviteeEmail')
                                <b class="text-danger">{{ $message }}</b>
                            @enderror

                        </div>

                        @if ($invitees->count() > 0 || $inviteeEmail == null)
                            <div class="card rounded-4 m-3 shadow border-0">
                                <div class="card-body color-primary">
                                    @foreach ($invitees as $invitee)
                                        <p class="card-title fw-semibold my-1" role="button"
                                            wire:click="addInvitee({{ $invitee->id }})">
                                            {{ $invitee->name }}
                                            <span class="text-secondary fw-light">
                                                ({{ $invitee->email }})
                                            </span>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <button type="button" class="btn btn-success rounded-4 shadow btn-sm mx-5"
                                wire:click="addNewInvitee"><i class="fa-solid fa-plus fa-lg"></i> Add New</button>
                        @endif

                        <div class="card rounded-4 m-3 shadow border-0">
                            <div class="card-body color-primary">
                                <h5 class="card-title fw-bold">Invited</h5>
                                @forelse ($invitedUsers as $invited)
                                    <p class="card-title fw-semibold my-1" role="button">
                                        {{ $invited->name }}
                                        <span class="text-secondary fw-light">
                                            ({{ $invited->email }})
                                        </span>

                                        {{-- remove button --}}
                                        <i class="fa-solid fa-xmark text-danger ms-2" wire:confirm='Are you sure?'
                                            wire:click="removeInvitee({{ $invited->id }})"></i>
                                    </p>
                                @empty
                                @endforelse

                                {{-- <div class="card-title fw-semibold my-1 d-flex justify-content-between">
                                    <p class="m-0">
                                        {{ $invitedUsers->count() }} out of {{ $person_capacity ?? 0 }} Persons
                                        <i class="fa-solid fa-users"></i>
                                    </p>
                                </div> --}}
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
                            <x-input.tinymce wire:model="brief" placeholder="Type anything you want..." />

                            @error('brief')
                                <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>

                        <div class="input-form-login px-3 col-12 ">
                            <i class="fa-solid fa-video icon fa-lg"></i>
                            <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow border-0"
                                placeholder="Type here your google meet link" type="text"
                                wire:model="google_meet_link">

                            @error('google_meet_link')
                                <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>


                        <div class="input-form-login px-3 col-6">
                            <i class="fa fa-clock icon fa-lg"></i>
                            <select class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                wire:model="reminder_time">
                                <option value="">Reminder time before</option>
                                <option value="10">10 minutes</option>
                                <option value="20">20 minutes</option>
                                <option value="30">30 minutes</option>
                                <option value="60">1 hour</option>
                                <option value="120">2 hours</option>
                            </select>
                            @error('reminder_time')
                                <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>



                        <div class="input-form-login px-3 col-12 ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="1"
                                        wire:model="send_user_location">
                                    Send user location
                                </label>
                            </div>
                            @error('send_user_location')
                                <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>

                        <div class="input-form-login px-3 col-12 ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="1"
                                        wire:model="send_room_attach">
                                    Send room attachment
                                </label>
                            </div>
                            @error('send_room_attach')
                                <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>

                        <div class="input-form-login px-3 col-12 ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="1"
                                        wire:model="send_room_properties">
                                    Send room properties
                                </label>
                            </div>
                            @error('send_room_properties')
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
                                class="btn my-3 w-100 shadow text-white fs-6 rounded-4 py-3 fw-bold btn-bg-color-2"
                                wire:loading.remove>
                                <i class="fa-solid fa-check fa-fw fa-lg"></i>
                                Add Now
                            </button>

                            <button type="button" disabled wire:loading
                                class="btn my-3 w-100 shadow text-white fs-6 rounded-4 py-3 fw-bold btn-bg-color-2">

                                <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M10.72,19.9a8,8,0,0,1-6.5-9.79A7.77,7.77,0,0,1,10.4,4.16a8,8,0,0,1,9.49,6.52A1.54,1.54,0,0,0,21.38,12h.13a1.37,1.37,0,0,0,1.38-1.54,11,11,0,1,0-12.7,12.39A1.54,1.54,0,0,0,12,21.34h0A1.47,1.47,0,0,0,10.72,19.9Z">
                                        <animateTransform attributeName="transform" dur="0.75s"
                                            repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12" />
                                    </path>
                                </svg>

                                Creating...
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
