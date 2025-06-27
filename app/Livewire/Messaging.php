<?php

namespace App\Livewire;

use Livewire\Component;

class Messaging extends Component
{
    public $idUser;

    public function mount($idUser)
    {
        $this->idUser = $idUser;
    }

    public function render()
    {
        return view('livewire.messaging');
    }
}
