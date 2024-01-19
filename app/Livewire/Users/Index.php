<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use App\DTOs\User\FilterDTO;
use App\Services\UserService;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    public $user;
    public int $perPage = 10;
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
            'users' => $this->userService->list_with_pagination(FilterDTO::from([]), $this->perPage)
        ]);
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
