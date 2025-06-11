<?php

namespace App\Livewire;

use App\Events\LikePostEvent;
use App\Services\NotifyService;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    public $version;
    public $posts;
    public $fiveRandomUserToFollow;

    public function mount(PostService $postService, UserService $userService)
    {
        $this->version = now()->timestamp;
        $this->posts = $postService->listPost();
        $this->fiveRandomUserToFollow = $userService->fiveRandomUserToFollow(auth()->id());
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

    public function addLike($postId, NotifyService $notifyService, PostService $postService)
    {
        $request = new Request();
        $postWithUser = $postService->post($postId);
        $request->merge([
            'sender_id' => auth()->id(),
            'receiver_id' => $postWithUser->user_id,
            'post_id' => $postId,
            'read' => 0,
            'body' => 'A '.auth()->user()->username .' piace il tuo post'
        ]);

        $notify = $notifyService->createNotify($request);

        if ($notify){
            LikePostEvent::dispatch($postId);
        }
    }

    public function toggleFollower($idUser, UserService $userService)
    {
        $userService->toggleFollower($idUser);
        /*\Log::info('dopo salvataggio database: '. $this->fiveRandomUserToFollow->find($idUser)->follower);*/
    }

    public function render()
    {
        return view('livewire.home');
    }
}
