<?php

namespace App\Livewire;

use App\Services\NotifyService;
use App\Services\UserService;
use Livewire\Component;

class AllNotifications extends Component
{

    public function readNotify($idNotify, NotifyService $notifyService, UserService $userService)
    {
        $notifyService->readNotify($idNotify);
        $esisteUnaNotificaNonLetta = $notifyService->controllaSeEsisteNotificaNonLetta(auth()->id());
        if (!$esisteUnaNotificaNonLetta) {
            $userService->arrivataNuovaNotifica(auth()->id(), 0);
        }
    }

    public function deleteNotify($idNotify, NotifyService $notifyService)
    {
        $notifyService->deleteNotify($idNotify);
        $this->dispatch('deleteNotify', 'Notify deleted');
    }

    public function render(NotifyService $notifyService)
    {
        return view('livewire.all-notifications', [
            'allMyNotification' => $notifyService->allMyNotifications(auth()->id())
        ]);
    }
}
