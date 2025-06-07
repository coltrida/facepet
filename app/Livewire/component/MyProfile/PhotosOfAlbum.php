<?php

namespace App\Livewire\Component\MyProfile;

use App\Services\PhotoService;
use Livewire\Component;

class PhotosOfAlbum extends Component
{
    public $idAlbum;

    public function mount($idAlbum)
    {
        $this->idAlbum = $idAlbum;
    }

    public function render(PhotoService $photoService)
    {
        return view('livewire.component.my-profile.photos-of-album', [
            'albumWithphotos' => $photoService->photosOfAlbum($this->idAlbum)
        ]);
    }
}
