@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="section-contct-body">
    @livewire('home', key('home'))
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="line-bookings row mt-3">
                    <span class="col-lg-9 col-md-6 col-sm-12">
                        <h5 class="card-title">Upcomming Bookings</h5>
                        <p class="card-text">Don’t miss your appointments</p>
                    </span>
                    <span class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('meetings.calendar_view') }}" class="btn text-light w-100 h-100 rounded-4"
                            style="background-color: #C2203D;">
                            <i class="fa-regular fa-calendar-days"></i>
                            View All
                        </a>
                    </span>
                </div>
                <div class="line-cards mt-4">
                    <div class="row">
                        @forelse ($meetings->take(5) as $meeting)
                        @livewire('meetings.card', ['meeting' => $meeting, 'room' => $meeting->room],
                        key('card-'.$meeting->id))
                        @empty
                        <div class="card m-2 rounded-3">
                            <div class="card-body p-5 m-4 m-auto">
                                <h4 class="card-title">Not Found Upcoming Meetings in this room</h4>
                                <div class="col-6 m-auto mt-4">
                                    @livewire('meetings.create', ['room_id' => $meeting->room->id],
                                    key('create-'.$meeting->room->id))
                                </div>
                            </div>
                        </div>
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
</section>
@endsection
