<?php

namespace App\Livewire\Meetings;

use App\Models\Room;
use Livewire\Component;
use App\DTOs\Meeting\CreateDTO;
use App\Services\MeetingService;
use Illuminate\Support\Collection;
use App\Http\Requests\Meeting\CreateRequest;

class Create extends Component
{
    private MeetingService $meetingService;

    public int $room_id;
    public string $title;
    public string $brief;
    public string $description;
    public string $start_date;
    public string $start_time;
    public int $repeatable;
    public int $person_capacity;
    public int $duration;
    public string $end_date;
    public int $status;
    public bool $openCreateModal = false;
    public Collection $rooms;
    public Collection $roomFeatures;
    public array $selectedRoom;



    public function boot(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }

    protected function rules(): array
    {
        return (new CreateRequest())->rules();
    }

    function mount()
    {
        $this->status = 1;
        $this->room_id = 1;
        $this->rooms = $this->meetingService->getRooms();
        $this->roomFeatures = $this->meetingService->getRoomFeatures($this->room_id);
    }

    public function updatedRoomId()
    {
        $this->roomFeatures = $this->meetingService->getRoomFeatures($this->room_id);
    }


    public function store()
    {
        $validated = $this->validate();
        $validated['user_id'] = auth()->id();

        $this->meetingService->create(CreateDTO::from($validated));

        session()->flash('success', 'Meeting booked successfully');

        $this->redirect(route('meetings.calendar'), true);
    }

    public function toggleCreateModal()
    {
        $this->openCreateModal = !$this->openCreateModal;
    }

    public function render()
    {

        return view('livewire.meetings.create');
    }
}
