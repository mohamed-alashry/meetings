@extends('layouts.app')

@section('title', 'Calender')
@push('styles')
<!--begin::Fonts(mandatory for all pages)-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="{{ asset('assets/metronic') }}/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/metronic') }}/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
    type="text/css" />
<!--end::Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="{{ asset('assets/metronic') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/metronic') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->
<style>
    .fc-col-header-cell {
        background-color: #022537 !important;
    }

    .fc-col-header-cell-cushion {
        color: #fff !important;
        font-size: 14px !important;
        text-decoration: none !important;
    }

    /* .fc-day-sat {
                    background-color: #5E1042 !important;
                } */
</style>
@endpush
@section('content')
<section class="section-contct-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-20">
                <!--begin::Card-->
                <div class="card">
                    <div class="card-body">
                        <!--begin::Calendar-->
                        <div id="kt_calendar_app"></div>
                        <!--end::Calendar-->
                    </div>
                </div>
                <!--end::Card-->
                <!--begin::Modals-->
                <!--begin::Modal - New Product-->
                <div class="modal fade" id="kt_modal_add_event" tabindex-="1" aria-hidden="true" data-bs-focus="false">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <form class="form" action="#" id="kt_modal_add_event_form">
                                <!--begin::Modal header-->
                                <div class="modal-header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold" data-kt-calendar="title">Add Event</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                        id="kt_modal_add_event_close">
                                        <i class="ki-outline ki-cross fs-1"></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-9">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold required mb-2">Event Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="calendar_event_name" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-9">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Event Description</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="calendar_event_description" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-9">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Event Location</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="calendar_event_location" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-9">
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kt_calendar_datepicker_allday" />
                                            <span class="form-check-label fw-semibold"
                                                for="kt_calendar_datepicker_allday">All
                                                Day</span>
                                        </label>
                                        <!--end::Checkbox-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row row-cols-lg-2 g-10">
                                        <div class="col">
                                            <div class="fv-row mb-9">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2 required">Event Start Date</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid"
                                                    name="calendar_event_start_date" placeholder="Pick a start date"
                                                    id="kt_calendar_datepicker_start_date" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col" data-kt-calendar="datepicker">
                                            <div class="fv-row mb-9">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">Event Start Time</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid"
                                                    name="calendar_event_start_time" placeholder="Pick a start time"
                                                    id="kt_calendar_datepicker_start_time" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row row-cols-lg-2 g-10">
                                        <div class="col">
                                            <div class="fv-row mb-9">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2 required">Event End Date</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid"
                                                    name="calendar_event_end_date" placeholder="Pick a end date"
                                                    id="kt_calendar_datepicker_end_date" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col" data-kt-calendar="datepicker">
                                            <div class="fv-row mb-9">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">Event End Time</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid"
                                                    name="calendar_event_end_time" placeholder="Pick a end time"
                                                    id="kt_calendar_datepicker_end_time" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer flex-center">
                                    <!--begin::Button-->
                                    <button type="reset" id="kt_modal_add_event_cancel"
                                        class="btn btn-light me-3">Cancel</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="button" id="kt_modal_add_event_submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Modal footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
                <!--end::Modal - New Product-->
                <!--begin::Modal - New Product-->
                <div class="modal fade" id="kt_modal_view_event" tabindex="-1" data-bs-focus="false" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header border-0 justify-content-end">
                                <!--begin::Edit-->
                                <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary me-2"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" title="Edit Event"
                                    id="kt_modal_view_event_edit">
                                    <i class="ki-outline ki-pencil fs-2"></i>
                                </div>
                                <!--end::Edit-->
                                <!--begin::Edit-->
                                <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-danger me-2"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" title="Delete Event"
                                    id="kt_modal_view_event_delete">
                                    <i class="ki-outline ki-trash fs-2"></i>
                                </div>
                                <!--end::Edit-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary"
                                    data-bs-toggle="tooltip" title="Hide Event" data-bs-dismiss="modal">
                                    <i class="ki-outline ki-cross fs-2x"></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body pt-0 pb-20 px-lg-17">
                                <!--begin::Row-->
                                <div class="d-flex">
                                    <!--begin::Icon-->
                                    <i class="ki-outline ki-calendar-8 fs-1 text-muted me-5"></i>
                                    <!--end::Icon-->
                                    <div class="mb-9">
                                        <!--begin::Event name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="fs-3 fw-bold me-3" data-kt-calendar="event_name"></span>
                                            <span class="badge badge-light-success" data-kt-calendar="all_day"></span>
                                        </div>
                                        <!--end::Event name-->
                                        <!--begin::Event description-->
                                        <div class="fs-6" data-kt-calendar="event_description"></div>
                                        <!--end::Event description-->
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Bullet-->
                                    <span class="bullet bullet-dot h-10px w-10px bg-success ms-2 me-7"></span>
                                    <!--end::Bullet-->
                                    <!--begin::Event start date/time-->
                                    <div class="fs-6">
                                        <span class="fw-bold">Starts</span>
                                        <span data-kt-calendar="event_start_date"></span>
                                    </div>
                                    <!--end::Event start date/time-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="d-flex align-items-center mb-9">
                                    <!--begin::Bullet-->
                                    <span class="bullet bullet-dot h-10px w-10px bg-danger ms-2 me-7"></span>
                                    <!--end::Bullet-->
                                    <!--begin::Event end date/time-->
                                    <div class="fs-6">
                                        <span class="fw-bold">Ends</span>
                                        <span data-kt-calendar="event_end_date"></span>
                                    </div>
                                    <!--end::Event end date/time-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <i class="ki-outline ki-geolocation fs-1 text-muted me-5"></i>
                                    <!--end::Icon-->
                                    <!--begin::Event location-->
                                    <div class="fs-6" data-kt-calendar="event_location"></div>
                                    <!--end::Event location-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                    </div>
                </div>
                <!--end::Modal - New Product-->
                <!--end::Modals-->
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    var hostUrl = "assets/";
</script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/metronic') }}/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('assets/metronic') }}/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="{{ asset('assets/metronic') }}/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('assets/metronic') }}/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
{{-- <script src="{{ asset('assets/metronic') }}/plugins/custom/datatables/datatables.bundle.js"></script> --}}
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
{{-- <script src="{{ asset('assets/metronic') }}/js/custom/apps/calendar/calendar.js"></script>
<script src="{{ asset('assets/metronic') }}/js/widgets.bundle.js"></script>
<script src="{{ asset('assets/metronic') }}/js/custom/widgets.js"></script> --}}
{{-- <script src="{{ asset('assets/metronic') }}/js/custom/apps/chat/chat.js"></script> --}}
{{-- <script src="{{ asset('assets/metronic') }}/js/custom/utilities/modals/users-search.js"></script> --}}
<!--end::Custom Javascript-->
<!--end::Javascript-->
{{-- @dd($meetings) --}}
<script>
    var allEvents = [];
    KTCalendarBasic.init("{{ $meetings }}");
    var KTCalendarBasic = function() {

            return {
                //main function to initiate the module
                init: function(allEvents) {
                    var todayDate = moment().startOf('day');
                    var YM = todayDate.format('YYYY-MM');
                    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                    var TODAY = todayDate.format('YYYY-MM-DD');
                    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

                    var calendarEl = document.getElementById('kt_calendar_app');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],
                        themeSystem: 'bootstrap',

                        isRTL: KTUtil.isRTL(),

                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },

                        height: 800,
                        contentHeight: 780,
                        aspectRatio: 3, // see: https://fullcalendar.io/docs/aspectRatio

                        nowIndicator: true,
                        now: TODAY + 'T09:25:00', // just for demo

                        views: {
                            dayGridMonth: {
                                buttonText: 'month'
                            },
                            timeGridWeek: {
                                buttonText: 'week'
                            },
                            timeGridDay: {
                                buttonText: 'day'
                            }
                        },

                        defaultView: 'dayGridMonth',
                        defaultDate: TODAY,

                        editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        navLinks: true,
                        events: allEvents,


                        eventRender: function(info) {
                            var element = $(info.el);
                            if (info.event.extendedProps.open_calendar == 1) {
                                info.el.style.backgroundColor = '#04E3FC';
                                info.el.style.borderColor = '#04E3FC';
                            } else {
                                info.el.style.backgroundColor = '#0245FB';
                                info.el.style.borderColor = '#0245FB';
                            }

                            // if (info.event.extendedProps && info.event.extendedProps.description) {
                            //     if (element.hasClass('fc-day-grid-event')) {
                            //         element.data('content', info.event.extendedProps.description);
                            //         element.data('placement', 'top');
                            //         KTApp.initPopover(element);
                            //     } else if (element.hasClass('fc-time-grid-event')) {
                            //         element.find('.fc-title').append('<div class="fc-description">' +
                            //             info.event.extendedProps.description + '</div>');
                            //     } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            //         element.find('.fc-list-item-title').append(
                            //             '<div class="fc-description">' + info.event.extendedProps
                            //             .description + '</div>');
                            //     }
                            // }
                        },
                        eventClick: function(info) {
                            Swal.fire({
                                title: info.event.title,
                                html: info.event.extendedProps.description,
                                icon: 'info',
                                showConfirmButton: info.event.extendedProps.open_calendar == 1,
                                showCancelButton: true,
                                confirmButtonText: 'Add to your calendar',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.open(info.event.extendedProps.link, "_blank");
                                }
                            })
                        },
                    });

                    calendar.render();
                }
            };

        }();
        // KTCalendarBasic.init({{ $meetings }});
        // jQuery(document).ready(function() {
        //     KTCalendarBasic.init();
        // });
</script>
@endpush
