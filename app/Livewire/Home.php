<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\MeetingService;
use Illuminate\Support\Collection;

class Home extends Component
{
    private MeetingService $meetingService;
    public string $start_date;
    public string $start_time;
    public string $end_time;
    public int $repeatable;
    public Collection $rooms;
    public array $times;

    public function boot(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }
    public function mount()
    {
        $this->start_date = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->repeatable = 1;
        $this->times = $this->meetingService->getTimesArray();
        $this->rooms = $this->meetingService->getRooms($this->start_date ?? null, $this->start_time ?? null);
    }
    public function updated()
    {
        $this->rooms = $this->meetingService->getRooms($this->start_date ?? null, $this->start_time ?? null,$this->end_time);
        $this->dispatch('updateRooms', $this->rooms);
        $this->dispatch('updateFilters', $this->start_date ?? null, $this->start_time ?? null, $this->end_time ?? null, $this->repeatable ?? null);
    }

    public function render()
    {
        return view('livewire.home');
    }
}
