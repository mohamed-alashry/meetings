<?php

namespace App\DTOs\Room;

use Spatie\LaravelData\Data;

class FilterDTO extends Data
{
    public ?string $name;
    public ?string $location;
    public ?string $google_location;
    public ?int $capacity;
}
