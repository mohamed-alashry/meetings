<?php

namespace App\Livewire\Slider;

use Livewire\Component;
use Livewire\Attributes\On;

class MeetingCards extends Component
{
    public $meetings = [];
    public $start_date;
    public $room_id;

    public function mount($meetings = [])
    {
        $this->meetings = $meetings;
        // $this->getMeetings();
    }

    // #[On('meetings-filtered')]
    // public function refreshMeetings($data)
    // {
    //     $this->start_date = $data['start_date'];
    //     $this->room_id = $data['room_id'];
    //     $this->getMeetings();

    //     $this->render();
    // }

    // public function getMeetings()
    // {
    //     if (!$this->start_date) {
    //         $this->start_date = now();
    //     }

    //     $query = \App\Models\Meeting::query();

    //     if ($this->room_id) {
    //         $query->where('room_id', $this->room_id);
    //     }

    //     $this->meetings = $query->whereDate('start_date', '>=', $this->start_date)
    //         ->orderBy('start_date')
    //         ->orderBy('start_time')
    //         ->limit(15)
    //         ->get();
    // }

    public function render()
    {
        return view('livewire.slider.meeting-cards');
    }
}
