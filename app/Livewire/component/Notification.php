<?php

namespace App\Livewire\Component;

use App\Services\NotifyService;
use App\Services\UserService;
use Livewire\Attributes\On;
use Livewire\Component;

class Notification extends Component
{
    public $newNotificationUnread;
    public $myNotifies;

    public function mount(UserService $userService, NotifyService $notifyService)
    {
        $this->newNotificationUnread = $userService->leggiSeCiSonoNuoveNotifiche(auth()->id());
        $this->myNotifies = $notifyService->myLastNotify(auth()->id());
    }

    #[On('echo:like-channel,LikePostEvent')]
    public function gestioneNuovaNotifica(UserService $userService, NotifyService $notifyService)
    {
        $this->newNotificationUnread = true;
        $userService->arrivataNuovaNotifica(auth()->id(), 1);
        $this->myNotifies = $notifyService->myLastNotify(auth()->id());
    }

    public function readNotifications(UserService $userService)
    {
        $this->newNotificationUnread = false;
        $userService->arrivataNuovaNotifica(auth()->id(), 0);
    }

    public function render()
    {
        return view('livewire.component.notification');
    }
}
