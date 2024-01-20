<?php

namespace App\DTOs\User;

use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateDTO extends Data
{
    public string|Optional $name;
    public string|Optional $email;
    public ?string $role_name;
    public ?string $password;
    public ?array $permissions;
}
