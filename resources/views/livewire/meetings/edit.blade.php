<div>
    <div class="row p-3 align-items-center">
        <div class="col-lg-3 col-sm-12 color-primary">
            <p class="h6 fw-bold">Meeting Information</p>
        </div>
        <!-- Button trigger modal -->
        <div class="col-lg-9 col-sm-12 row d-flex gap-3">
            @if ($meeting->status == 1 && $meeting->start_date . ' ' . $meeting->start_time >= date('Y-m-d H:i:s'))
                @if (hasPermissionUser('cancel_meeting') && $meeting->isCreator())
                    <button type="button" class="btn my-3 shadow text-white rounded-4 fw-bold col-4"
                        style="background: #C2203D;padding-top: 0.8rem;padding-bottom: 0.8rem;" wire:loading
                        wire:click="cancelMeeting" wire:confirm="Are you sure?" disabled>
                        <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M10.72,19.9a8,8,0,0,1-6.5-9.79A7.77,7.77,0,0,1,10.4,4.16a8,8,0,0,1,9.49,6.52A1.54,1.54,0,0,0,21.38,12h.13a1.37,1.37,0,0,0,1.38-1.54,11,11,0,1,0-12.7,12.39A1.54,1.54,0,0,0,12,21.34h0A1.47,1.47,0,0,0,10.72,19.9Z">
                                <animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite"
                                    type="rotate" values="0 12 12;360 12 12" />
                            </path>
                        </svg>
                        Canceling...
                    </button>
                    <button type="button" class="btn my-3 shadow text-white rounded-4 fw-bold col-4"
                        style="background: #C2203D;padding-top: 0.8rem;padding-bottom: 0.8rem;" wire:loading
                        wire:click="cancelAllMeetings" wire:confirm="Are you sure?" disabled>
                        <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M10.72,19.9a8,8,0,0,1-6.5-9.79A7.77,7.77,0,0,1,10.4,4.16a8,8,0,0,1,9.49,6.52A1.54,1.54,0,0,0,21.38,12h.13a1.37,1.37,0,0,0,1.38-1.54,11,11,0,1,0-12.7,12.39A1.54,1.54,0,0,0,12,21.34h0A1.47,1.47,0,0,0,10.72,19.9Z">
                                <animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite"
                                    type="rotate" values="0 12 12;360 12 12" />
                            </path>
                        </svg>
                        Canceling All...
                    </button>
                    <div class="col-9 row gap-3" wire:loading.remove>
                        @if ($meeting->repeatable != 1)
                            <button type="button" class="btn my-3 shadow text-white rounded-4 fw-bold col"
                                style="background: #C2203D;padding-top: 0.8rem;padding-bottom: 0.8rem;"
                                wire:click="cancelAllMeetings" wire:confirm="Are you sure?">
                                <i class="fa fa-xmark fa-fw fa-lg"></i>
                                Cancel All
                            </button>
                        @endif
                        <button type="button" class="btn my-3 shadow text-white rounded-4 fw-bold col"
                            style="background: #C2203D;padding-top: 0.8rem;padding-bottom: 0.8rem;"
                            wire:click="cancelMeeting" wire:confirm="Are you sure?">
                            <i class="fa fa-xmark fa-fw fa-lg"></i>
                            Cancel This Meeting
                        </button>
                    </div>

                @endif


                @if (hasPermissionUser('update_meeting') && $meeting->isCreator())
                    <button type="button" class="btn text-light fw-bold shadow-sm h-100 rounded-4 my-3 d-inline col"
                        style="background-color: #C2203D;padding-top: 0.8rem;padding-bottom: 0.8rem;"
                        wire:click="toggleEditModal">
                        <i class="fa-regular fa-edit"></i>
                        Edit Meeting
                    </button>
                @endif
            @endif
        </div>
    </div>

    @if ($openEditModal && hasPermissionUser('update_meeting'))
        <!-- Modal -->
        <div class="modal fade show bg-dark bg-opacity-50" tabindex="-1" aria-labelledby="exampleModalLabel"
            style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog ps-2 d-flex justify-content-end" style="max-width: 75%;">
                <div class="modal-content rounded-4" style="height: fit-content;">
                    <div
                        class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white">

                        <i class="fa-solid fa-xmark text-light position-absolute top-0 end-0 m-3 fs-3"
                            wire:click="toggleEditModal" role="button"></i>

                        <h3 class="modal-title fs-5" id="staticBackdropLabel">
                            Find a Meeting Room
                        </h3>
                        <p class="mb-1 fw-light text-white-50">
                            Find Available Rooms Now
                        </p>
                        <div class="row w-100 d-flex justify-content-center">

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                {{-- <i class="fa fa-calendar-days fa-lg icon mt-3 text-dark"></i> --}}
                                <x-input.date wire:model="start_date"
                                    class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm" />
                                @error('start_date')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="input-form-login col-lg col-md-12 col-sm-12">
                                <select class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    wire:model.live="start_time">
                                    <option value="">Start Time</option>
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
                                    wire:model.live="end_time">
                                    <option value="">End Time</option>
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
                        </div>
                    </div>
                    <div class="modal-body p-0">
                        <div class="m-3 color-primary">
                            <p class="h6 fw-bold">Choose your Meeting Room</p>
                            <p class="fs-6 m-0">Type Here The Meeting Info</p>
                        </div>

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
                                                                {{-- <p class="card-text m-0">
                                                                    <small class="text-body-secondary"
                                                                        style="font-size: 0.8rem;">
                                                                        <i class="fa-regular fa-hourglass-half"></i>
                                                                        End at: {{ $meeting->end_at }}
                                                                    </small>
                                                                </p> --}}
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
                                <p class="h6 fw-bold">No Rooms Found</p>
                            @endforelse
                        </div>
                        <hr>
                        <div class="card rounded-4 m-3 shadow border-0">
                            <div class="card-body color-primary">
                                <div class="col-12">
                                    <div class="row">
                                        @if (count($room_media) > 0)
                                            @foreach ($room_media as $photo)
                                                <div class="col-lg-2 col-md-4 col-sm-12">
                                                    <div class="text-white m-auto">
                                                        <div class="image-hover-text-container">
                                                            <div class="image-hover-image">
                                                                <a href="{{ asset($photo->file_name) }}"
                                                                    target="_blank">
                                                                    <img class="img-fluid rounded-5"
                                                                        style="height: 80px;"
                                                                        src="{{ asset($photo->file_name) }}"
                                                                        alt="" srcset="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @forelse ($roomFeatures as $feature)
                                    @if ($feature->name == 'wifi' && $feature->value)
                                        <p class="card-title fw-light my-1">
                                            <i class="fa-solid fa-wifi"></i>
                                            <span class="text-secondary px-2">
                                                Guest Wifi
                                            </span>
                                        </p>
                                        <p class="card-title fw-light mx-4 my-1">
                                            <span class="px-2">
                                                Network SSID: <span class="fw-bold">OC</span>
                                            </span>
                                        </p>
                                        <p class="card-title fw-light mx-4 my-1">
                                            <span class="px-2">
                                                Password: <span class="fw-bold">Guest2024</span>
                                            </span>
                                        </p>
                                    @endif
                                    @if ($feature->name == 'online_meeting' && $feature->value)
                                        <p class="card-title fw-light my-1">
                                            <i class="fa-solid fa-earth-africa"></i>
                                            <span class="text-secondary px-2">
                                                Meeting System
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
                                                Smart TV
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
                                    @if ($feature->name == 'interactive_smart_board' && $feature->value)
                                        <p class="card-title fw-light my-1">
                                            <i class="fa-solid fa-video"></i>
                                            <span class="text-secondary px-2">
                                                Interactive Smart Board
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
                            {{-- <span class="col-lg-3 col-sm-12">
                            <p class="fs-6 fw-bold text-end m-0">“You can choose from our employee
                                or send
                                external invitations
                                by Email”</p>
                        </span> --}}
                        </div>
                        <div class="input-form-login px-3 col-12 ">
                            <i class="fa-solid fa-envelope icon fa-lg"></i>
                            <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow border-0"
                                placeholder="Type here email" type="email" wire:model.live="inviteeEmail">

                            @error('inviteeEmail')
                                <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                        @if ($invitees->count() > 0)
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
                        @endif
                        @if (!$invitees->count() && $inviteeEmail)
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
                            <p class="fs-6 m-0">Type Here The Meeting Info</p>
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

                    </div>



                    {{-- edit all checkbox --}}
                    @if ($repeatable != 1)
                        <div class="form-check form-check-inline m-3 w-100 text-center">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" wire:model='update_all'
                                    value="true">
                                Update All
                            </label>
                        </div>
                    @endif

                    <div class="actions d-flex justify-content-center">
                        <div class="col-xl-3 col-sm-12 px-lg-2 p-0">
                            <button type="button"
                                class="btn bg-white py-3 rounded-4 my-3 w-100 shadow fw-bold btn-color-2"
                                wire:click="toggleEditModal">
                                Cancel
                            </button>
                        </div>
                        <div class="col-xl-4 col-sm-12 px-lg-2 p-0">
                            <button type="button" wire:click="update({{ $meeting->id }})" wire:loading.remove
                                class="btn my-3 w-100 shadow text-white fs-6 rounded-4 py-3 fw-bold btn-bg-color-2">
                                <i class="fa-solid fa-check fa-fw fa-lg"></i>
                                Update
                            </button>
                            <button type="button" disabled wire:loading wire:target="update({{ $meeting->id }})"
                                class="btn my-3 w-100 shadow text-white fs-6 rounded-4 py-3 fw-bold btn-bg-color-2">

                                <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M10.72,19.9a8,8,0,0,1-6.5-9.79A7.77,7.77,0,0,1,10.4,4.16a8,8,0,0,1,9.49,6.52A1.54,1.54,0,0,0,21.38,12h.13a1.37,1.37,0,0,0,1.38-1.54,11,11,0,1,0-12.7,12.39A1.54,1.54,0,0,0,12,21.34h0A1.47,1.47,0,0,0,10.72,19.9Z">
                                        <animateTransform attributeName="transform" dur="0.75s"
                                            repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12" />
                                    </path>
                                </svg>

                                Updating...
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
