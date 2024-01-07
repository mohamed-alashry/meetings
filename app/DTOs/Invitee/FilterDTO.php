<?php

namespace App\DTOs\Invitee;

use Spatie\LaravelData\Data;

class FilterDTO extends Data
{
    public ?string $name;
    public ?string $email;
}
