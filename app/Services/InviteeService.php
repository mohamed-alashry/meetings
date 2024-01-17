<?php

namespace App\Services;

use App\Models\Invitee;
use App\DTOs\Invitee\CreateDTO;
use App\DTOs\Invitee\FilterDTO;
use App\DTOs\Invitee\UpdateDTO;
use Google\Service\ShoppingContent\Resource\Collections;

class InviteeService
{
    public function list_with_pagination(FilterDTO $data, int $perPage = 10)
    {
        $query = Invitee::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $invitees = $query->paginate($perPage);
        return $invitees;
    }

    public function list(FilterDTO $data)
    {
        $query = Invitee::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $Invitees = $query->get();
        return $Invitees;
    }

    public function show(int $id): Invitee
    {
        return Invitee::find($id);
    }

    public function create(CreateDTO $data): Invitee
    {
        return Invitee::create($data->toArray());
    }

    public function update(UpdateDTO $data, int $id): bool
    {
        try {
            $Invitee = Invitee::find($id);
            $Invitee->update($data->toArray());
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $Invitee = Invitee::find($id);
            $Invitee->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
