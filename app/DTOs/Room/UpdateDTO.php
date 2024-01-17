<?php

namespace App\DTOs\Room;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateDTO extends Data
{
    public string|Optional $name;
    public string|Optional $location;
    public string|Optional $google_location;
    public int|Optional $capacity;
    public ?array $photos;
}
