<?php

namespace App\DTOs\Room;

use Illuminate\Http\File;
use Spatie\LaravelData\Data;

class CreateDTO extends Data
{
    public string $name;
    public string $location;
    public string $google_location;
    public int $capacity;
    public ?array $photos;
    public ?array $features;
    public ?array $more_features;
    public $attachment;
}
