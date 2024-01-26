@extends('layouts.app')

@section('title', 'Monitor')

{{-- @push('styles')
    <link rel="stylesheet" href="{{ asset('owlcarousel') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('owlcarousel') }}/css/owl.theme.default.min.css">
    <style>
        .owl-nav {
            display: none;
        }
    </style>
@endpush --}}

@section('content')
    @livewire('rooms.monitor')
@endsection

{{-- @push('scripts')
    <script src="{{ asset('owlcarousel') }}/js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                // rtl:true,
                // loop: true,
                stagePadding: 0,
                // mouseDrag: true,
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
@endpush --}}
