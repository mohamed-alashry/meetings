<?php

namespace App\Services;

use App\Models\Room;
use App\DTOs\Room\CreateDTO;
use App\DTOs\Room\FilterDTO;
use App\DTOs\Room\UpdateDTO;
use Google\Service\ShoppingContent\Resource\Collections;

class RoomService
{
    public function list(FilterDTO $data)
    {
        $query = Room::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $rooms = $query->get();
        return $rooms;
    }
    
    public function list_with_features(FilterDTO $data)
    {
        $query = Room::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $rooms = $query->with('features')->get();
        return $rooms;
    }

    public function show(int $id): Room
    {
        return Room::find($id);
    }

    public function create(CreateDTO $data): Room
    {
        return Room::create($data->toArray());
    }

    public function update(UpdateDTO $data, int $id): bool
    {
        // try {
            $room = Room::find($id);
            // dd($data->toArray(), $room);
            $room->update($data->toArray());
            return true;
        // } catch (\Exception $e) {
        //     return false;
        // }
    }

    public function delete(int $id): bool
    {
        try {
            $room = Room::find($id);
            $room->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
