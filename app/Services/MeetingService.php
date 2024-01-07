<?php

namespace App\Services;

use App\Models\Meeting;
use App\DTOs\Meeting\CreateDTO;
use App\DTOs\Meeting\FilterDTO;
use App\DTOs\Meeting\UpdateDTO;

class MeetingService
{
    public function list(FilterDTO $data)
    {
        $query = Meeting::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $meetings = $query->get();
        return $meetings;
    }

    public function show(int $id): Meeting
    {
        return Meeting::find($id);
    }

    public function create(CreateDTO $data): Meeting
    {
        return Meeting::create($data->toArray());
    }

    public function update(UpdateDTO $data, int $id): Meeting
    {
        $meeting = Meeting::find($id);
        $meeting->update($data->toArray());
        return $meeting;
    }

    public function delete(int $id): bool
    {
        try {
            $meeting = Meeting::find($id);
            $meeting->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
