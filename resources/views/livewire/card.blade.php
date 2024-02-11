<div class="col-lg-3 col-md-6 col-sm-12">
    <div wire:click="toggleViewModal" role="button">
        @switch($meeting->type_date)
        @case('today')
        <div class="card rounded-4 shadow border-0 mb-3 text-white" style="background-color: #5E1042;">
            <div class="card-header rounded-top-4">
                <h5 class="card-title fw-bold">{{ $meeting->title ?? '' }}</h5>
                <p class="card-text">{{ $meeting->room->name ?? '' }}</p>
                {{-- status span --}}
                <span
                    class="badge rounded-pill position-absolute top-0 end-0 m-3 {{ $meeting->status == 1 ? ' bg-success' : ' bg-danger' }}">{{
                    $meeting->status_text }}</span>
            </div>
            <div class="card-body text-white">
                <p class="card-text m-1">
                    <small class="">
                        <i class="fa-regular fa-calendar-days"></i>
                        {{ Str::ucfirst($meeting->type_date) }},
                        {{ $meeting->start_date_format ?? '' }},
                        {{ $meeting->start_time_format ?? '' }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small class="">
                        <i class="fa-regular fa-hourglass-half"></i>
                        End Time {{ $meeting->end_time_format }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small class="">
                        <i class="fa-solid fa-users"></i>
                        Up to {{ $meeting->person_capacity ?? 0 }} Person
                    </small>
                </p>
            </div>
        </div>
        @break

        @case('tomorrow')
        <div class="card rounded-4 shadow border-0 mb-3 bg-warning bg-gradient text-white">
            <div class="card-header rounded-top-4">
                <h5 class="card-title fw-bold">{{ $meeting->title ?? '' }}</h5>
                <p class="card-text">{{ $meeting->room->name ?? '' }}</p>
                {{-- status span --}}
                <span
                    class="badge rounded-pill position-absolute top-0 end-0 m-3 {{ $meeting->status == 1 ? ' bg-success' : ' bg-danger' }}">{{
                    $meeting->status_text }}</span>
            </div>
            <div class="card-body">
                <!-- <h5 class="card-title">Light card title</h5> -->
                <p class="card-text m-1">
                    <small>
                        <i class="fa-regular fa-calendar-days"></i>
                        Tomorrow,
                        {{ $meeting->start_time_format ?? '' }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small>
                        <i class="fa-regular fa-hourglass-half"></i>
                        End Time {{ $meeting->end_time_format }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small>
                        <i class="fa-solid fa-users"></i>
                        Up to {{ $meeting->person_capacity ?? 0 }} Person
                    </small>
                </p>
            </div>
        </div>
        @break

        @case('upcoming')
        <div class="card rounded-4 shadow border-0 mb-3">
            <div class="card-header bg-body rounded-top-4">
                <h5 class="card-title color-primary fw-bold">{{ $meeting->title ?? '' }}</h5>
                <p class="card-text color-primary">{{ $meeting->room->name ?? '' }}</p>
                {{-- status span --}}
                <span
                    class="badge rounded-pill position-absolute top-0 end-0 m-3 {{ $meeting->status == 1 ? ' bg-success' : ' bg-danger' }}">{{
                    $meeting->status_text }}</span>
            </div>
            <div class="card-body color-primary">
                <!-- <h5 class="card-title">Light card title</h5> -->
                <p class="card-text m-1">
                    <small class="text-body-secondary">
                        <i class="fa-regular fa-calendar-days"></i>
                        {{ $meeting->start_date_format ?? '' }},
                        {{ $meeting->start_time_format ?? '' }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small class="text-body-secondary">
                        <i class="fa-regular fa-hourglass-half"></i>
                        End Time {{ $meeting->end_time_format }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small class="text-body-secondary">
                        <i class="fa-solid fa-users"></i>
                        Up to {{ $meeting->person_capacity ?? 0 }} Person
                    </small>
                </p>
            </div>
        </div>
        @break

        @case('due')
        <div class="card rounded-4 shadow border-0 mb-3 bg-secondary bg-gradient text-white">
            <div class="card-header rounded-top-4 ">
                <h5 class="card-title fw-bold ">{{ $meeting->title ?? '' }}</h5>
                <p class="card-text ">{{ $meeting->room->name ?? '' }}</p>
                {{-- status span --}}
                <span
                    class="badge rounded-pill position-absolute top-0 end-0 m-3 {{ $meeting->status == 1 ? ' bg-success' : ' bg-danger' }}">{{
                    $meeting->status_text }}</span>
            </div>
            <div class="card-body ">
                <!-- <h5 class="card-title">Light card title</h5> -->
                <p class="card-text m-1">
                    <small class="">
                        <i class="fa-regular fa-calendar-days"></i>
                        Due, {{ $meeting->start_time ?? '' }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small class="">
                        <i class="fa-regular fa-hourglass-half"></i>
                        End Time {{ $meeting->end_time_format }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small class="">
                        <i class="fa-solid fa-users"></i>
                        Up to {{ $meeting->person_capacity ?? 0 }} Person
                    </small>
                </p>
            </div>
        </div>
        @break

        @default
        @endswitch
    </div>

    @if ($openViewModal)
    <div class="modal fade show bg-dark bg-opacity-50" tabindex="-1" aria-labelledby="exampleModalLabel"
        style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable ps-2 d-flex justify-content-end" style="max-width: 75%;">
            <div class="modal-content rounded-4" style="height: fit-content; width: 75vw;">
                <div
                    class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white">
                    <i class="fa-solid fa-xmark text-light position-absolute top-0 end-0 m-3 fs-3"
                        wire:click="toggleViewModal" role="button"></i>
                    <div class="row g-3 p-1 w-100 align-items-center">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                {{ $meeting->title ?? '' }}
                            </h3>

                            <p class="card-text m-1">
                                <small class="">
                                    <i class="fa-solid fa-calendar-day pe-1"></i>
                                    {{ $meeting->start_date_format ?? '' }},
                                    {{ $meeting->start_time_format ?? '' }}
                                </small>
                            </p>
                            <p class="card-text m-1">
                                <small class="">
                                    <i class="fa-solid fa-people-roof pe-1"></i>
                                    {{ $meeting->room->location ?? '' }}
                                </small>
                            </p>
                            <p class="card-text m-1">
                                <small class="">
                                    <i class="fa-regular fa-hourglass-half pe-1"></i>
                                    {{-- Duration: {{ $meeting->duration ?? 0 }} min --}}
                                    End Time {{ $meeting->end_time_format }}
                                </small>
                            </p>
                        </div>
                        <div class="col-lg-6 col-sm-12 d-none d-lg-inline">
                            <img src="{{ asset('assets/img/logoModel.png') }}" alt="" class="img-fluid float-end"
                                srcset="">
                        </div>

                    </div>
                </div>
                <div class="modal-body overflow-x-hidden p-0">

                    @livewire('meetings.edit', ['meeting' => $meeting])
                    <div class="card border-0 shadow m-3">
                        <div class="card-body">
                            <div class="row flex-nowrap">
                                <div class="w-auto">
                                    <i class="fa-solid fa-circle-info"></i>
                                </div>
                                <div>
                                    <p class="card-text w-75">
                                        {!! $meeting->brief ?? '' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="w-100 px-4">
                        <p class="h5">Invited Persons</p>
                        <p class="">Invited persons by email or Name</p>
                    </div>
                    <div class="card rounded-4 m-3 shadow border-0">
                        <div class="card-body color-primary">
                            @foreach ($meeting->invitations as $invitee)
                            <p class="card-title fw-semibold my-1" wire:key='invitee-{{ $invitee->userable->id }}'>
                                {{ $invitee->userable->name }}
                                <span class="text-secondary fw-light">
                                    ({{ $invitee->userable->email }})
                                </span>
                            </p>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="w-100 px-4">
                        <p class="h5">Meeting Room Specs </p>
                        <p class="">here the meeting room info</p>
                        <div class="card rounded-4 m-3 shadow border-0">
                            <div class="card-body color-primary">

                                @forelse ($meeting->room->features as $feature)
                                @if ($feature->name == 'wifi' && $feature->value)
                                <p class="card-title fw-light my-1" wire:key='feature-{{ $feature->id }}'>
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
                                        Smart Tv
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
                    </div>
                    @if ($meeting->room->properties)
                    <div class="w-100 px-4">
                        <p class="h5">Meeting Room Properties:</p>
                        <p class="">Here the meeting room properties</p>
                        <div class="card rounded-4 m-3 shadow border-0">
                            <div class="card-body color-primary">
                                @forelse ($meeting->room->properties as $feature)
                                <p class="card-title fw-light mx-2 my-1">
                                    <span class="">
                                        <b class="fw-bold">{{ $feature->key }}:</b> <span>{{ $feature->value }}</span>
                                    </span>
                                </p>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- minutes section --}}
                    <hr>

                    @if ($edit_minutes)
                    <div class="w-100 px-4">
                        <span class="float-end btn btn-primary" role="button" wire:click="closeEditMinutes">
                            Update
                        </span>
                        <p class="h5">Meeting Minutes </p>
                        <p class="">here the meeting Minutes info</p>
                        <div class="input-form-login px-3 col-12 ">
                            <i class="fa-solid fa-file-lines icon fa-lg"></i>
                            <x-input.tinymce wire:model="minutes" placeholder="Type anything you want..." />

                            @error('minutes')
                            <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="input-form-login px-3 col-12 ">
                            <label for="finput2" class="input-field form-control border-0 shadow rounded-4">
                                <i class="fa-solid fa-file-arrow-up icon fa-lg">
                                </i>
                                <samp class="text-input px-5 py-3 position-absolute text-body-secondary">
                                    @if ($minutes_attach)
                                    {{ $minutes_attach->getClientOriginalName() }}
                                    @else
                                    Upload Minutes attach here...
                                    @endif
                                </samp>
                                <input class="form-control py-3 opacity-0" type="file"
                                    accept="pdf, doc, docx, xls, xlsx, ppt, pptx" id="finput2"
                                    wire:model="minutes_attach">
                            </label>
                            @error('minutes_attach')
                            <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                    @else
                    <div class="w-100 px-4">
                        <span class="float-end text-primary" role="button" wire:click="editMinutes">
                            <i class="fa-solid fa-edit icon fa-lg"></i>
                        </span>
                        <p class="h5">Meeting Minutes </p>
                        <p class="">here the meeting Minutes info</p>
                        <div class="card rounded-4 m-3 shadow border-0">
                            <div class="card-body color-primary">
                                {!! $meeting->minutes ?? '' !!}
                            </div>
                        </div>
                        @if ($meeting->minutes_attach_path)
                        <a class="btn btn-primary my-3 w-100" href="{{ $meeting->minutes_attach_path ?? '' }}"
                            target="_blank" rel="noopener noreferrer">Open minutes Attach</a>
                        @endif
                    </div>
                    @endif
                    @if ($meeting->invitations->count() > 0 && $meeting->minutes)
                    <div class="w-100 px-4 my-3 col-12">
                        <span class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center "
                            style="font-size: 0.9rem;">
                            <span class="col-auto fw-bold color-primary mx-2">
                                Share with
                            </span>

                            <select class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm" multiple
                                wire:model='selectedInvitees'>
                                @foreach ($meeting->invitations as $invitee)
                                <option value="{{ $invitee->userable->id }}">
                                    {{ $invitee->userable->email }}</option>
                                @endforeach
                            </select>
                            {{-- <button type="button" class="btn btn-primary btn-sm mx-2"
                                wire:click="shareMinutes">Share</button> --}}

                            <button type="button" wire:loading.remove wire:click="shareMinutes"
                                class="btn m-3 shadow text-white fs-6 rounded-4 py-2 px-4 fw-bold btn-bg-color-2">
                                Share
                            </button>

                            <button type="button" disabled wire:loading
                                class="btn m-3 shadow text-white fs-6 rounded-4 py-2 px-4 fw-bold btn-bg-color-2">

                                <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M10.72,19.9a8,8,0,0,1-6.5-9.79A7.77,7.77,0,0,1,10.4,4.16a8,8,0,0,1,9.49,6.52A1.54,1.54,0,0,0,21.38,12h.13a1.37,1.37,0,0,0,1.38-1.54,11,11,0,1,0-12.7,12.39A1.54,1.54,0,0,0,12,21.34h0A1.47,1.47,0,0,0,10.72,19.9Z">
                                        <animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite"
                                            type="rotate" values="0 12 12;360 12 12" />
                                    </path>
                                </svg>

                                Sharing...
                            </button>
                        </span>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endif

</div>
