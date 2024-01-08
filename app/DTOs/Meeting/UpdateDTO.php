<?php

namespace App\DTOs\Meeting;

use DateTime;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
class UpdateDTO extends Data
{
    public string|Optional $title;
    public string|Optional $brief;
    public string|Optional $description;
    public DateTime|Optional $start_date;
    public DateTime|Optional $end_date;
    public int|Optional $duration;
    public int|Optional $room_id;
    public int|Optional $status;
}
