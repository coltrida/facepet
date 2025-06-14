<?php

namespace App\Livewire\Component\MyProfile;

use App\Services\UserService;
use Livewire\Component;

class Connections extends Component
{

    public function removeFollower($idFollower, UserService $userService)
    {
        $userService->toggleFollower($idFollower);
    }

    public function removeFollowing($idFollower, UserService $userService)
    {
        $userService->toggleFollowing($idFollower);
    }

    public function render(UserService $userService)
    {
        return view('livewire.component.my-profile.connections', [
            'myLastFiveFriends' => $userService->myLastFiveFriends(auth()->id()),
            'myLastFiveFollowings' => $userService->myLastFiveFollowings(auth()->id()),
        ]);
    }
}
