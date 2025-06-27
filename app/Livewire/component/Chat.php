<?php

namespace App\Livewire\Component;

use App\Services\MessageService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends Component
{

    public $messaggio = [];
    public $myFriends;
    public $chatCollapseStates = [];

    // Metodo di mount (o constructor) per inizializzare i messaggi
    public function mount(UserService $userService)
    {
        $this->loadCombinedMessages($userService);
        foreach ($this->myFriends as $user) {
            $this->chatCollapseStates[$user->id] = true; // true = aperto (classe 'show')
        }
    }

    public function loadCombinedMessages(UserService $userService)
    {
        $this->myFriends = $userService->myFriendsWithMessages(auth()->id());
    }

    #[On('inviaMessaggio')]
    public function inviaMessaggio($idReceived, MessageService $messageService, UserService $userService)
    {

        $request = new Request();
        $request->merge([
            'sender_id' => auth()->id(),
            'receiver_id' => $idReceived,
            'body' => $this->messaggio[$idReceived]
        ]);
        $messageService->insertMessage($request);
        $this->messaggio[$idReceived] = '';

        $this->loadCombinedMessages($userService);

        // Assicurati che la chat rimanga aperta dopo l'invio
        $this->chatCollapseStates[$idReceived] = true;
    }

    public function render()
    {
        return view('livewire.component.chat');
    }
}
