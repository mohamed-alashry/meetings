<?php

namespace App\DTOs\Invitee;

use Spatie\LaravelData\Data;

class CreateDTO extends Data
{
    public string $name;
    public string $email;
}
