<?php

namespace App\DTOs\Meeting;

use Spatie\LaravelData\Data;

class FilterDTO extends Data
{
    public ?string $name;
    public ?string $location;
    public ?string $google_location;
    public ?int $capacity;
    public ?int $status;

}
