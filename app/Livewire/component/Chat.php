<?php

namespace App\Livewire\Component;

use App\Services\UserService;
use Livewire\Component;

class Chat extends Component
{
    public function render(UserService $userService)
    {
        return view('livewire.component.chat', [
            'myFriends' => $userService->myFriends(auth()->id())
        ]);
    }
}
