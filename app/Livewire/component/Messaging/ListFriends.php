<?php

namespace App\Livewire\Component\Messaging;

use App\Services\UserService;
use Livewire\Component;

class ListFriends extends Component
{
    public $idUser;

    public function mount($idUser = null)
    {
        $this->idUser = $idUser;
    }

    public function render(UserService $userService)
    {
        return view('livewire.component.messaging.list-friends', [
            'myFriends' => $userService->myFriendsWithMessages($this->idUser)
        ]);
    }
}
