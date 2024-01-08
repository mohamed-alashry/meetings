<?php

namespace App\DTOs\RoomFeature;

use Spatie\LaravelData\Data;

class CreateDTO extends Data
{
    public string $icon;
    public string $name;
    public string $value;
    public int $type_value;
    public int $status;
}
