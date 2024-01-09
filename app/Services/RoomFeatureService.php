<?php

namespace App\Services;

use App\Models\RoomFeature;
use App\DTOs\RoomFeature\CreateDTO;
use App\DTOs\RoomFeature\UpdateDTO;

class RoomFeatureService
{
    public function create(CreateDTO $data): RoomFeature
    {
        return RoomFeature::create($data->toArray());
    }

    public function update(UpdateDTO $data, int $id): bool
    {
        try {
            $feature = RoomFeature::find($id);
            $feature->update($data->toArray());
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $feature = RoomFeature::find($id);
            $feature->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
