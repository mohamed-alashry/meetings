<?php

namespace App\DTOs\User;

use Spatie\LaravelData\Data;

class LoginUserDTO extends Data
{
    public string $email;
    public string $password;
}
