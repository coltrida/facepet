<div>
    @foreach($myPosts as $post)
        <!-- Card feed item START -->
        <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar avatar-story me-2">
                            <a href="#!"> <img class="avatar-img rounded-circle"
                                               src="{{asset(auth()->user()->pathPhoto)}}?v={{ $version }}" alt="avatar">
                            </a>
                        </div>
                        <!-- Info -->
                        <div>
                            <div class="nav nav-divider">
                                <h6 class="nav-item card-title mb-0"> <a href="#!"> {{auth()->user()->username}}</a></h6>
                                <span class="nav-item small"> {{$post->created_at->diffForHumans()}}</span>
                            </div>
                            <p class="mb-0 small">{{auth()->user()->type}}</p>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card feed action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction1">
                            <li><a class="dropdown-item" href="#!" wire:click="eliminaPost({{$post->id}})"> <i class="bi bi-trash fa-fw pe-2"></i>Delete post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <p>{{$post->body}}</p>
                <!-- Card img -->
                <img class="card-img"
                     src="{{asset($post->pathPhoto)}}" alt="post photo">
                <!-- Feed react START -->
                <ul class="nav nav-stack py-3 small">
                    <li class="nav-item">
                        <a class="nav-link active" href="#!"> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked (56)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                    </li>
                    <!-- Card share action START -->
                    <li class="nav-item dropdown ms-sm-auto">
                        <a class="nav-link mb-0" href="#" id="cardShareAction8" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction8">
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                        </ul>
                    </li>
                    <!-- Card share action END -->
                </ul>
                <!-- Feed react END -->

                <!-- Comment wrap START -->
                <ul class="comment-wrap list-unstyled">
                    <!-- Comment item START -->
                    @foreach($post->comments as $comment)
                        <li class="comment-item">
                            <div class="d-flex position-relative">
                                <!-- Avatar -->
                                <div class="avatar avatar-xs">
                                    <a href="#!">
                                        <img class="avatar-img rounded-circle"
                                             src="{{asset($comment->user->pathPhoto)}}" alt="avatar">
                                    </a>
                                </div>
                                <div class="ms-2" style="width: 100%">
                                    <!-- Comment by -->
                                    <div class="bg-light rounded-start-top-0 p-3 rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1"> <a href="#!"> {{$comment->user->username}} </a></h6>
                                            <small class="ms-2">{{$comment->created_at->diffForHumans()}}</small>
                                        </div>
                                        <p class="small mb-0">
                                            {{$comment->body}}
                                        </p>
                                    </div>
                                    <!-- Comment react -->
                                    <ul class="nav nav-divider py-2 small">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#!"> Like (3)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#!"> Reply</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#!"> View 5 replies</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Comment item nested START -->
                            <ul class="comment-item-nested list-unstyled">
                                <!-- Comment item START -->
                                @foreach($comment->replies as $reply)
                                    <li class="comment-item">
                                        <div class="d-flex">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-xs">
                                                <a href="#!">
                                                    <img class="avatar-img rounded-circle"
                                                         src="{{asset($reply->user->pathPhoto)}}" alt="avatar">
                                                </a>
                                            </div>
                                            <!-- Comment by -->
                                            <div class="ms-2" style="width: 100%">
                                                <div class="bg-light p-3 rounded">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1"> <a href="#!"> {{$reply->user->username}} </a> </h6>
                                                        <small class="ms-2">{{$reply->created_at->diffForHumans()}}</small>
                                                    </div>
                                                    <p class="small mb-0">
                                                        {{$reply->body}}
                                                    </p>
                                                </div>
                                                <!-- Comment react -->
                                                <ul class="nav nav-divider py-2 small">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#!"> Like (5)</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#!"> Reply</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <!-- Comment item END -->
                            </ul>
                            <!-- Load more replies -->
                            <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center mb-3 ms-5" data-bs-toggle="button" aria-pressed="true">
                                <div class="spinner-dots me-2">
                                    <span class="spinner-dot"></span>
                                    <span class="spinner-dot"></span>
                                    <span class="spinner-dot"></span>
                                </div>
                                Load more replies
                            </a>
                            <!-- Comment item nested END -->
                        </li>
                    @endforeach
                    <!-- Comment item END -->
                </ul>
                <!-- Comment wrap END -->
            </div>
            <!-- Card body END -->
            <!-- Card footer START -->
            <div class="card-footer border-0 pt-0">
                <!-- Load more comments -->
                <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
                    <div class="spinner-dots me-2">
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                    </div>
                    Load more comments
                </a>
            </div>
            <!-- Card footer END -->
        </div>
        <!-- Card feed item END -->
    @endforeach
</div>

@script
<script>
    Livewire.on('postDeleted', message => {
        Swal.fire({
            title: 'Done!',
            text: message,
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    });

</script>
@endscript
