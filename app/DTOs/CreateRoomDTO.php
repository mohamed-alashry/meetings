<?php

namespace App\DTOs;

use Spatie\LaravelData\Data;

class CreateRoomDTO extends Data
{
    public string $name;
    public string $location;
    public ?string $google_location;
}
