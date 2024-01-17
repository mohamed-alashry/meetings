<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Password;

class UserForm extends Form
{
    public ?User $user;
    public string $name = '';
    public string|Email $email = '';
    public string|Password $password = '';
    public string|Password $password_confirmation = '';

    public function list(?array $data)
    {
        $users = User::query();
        foreach ($data as $key => $value) {
            if ($value) $users->where($key, $value);
        }
        $users = $users->get();
        return $users;
    }

    public function list_with_pagination(int $perPage = 10)
    {
        $users = User::paginate($perPage);
        return $users;
    }

    public function store(): void
    {
        $this->validate([
            'email'     => 'required|email|unique:users,email',
            'name'      => 'required|min:5',
            'password'  => 'required|min:6|confirmed',
        ]);
        User::create($this->only(['name', 'email', 'password']));
        $this->reset();
    }

    public function setUser($user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update(): void
    {
        $this->validate([
            'email'     => 'required|email|unique:users,email,' . $this->user->id . ',id',
            'name'      => 'required|min:5',
            'password'  => 'nullable|min:6|confirmed',
        ]);

        $this->user->update($this->all());
        $this->reset($this->all());
    }
}
