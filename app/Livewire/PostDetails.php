<?php

namespace App\Livewire;

use App\Models\Post;
use App\Services\PostService;
use Livewire\Component;

class PostDetails extends Component
{
    public Post $post;

    public function mount($idPost, PostService $postService)
    {
        $this->post = $postService->postWithComments($idPost);
    }

    public function render()
    {
        return view('livewire.post-details');
    }
}
