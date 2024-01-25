<?php

namespace App\DTOs\Meeting;

use DateTime;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
class UpdateDTO extends Data
{
    public string|Optional $title;
    public string|Optional $brief;
    public ?string $description;
    public string|Optional $minutes;
    public string|Optional $minutes_attach;
    public string|Optional $start_date;
    public string|Optional $start_time;
    public string|Optional $end_time;
    public ?string $end_date;
    public int|Optional $duration;
    public int|Optional $room_id;
    public int|Optional $status;
    public int|Optional $person_capacity;
    public int|Optional $repeatable;
    public int|Optional $parent_id;
    public int|Optional $user_id;

}
