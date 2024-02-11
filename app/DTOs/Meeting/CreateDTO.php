<?php

namespace App\DTOs\Meeting;


use DateTime;
use Spatie\LaravelData\Data;


class CreateDTO extends Data
{
    public string $title;
    public ?string $brief;
    public ?string $description;
    public ?string $minutes;
    public ?string $minutes_attach;
    public string $start_date;
    public string $start_time;
    public string $end_time;
    public ?int $repeatable;
    public ?string $end_date;
    public int $room_id;
    public int $user_id;
    public ?int $parent_id;
    public ?int $status;
    public bool $send_user_location;
    public bool $send_room_attach;
    public bool $send_room_properties;
    public ?string $google_meet_link;
    public ?int $reminder_time;
}
