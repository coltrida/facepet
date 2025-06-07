<?php

namespace App\Livewire\Component;

use App\Services\UserService;
use Livewire\Attributes\On;
use Livewire\Component;

class Notification extends Component
{
    public $newNotificationUnread;

    public function mount(UserService $userService)
    {
        $this->newNotificationUnread = $userService->leggiSeCiSonoNuoveNotifiche(auth()->id());
    }

    #[On('echo:like-channel,LikePostEvent')]
    public function gestioneNuovaNotifica(UserService $userService)
    {
        $this->newNotificationUnread = true;
        $userService->arrivataNuovaNotifica(auth()->id(), 1);
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
