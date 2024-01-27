<?php

namespace App\DTOs\Meeting;


use DateTime;
use Spatie\LaravelData\Data;


class CreateDTO extends Data
{
    public string $title;
    public string $brief;
    public ?string $description;
    public ?string $minutes;
    public ?string $minutes_attach;
    public string $start_date;
    public string $start_time;
    public string $end_time;
    public ?int $repeatable;
    public int $person_capacity;
    public ?string $end_date;
    public int $duration;
    public int $room_id;
    public int $user_id;
    public ?int $parent_id;
    public ?int $status;
}
