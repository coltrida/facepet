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
        // Assicurati che l'utente sia autenticato prima di creare il listener
        if (Auth::check()) {
            return [
                // 'echo-private:channel-name,EventName' => 'methodToCall'
                // Questa è la sintassi corretta per un canale privato dinamico
                'echo-private:user.' . Auth::id() . ',LikePostEvent' => 'gestioneNuovaNotifica',
            ];
        }
        return []; // Restituisce un array vuoto se l'utente non è autenticato
    }

    public function mount(UserService $userService, NotifyService $notifyService)
    {
        $this->newNotificationUnread = $userService->leggiSeCiSonoNuoveNotifiche(Auth::id()); // Usa Auth::id()
        $this->myNotifies = $notifyService->myLastNotify(Auth::id()); // Usa Auth::id()
    }

    // Rimuovi o commenta l'attributo #[On] qui per questo specifico listener
    // #[On('user.{user.id}')] // <-- Rimuovi o commenta questa riga!
    public function gestioneNuovaNotifica(UserService $userService, NotifyService $notifyService)
    {
        $this->newNotificationUnread = true;
        $userService->arrivataNuovaNotifica(Auth::id(), 1);
        $this->myNotifies = $notifyService->myLastNotify(Auth::id());
        $this->dispatch('refreshNotifications'); // Esempio: dispatch un evento per riaggiornare la UI
    }

    public function readNotifications(UserService $userService)
    {
        $this->newNotificationUnread = false;
        $userService->arrivataNuovaNotifica(Auth::id(), 0);
    }

    public function render()
    {
        return view('livewire.component.notification');
    }
}
