<?php

namespace App\DTOs\Room;

use Spatie\LaravelData\Data;

class FilterDTO extends Data
{
    public ?string $id;
    public ?string $name;
    public ?string $location;
    public ?string $google_location;
    public ?int $capacity;
    public ?string $meetings_start_date;
}
