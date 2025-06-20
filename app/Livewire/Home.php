<?php

namespace App\Livewire;

use App\Events\AddNewFollowerEvent;
use App\Events\LikePostEvent;
use App\Events\NewCommentPost;
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
    public $commentPost = [];

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
        $this->posts = $postService->listPostOfMineAndMyFriends(auth()->id());
        $this->fiveRandomUserToFollow = $userService->fiveRandomUserToFollow(auth()->id());
        $this->myLatestFiveFollower = $userService->myLastFiveFollower(auth()->id());
    }

    public function gestioneNuovoFollower(UserService $userService)
    {
        $this->myLatestFiveFollower = $userService->myLastFiveFollower(auth()->id());
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
        $this->posts = $postService->listPostOfMyFriends(\auth()->id());
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
        $userService->toggleFollowing($idUser);
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

    public function addCommentToPost($postId, PostService $postService, NotifyService $notifyService)
    {
        // Valida il commento se necessario
        $this->validate([
            'commentPost.' . $postId => 'required|string|max:255',
        ]);

        $request = new Request();
        $request->merge([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'body' => $this->commentPost[$postId]
        ]);
        $comment = $postService->addCommentToPost($request);
        $this->commentPost[$postId] = '';

        $request2 = new Request();
        $postWithUser = $postService->post($postId);
        $request2->merge([
            'sender_id' => auth()->id(),
            'receiver_id' => $postWithUser->user_id,
            'post_id' => $postId,
            'read' => 0,
            'body' => auth()->user()->username .' ha lasciato un commento al post'
        ]);

        $notify = $notifyService->createNotify($request2);
        if ($notify){
            NewCommentPost::dispatch($postId);
        }

    }

    public function render(PostService $postService, UserService $userService)
    {
        return view('livewire.home', [
            'numberOfMyPosts' => $postService->numberOfMyPosts(\auth()->id()),
            'myLatestFiveFriends' => $userService->myLastFiveFriends(auth()->id()),
            'numberOfMyFriends' => $userService->numberOfMyFriends(auth()->id()),
            'numberOfMyFollowers' => $userService->numberOfMyFollowers(auth()->id()),
        ]);
    }
}
