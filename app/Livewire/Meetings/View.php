<?php

namespace App\Livewire\Meetings;

use App\Models\Room;
use App\Models\Invitee;
use App\Models\Meeting;
use Livewire\Component;
use Livewire\Attributes\On;
use App\DTOs\Meeting\CreateDTO;
use App\Services\MeetingService;
use Illuminate\Support\Collection;

use function Laravel\Prompts\alert;
use App\Http\Requests\Meeting\CreateRequest;

class View extends Component
{
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




    public function boot(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }

    protected function rules(): array
    {
        return (new CreateRequest())->rules();
    }

    function mount(Meeting $meeting)
    {
        $this->meeting = $meeting;

        $this->status = 1;
        $this->room_id = 1;
        $this->start_date = '';
        $this->start_time = '';
        $this->inviteeEmail = '';
        $this->rooms = $this->meetingService->getRooms($this->start_date, $this->start_time);
        $this->invitees = Invitee::all();
        $this->invitedUsers = collect();
        $this->roomFeatures = $this->meetingService->getRoomFeatures($this->room_id);
    }

    public function updated()
    {
        $this->roomFeatures = $this->meetingService->getRoomFeatures($this->room_id);
        $this->rooms = $this->meetingService->getRooms($this->start_date, $this->start_time);
        $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))->get();
        $this->invitedUsers = Invitee::whereIn('id', $this->invitedUsers->pluck('id'))->get();
    }


    public function store()
    {
        $validated = $this->validate();
        $validated['user_id'] = auth()->id();

        $this->meetingService->create(CreateDTO::from($validated), $this->invitedUsers);

        session()->flash('success', 'Meeting booked successfully');

        $this->redirect(route('meetings.card_view'), true);
    }

    public function toggleViewModal()
    {
        $this->openViewModal = !$this->openViewModal;
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


    public function render()
    {
        return view('livewire.meetings.view');
    }
}
