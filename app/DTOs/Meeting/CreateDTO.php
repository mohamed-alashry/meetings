<?php

namespace App\DTOs\Meeting;


use DateTime;
use Spatie\LaravelData\Data;


class CreateDTO extends Data
{
    public string $title;
    public string $brief;
    public string $description;
    public DateTime $start_date;
    public DateTime $end_date;
    public int $duration;
    public int $room_id;
    public int $status;
}
