<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card card-body">
                    <!-- Fees images -->
                    <img class="card-img rounded" src="{{$post->pathPhoto}}" alt="">
                    <!-- Feed meta START -->
                    <div class="d-flex align-items-center justify-content-between my-3">
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-story me-2">
                                <a href="#!"> <img class="avatar-img rounded-circle" src="{{$post->user->pathPhoto}}" alt=""> </a>
                            </div>
                            <!-- Info -->
                            <div>
                                <div class="nav nav-divider">
                                    <h6 class="nav-item card-title mb-0"> <a href="#!"> {{$post->user->username}} </a></h6>
                                    <span class="nav-item small"> {{$post->created_at->diffForHumans()}}</span>
                                </div>
                                <p class="mb-0 small">{{$post->user->type}}</p>
                            </div>
                        </div>
                        <!-- Card feed action dropdown START -->
                        <div class="dropdown">
                            <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>
                        </div>
                        <!-- Card feed action dropdown END -->
                    </div>
                    <!-- Feed meta Info -->
                    <p>
                        {{$post->body}}
                    </p>
                    <!-- Feed react START -->
                    <ul class="nav nav-stack flex-wrap small mb-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#!"> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>(56)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>(12)</a>
                        </li>
                        <!-- Card share action START -->
                        <li class="nav-item dropdown ms-sm-auto">
                            <a class="nav-link mb-0" href="#" id="cardShareAction" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-reply-fill flip-horizontal ps-1"></i>(3)
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction">
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
                                    <a href="#!"><img class="avatar-img rounded-circle" src="{{$comment->user->pathPhoto}}" alt=""></a>
                                </div>
                                <div class="ms-2">
                                    <!-- Comment by -->
                                    <div class="bg-light rounded-start-top-0 p-3 rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1"> <a href="#!"> {{$comment->user->username}} </a></h6>
                                            <small class="ms-2">5hr</small>
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
                                            <a href="#!"><img class="avatar-img rounded-circle" src="{{$reply->user->pathPhoto}}" alt=""></a>
                                        </div>
                                        <!-- Comment by -->
                                        <div class="ms-2">
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
                    <div class="card-footer border-0 pb-0">
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
                </div>
            </div>
        </div>
    </div>

<!-- Container END -->
</div>
