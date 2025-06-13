<div>
    <div class="row g-4">

        <!-- Sidenav START -->
        <div class="col-lg-3">

            <!-- Advanced filter responsive toggler START -->
            <div class="d-flex align-items-center d-lg-none">
                <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                    <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                    <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
                </button>
            </div>
            <!-- Advanced filter responsive toggler END -->

            <!-- Navbar START-->
            <nav class="navbar navbar-expand-lg mx-0">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
                    <!-- Offcanvas header -->
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <!-- Offcanvas body -->
                    <div class="offcanvas-body d-block px-2 px-lg-0">
                        <!-- Card START -->
                        <div class="card overflow-hidden">
                            <!-- Cover image -->
                            <div class="h-50px" style="/*background-image:url(assets/images/bg/01.jpg);*/ background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                            <!-- Card body START -->
                            <div class="card-body pt-0">
                                <div class="text-center">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-lg mt-n5 mb-3">
                                        <a href="#!">
                                            <img class="avatar-img rounded border border-gray-300"
                                                 src="{{asset(auth()->user()->pathPhoto)}}?v={{ $version }}" alt="avatar">
                                        </a>
                                    </div>
                                    <!-- Info -->
                                    <h5 class="mb-0"> <a href="#!">{{auth()->user()->name}} </a> </h5>
                                    <small>{{auth()->user()->type}}</small>
                                    <p class="mt-3">{{auth()->user()->description}}</p>

                                    <!-- User stat START -->
                                    <div class="hstack gap-2 gap-xl-3 justify-content-center">
                                        <!-- User stat item -->
                                        <div>
                                            <h6 class="mb-0">{{$numberOfMyPosts}}</h6>
                                            <small>Post</small>
                                        </div>
                                        <!-- Divider -->
                                        <div class="vr"></div>
                                        <!-- User stat item -->
                                        <div>
                                            <h6 class="mb-0">2.5K</h6>
                                            <small>Followers</small>
                                        </div>
                                        <!-- Divider -->
                                        <div class="vr"></div>
                                        <!-- User stat item -->
                                        <div>
                                            <h6 class="mb-0">365</h6>
                                            <small>Following</small>
                                        </div>
                                    </div>
                                    <!-- User stat END -->
                                </div>

                                <!-- Divider -->
                                <hr>

                                <!-- Side Nav START -->
                                <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                                    <li class="nav-item">
                                        <a class="nav-link" href="my-profile.html"> <img class="me-2 h-20px fa-fw" src="{{asset('assets/images/icon/home-outline-filled.svg')}}" alt=""><span>Feed </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="my-profile-connections.html"> <img class="me-2 h-20px fa-fw" src="{{asset('assets/images/icon/person-outline-filled.svg')}}" alt=""><span>Connections </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog.html"> <img class="me-2 h-20px fa-fw" src="{{asset('assets/images/icon/earth-outline-filled.svg')}}" alt=""><span>Latest News </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="events.html"> <img class="me-2 h-20px fa-fw" src="{{asset('assets/images/icon/calendar-outline-filled.svg')}}" alt=""><span>Events </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="groups.html"> <img class="me-2 h-20px fa-fw" src="{{asset('assets/images/icon/chat-outline-filled.svg')}}" alt=""><span>Groups </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="notifications.html"> <img class="me-2 h-20px fa-fw" src="{{asset('assets/images/icon/notification-outlined-filled.svg')}}" alt=""><span>Notifications </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="settings.html"> <img class="me-2 h-20px fa-fw" src="{{asset('assets/images/icon/cog-outline-filled.svg')}}" alt=""><span>Settings </span></a>
                                    </li>
                                </ul>
                                <!-- Side Nav END -->
                            </div>
                            <!-- Card body END -->
                            <!-- Card footer -->
                            <div class="card-footer text-center py-2">
                                <a class="btn btn-link btn-sm" href="my-profile.html">View Profile </a>
                            </div>
                        </div>
                        <!-- Card END -->

                        <!-- Helper link START -->
                        <ul class="nav small mt-4 justify-content-center lh-1">
                            <li class="nav-item">
                                <a class="nav-link" href="my-profile-about.html">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="settings.html">Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="#">Support </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="help.html">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="privacy-and-terms.html">Privacy & terms</a>
                            </li>
                        </ul>
                        <!-- Helper link END -->
                        <!-- Copyright -->
                        <p class="small text-center mt-1">©2024 <a class="text-reset" target="_blank" href="https://stackbros.in/"> StackBros </a></p>
                    </div>
                </div>
            </nav>
            <!-- Navbar END-->
        </div>
        <!-- Sidenav END -->

        <!-- Main content START -->
        <div class="col-md-8 col-lg-6 vstack gap-4">

            <!-- Story START -->
            <div class="d-flex gap-2 mb-n3">
                <div class="position-relative">
                    <div class="card border border-2 border-dashed h-150px px-4 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">
                        <div>
                            <a class="stretched-link btn btn-light rounded-circle icon-md" href="#!"><i class="fa-solid fa-plus"></i></a>
                            <h6 class="mt-2 mb-0 small">Post a Story</h6>
                        </div>
                    </div>
                </div>

                <!-- Stories -->
              {{--  <div id="stories" >
                    <div class="d-flex">
                        <div class="card border border-2 h-150px p-0 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">
                            <img src="{{asset('storage/albums/3/5.jpg')}}" alt="">
                        </div>
                        <div class="card border border-2 h-150px p-0 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">
                            <img src="{{asset('storage/albums/3/5.jpg')}}" alt="">
                        </div>
                        <div class="card border border-2 h-150px p-0 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">
                            <img src="{{asset('storage/albums/3/5.jpg')}}" alt="">
                        </div>
                        <div class="card border border-2 h-150px p-0 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">
                            <img src="{{asset('storage/albums/3/5.jpg')}}" alt="">
                        </div>
                        <div class="card border border-2 h-150px p-0 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">
                            <img src="{{asset('storage/albums/3/5.jpg')}}" alt="">
                        </div>
                        <div class="card border border-2 h-150px p-0 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">
                            <img src="{{asset('storage/albums/3/5.jpg')}}" alt="">
                        </div>

                    </div>
                </div>--}}

            </div>
            <!-- Story END -->

            <!-- Share feed START -->
            <livewire:component.modal-actions />
            <!-- Share feed END -->

            <!-- Card feed item START -->
            @foreach($posts as $post)
                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header border-0 pb-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar avatar-story me-2">
                                    <a href="#!">
                                        <img class="avatar-img rounded-circle"
                                             src="{{asset($post->user->pathPhoto)}}?v={{ $version }}" alt="avatar">
                                    </a>
                                </div>
                                <!-- Info -->
                                <div>
                                    <div class="nav nav-divider">
                                        <h6 class="nav-item card-title mb-0"> <a href="#!"> {{$post->user->name}} </a></h6>
                                        <span class="nav-item small"> 2hr</span>
                                    </div>
                                    <p class="mb-0 small">{{$post->user->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card header END -->

                    <!-- Card body START -->
                    <div class="card-body">
                        <p>{{$post->body}}</p>
                        <!-- Card img -->
                        <a href="{{route('post-details', $post->id)}}">
                            <img class="card-img"
                                 src="{{asset($post->pathPhoto)}}" alt="post">
                        </a>

                        <!-- Feed react START -->
                        <ul class="nav nav-stack py-3 small">
                            <li class="nav-item">
                                <a wire:click="toggleLike({{$post->id}})"
                                   class="nav-link {{$post->likeduser ? 'active' : ''}}"
                                   href="#!"
                                   data-bs-container="body"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   data-bs-html="true"
                                   data-bs-custom-class="tooltip-text-start"
                                   data-bs-title="Frances Guerrero<br> Lori Stevens<br> Billy Vasquez<br> Judy Nguyen<br> Larry Lawson<br> Amanda Reed<br> Louis Crawford">
                                    <i class="bi {{$post->likeduser ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up'}}  pe-1">
                                    </i>Liked - ({{$post->likes()->count()}})
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('post-details', $post->id)}}">
                                    <i class="bi bi-chat-fill pe-1">
                                    </i>Comments ({{$post->comments()->count()}})
                                </a>
                            </li>
                        </ul>
                        <!-- Feed react END -->

                        <!-- Add comment -->
                        <div class="d-flex mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs me-2">
                                <a href="#!"> <img class="avatar-img rounded-circle"
                                                   src="{{asset('/storage/profiles/'.auth()->id().'.jpg')}}?v={{ $version }}" alt=""> </a>
                            </div>
                            <!-- Comment box  -->
                            <form class="nav nav-item w-100 position-relative" wire:submit="addCommentToPost({{$post->id}})">
                                <textarea wire:model="commentPost" data-autoresize class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."></textarea>
                                <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0" type="submit">
                                    <i class="bi bi-send-fill"> </i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Card body END -->

                </div>
            @endforeach
            <!-- Card feed item END -->

            <!-- Load more button START -->
            <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
                <span class="load-text"> Load more </span>
                <div class="load-icon">
                    <div class="spinner-grow spinner-grow-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </a>
            <!-- Load more button END -->

        </div>
        <!-- Main content END -->

        <!-- Right sidebar START -->
        <div class="col-lg-3">
            <div class="row g-4">
                <!-- Card follow START -->
                <div class="col-sm-6 col-lg-12">
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header pb-0 border-0">
                            <h5 class="card-title mb-0">Become follower?</h5>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Connections item START -->
                            @foreach($fiveRandomUserToFollow as $user)
                                <div class="hstack gap-2 mb-3">
                                <!-- Avatar -->
                                <div class="avatar">
                                    <a href="#!">
                                        <img class="avatar-img rounded-circle" src="{{$user->pathPhoto}}" alt="">
                                    </a>
                                </div>
                                <!-- Title -->
                                <div class="overflow-hidden">
                                    <a class="h6 mb-0" href="#!">{{$user->username}}</a>
                                    <p class="mb-0 small text-truncate">{{$user->type}}</p>
                                </div>
                                <!-- Button -->
                                <a wire:click="toggleFollower({{$user->id}})"
                                   class="btn {{$user->followers()->where('follower_id', auth()->id())->exists() ? 'btn-danger' : 'btn-primary-soft'}} rounded-circle icon-md ms-auto" href="#">
                                    <i class="fa-solid {{$user->followers()->where('follower_id', auth()->id())->exists() ? 'fa-minus' : 'fa-plus'}}"> </i>
                                </a>
                            </div>
                            @endforeach
                            <!-- Connections item END -->

                            <!-- View more button -->
                            <div class="d-grid mt-3">
                                <a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                </div>
                <!-- Card follow START -->

                <!-- Card follow START -->
                <div class="col-sm-6 col-lg-12">
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header pb-0 border-0">
                            <h5 class="card-title mb-0">My latest followers</h5>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Connections item START -->
                            @foreach($myLatestFiveFollower as $user)
                                <div class="hstack gap-2 mb-3">
                                    <!-- Avatar -->
                                    <div class="avatar">
                                        <a href="#!">
                                            <img class="avatar-img rounded-circle" src="{{$user->pathPhoto}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Title -->
                                    <div class="overflow-hidden">
                                        <a class="h6 mb-0" href="#!">{{$user->username}}</a>
                                        <p class="mb-0 small text-truncate">{{$user->type}}</p>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Connections item END -->

                            <!-- View more button -->
                            <div class="d-grid mt-3">
                                <a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                </div>
                <!-- Card follow START -->
            </div>
        </div>
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
</div>

@script
<script>
    Livewire.on('updatePosts', message => {
        Swal.fire({
            title: 'Fatto!',
            text: message,
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    });

</script>
@endscript
