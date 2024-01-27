@extends('layouts.app')

@section('title', 'Home')
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
    @livewire('home', key('home'))
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="line-bookings row mt-3">
                    <span class="col-lg-8 col-md-6 col-sm-12">
                        <h5 class="card-title">Upcomming Bookings</h5>
                        <p class="card-text">Don’t miss your appointments</p>
                    </span>
                    <span class="col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('meetings.calendar_view') }}" class="btn text-light w-100 h-100 rounded-4"
                            style="background-color: #C2203D;">
                            <i class="fa-regular fa-calendar-days"></i>
                            View All
                        </a>
                    </span>
                </div>
                <div class="line-cards mt-4">
                    <div>
                        @livewire('card', [], key('meeting-cards'))
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
