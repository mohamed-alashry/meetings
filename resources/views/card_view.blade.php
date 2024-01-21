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
                    </span>
                </div>
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
                            My {{ Str::ucfirst($name??'')}} Meetings
                        </h5>
                        <p class="card-text">Don’t miss your appointments</p>
                    </span>

                </div>
                <div class="line-cards">
                    <div class="row">
                        @forelse ($meeting_list as $meeting)
                            @include('meeting_card', ['meeting' => $meeting, 'room' => $meeting->room])
                        @empty

                        @endforelse
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

                </div>
            </div>
            <div class="pe-0 d-none d-lg-flex">
                <img src="assets/img/Frame-end-footer.png" class="img-fluid position-fixed bottom-0 end-0 z-n1"
                    alt="Frame-end-footer">
            </div>
        </div>
    </div>
    @endisset --}}

</section>
@endsection

@push('scripts')
@endpush
