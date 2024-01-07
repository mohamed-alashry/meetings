<?php

namespace App\DTOs\User;

use Spatie\LaravelData\Data;

class CreateDTO extends Data
{
    public string $name;
    public string $email;
    public string $password;
}
