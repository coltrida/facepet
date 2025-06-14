<?php

namespace App\Livewire\Component\MyProfile;

use App\Services\AlbumService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Albums extends Component
{

    public $nameAlbum;

    public function saveAlbum(AlbumService $albumService)
    {
        $request = new Request();
        $request->merge([
            'user_id' => auth()->id(),
            'title' => $this->nameAlbum
        ]);
        $album = $albumService->saveAlbum($request);
        Storage::disk('public')->makeDirectory('/albums/'.$album->id);

        $this->dispatch('updatePosts', 'Album saved');
    }

    public function render(AlbumService $albumService)
    {
        return view('livewire.component.my-profile.albums', [
            'myAlbums' => $albumService->myAlbums(auth()->id())
        ]);
    }
}
