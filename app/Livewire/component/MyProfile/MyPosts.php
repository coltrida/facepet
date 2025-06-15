<?php

namespace App\Livewire\Component\MyProfile;

use App\Services\PostService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MyPosts extends Component
{
    public $version;

    public function mount()
    {
        $this->version = now()->timestamp;
    }

    public function eliminaPost($idPost, PostService $postService)
    {
        if (Storage::disk('public')->exists('/posts/'.$idPost.'.jpg')){
            Storage::disk('public')->delete('/posts/'.$idPost.'.jpg');
        }
        $postService->deletePost($idPost);
        $this->dispatch('postDeleted', 'post deleted');
    }

    public function render(PostService $postService)
    {
        return view('livewire.component.my-profile.my-posts', [
            'myPosts' => $postService->myPostsWithComments(auth()->id())
        ]);
    }
}
