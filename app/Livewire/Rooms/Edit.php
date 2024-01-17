<?php

namespace App\Livewire\Rooms;

use App\Models\Room;
use Livewire\Component;
use App\DTOs\Room\UpdateDTO;
use App\Services\RoomService;
use App\Http\Requests\Room\UpdateRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public Room $room;
    public bool $updateModal = false;
    private RoomService $roomService;

    public function boot(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function mount(Room $room)
    {
        $this->room = $room;
        $this->name = $room->name;
        $this->email = $room->email;
    }

    protected function rules(): array
    {
        return (new UpdateRequest())->rules($this->room->id);
    }

    public function toggleUpdateModal()
    {
        $this->updateModal = !$this->updateModal;
    }

    public function render()
    {
        return view('livewire.rooms.edit');
    }


    public function updateRoom()
    {
        $updateObj = UpdateDTO::from($this->validate());
        $this->roomService->update($updateObj, $this->room->id);
        $this->alert('success', 'Room updated successfully');
        session()->flash('success', 'Room updated successfully');
        return $this->redirect('/rooms', navigate: true);
    }

    public function cancel()
    {
        return $this->redirect('/rooms', navigate: true);
    }
}
