<?php

namespace App\Helpers;

use Spatie\GoogleCalendar\Event;

trait GoogleCalendarTrait
{
    public $google_key = 'AIzaSyDi_vwLtn6Te8HoYYsrmvELA2zZC4QIxfM';

    public function get_calendar_events($calendar_id)
    {

    }

    public function get_calendar_list()
    {

    }

    public function create_calendar()
    {
        return Event::create([
            'name' => 'A new event',
            'startDateTime' => now(),
            'endDateTime' => now()->addHour(),
        ]);
    }

    public function delete_calendar($calendar_id)
    {

    }


    public function delete_event($calendar_id, $event_id)
    {

    }

    public function update_event($calendar_id, $event_id)
    {

    }

    public function get_event($calendar_id, $event_id)
    {

    }
}
