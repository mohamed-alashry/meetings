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
use App\Models\Invitee;
use Illuminate\Support\Collection;

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

    public function create(CreateDTO $data, $invited_users): bool
    {
        // 1 => No repeat, 2 => Daily, 3 => Weekly, 4 => Monthly
        switch ($data->repeatable) {
            case 1: // No repeat
                $meeting = Meeting::create($data->toArray());
                foreach ($invited_users as $user) {
                    $this->invite(InviteDTO::from([
                        'meeting_id'    => $meeting->id,
                        'userable_id'   => $user->id,
                        'userable_type' => 'invitee',
                        'type'          => 1,
                        'status'        => 1,
                    ]));
                }

                break;
            case 2: // Daily
                $this->handleRepeatable($data, '1 days', $invited_users);
                break;
            case 3: // Weekly
                $this->handleRepeatable($data, '1 weeks', $invited_users);
                break;
            case 4: // Monthly
                $this->handleRepeatable($data, '1 months', $invited_users);
                break;
        }

        return true;
    }

    public function update(UpdateDTO $data, int $id, $invited_users)
    {
        $meeting = Meeting::find($id);
        $meeting_repeats = Meeting::where('parent_id', $id)->get();

        // 1 => No repeat, 2 => Daily, 3 => Weekly, 4 => Monthly
        if ($data->repeatable == 1) { // No repeat
            $meeting->update($data->toArray());
            // update invitations
            $meeting->invitations()->delete();
            // dd($invited_users);
            foreach ($invited_users as $user) {
                $this->invite(InviteDTO::from([
                    'meeting_id'    => $meeting->id,
                    'userable_id'   => $user->id,
                    'userable_type' => 'invitee',
                    'type'          => 1,
                    'status'        => 1,
                ]));
            }
        } elseif ($data->repeatable == $meeting->repeatable) { // same repeatable
            foreach ($meeting_repeats as $meeting_repeat) {
                $meeting_repeat->update($data->toArray());
            }
        } elseif ($data->repeatable == 2) { // Daily
            $this->deleteRepeatable($meeting_repeats);
            $this->handleRepeatable($data, '1 days', $invited_users, true);
        } elseif ($data->repeatable == 3) { // Weekly
            $this->deleteRepeatable($meeting_repeats);
            $this->handleRepeatable($data, '1 weeks', $invited_users, true);
        } elseif ($data->repeatable == 4) { // Monthly
            $this->deleteRepeatable($meeting_repeats);
            $this->handleRepeatable($data, '1 months', $invited_users, true);
        }

        // $meeting->update($data->toArray());
        // return $meeting;
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

    public function getRooms($start_date = null, $start_time = null)
    {
        if ($start_date && $start_time) {
            $reservedRooms = Room::whereHas('meetings', function ($query) use ($start_date, $start_time) {
                $query->where('start_date', $start_date)->where('start_time', $start_time);
            })->get();

            // return all rooms without reserved rooms
            $rooms = Room::whereNotIn('id', $reservedRooms->pluck('id'))->get();
            return $rooms;
        }

        return Room::all();
    }

    public function getRoomFeatures(int $id)
    {
        return Room::find($id)->features ?? collect([]);
    }

    public function getInvitees(Meeting $meeting)
    {
        return Invitee::whereNotIn('id', $meeting->invitations->pluck('id'))->get();
    }

    public function getInvitedUsers(Meeting $meeting)
    {
        return $meeting->invitations;
    }




    private function handleRepeatable($data, $repeatablePeriod, $invited_users, $update = false)
    {
        $startPeriod = Carbon::parse($data->start_date)->format('Y-m-d');
        $endPeriod   = Carbon::parse($data->start_date)->addYear()->format('Y-m-d');

        $period = CarbonPeriod::create($startPeriod, $repeatablePeriod, $endPeriod);
        $days    = [];

        foreach ($period as $date) {
            if ($date->isSaturday() || $date->isFriday()) continue;
            $days[] = $date->format('Y-m-d');
        }

        // get last meeting id
        $lastMeetingId = Meeting::latest('id')->value('id') ?? 0;
        $nextMeetingId = $lastMeetingId + 1;

        foreach ($days as $day) {
            $meeting = new Meeting($data->toArray());
            $meeting->start_date = $day;
            $meeting->parent_id = $nextMeetingId;
            $meeting->save();

            if ($update) {
                $meeting->invitations()->delete();
            }
            foreach ($invited_users as $user) {
                $this->invite(InviteDTO::from([
                    'meeting_id' => $meeting->id,
                    'userable_id' => $user->id,
                    'userable_type' => 'invitee',
                    'type' => 1,
                    'status' => 1,
                ]));
            }
        }
    }

    private function deleteRepeatable($meeting_repeats)
    {
        // delete old data for upcoming meetings only that start date is greater than current date
        foreach ($meeting_repeats as $meeting_repeat) {
            if ($meeting_repeat->start_date < Carbon::now()) {
                $meeting_repeat->delete();
            }
        }
    }
}
