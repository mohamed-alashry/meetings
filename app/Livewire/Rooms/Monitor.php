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
    // public $rooms = [];
    public $permissions = [];
    public $start_date;
    public $inputs = [];
    private RoomService $roomService;

    public function boot(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function updatedStartDate($value)
    {
        $this->start_date = $value;
        $this->inputs['meetings_start_date'] = $value;
        // $rooms = $this->roomService->monitor(FilterDTO::from($this->inputs));
        // dd($this->inputs);
        // $this->rooms = $this->roomService->monitor(FilterDTO::from($this->inputs));
        $this->render();
    }

    public function updatedRoomId($value)
    {
        $this->room_id = $value;
        $this->inputs['id'] = $value == 'all' ? null : $value;
        // $this->rooms = $this->roomService->monitor(FilterDTO::from($this->inputs));
        $this->render();
    }

    public function mount()
    {
        $this->start_date = date('Y-m-d');
        if (count($this->select_rooms) == 0) {
            $this->select_rooms = Room::all();
        }
        if (count($this->inputs) == 0) {
            // $this->inputs = [
            //     'meetings_start_date' => null,
            //     'id' => null
            // ];
        }
        // $this->rooms = $this->roomService->monitor(FilterDTO::from($this->inputs));
        $this->permissions = auth()->user()->permissions->pluck('name')->toArray();
    }


    public function render()
    {
        return view('livewire.rooms.monitor', [
            'rooms' => $this->roomService->monitor(FilterDTO::from($this->inputs))
        ]);
    }
}
