<?php

namespace App\DTOs\User;

use Spatie\LaravelData\Data;

class FilterDTO extends Data
{
    public ?string $name;
    public ?string $email;
}
