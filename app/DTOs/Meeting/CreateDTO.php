<?php

namespace App\DTOs\Meeting;


use DateTime;
use Spatie\LaravelData\Data;


class CreateDTO extends Data
{
    public string $title;
    public string $brief;
    public ?string $description;
    public string $start_date;
    public string $start_time;
    public int $repeatable;
    public int $person_capacity;
    public ?string $end_date;
    public int $duration;
    public int $room_id;
    public int $user_id;
    public ?int $status;
}
