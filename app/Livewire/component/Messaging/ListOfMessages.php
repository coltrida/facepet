<?php

namespace App\Livewire\Component\Messaging;

use App\Services\UserService;
use Livewire\Attributes\On;
use Livewire\Component;

class ListOfMessages extends Component
{
    public $idUser;
    public $myFriends;

    public function mount($idUser, UserService $userService)
    {
        $this->idUser = $idUser;
        $this->caricaMessaggi($userService);
    }

    #[On('ricaricaMessaggi')]
    public function caricaMessaggi(UserService $userService)
    {
        $this->myFriends = $userService->myFriendsWithMessages($this->idUser);
    }

    public function render()
    {
        return view('livewire.component.messaging.list-of-messages');
    }
}
