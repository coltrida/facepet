<?php

namespace App\Livewire\Component;

use App\Models\User;
use App\Services\NotifyService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On; // Importa questo per l'attributo, anche se non lo useremo per questo specifico listener

class Notification extends Component
{
    public $newNotificationUnread;
    public $myNotifies;

    // USA QUESTO METODO PER I LISTENER DINAMICI
    public function getListeners()
    {
        if (Auth::check()) {
            return [
                'echo-private:user.' . Auth::id() . ',LikePostEvent' => 'gestioneNuovaNotifica',
                'echo-private:user.' . Auth::id() . ',AddNewFollowerEvent' => 'gestioneNuovaNotifica',
            ];
        }
        return []; // Restituisce un array vuoto se l'utente non è autenticato
    }

    public function mount(UserService $userService, NotifyService $notifyService)
    {
        $this->newNotificationUnread = $userService->leggiSeCiSonoNuoveNotifiche(Auth::id()); // Usa Auth::id()
        $this->myNotifies = $notifyService->myLastNotify(Auth::id()); // Usa Auth::id()
    }

    public function gestioneNuovaNotifica(UserService $userService, NotifyService $notifyService)
    {
        $this->newNotificationUnread = true;
        $userService->arrivataNuovaNotifica(Auth::id(), 1);
        $this->myNotifies = $notifyService->myLastNotify(Auth::id());
    //    $this->dispatch('refreshNotifications'); // Esempio: dispatch un evento per riaggiornare la UI
    }

    public function readAllNotifications(UserService $userService, NotifyService $notifyService)
    {
        $this->newNotificationUnread = false;
        $userService->arrivataNuovaNotifica(Auth::id(), 0);
        $notifyService->readAllNotifications(Auth::id());
        $this->myNotifies->each(function ($notify) {
            $notify->read = 1;
        });
    }

    public function readNotify($idNotify, NotifyService $notifyService)
    {
        $notifyService->readNotify($idNotify);
    }

    public function render()
    {
        return view('livewire.component.notification');
    }
}
