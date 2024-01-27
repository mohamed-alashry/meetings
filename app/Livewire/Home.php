<?php

namespace App\Livewire;

use App\Livewire\Slider\RoomCards;
use Livewire\Component;
use App\Services\MeetingService;
use Illuminate\Support\Collection;

class Home extends Component
{
    private MeetingService $meetingService;
    public string $start_date;
    public string $start_time;
    public int $duration;
    public int $repeatable;
    public int $person_capacity;
    public Collection $rooms;

    public function boot(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }
    public function mount()
    {
        $this->start_date = '';
        $this->start_time = '';
        $this->person_capacity = 1;
        $this->duration = 0;
        $this->repeatable = 1;

        $this->rooms = $this->meetingService->getRooms($this->start_date, $this->start_time, $this->person_capacity);
    }
    public function updated()
    {
        $this->rooms = $this->meetingService->getRooms($this->start_date, $this->start_time, $this->person_capacity);
        $this->dispatch('updateRooms', $this->rooms);
        $this->dispatch('updateFilters', $this->start_date, $this->start_time, $this->person_capacity, $this->duration, $this->repeatable);

    }

    public function render()
    {
        return view('livewire.home');
    }
}
