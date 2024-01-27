<?php

namespace App\Livewire\Slider;

use App\Models\Room;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;

class RoomCards extends Component
{
    public Collection $rooms;
    public $room_id = 1;
    public string $start_date;
    public string $start_time;
    public int $person_capacity;
    public int $duration;
    public int $repeatable;



    public bool $openCreateModal = false;

    public function toggleCreateModal($room_id)
    {
        $this->dispatch('toggleCreateModal');
        $this->dispatch('changeRoom', $room_id);
        $this->dispatch('passFilters', $this->start_date, $this->start_time, $this->person_capacity, $this->duration, $this->repeatable);
    }

    public function mount()
    {
        $this->start_date = '';
        $this->start_time = '';
        $this->person_capacity = 1;
        $this->duration = 0;

        $this->rooms = Room::get();
    }
    #[On('updateRooms')]
    public function updated($rooms)
    {
        $this->rooms = Room::find(collect($rooms)->pluck('id')->toArray());
    }

    #[On('updateFilters')]
    public function updatedFilters($start_date, $start_time, $person_capacity, $duration, $repeatable)
    {
        $this->start_date = $start_date;
        $this->start_time = $start_time;
        $this->person_capacity = $person_capacity;
        $this->duration = $duration;
        $this->repeatable = $repeatable;
        $this->dispatch('passFilters', $this->start_date, $this->start_time, $this->person_capacity, $this->duration, $this->repeatable);
    }

    public function render()
    {
        return view('livewire.slider.room-cards');
    }
}
