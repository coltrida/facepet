<?php

namespace App\Livewire\Component;

use Livewire\Component;

class SearchNavBar extends Component
{
    public $search;

    public function eseguiRicerca()
    {
        $this->dispatch('eseguiRicerca', search: $this->search);
    }

    public function updatedSearch()
    {
        if (!$this->search){
            $this->dispatch('resetPosts');
        }
    }

    public function render()
    {
        return view('livewire.component.search-nav-bar');
    }
}
