<?php

namespace App\Livewire\Component\MyProfile;

use App\Services\PhotoService;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotosOfAlbum extends Component
{
    use WithFileUploads;

    public $idAlbum;

    #[Validate('image|max:2048')] // 2MB Max
    public $newPhoto;
    public $bodyPhoto;

    public function mount($idAlbum)
    {
        $this->idAlbum = $idAlbum;
    }

    public function savePhoto(PhotoService $photoService)
    {
        $this->validate([
            'newPhoto' => 'image|max:2048', // 2MB Max
        ]);

        $request = new Request();
        $request->merge([
            'album_id' => $this->idAlbum,
            'body' => $this->bodyPhoto,
        ]);
        $photo = $photoService->savePhoto($request);

        $filename = '/'.$this->idAlbum.'/'.$photo->id. '.jpg';
        $this->newPhoto->storeAs('albums', $filename);

        $this->reset(['newPhoto', 'bodyPhoto']);

        $this->dispatch('updatePosts', 'photo saved');
    }

    public function backToAlbum()
    {
        $this->dispatch('changeSubMenu', valore: 4);
    }

    public function render(PhotoService $photoService)
    {
        return view('livewire.component.my-profile.photos-of-album', [
            'albumWithphotos' => $photoService->photosOfAlbum($this->idAlbum)
        ]);
    }
}
