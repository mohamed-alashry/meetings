<?php

namespace App\Livewire\Meetings;

use App\Models\Room;
use App\Models\Invitee;
use App\Models\Meeting;
use Livewire\Component;
use App\DTOs\Meeting\CreateDTO;
use App\DTOs\Meeting\UpdateDTO;
use App\Services\MeetingService;
use Illuminate\Support\Collection;
use App\Http\Requests\Meeting\CreateRequest;
use App\Http\Requests\Meeting\UpdateRequest;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    private MeetingService $meetingService;

    public Meeting $meeting;
    public int $room_id;
    public string $title;
    public string $brief;
    public string $description;
    public string $minutes;
    public string $minutes_attach;
    public string $start_date;
    public string $start_time;
    public string $end_time;
    public int $repeatable;
    public int $person_capacity;
    public int $duration;
    public string $end_date;
    public int $status;
    public bool $openEditModal = false;
    public Collection $rooms;
    public Collection $roomFeatures;
    public array $selectedRoom;
    public Collection $invitees;
    public Collection $invitedUsers;
    public string $inviteeEmail;



    public function boot(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }

    protected function rules(): array
    {
        return (new UpdateRequest())->rules();
    }

    function mount(Meeting $meeting)
    {
        $this->meeting = $meeting;
        $this->status = $this->meeting->status;
        $this->start_date = $this->meeting->start_date;
        $this->start_time = $this->meeting->start_time;
        $this->end_time = $this->meeting->end_time;
        $this->person_capacity = $this->meeting->person_capacity;
        $this->room_id = $this->meeting->room_id;
        $this->title = $this->meeting->title;
        $this->brief = $this->meeting->brief;
        $this->repeatable = $this->meeting->repeatable;
        $this->duration = $this->meeting->duration;
        $this->minutes = $this->meeting->minutes ?? '';
        $this->minutes_attach = $this->meeting->minutes_attach ?? '';
        // $this->description = $this->meeting->description;
        // $this->end_date = $this->meeting->end_date;

        $this->inviteeEmail = '';
        $this->rooms = $this->meetingService->getRooms($this->start_date, $this->start_time);
        // append current room to rooms
        $this->rooms->prepend($this->meeting->room);
        $this->invitedUsers = $this->meeting->invitations->pluck('userable');
        $this->invitees = Invitee::whereNotIn('id', $this->invitedUsers->pluck('id'))->get();
        $this->roomFeatures = $this->meetingService->getRoomFeatures($this->room_id);
    }

    public function updated()
    {
        $this->roomFeatures = $this->meetingService->getRoomFeatures($this->room_id);
        $this->rooms = $this->meetingService->getRooms($this->start_date, $this->start_time);
        $this->rooms->prepend($this->meeting->room);
        $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))->get();
        $this->invitedUsers = Invitee::whereIn('id', $this->invitedUsers->pluck('id'))->get();
    }


    public function update($meetingId)
    {
        $validated = $this->validate();
        $validated['user_id'] = auth()->id();

        $this->meetingService->update(UpdateDTO::from($validated), $meetingId, $this->invitedUsers);

        session()->flash('success', 'Meeting updated successfully');

        $this->redirect(route('meetings.card_view'), true);
    }

    public function toggleEditModal()
    {
        $this->openEditModal = !$this->openEditModal;
    }

    public function addInvitee(Invitee $invitee)
    {
        $this->invitedUsers->push($invitee);
        $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))->get();
    }

    public function removeInvitee(Invitee $invitee)
    {
        // remove the invitee from the collection
        $this->invitedUsers->forget($this->invitedUsers->search($invitee));
        $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))->get();
    }

    public function cancleMeeting()
    {
        dd('cancle');
    }

    public function render()
    {

        return view('livewire.meetings.edit');
    }
}
