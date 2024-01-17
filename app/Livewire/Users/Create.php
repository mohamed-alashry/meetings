<?php

namespace App\Livewire\Users;

use Livewire\Component;

class Create extends Component
{
    public bool $createModal = false;



    
    public function toggleCreateModal()
    {
        $this->createModal = !$this->createModal;
    }

    public function render()
    {
        return view('livewire.users.create');
    }

}
