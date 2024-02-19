@extends('layouts.app')

@section('title', 'Calender')
@push('styles')
    <link rel="stylesheet" href="{{ asset('owlcarousel') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('owlcarousel') }}/css/owl.theme.default.min.css">
    <style>
        .owl-nav {
            display: none;
        }
    </style>
@endpush
@section('content')
    <section class="section-contct-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form action="{{ route('meetings.card_view') }}">
                        <div class="line-bookings row mb-3 px-1 g-3">
                            <span class="col-lg-3 col-md-12 col-sm-12">
                                <input class="input-field form-control px-5 rounded-4 shadow-sm" type="date"
                                    name="start_date" min="{{ date('m-d-Y') }}" value="{{ request('start_date') }}">
                            </span>
                            <span class="col-lg-2 col-md-12 col-sm-12">
                                <button type="submit"
                                    class="btn bg-body shadow-sm color-primary fw-bold w-100 h-100 rounded-4">filter</button>
                            </span>

                            <span class="col-lg-1 col-md-12 col-sm-12">
                            </span>

                            <span class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                                <a href="{{ route('meetings.calendar_view') }}"
                                    class="btn bg-body shadow-sm color-primary fw-bold w-100 h-100 rounded-4">
                                    <i class="fa-regular fa-calendar-days"></i>
                                    Calendar View
                                </a>
                            </span>
                            <span class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                                @livewire('meetings.create')
                                {{-- @livewire('meetings.edit', ['meeting' => \App\Models\Meeting::first()]) --}}
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @forelse ($meetings as $name => $meeting_list)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="line-bookings row my-3 px-1">
                            <span class="col-lg-6 col-md-6 col-sm-12">
                                <h5 class="card-title">
                                    My {{ Str::ucfirst($name ?? '') }} Meetings
                                </h5>
                                <p class="card-text">Don’t miss your appointments</p>
                            </span>

                        </div>
                        <div class="line-cards">
                            {{-- @livewire('slider.meeting-cards', ['meetings' => $meeting_list], key($name)) --}}
                            <div class="row">
                                @forelse ($meeting_list as $meeting)
                                    {{-- @include('meeting_card', ['meeting' => $meeting, 'room' => $meeting->room]) --}}
                                    @livewire('meetings.card', ['meeting' => $meeting, 'room' => $meeting->room])
                                @empty
                                @endforelse

                                {{-- <div class="row d-flex">
                            @forelse ($meeting_list as $meeting)
                            @livewire('meetings.card', ['meeting' => $meeting, 'room' => $meeting->room]) --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse

        {{-- @isset($meetings['today'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="line-bookings row mb-3 px-1 g-3">
                    <span class="col-lg-6 col-md-12 col-sm-12">
                        <h5 class="card-title">My Today Meetings</h5>
                        <p class="card-text">Don’t miss your appointments</p>
                    </span>
                </div>
                <div class="line-cards mt-4">
                    <div class="row">
                        @forelse ($meetings['today'] as $meeting)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3 text-white"
                                style="background-color: #5E1042;">
                                <div class="card-header rounded-top-4">
                                    <h5 class="card-title fw-bold">{{ $meeting->title??'' }}</h5>
                                    <p class="card-text">{{ $meeting->room->name??'' }}</p>
                                </div>
                                <div class="card-body text-white">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            {{ Str::ucfirst($meeting->type_date) }}, {{ $meeting->start_date??'' }},
                                            {{
                                            $meeting->start_time??'' }}
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Duration {{ $meeting->duration??0 }}
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-solid fa-users"></i>
                                            Up to {{ $meeting->person_capacity??0 }} Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse
                        @forelse ($meetings['due'] as $meeting)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3 text-white"
                                style="background-color: #5E1042;">
                                <div class="card-header rounded-top-4">
                                    <h5 class="card-title fw-bold">{{ $meeting->title??'' }}</h5>
                                    <p class="card-text">{{ $meeting->room->name??'' }}</p>
                                </div>
                                <div class="card-body text-white">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            {{ Str::ucfirst($meeting->type_date) }}, {{ $meeting->start_date??'' }},
                                            {{
                                            $meeting->start_time??'' }}
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Duration {{ $meeting->duration??0 }}
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="">
                                            <i class="fa-solid fa-users"></i>
                                            Up to {{ $meeting->person_capacity??0 }} Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    @endisset
    @isset($meetings['tomorrow'])
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
                        @forelse ($meetings['tomorrow'] as $meeting)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3">
                                <div class="card-header bg-body rounded-top-4">
                                    <h5 class="card-title color-primary fw-bold">{{ $meeting->title??'' }}</h5>
                                    <p class="card-text color-primary">{{ $meeting->room->name??'' }}</p>
                                </div>
                                <div class="card-body color-primary">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            Tomorrow, {{ $meeting->start_time??'' }}
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Duration {{ $meeting->duration??0 }}
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-solid fa-users"></i>
                                            Up to {{ $meeting->person_capacity??0 }} Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endisset
    @isset($meetings['upcoming'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="line-bookings row my-3 px-1">
                    <span class="col-lg-6 col-md-6 col-sm-12">
                        <h5 class="card-title">My Upcoming Meetings</h5>
                        <p class="card-text">Don’t miss your appointments</p>
                    </span>

                </div>
                <div class="line-cards ">
                    <div class="row">
                        @forelse ($meetings['upcoming'] as $meeting)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card rounded-4 shadow border-0 mb-3">
                                <div class="card-header bg-body rounded-top-4">
                                    <h5 class="card-title color-primary fw-bold">{{ $meeting->title??'' }}</h5>
                                    <p class="card-text color-primary">{{ $meeting->room->name??'' }}</p>
                                </div>
                                <div class="card-body color-primary">
                                    <!-- <h5 class="card-title">Light card title</h5> -->
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            {{ $meeting->start_date??'' }}, {{ $meeting->start_time??'' }}
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-regular fa-hourglass-half"></i>
                                            Duration {{ $meeting->duration??0 }}
                                        </small>
                                    </p>
                                    <p class="card-text m-1">
                                        <small class="text-body-secondary">
                                            <i class="fa-solid fa-users"></i>
                                            Up to {{ $meeting->person_capacity??0 }} Person
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse
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
    </div>
    @endisset --}}

    </section>
@endsection

@push('scripts')
    <script src="{{ asset('owlcarousel') }}/js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                // rtl:true,
                // loop: true,
                // mouseDrag: true,
                stagePadding: 0,
                nav: false,
                rewind: true,
                margin: 8,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    960: {
                        items: 2
                    },
                    1200: {
                        items: 4
                    }
                }
            });
            // owl.on('mousewheel', '.owl-stage', function(e) {
            //     if (e.deltaY > 0) {
            //         owl.trigger('next.owl');
            //     } else {
            //         owl.trigger('prev.owl');
            //     }
            //     e.preventDefault();
            // });
        });
    </script>
@endpush
