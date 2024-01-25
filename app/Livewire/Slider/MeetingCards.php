<?php

namespace App\Livewire\Slider;

use Livewire\Component;

class MeetingCards extends Component
{
    public $meetings;
    
    public function render()
    {
        return view('livewire.slider.meeting-cards');
    }
}
