<div class="col-lg-3 col-md-6 col-sm-12">
    @switch($meeting->type_date)
        @case('today')
            <div wire:click="toggleViewModal" role="button">
                <div class="card rounded-4 shadow border-0 mb-3 text-white" style="background-color: #5E1042;">
                    <div class="card-header rounded-top-4">
                        <h5 class="card-title fw-bold">{{ $meeting->title ?? '' }}</h5>
                        <p class="card-text">{{ $room->name ?? '' }}</p>
                    </div>
                    <div class="card-body text-white">
                        <p class="card-text m-1">
                            <small class="">
                                <i class="fa-regular fa-calendar-days"></i>
                                {{ Str::ucfirst($meeting->type_date) }},{{ $meeting->start_date ?? '' }}
                                {{ $meeting->start_time ?? '' }}
                            </small>
                        </p>
                        <p class="card-text m-1">
                            <small class="">
                                <i class="fa-regular fa-hourglass-half"></i>
                                End Time: {{ $meeting->end_time ?? 0 }}
                            </small>
                        </p>
                        <p class="card-text m-1">
                            <small class="">
                                <i class="fa-solid fa-users"></i>
                                {{ $meeting->invitations->count() ?? 0 }} Invitations
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        @break

        @case('tomorrow')
            <div wire:click="toggleViewModal" role="button">
                <div class="card rounded-4 shadow border-0 mb-3 bg-warning bg-gradient text-white">
                    <div class="card-header rounded-top-4">
                        <h5 class="card-title fw-bold">{{ $meeting->title ?? '' }}</h5>
                        <p class="card-text">{{ $room->name ?? '' }}</p>
                    </div>
                    <div class="card-body">
                        <!-- <h5 class="card-title">Light card title</h5> -->
                        <p class="card-text m-1">
                            <small>
                                <i class="fa-regular fa-calendar-days"></i>
                                Tomorrow, {{ $meeting->start_time ?? '' }}
                            </small>
                        </p>
                        <p class="card-text m-1">
                            <small>
                                <i class="fa-regular fa-hourglass-half"></i>
                                End Time: {{ $meeting->end_time ?? 0 }}
                            </small>
                        </p>
                        <p class="card-text m-1">
                            <small class="">
                                <i class="fa-solid fa-users"></i>
                                {{ $meeting->invitations->count() ?? 0 }} Invitations
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        @break

        @case('upcoming')
            <div wire:click="toggleViewModal" role="button">
                <div class="card rounded-4 shadow border-0 mb-3">
                    <div class="card-header bg-body rounded-top-4">
                        <h5 class="card-title color-primary fw-bold">{{ $meeting->title ?? '' }}</h5>
                        <p class="card-text color-primary">{{ $room->name ?? '' }}</p>
                    </div>
                    <div class="card-body color-primary">
                        <!-- <h5 class="card-title">Light card title</h5> -->
                        <p class="card-text m-1">
                            <small class="text-body-secondary">
                                <i class="fa-regular fa-calendar-days"></i>
                                {{ $meeting->start_date ?? '' }}, {{ $meeting->start_time ?? '' }}
                            </small>
                        </p>
                        <p class="card-text m-1">
                            <small class="text-body-secondary">
                                <i class="fa-regular fa-hourglass-half"></i>
                                End Time: {{ $meeting->end_time ?? 0 }}
                            </small>
                        </p>
                        <p class="card-text m-1">
                            <small class="">
                                <i class="fa-solid fa-users"></i>
                                {{ $meeting->invitations->count() ?? 0 }} Invitations
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        @break

        @case('due')
            <div wire:click="toggleViewModal" role="button">
                <div class="card rounded-4 shadow border-0 mb-3 bg-secondary bg-gradient text-white">
                    <div class="card-header rounded-top-4 ">
                        <h5 class="card-title fw-bold ">{{ $meeting->title ?? '' }}</h5>
                        <p class="card-text ">{{ $room->name ?? '' }}</p>
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
                                End Time: {{ $meeting->end_time ?? 0 }}
                            </small>
                        </p>
                        <p class="card-text m-1">
                            <small class="">
                                <i class="fa-solid fa-users"></i>
                                {{ $meeting->invitations->count() ?? 0 }} Invitations
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        @break

        @default
    @endswitch
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
                                        {{ $meeting->start_date ?? '' }}, {{ $meeting->start_time ?? '' }}
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
                                        End Time: {{ $meeting->end_time ?? 0 }}
                                    </small>
                                </p>
                            </div>
                            <div class="col-lg-6 col-sm-12 d-none d-lg-inline">
                                <img src="{{ asset('assets/img/logoModel.png') }}" alt=""
                                    class="img-fluid float-end" srcset="">
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
                                            {{ $meeting->brief ?? '' }}
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
                                    <p class="card-title fw-semibold my-1" role="button"
                                        wire:key='invitee-{{ $invitee->userable->id }}'
                                        wire:click="addInvitee({{ $invitee->userable->id }})">
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
                                            <p class="card-title fw-light my-1"
                                                wire:key='feature-{{ $feature->id }}'>
                                                <i class="fa-solid fa-wifi"></i>
                                                <span class="text-secondary px-2">
                                                    Guest Wifi
                                                </span>
                                            </p>
                                            <p class="card-title fw-light mx-4 my-1">
                                                <span class="px-2">
                                                    Network SSID: <span class="fw-bold">One1Guest</span>
                                                </span>
                                            </p>
                                            <p class="card-title fw-light mx-4 my-1">
                                                <span class="px-2">
                                                    Password: <span class="fw-bold">Welcome2one1</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
