<?php

namespace App\Livewire\Rooms;

use App\Models\Room;
use Livewire\Component;
use App\DTOs\Room\FilterDTO;
use App\Services\RoomService;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    public $room;
    public int $perPage = 10;
    public bool $createModal = false;
    public bool $updateModal = false;
    private RoomService $roomService;

    public function boot(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function render()
    {
        return view('livewire.rooms.index', [
            'rooms' => $this->roomService->list_with_pagination(FilterDTO::from($this->all()), $this->perPage),
            'permissions' => auth()->user()->permissions->pluck('name')->toArray(),
        ]);
    }

    public function toggleUpdateModal()
    {
        $this->updateModal = !$this->updateModal;
    }

    public function editRoom(Room $room)
    {
        $this->room = $room;
        $this->toggleUpdateModal();
    }

    public function deleteRoom($room_id)
    {
        $this->roomService->delete($room_id);
        $this->alert('success', 'Room deleted successfully');
        session()->flash('success', 'Room deleted successfully');
        return $this->redirect('/rooms', navigate: true);
    }
}
