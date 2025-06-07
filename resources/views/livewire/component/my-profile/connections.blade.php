<div>
    <!-- Card Followers START -->
    <div class="card">
        <!-- Card header START -->
        <div class="card-header border-0 pb-0">
            <h5 class="card-title"> Followers</h5>
        </div>
        <!-- Card header END -->

        <!-- Card body START -->
        <div class="card-body">
            <!-- Connections Item -->
            @foreach($myLastFiveFriends as $user)
                <div class="d-md-flex align-items-center mb-4">
                    <!-- Avatar -->
                    <div class="avatar me-3 mb-3 mb-md-0">
                        <a href="#!">
                            <img class="avatar-img rounded-circle"
                                 src="{{asset($user->pathPhoto)}}" alt="avatar">
                        </a>
                    </div>
                    <!-- Info -->
                    <div class="w-100">
                        <div class="d-sm-flex align-items-start">
                            <h6 class="mb-0"><a href="#!">{{$user->username}} </a></h6>
                            <p class="small ms-sm-2 mb-0">{{$user->type}}</p>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="ms-md-auto d-flex">
                        <button class="btn btn-danger-soft btn-sm mb-0 me-2"> Remove </button>
                        <button class="btn btn-primary-soft btn-sm mb-0"> Message </button>
                    </div>
                </div>
            @endforeach

            @if(count($myLastFiveFriends) > 4)
                <div class="d-grid">
                    <!-- Load more button START -->
                    <a href="#!" role="button" class="btn btn-sm btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
                        <span class="load-text"> Load more connections </span>
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
        <!-- Card body END -->
    </div>
    <!-- Card Followers END -->

    <!-- Card Followings START -->
    <div class="card">
        <!-- Card header START -->
        <div class="card-header border-0 pb-0">
            <h5 class="card-title"> Following</h5>
        </div>
        <!-- Card header END -->

        <!-- Card body START -->
        <div class="card-body">
            <!-- Connections Item -->
            @foreach($myLastFiveFollowings as $user)
                <div class="d-md-flex align-items-center mb-4">
                    <!-- Avatar -->
                    <div class="avatar me-3 mb-3 mb-md-0">
                        <a href="#!">
                            <img class="avatar-img rounded-circle"
                                 src="{{asset($user->pathPhoto)}}" alt="avatar">
                        </a>
                    </div>
                    <!-- Info -->
                    <div class="w-100">
                        <div class="d-sm-flex align-items-start">
                            <h6 class="mb-0"><a href="#!">{{$user->username}} </a></h6>
                            <p class="small ms-sm-2 mb-0">{{$user->type}}</p>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="ms-md-auto d-flex">
                        <button class="btn btn-danger-soft btn-sm mb-0 me-2"> Remove </button>
                        <button class="btn btn-primary-soft btn-sm mb-0"> Message </button>
                    </div>
                </div>
            @endforeach

            @if(count($myLastFiveFollowings) > 4)
                <div class="d-grid">
                    <!-- Load more button START -->
                    <a href="#!" role="button" class="btn btn-sm btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
                        <span class="load-text"> Load more connections </span>
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
        <!-- Card body END -->
    </div>
    <!-- Card Followings END -->
</div>
