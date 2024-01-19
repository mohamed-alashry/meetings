<?php

namespace App\Livewire\Invitees;

use App\Models\Invitee;
use Livewire\Component;
use App\DTOs\Invitee\UpdateDTO;
use App\Services\InviteeService;
use App\Http\Requests\Invitee\UpdateRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public Invitee $invitee;
    public bool $updateModal = false;
    private InviteeService $inviteeService;

    public function boot(InviteeService $inviteeService)
    {
        $this->inviteeService = $inviteeService;
    }

    public function mount(Invitee $invitee)
    {
        $this->invitee = $invitee;
        $this->name = $invitee->name;
        $this->email = $invitee->email;
    }

    protected function rules(): array
    {
        return (new UpdateRequest())->rules($this->invitee->id);
    }

    public function toggleUpdateModal()
    {
        $this->updateModal = !$this->updateModal;
    }

    public function render()
    {
        return view('livewire.invitees.edit');
    }


    public function updateInvitee()
    {
        $updateObj = UpdateDTO::from($this->validate());
        $this->inviteeService->update($updateObj, $this->invitee->id);
        $this->alert('success', 'Invitee updated successfully');
        session()->flash('success', 'Invitee updated successfully');
        return $this->redirect('/invitees', navigate: true);
    }

    public function cancel()
    {
        return $this->redirect('/invitees', navigate: true);
    }
}
