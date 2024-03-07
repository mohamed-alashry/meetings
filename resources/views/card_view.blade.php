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
    @if ($single_room)
        <style>
            .sidebarshadow {
                display: none !important;
            }

            .navbar {
                display: none !important;
            }

            .line-bookings {
                display: none !important;
            }
        </style>
    @endif
@endpush
@section('content')
    <section class="section-contct-body">
        @if (!$single_room)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form action="{{ route('meetings.card_view') }}">
                            <div class="line-bookings row mb-3 px-1 g-3">
                                <span class="col-lg-3 col-md-12 col-sm-12">
                                    @php
                                        $date = request('start_date')
                                            ? \Carbon\Carbon::parse(request('start_date'))->format('d/m/Y')
                                            : '';
                                    @endphp
                                    <input class="input-field form-control px-5 rounded-4 shadow-sm" type="text"
                                        name="start_date" id="datepicker" value="{{ $date }}"
                                        placeholder="Meeting Date" readonly>
                                </span>
                                <span class="col-lg-2
                                        col-md-12 col-sm-12">
                                    <button type="submit"
                                        class="btn bg-body shadow-sm color-primary fw-bold w-100 h-100 rounded-4">Filter</button>
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
        @endif
        @forelse ($meetings as $name => $meeting_list)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="line-bookings row my-3 px-1">
                            <span class="col-lg-6 col-md-6 col-sm-12">
                                <h5 class="card-title">
                                    My {{ Str::ucfirst($name ?? '') }} Meetings
                                </h5>
                                <p class="card-text">Don’t Miss Your Appointments</p>
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
