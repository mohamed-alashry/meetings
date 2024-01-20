@extends('layouts.app')

@section('title', 'Calender')
@section('styles')
<link href="{{ asset('assets') }}/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
    type="text/css" />
@endsection
@section('content')
<section class="section-contct-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="kt_docs_fullcalendar_populated"></div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    var hostUrl = {{ asset('assets/') }};
</script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
<script src="{{ asset('assets') }}/js/custom/documentation/documentation.js"></script>
<script src="{{ asset('assets') }}/js/custom/documentation/search.js"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('assets') }}/plugins/custom/prismjs/prismjs.bundle.js"></script>

<script src="{{ asset('assets') }}/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script>
    const element = document.getElementById("kt_docs_fullcalendar_basic");

        var todayDate = moment().startOf("day");
        var YM = todayDate.format("YYYY-MM");
        var YESTERDAY = todayDate.clone().subtract(1, "day").format("YYYY-MM-DD");
        var TODAY = todayDate.format("YYYY-MM-DD");
        var TOMORROW = todayDate.clone().add(1, "day").format("YYYY-MM-DD");

        var calendarEl = document.getElementById("kt_docs_fullcalendar_basic");
        var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                    },

                    height: 800,
                    contentHeight: 780,
                    aspectRatio: 3, // see: https://fullcalendar.io/docs/aspectRatio

                    nowIndicator: true,
                    now: TODAY + "T09:25:00", // just for demo

                    views: {
                        dayGridMonth: {
                            buttonText: "month"
                        },
                        timeGridWeek: {
                            buttonText: "week"
                        },
                        timeGridDay: {
                            buttonText: "day"
                        }
                    },

                    initialView: "dayGridMonth",
                    initialDate: TODAY,

                    editable: true,
                    dayMaxEvents: true, // allow "more" link when too many events
                    navLinks: true,
                    events: [

                    ],

                    eventContent: function(info) {
                        var element = $(info.el);

                        if (info.event.extendedProps && info.event.extendedProps.description) {
                            if (element.hasClass("fc-day-grid-event")) {
                                element.data("content", info.event.extendedProps.description);
                                element.data("placement", "top");
                                KTApp.initPopover(element);
                            } else if (element.hasClass("fc-time-grid-event")) {
                                element.find(".fc-title").append("<div class="+ fc - description +">" + info.event.extendedProps.description + "</div>");
                            } else if (element.find(".fc-list-item-title").lenght !== 0) {
                                element.find(".fc-list-item-title").append("<div class="+ fc - description +">" + info.event.extendedProps.description + " </div>");
                                }
                            }
                        }
                    });

                calendar.render();
</script>
@endsection
