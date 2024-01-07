<?php

namespace App\DTOs\User;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
class UpdateDTO extends Data
{
    public string|Optional $name;
    public string|Optional $email;
    public string|Optional $password;
}
