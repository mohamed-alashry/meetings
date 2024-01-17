<?php

namespace App\Services;

use App\Models\User;
use App\DTOs\User\CreateDTO;
use App\DTOs\User\FilterDTO;
use App\DTOs\User\UpdateDTO;
use Google\Service\ShoppingContent\Resource\Collections;

class UserService
{
    public function list(FilterDTO $data)
    {
        $query = User::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $users = $query->get();
        return $users;
    }

    public function show(int $id): User
    {
        return User::find($id);
    }

    public function create(CreateDTO $data): User
    {
        return User::create($data->toArray());
    }

    public function update(UpdateDTO $data, int $id): bool
    {
        try {
            $User = User::find($id);
            $User->update($data->toArray());
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $User = User::find($id);
            $User->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
