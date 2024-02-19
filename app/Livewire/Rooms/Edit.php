<?php

namespace App\Livewire\Rooms;

use App\Models\Room;
use Livewire\Component;
use App\DTOs\Room\UpdateDTO;
use App\Services\RoomService;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Room\UpdateRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert, WithFileUploads;
    public $name;
    public $location;
    public $google_location;
    public $capacity;
    public $photos = [];
    public Room $room;
    public bool $updateModal = false;
    private RoomService $roomService;
    public $features;
    public $more_features = [];
    public $attachment;

    public function boot(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function mount(Room $room)
    {
        $this->room = $room->load('media');
        $this->name = $room->name;
        $this->location = $room->location;
        $this->google_location = $room->google_location;
        $this->capacity = $room->capacity;
        // $this->attachment = $room->attachment;
        $this->features = $room->features->pluck('value', 'name')->toArray();
        foreach ($room->properties as $item) {
            $this->more_features[] = [
                'key' => $item->key,
                'value' => $item->value
            ];
        }
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

    public function deletePhoto($photo_id)
    {
        $this->room->media()->where('id', $photo_id)->delete();
        $this->alert('success', 'Photo deleted successfully');
    }

    public function deleteTempPhoto($index)
    {
        unset($this->photos[$index]);
        $this->alert('success', 'Photo deleted successfully');
    }

    public function cancel()
    {
        return $this->redirect('/rooms', navigate: true);
    }

    public function deleteFeatures($id)
    {
        unset($this->more_features[$id]);
    }

    public function addMoreFeatures()
    {
        $this->more_features[] = [];
    }
}
