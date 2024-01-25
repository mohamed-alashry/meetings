<?php

namespace App\Livewire\Rooms;

use App\Models\Room;
use Livewire\Component;
use App\DTOs\Room\FilterDTO;
use App\Services\RoomService;
use App\Livewire\Slider\MeetingCards;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Monitor extends Component
{
    use LivewireAlert;
    public $room_id;
    public $select_rooms = [];
    public $rooms = [];
    public $permissions = [];
    public $start_date;
    public $inputs = [];
    private RoomService $roomService;

    public function boot(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function updated($propertyName, $value)
    {
        if (in_array($propertyName, ['room_id', 'start_date'])) {
            // $this->dispatch('meetings-filtered', ['start_date' => $this->start_date, 'room_id' => $this->room_id])->to(MeetingCards::class);
            $this->inputs = [
                'meetings_start_date' => $this->start_date,
                'id' => $this->room_id == 'all' ? null : $this->room_id,
            ];
            $this->rooms = $this->roomService->monitor(FilterDTO::from($this->inputs));
            $this->render();
        }
    }

    public function mount()
    {
        $this->start_date = date('Y-m-d');
        $this->select_rooms = Room::all();
        $this->inputs = [
            'meetings_start_date' => date('Y-m-d'),
            'id' => null
        ];
        $this->rooms = $this->roomService->monitor(FilterDTO::from($this->inputs));
        $this->permissions = auth()->user()->permissions->pluck('name')->toArray();
    }


    public function render()
    {
        return view('livewire.rooms.monitor');
    }
}
