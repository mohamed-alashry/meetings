<?php

namespace App\Livewire\Meetings;

use App\Models\Room;
use App\Models\Invitee;
use App\Models\Meeting;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\DTOs\Meeting\CreateDTO;
use App\Services\MeetingService;

use Illuminate\Support\Collection;

class Card extends Component
{
    use WithFileUploads;
    private MeetingService $meetingService;

    public Meeting $meeting;
    public int $room_id;
    public string $title;
    public string $brief;
    public string $description;
    public string $start_date;
    public string $start_time;
    public int $repeatable;
    public int $person_capacity;
    public int $duration;
    public string $end_time;
    public int $status;
    public bool $openViewModal = false;
    public Collection $rooms;
    public Collection $roomFeatures;
    public array $selectedRoom;
    public Collection $invitees;
    public Collection $invitedUsers;
    public string $inviteeEmail;

    public bool $edit_minutes = false;
    public string $minutes;
    public $minutes_attach;




    public function boot(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }

    function mount(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }


    public function toggleViewModal()
    {
        $this->openViewModal = !$this->openViewModal;
    }

    public function editMinutes()
    {
        $this->edit_minutes = !$this->edit_minutes;
    }

    public function closeEditMinutes()
    {
        $this->edit_minutes = !$this->edit_minutes;
        $this->meeting->update([
            'minutes' => $this->minutes,
            'minutes_attach' => $this->minutes_attach
        ]);
    }

    // public function addInvitee(Invitee $invitee)
    // {
    //     $this->invitedUsers->push($invitee);
    //     $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))->get();
    // }

    // public function removeInvitee(Invitee $invitee)
    // {
    //     // remove the invitee from the collection
    //     $this->invitedUsers->forget($this->invitedUsers->search($invitee));
    //     $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))->get();
    // }




    public function render()
    {
        return view('livewire.card');
    }
}
