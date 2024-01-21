<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Meeting;
use Carbon\CarbonPeriod;
use App\DTOs\Meeting\CreateDTO;
use App\DTOs\Meeting\FilterDTO;
use App\DTOs\Meeting\InviteDTO;
use App\DTOs\Meeting\UpdateDTO;
use Illuminate\Support\Collection;

class MeetingService
{
    /**
     * Display a listing of the resource.
     */
    public function monitor(FilterDTO $data)
    {
        $query = Meeting::query();
        foreach ($data->toArray() as $key => $value) {
            if ($value) $query->where($key, $value);
        }
        $rooms = $query->upcoming()->get()->groupBy('room_id');
        return $rooms;
    }

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

    public function create(CreateDTO $data): bool
    {
        // 1 => No repeat, 2 => Daily, 3 => Weekly, 4 => Monthly
        switch ($data->repeatable) {
            case 1:
                Meeting::create($data->toArray());
                break;
            case 2:
                $this->handleRepeatable($data, '1 days');
        }

        // dd($data->repeatable);
        return true;
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

    public function invite(InviteDTO $data): bool
    {
        try {
            $meeting = Meeting::find($data->meeting_id);
            $meeting->invitations()->create($data->toArray());
            return true;
        } catch (\Exception $e) {
            dd($e);
            return false;
        }
    }

    function getRooms()
    {
        return Room::get();
    }

    function getRoomFeatures(int $id)
    {
        return Room::find($id)->features;
    }




    private function handleRepeatable($data, $repeatablePeriod)
    {
        $startPeriod = Carbon::parse($data->start_date)->format('Y-m-d');
        $endPeriod   = Carbon::parse($data->start_date)->addYear()->format('Y-m-d');

        $period = CarbonPeriod::create($startPeriod, $repeatablePeriod, $endPeriod);
        $days    = [];

        foreach ($period as $date) {
            if ($date->isSaturday() || $date->isFriday()) continue;
            $days[] = $date->format('Y-m-d');
        }

        foreach ($days as $day) {
            $meeting = new Meeting($data->toArray());
            $meeting->start_date = $day;
            $meeting->save();
        }
    }
}
