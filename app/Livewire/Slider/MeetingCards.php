<?php

namespace App\Livewire\Slider;

use Livewire\Component;

class MeetingCards extends Component
{
    public $meetings = [];
    public bool $openViewModal = false;
    public function mount()
    {
        if (count($this->meetings) == 0) {
            $this->meetings = \App\Models\Meeting::whereDate('start_date', '>=', now())
                ->orderBy('start_date')
                ->orderBy('start_time')->get();
        }
    }

    public function toggleViewModal()
    {
        $this->openViewModal = !$this->openViewModal;
        // dd($this->openViewModal);
    }

    public function render()
    {
        return view('livewire.slider.meeting-cards');
    }
}
