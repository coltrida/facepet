<div>
    <div class="row g-4">
        <!-- Main content START -->
        <div class="col-lg-8 mx-auto">
            <!-- Card START -->
            <div class="card">
                <div class="card-header py-3 border-0 d-flex align-items-center justify-content-between">
                    <h1 class="h5 mb-0">Notifications</h1>
                    <!-- Notification action START -->
                    <div class="dropdown">
                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardNotiAction" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction">
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-check-lg fa-fw pe-2"></i>Mark all read</a></li>
      {{--                      <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Push notifications </a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-2"></i>Email notifications </a></li>
--}}                        </ul>
                    </div>
                    <!-- Notification action END -->
                </div>
                <div class="card-body p-2">
                    <ul class="list-unstyled">
                        <!-- Notif item -->
                        @foreach($allMyNotification as $notify)
                        <li>
                            <a wire:click="readNotify({{$notify->id}})" href="{{$notify->post_id ?
                                       route('post-details',$notify->post_id) :
                                       '#'}}"
                               class="list-group-item list-group-item-action rounded d-flex border-0">
                            <div class="rounded {{$notify->read ? '' : 'badge-unread'}} d-sm-flex border-0 mb-1 p-3 position-relative">
                                <!-- Avatar -->
                                <div class="avatar text-center">
                                    <img class="avatar-img rounded-circle" src="{{$notify->sender->pathPhoto}}" alt="">
                                </div>
                                <!-- Info -->
                                <div class="mx-sm-3 my-2 my-sm-0">
                                    <p class="small mb-2">{{$notify->body}}</p>
                                    @if($notify->post_id || $notify->photo_id)
                                        <span>
                                                <img class="avatar-img" style="height: 50px"
                                                     src="{{$notify->post_id ?
                                                            $notify->post->pathPhoto :
                                                            $notify->photo->pathPhoto}}" alt="">
                                            </span>
                                    @endif
                                </div>
                                <!-- Action -->
                                <div class="d-flex ms-auto">
                                    <p class="small me-5 text-nowrap">{{$notify->created_at->diffForHumans()}}</p>
                                    <!-- Notification action START -->
                                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                                        <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction2">
                                            <li>
                                                <a class="dropdown-item" href="#" wire:click="deleteNotify({{$notify->id}})">
                                                    <i class="bi bi-trash fa-fw pe-2"></i>
                                                    Delete
                                                </a>
                                            </li>
                                    {{--        <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
--}}                                        </ul>
                                    </div>
                                    <!-- Notification action END -->
                                </div>
                            </div>
                            </a>
                        </li>
                        @endforeach
      {{--                  <!-- Notif item -->
                        <li>
                            <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                                <!-- Avatar -->
                                <div class="avatar text-center">
                                    <div class="avatar-img rounded-circle bg-success"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span></div>
                                </div>
                                <!-- Info -->
                                <div class="mx-sm-3 my-2 my-sm-0">
                                    <a class="small text-body stretched-link" href="#!"> StackBros has 15 like and 1 new activity</a>
                                </div>
                                <!-- Action -->
                                <div class="d-flex ms-auto">
                                    <p class="small me-5 text-nowrap">2 min</p>
                                    <!-- Notification action START -->
                                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                                        <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction3">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                                        </ul>
                                    </div>
                                    <!-- Notification action END -->
                                </div>
                            </div>
                        </li>
                        <!-- Notif item -->--}}
{{--                        <!-- Notif item -->
                        <li>
                            <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                                <!-- Avatar -->
                                <div class="avatar text-center">
                                    <div class="avatar-img rounded-circle bg-success"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span></div>
                                </div>
                                <!-- Info -->
                                <div class="mx-sm-3 my-2 my-sm-0">
                                    <a class="stretched-link small text-body" href="#!"><b>Bootstrap in the news:</b> The search giant’s parent company, Alphabet, just joined an exclusive club of tech stocks.</a>
                                </div>
                                <!-- Action -->
                                <div class="d-flex ms-auto">
                                    <p class="small me-5 text-nowrap">8min</p>
                                    <!-- Notification action START -->
                                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                                        <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction5" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction5">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                                        </ul>
                                    </div>
                                    <!-- Notification action END -->
                                </div>
                            </div>
                        </li>
                        <!-- Notif item -->--}}
             {{--           <li>
                            <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                                <!-- Avatar -->
                                <div class="avatar text-center">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="">
                                </div>
                                <!-- Info -->
                                <div class="mx-sm-3 my-2 my-sm-0">
                                    <p class="small mb-0"><b>You have a Connection!</b> </p>
                                    <p class="small"> <a href="@!"> @Samuel Bishop</a> joined project Blogzine blog theme</p>
                                </div>
                                <!-- Action -->
                                <div class="d-flex ms-auto">
                                    <p class="small me-5 text-nowrap">20min</p>
                                    <!-- Notification action START -->
                                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                                        <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction6" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction6">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                                        </ul>
                                    </div>
                                    <!-- Notification action END -->
                                </div>
                            </div>
                        </li>
                        <!-- Notif item -->
                        <li>
                            <div class="rounded d-sm-flex border-0 mb-1 p-3 position-relative">
                                <!-- Avatar -->
                                <div class="avatar text-center">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="">
                                </div>
                                <!-- Info -->
                                <div class="mx-sm-3 my-2 my-sm-0">
                                    <a href="#!" class="stretched-link small mb-0 text-secondary"><b>You have a Payout!</b> </a>
                                    <p class="small mb-0">StackBros LLC has sent you $1205 USD</p>
                                </div>
                                <!-- Action -->
                                <div class="d-flex ms-auto">
                                    <p class="small me-5 text-nowrap">3hrs</p>
                                    <!-- Notification action START -->
                                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                                        <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction7" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction7">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                                        </ul>
                                    </div>
                                    <!-- Notification action END -->
                                </div>
                            </div>
                        </li>--}}
{{--                        <!-- Notif item -->
                        <li>
                            <div class="rounded d-sm-flex border-0 mb-1 p-3 position-relative">
                                <!-- Avatar -->
                                <div class="avatar text-center">
                                    <img class="avatar-img rounded-circle" src="assets/images/logo/08.svg" alt="">
                                </div>
                                <!-- Info -->
                                <div class="mx-sm-3 my-2 my-sm-0">
                                    <p class="small mb-0"><b>Order cancelled: #23685</b> </p>
                                    <p class="small mb-0">Order #23685 belonging to Amanda Reed has been cancelled</p>
                                    <a class="btn btn-link btn-sm" href="#!"> <u> Review order </u></a>
                                </div>
                                <!-- Action -->
                                <div class="d-flex ms-auto">
                                    <p class="small me-5 text-nowrap">5hrs</p>
                                    <!-- Notification action START -->
                                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                                        <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction8" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction8">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                                        </ul>
                                    </div>
                                    <!-- Notification action END -->
                                </div>
                            </div>
                        </li>
                        <!-- Notif item -->
                        <li>
                            <div class="rounded d-sm-flex border-0 mb-1 p-3 position-relative">
                                <!-- Avatar -->
                                <div class="avatar text-center">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="">
                                </div>
                                <!-- Info -->
                                <div class="mx-sm-3 my-2 my-sm-0">
                                    <p class="small m-0">Congratulate <b>Joan Wallace</b> for graduating from <b>Microverse university</b></p>
                                    <p class="small mb-0">Order #23685 belonging to Amanda Reed has been cancelled</p>
                                    <a class="btn btn-link btn-sm" href="#!"> <u> Say congrats </u></a>
                                </div>
                                <!-- Action -->
                                <div class="d-flex ms-auto">
                                    <p class="small me-5 text-nowrap">5hrs</p>
                                    <!-- Notification action START -->
                                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                                        <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction9" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction9">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                                        </ul>
                                    </div>
                                    <!-- Notification action END -->
                                </div>
                            </div>
                        </li>--}}
                    </ul>
                </div>
                @if(count($allMyNotification) > 4)
                <div class="card-footer border-0 py-3 text-center position-relative d-grid pt-0">
                    <!-- Load more button START -->
                    <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
                        <span class="load-text"> Load more notifications </span>
                        <div class="load-icon">
                            <div class="spinner-grow spinner-grow-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </a>
                    <!-- Load more button END -->
                </div>
                @endif
            </div>
            <!-- Card END -->
        </div>
    </div> <!-- Row END -->
</div>

@script
<script>
    Livewire.on('deleteNotify', message => {
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
