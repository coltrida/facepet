<?php

namespace App\Livewire\Component\MyProfile;

use App\Services\UserService;
use Livewire\Component;

class Connections extends Component
{
    public function render(UserService $userService)
    {
        return view('livewire.component.my-profile.connections', [
            'myLastFiveFriends' => $userService->myLastFiveFriends(auth()->id()),
            'myLastFiveFollowings' => $userService->myLastFiveFollowings(auth()->id()),
        ]);
    }
}
