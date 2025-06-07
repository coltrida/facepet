<?php

namespace App\Livewire;

use App\Events\LikePostEvent;
use App\Services\PostService;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    public $version;
    public $posts;

    public function mount(PostService $postService)
    {
        $this->version = now()->timestamp;
        $this->posts = $postService->listPost();
    }

    #[On('updateMyPic')]
    public function updateMyPic()
    {
        // aggiorna la versione per forzare il refresh
        $this->version = now()->timestamp;
    }

    #[On('updatePosts')]
    public function updatePost(PostService $postService)
    {
        $this->posts = $postService->listPost();
    }

    public function addLike($postId)
    {
        LikePostEvent::dispatch($postId);
    }

    public function render()
    {
        return view('livewire.home');
    }
}
