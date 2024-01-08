<?php

namespace App\DTOs\RoomFeature;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
class UpdateDTO extends Data
{
    public string|Optional $icon;
    public string|Optional $name;
    public string|Optional $value;
    public int|Optional $type_value;
    public int|Optional $status;
}
