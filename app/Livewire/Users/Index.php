<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use App\Livewire\Forms\UserForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    public UserForm $form;
    public $user;
    public $users;
    public bool $createModal = false;
    public bool $updateModal = false;

    public function render()
    {
        return view('livewire.users.index', [
            'users' => $this->form->list_with_pagination(10)
        ]);
    }



    public function addUser()
    {
        $this->form->store();
        $this->createModal = false;
        $this->render();
        $this->alert('success', 'User Added Successfully');
    }

    public function toggleUpdateModal()
    {
        $this->updateModal = !$this->updateModal;
    }

    public function editUser(User $user)
    {
        $this->user = $user;
        $this->form->setUser($user);
        $this->toggleUpdateModal();
    }

    public function updateUser()
    {
        $this->form->update();
        $this->updateModal = false;
        $this->render();
        $this->alert('success', 'User Updated Successfully');
    }

}
