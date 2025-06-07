<?php

namespace App\Livewire\Component\MyProfile;

use App\Services\PostService;
use Livewire\Component;

class MyPosts extends Component
{
    public $version;

    public function mount()
    {
        $this->version = now()->timestamp;
    }

    public function render(PostService $postService)
    {
        return view('livewire.component.my-profile.my-posts', [
            'myPosts' => $postService->myPostsWithComments(auth()->id())
        ]);
    }
}
