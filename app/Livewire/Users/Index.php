<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\UserService;
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
    private UserService $userService;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

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
        $this->toggleUpdateModal();
    }
    
    public function deleteUser($user_id)
    {
        $this->userService->delete($user_id);
        $this->alert('success', 'User deleted successfully');
        session()->flash('success', 'User deleted successfully');
        return $this->redirect('/users', navigate: true);
    }
}
