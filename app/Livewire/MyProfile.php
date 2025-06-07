<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class MyProfile extends Component
{
    public $subMenu = 1;
    public $idAlbum;

    #[On('changeSubMenu')]
    public function changeMenu($valore)
    {
        $this->subMenu = $valore;
    }

    #[On('selectAlbum')]
    public function selectAlbum($idAlbum)
    {
        $this->idAlbum = $idAlbum;
        $this->subMenu = 5;
    }

    public function render()
    {
        return view('livewire.my-profile');
    }
}
