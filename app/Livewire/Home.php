<?php

namespace App\Livewire;

use App\Events\AddNewFollowerEvent;
use App\Events\LikePostEvent;
use App\Services\NotifyService;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    public $version;
    public $posts;
    public $fiveRandomUserToFollow;
    public $myLatestFiveFollower;
    public $commentPost;

    // USA QUESTO METODO PER I LISTENER DINAMICI
    public function getListeners()
    {
        if (Auth::check()) {
            return [
                'echo-private:user.' . Auth::id() . ',AddNewFollowerEvent' => 'gestioneNuovoFollower',
            ];
        }
        return []; // Restituisce un array vuoto se l'utente non è autenticato
    }


    public function mount(PostService $postService, UserService $userService)
    {
        $this->version = now()->timestamp;
        $this->posts = $postService->listPost();
        $this->fiveRandomUserToFollow = $userService->fiveRandomUserToFollow(auth()->id());
        $this->myLatestFiveFollower = $userService->myLastFiveFriends(auth()->id());
    }

    public function gestioneNuovoFollower(UserService $userService)
    {
        $this->myLatestFiveFollower = $userService->myLastFiveFriends(auth()->id());
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

    public function toggleLike($postId, NotifyService $notifyService, PostService $postService)
    {
        $request = new Request();
        $postWithUser = $postService->post($postId);
        $postService->toggleLikeToPost($postId);

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

    public function toggleFollower($idUser, UserService $userService, NotifyService $notifyService)
    {
        $userService->toggleFollower($idUser);
        /*\Log::info('dopo salvataggio database: '. $this->fiveRandomUserToFollow->find($idUser)->follower);*/
        $request = new Request();
        $request->merge([
            'sender_id' => auth()->id(),
            'receiver_id' => $idUser,
            'read' => 0,
            'body' => auth()->user()->username .' è diventato tuo follwer'
        ]);
        $notify = $notifyService->createNotify($request);

        if ($notify){
            AddNewFollowerEvent::dispatch($idUser);
        }
    }

    public function addCommentToPost($postId, PostService $postService)
    {
        $request = new Request();
        $request->merge([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'body' => $this->commentPost
        ]);

        $comment = $postService->addCommentToPost($request);
        if ($comment){
            $this->reset(['commentPost']);
        }
    }

    public function render()
    {
        return view('livewire.home');
    }
}
