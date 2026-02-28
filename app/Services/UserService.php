<?php

namespace App\Services;

use App\Models\User;
use App\DTOs\User\CreateDTO;
use App\DTOs\User\FilterDTO;
use App\DTOs\User\UpdateDTO;
use App\Models\UserPermission;
use Google\Service\ShoppingContent\Resource\Collections;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function list_with_pagination(FilterDTO $data, int $perPage = 10)
    {
        $query = User::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $users = $query->paginate($perPage);

        return $users;
    }

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
        DB::beginTransaction();
        $user = User::create($data->except('permissions')->toArray());
        $permissions = array_keys(array_filter($data->permissions));
        foreach ($permissions as $permission) {
            $user->permissions()->create(['name' => $permission]);
        }
        DB::commit();
        return $user;
    }

    public function update(UpdateDTO $data, int $id): bool
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->update($data->only('name')->toArray());
            $permissions = array_keys(array_filter($data->permissions));
            UserPermission::where('user_id', $user->id)->whereNotIn('name', $permissions)->delete();
            foreach ($permissions as $permission) {
                $user->permissions()->create(['name' => $permission]);
            }
            DB::commit();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $user = User::find($id);
            return $user->delete();
        } catch (\Exception $e) {
            Log::error("Error deleting user with id $id: " . $e->getMessage());
            return false;
        }
    }
}
