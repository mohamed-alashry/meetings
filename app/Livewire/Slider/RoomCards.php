<?php

namespace App\Livewire\Slider;

use Livewire\Component;

class RoomCards extends Component
{
    public $rooms = [];

    public function mount()
    {
        if (count($this->rooms) == 0) {
            $this->rooms = \App\Models\Room::get();
        }
    }

    public function render()
    {
        return view('livewire.slider.room-cards');
    }
}
