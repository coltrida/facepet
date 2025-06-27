<div>
    <div class="d-none d-lg-block">
        <!-- Button -->
        <a class="icon-md btn btn-primary position-fixed end-0 bottom-0 me-5 mb-5" data-bs-toggle="offcanvas" href="#offcanvasChat" role="button" aria-controls="offcanvasChat">
            <i class="bi bi-chat-left-text-fill"></i>
        </a>
        <!-- Chat sidebar START -->
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasChat">
            <!-- Offcanvas header -->
            <div class="offcanvas-header d-flex justify-content-between">
                <h5 class="offcanvas-title">Messaging</h5>
                <div class="d-flex">
                    <!-- New chat box open button -->
                    <a href="#" class="btn btn-secondary-soft-hover py-1 px-2">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <!-- Chat action START -->
                    <div class="dropdown">
                        <a href="#" class="btn btn-secondary-soft-hover py-1 px-2" id="chatAction" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Chat action menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatAction">
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-check-square fa-fw pe-2"></i>Mark all as read</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Chat setting </a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-2"></i>Disable notifications</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-up-fill fa-fw pe-2"></i>Message sounds</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-2"></i>Create a group chat</a></li>
                        </ul>
                    </div>
                    <!-- Chat action END -->

                    <!-- Close  -->
                    <a href="#" class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </a>

                </div>
            </div>
            <!-- Offcanvas body START -->
            <div class="offcanvas-body pt-0 custom-scrollbar">
                <!-- Search contact START -->
                <form class="rounded position-relative">
                    <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn bg-transparent px-3 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
                </form>
                <!-- Search contact END -->
                <ul class="list-unstyled">

                    <!-- Contact item -->
                    @foreach($myFriends as $user)
                        <li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast{{$user->id}}">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="{{$user->pathPhoto}}" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">{{$user->username}} </a>
                            <div class="small text-secondary text-truncate">{{$user->type}}</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> Just now </div>
                    </li>
                    @endforeach
                    <!-- Contact item -->
                    {{--<li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast2">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Lori Ferguson </a>
                            <div class="small text-secondary text-truncate">You missed a call form Carolyn🤙</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 1min </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-offline">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Samuel Bishop </a>
                            <div class="small text-secondary text-truncate">Day sweetness why cordially 😊</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 2min </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Dennis Barrett </a>
                            <div class="small text-secondary text-truncate">Happy birthday🎂</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 10min </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar avatar-story status-online">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Judy Nguyen </a>
                            <div class="small text-secondary text-truncate">Thank you!</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 2hrs </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Carolyn Ortiz </a>
                            <div class="small text-secondary text-truncate">Greetings from StackBros.</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 1 day </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="flex-shrink-0 avatar">
                            <ul class="avatar-group avatar-group-four">
                                <li class="avatar avatar-xxs">
                                    <img class="avatar-img rounded-circle" src="#" alt="avatar">
                                </li>
                                <li class="avatar avatar-xxs">
                                    <img class="avatar-img rounded-circle" src="#" alt="avatar">
                                </li>
                                <li class="avatar avatar-xxs">
                                    <img class="avatar-img rounded-circle" src="#" alt="avatar">
                                </li>
                                <li class="avatar avatar-xxs">
                                    <img class="avatar-img rounded-circle" src="#" alt="avatar">
                                </li>
                            </ul>
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link text-truncate d-inline-block" href="#!">Frances, Lori, Amanda, Lawson </a>
                            <div class="small text-secondary text-truncate">Btw are you looking for job change?</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 4 day </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-offline">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Bryan Knight </a>
                            <div class="small text-secondary text-truncate">if you are available to discuss🙄</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 6 day </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Louis Crawford </a>
                            <div class="small text-secondary text-truncate">🙌Congrats on your work anniversary!</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 1 day </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Jacqueline Miller </a>
                            <div class="small text-secondary text-truncate">No sorry, Thanks.</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 15, dec </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Amanda Reed </a>
                            <div class="small text-secondary text-truncate">Interested can share CV at.</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 18, dec </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="#" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Larry Lawson </a>
                            <div class="small text-secondary text-truncate">Hope you're doing well and Safe.</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 20, dec </div>
                    </li>--}}
                    <!-- Button -->
                    <li class="mt-3 d-grid">
                        <a class="btn btn-primary-soft" href="messaging.html"> See all in messaging </a>
                    </li>

                </ul>
            </div>
            <!-- Offcanvas body END -->
        </div>
        <!-- Chat sidebar END -->

        <!-- Chat END -->

        <!-- Chat START -->
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container toast-chat d-flex gap-3 align-items-end">

                @foreach($myFriends as $user )
                <!-- Chat toast START -->
                <div id="chatToast{{$user->id}}"
                     class="toast mb-0 bg-mode"
                     role="alert"
                     aria-live="assertive"
                     aria-atomic="true"
                     data-bs-autohide="false"
                >
                    <div class="toast-header bg-mode">
                        <!-- Top avatar and status START -->
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar me-2">
                                    <img class="avatar-img rounded-circle" src="{{$user->pathPhoto}}" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 mt-1">{{$user->username}}</h6>
                                    <div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <!-- Card action END -->
                                <a class="btn btn-secondary-soft-hover py-1 px-2"
                                   data-bs-toggle="collapse"
                                   href="#collapseChat{{$user->id}}"
                                   aria-expanded="true"
                                   aria-controls="collapseChat{{$user->id}}"
                                   >
                                    <i class="bi bi-dash-lg"></i>
                                </a>
                                <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                        <!-- Top avatar and status END -->

                    </div>
                    <div class="toast-body collapse show" id="collapseChat{{$user->id}}" >
                        <!-- Chat conversation START -->
                        <div class="chat-conversation-content custom-scrollbar h-200px">
                            <!-- Chat time -->
                            @if($user->combined_messages->first())
                                <div class="text-center small my-2">{{$user->combined_messages->first()->created_at->format('Y-m-d')}}</div>
                            @endif
                            @foreach($user->combined_messages as $message)
                                @if ($loop->iteration > 1)
                                    @if($user->combined_messages[($loop->iteration)-1]->created_at->format('Y-m-d') !==
                                           $user->combined_messages[($loop->iteration)-2]->created_at->format('Y-m-d'))
                                        <div class="text-center small my-2">{{$message->created_at->format('Y-m-d')}}</div>
                                    @endif
                                @endif
                                @if($message->sender_id !== auth()->id())
                                    <div class="d-flex mb-1">
                                        {{--<div class="flex-shrink-0 avatar avatar-xs me-2">
                                            <img class="avatar-img rounded-circle" src="#" alt="">
                                        </div>--}}
                                        <div class="flex-grow-1">
                                            <div class="w-100">
                                                <div class="d-flex flex-column align-items-start">
                                                    <div class="bg-light text-secondary p-2 px-3 rounded-2">
                                                        {{$message->body}}
                                                    </div>
                                                    <div class="small my-2">{{$message->created_at->format('h:i A')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-end text-end mb-1">
                                        <div class="w-100">
                                            <div class="d-flex flex-column align-items-end">
                                                <div class="bg-primary text-white p-2 px-3 rounded-2">
                                                    {{$message->body}}
                                                </div>
                                                <div class="small my-2">{{$message->created_at->format('h:i A')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <!-- Chat conversation END -->
                        <!-- Chat bottom START -->
                        <div class="mt-2">

                                <!-- Chat textarea -->
                                <textarea wire:model="messaggio.{{$user->id}}" class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                                <!-- Button -->
                                <div class="d-sm-flex align-items-end mt-2">
                                    <button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
                                    <button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
                                    <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                                    <button wire:click="$dispatch('inviaMessaggio', { idReceived: {{$user->id}} })" class="btn btn-sm btn-primary ms-auto"> Send </button>
                                </div>
                        </div>
                        <!-- Chat bottom START -->

                    </div>
                </div>
                <!-- Chat toast END -->
                @endforeach
            </div>
        </div>
        <!-- Chat END -->

    </div>
</div>
