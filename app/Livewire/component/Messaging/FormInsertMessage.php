<?php

namespace App\Livewire\Component\Messaging;

use App\Services\MessageService;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;

class FormInsertMessage extends Component
{
    public $testoMessaggio;
    public $receive_id;

    #[On('selectReceive')]
    public function selectReceive($receive_id)
    {
        $this->receive_id = $receive_id;
    }

    public function addMessage(MessageService $messageService)
    {
        if ($this->receive_id){
            $request = new Request();
            $request->merge([
                'sender_id' => auth()->id(),
                'receiver_id' => $this->receive_id,
                'body' => $this->testoMessaggio,
            ]);
            $messageService->insertMessage($request);
            $this->reset(['testoMessaggio']);
            $this->dispatch('ricaricaMessaggi');
        }

    }

    public function render()
    {
        return view('livewire.component.messaging.form-insert-message');
    }
}
