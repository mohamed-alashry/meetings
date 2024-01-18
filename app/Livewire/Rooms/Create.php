<?php

namespace App\Livewire\Rooms;

use Livewire\Component;
use App\DTOs\Room\CreateDTO;
use App\Services\RoomService;
use App\Http\Requests\Room\CreateRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert, WithFileUploads;
    public bool $createModal = false;
    public $name;
    public $location;
    public $google_location;
    public $capacity;
    public $features;

    // #[Validate(['photos.*' => 'image|max:1024'])]
    public $photos = [];

    private RoomService $roomService;

    public function boot(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function mount(){

        $this->features = config('features');
    }
    
    protected function rules(): array
    {
        return (new CreateRequest())->rules();
    }

    public function toggleCreateModal()
    {
        $this->createModal = !$this->createModal;
    }
    public function render()
    {
        return view('livewire.rooms.create');
    }

    public function addRoom()
    {
        $inputs = CreateDTO::from($this->validate());
        $this->roomService->create($inputs);
        $this->alert('success', 'Room created successfully');
        session()->flash('success', 'Room created successfully');
        return $this->redirect('/rooms', navigate: true);
    }

    public function cancel()
    {
        return $this->redirect('/rooms', navigate: true);
    }

    public function deleteTempPhoto($index)
    {
        unset($this->photos[$index]);
        $this->alert('success', 'Photo deleted successfully');
    }
}
