<?php

namespace App\DTOs\Meeting;

use DateTime;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateDTO extends Data
{
    public ?string $title;
    public ?string $brief;
    public ?string $description;
    public ?string $minutes;
    public $minutes_attach;
    public ?string $start_date;
    public ?string $start_time;
    public ?string $end_time;
    public ?string $end_date;
    public ?int $room_id;
    public ?int $status;
    public ?int $repeatable;
    public ?int $parent_id;
    public ?int $user_id;
    public ?bool $update_all;
}
