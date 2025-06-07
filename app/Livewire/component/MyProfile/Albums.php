<?php

namespace App\Livewire\Component\MyProfile;

use App\Services\AlbumService;
use Livewire\Component;

class Albums extends Component
{
    public function render(AlbumService $albumService)
    {
        return view('livewire.component.my-profile.albums', [
            'myAlbums' => $albumService->myAlbums(auth()->id())
        ]);
    }
}
