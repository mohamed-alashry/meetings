<?php

namespace App\DTOs\Room;

use Illuminate\Http\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateDTO extends Data
{
    public string|Optional $name;
    public string|Optional $location;
    public string|Optional $google_location;
    public int|Optional $capacity;
    public $attachment;
    public ?array $photos;
    public ?array $features;
}
