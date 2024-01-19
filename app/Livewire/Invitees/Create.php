<?php

namespace App\Livewire\Invitees;

use Livewire\Component;
use App\DTOs\Invitee\CreateDTO;
use App\Services\InviteeService;
use App\Http\Requests\Invitee\CreateRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    public bool $createModal = false;
    public $name;
    public $email;
    private InviteeService $inviteeService;

    public function boot(InviteeService $inviteeService)
    {
        $this->inviteeService = $inviteeService;
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
        return view('livewire.invitees.create');
    }


    public function addInvitee()
    {
        $inputs = CreateDTO::from($this->validate());
        $this->inviteeService->create($inputs);
        $this->alert('success', 'Invitee created successfully');
        session()->flash('success', 'Invitee created successfully');
        return $this->redirect('/invitees', navigate: true);
    }

    public function cancel()
    {
        return $this->redirect('/invitees', navigate: true);
    }
}
