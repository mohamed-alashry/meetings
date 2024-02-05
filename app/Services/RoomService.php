<?php

namespace App\Services;

use App\Models\Room;
use App\Models\RoomMedia;
use App\DTOs\Room\CreateDTO;
use App\DTOs\Room\FilterDTO;
use App\DTOs\Room\UpdateDTO;
use App\Models\RoomFeature;

class RoomService
{

    /**
     * Display a listing of the resource.
     */
    public function monitor(FilterDTO $data)
    {
        return Room::query()
            ->when($data->id, function ($query, $value) {
                $query->where('id', $value);
            })
            ->when(
                $data->meetings_start_date,
                function ($query, $value) {
                    $query->with([
                        'meetings' => function ($q) use ($value) {
                            $q->whereDate('start_date', '=', $value)->orderBy('start_date')->orderBy('start_time');
                        }
                    ]);
                },
                function ($query) {
                    $query->with([
                        'meetings' => function ($q) {
                            $q->whereDate('start_date', '=', now())->orderBy('start_date')->orderBy('start_time');
                        }
                    ]);
                }
            )->get();
    }

    public function list_with_pagination(FilterDTO $data, int $perPage = 10)
    {
        $query = Room::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $rooms = $query->latest()->paginate($perPage);
        return $rooms;
    }

    public function list(FilterDTO $data)
    {
        $query = Room::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $rooms = $query->latest()->get();
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
        $room = Room::create($data->except('photos', 'features')->toArray());
        foreach ($data->photos as $photo) {
            $file_name = $photo->store('uploads/images/original', 'public');
            RoomMedia::create([
                'room_id'   => $room->id,
                'type'      => $photo->extension(),
                'file_name' => $file_name,
            ]);
        }

        foreach ($data->features as $name => $value) {
            RoomFeature::updateOrCreate([
                'room_id'   => $room->id,
                'name'      => $name,
            ], [
                'room_id'   => $room->id,
                'name'      => $name,
                'value'     => $value,
            ]);
        }

        return $room;
    }

    public function update(UpdateDTO $data, int $id): bool
    {
        try {
            $room = Room::find($id);
            $room->update($data->except('photos', 'features')->toArray());

            foreach ($data->photos ?? [] as $photo) {
                $file_name = $photo->store('uploads/images/original', 'public');
                RoomMedia::create([
                    'room_id'   => $room->id,
                    'type'      => $photo->extension(),
                    'file_name' => $file_name,
                ]);
            }
            foreach ($data->features ?? [] as $name => $value) {
                RoomFeature::updateOrCreate([
                    'room_id'   => $room->id,
                    'name'      => $name,
                ], [
                    'room_id'   => $room->id,
                    'name'      => $name,
                    'value'     => $value,
                ]);
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
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
