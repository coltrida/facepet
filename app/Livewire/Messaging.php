<?php

namespace App\Livewire;

use App\Services\UserService;
use Livewire\Component;

class Messaging extends Component
{
    public $idUser;

    public function mount($idUser)
    {

    }

    public function render(UserService $userService)
    {
        return view('livewire.messaging', [
            'myFriends' => $userService->myFriends(auth()->id())
        ]);
    }
}
