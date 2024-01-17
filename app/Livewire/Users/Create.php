<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\DTOs\User\CreateDTO;
use App\Livewire\Users\Index;
use App\Services\UserService;
use App\Http\Requests\User\CreateRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    public bool $createModal = false;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    private UserService $userService;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
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
        return view('livewire.users.create');
    }


    public function addUser()
    {
        $inputs = $this->validate();
        $cre = new CreateDTO();
        $cre->name = $inputs['name'];
        $cre->email = $inputs['email'];
        $cre->password = $inputs['password'];
        $this->userService->create($cre);
        $this->alert('success', 'User created successfully');
        session()->flash('success', 'User created successfully');
        return $this->redirect('/users', navigate: true);
    }

    public function cancel()
    {
        return $this->redirect('/users', navigate: true);
    }
}
