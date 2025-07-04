<div>
    <li class="nav-item dropdown ms-2">
        <a class="nav-link bg-light icon-md btn btn-light p-0"
           href="#" id="notifDropdown"
           role="button"
           data-bs-toggle="dropdown"
           aria-expanded="false"
           data-bs-auto-close="outside">
                @if($newNotificationUnread)
                    <span class="badge-notif animation-blink"></span>
                @endif
                <i class="bi bi-bell-fill fs-6"> </i>
        </a>
        <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0" aria-labelledby="notifDropdown">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">{{$numeroDiNotificheNonLette}} new</span></h6>
                    <a class="small" href="#" wire:click="readAllNotifications">Clear all</a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush list-unstyled p-2">
                        @foreach($myNotifies as $notify)
                        <li>
                            <a wire:click="readNotify({{$notify->id}})" href="{{$notify->post_id ?
                                       route('post-details',$notify->post_id) :
                                       '#'}}"
                               class="list-group-item list-group-item-action {{$notify->read ? '' : 'badge-unread'}}  rounded d-flex border-0 mb-1 p-3">
                                <div class="avatar text-center d-none d-sm-inline-block">
                                    <img class="avatar-img rounded-circle"
                                         src="{{$notify->sender->pathPhoto}}" alt="">
                                </div>
                                <div class="ms-sm-3">
                                    <div class="d-flex">
                                        <p class="small mb-2">
                                            {{$notify->body}}
                                            @if($notify->post_id || $notify->photo_id)
                                            <span>
                                                <img class="avatar-img" style="height: 50px"
                                                     src="{{$notify->post_id ?
                                                            $notify->post->pathPhoto :
                                                            $notify->photo->pathPhoto}}" alt="">
                                            </span>
                                            @endif
                                        </p>
                                        <p class="smaller ms-3">{{$notify->created_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{route('all-notifications')}}" class="btn btn-sm btn-primary-soft">See all incoming notifies</a>
                </div>
            </div>
        </div>
    </li>
</div>
