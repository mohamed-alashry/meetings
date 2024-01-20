<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use App\DTOs\User\UpdateDTO;
use App\Services\UserService;
use App\Http\Requests\User\UpdateRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $password;
    public $role_name;
    public $password_confirmation;
    public User $user;
    public bool $updateModal = false;
    private UserService $userService;
    public $permissions = [];
    public $user_permissions = [];

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_name = $user->role_name;
        foreach ($user->permissions->pluck('name')->toArray() as $permission_name) {
            $this->permissions[$permission_name] = true;
        }
    }

    protected function rules(): array
    {
        return (new UpdateRequest())->rules($this->user->id);
    }

    public function toggleUpdateModal()
    {
        $this->updateModal = !$this->updateModal;
    }

    public function render()
    {
        return view('livewire.users.edit');
    }


    public function updateUser()
    {
        $updateObj = UpdateDTO::from($this->validate());
        $this->userService->update($updateObj, $this->user->id);
        $this->alert('success', 'User updated successfully');
        session()->flash('success', 'User updated successfully');
        return $this->redirect('/users', navigate: true);
    }

    public function cancel()
    {
        return $this->redirect('/users', navigate: true);
    }
}
