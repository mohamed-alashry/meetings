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
    public array $selectedInvitees = [];




    public function boot(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }

    function mount(Meeting $meeting)
    {
        $this->meeting = $meeting;
        $this->minutes = $meeting->minutes ?? '';
        $this->invitees = $meeting->invitations->pluck('userable');
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

    public function shareMinutes()
    {
        $invitees = Invitee::whereIn('id', $this->selectedInvitees)->get();
        $this->meetingService->shareMinutes($invitees, $this->meeting);
        // redirect to meetings
        $this->redirect(route('meetings.card_view'), true);
    }

    public function selectAllToShare()
    {
        $this->selectedInvitees = $this->invitees->pluck('id')->toArray();
    }




    public function render()
    {
        return view('livewire.card');
    }
}
