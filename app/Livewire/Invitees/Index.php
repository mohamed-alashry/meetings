<?php

namespace App\Livewire\Invitees;

use App\Models\Invitee;
use Livewire\Component;
use App\DTOs\Invitee\FilterDTO;
use App\Services\InviteeService;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    public $invitee;
    public int $perPage = 10;
    public bool $createModal = false;
    public bool $updateModal = false;
    private InviteeService $inviteeService;

    public function boot(InviteeService $inviteeService)
    {
        $this->inviteeService = $inviteeService;
    }

    public function render()
    {
        return view('livewire.invitees.index', [
            'invitees' => $this->inviteeService->list_with_pagination(FilterDTO::from($this->all()), $this->perPage),
            'permissions' => auth()->user()->permissions->pluck('name')->toArray(),
        ]);
    }

    public function toggleUpdateModal()
    {
        $this->updateModal = !$this->updateModal;
    }

    public function editInvitee(Invitee $invitee)
    {
        $this->invitee = $invitee;
        $this->toggleUpdateModal();
    }

    public function deleteInvitee($invitee_id)
    {
        $this->inviteeService->delete($invitee_id);
        $this->alert('success', 'Invitee deleted successfully');
        session()->flash('success', 'Invitee deleted successfully');
        return $this->redirect('/invitees', navigate: true);
    }
}
