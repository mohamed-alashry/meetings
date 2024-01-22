<?php

namespace App\Livewire\Rooms;

use Livewire\Component;
use App\DTOs\Room\FilterDTO;
use App\Models\Room;
use App\Services\RoomService;
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

    public function updatedRoomId($value)
    {
        $this->inputs['id'] = null;
        if ($value != 'all') {
            $this->inputs['id'] = $value;
        }
        $this->rooms = $this->roomService->monitor(FilterDTO::from($this->inputs));
    }

    public function updatedStartDate($value)
    {
        $this->inputs['meetings_start_date'] = null;
        if ($value) {
            $this->inputs['meetings_start_date'] = $value;
        }
        $this->rooms = $this->roomService->monitor(FilterDTO::from($this->inputs));
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
        return view('livewire.rooms.monitor', []);
    }
}
