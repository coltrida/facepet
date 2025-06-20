<div>
    <div class="card">
        <!-- Card header START -->
        <div class="card-header border-0 pb-0">
            <h5 class="card-title"> Profile Info</h5>
        </div>
        <!-- Card header END -->
        <!-- Card body START -->
        <div class="card-body">
            <div class="rounded border px-3 py-2 mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h6>Description</h6>
                    <div class="dropdown ms-auto">
                        <!-- Card share action menu -->
                        <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction">
                            <li>
                                <a class="dropdown-item" href="{{route('settings')}}" wire:navigate>
                                    <i class="bi bi-pencil-square fa-fw pe-2">
                                    </i>Edit</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <p>
                    {{auth()->user()->description}}
                </p>
            </div>
            <div class="row g-4">
                <div class="col-sm-6">
                    <!-- Birthday START -->
                    <div class="d-flex align-items-center rounded border px-3 py-2">
                        <!-- Date -->
                        <p class="mb-0">
                            <i class="bi bi-calendar-date fa-fw me-2"></i> Born: <strong> {{auth()->user()->birthdate}} </strong>
                        </p>
                        <div class="dropdown ms-auto">
                            <!-- Card share action menu -->
                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction2">
                                <li>
                                    <a class="dropdown-item" href="{{route('settings')}}" wire:navigate>
                                        <i class="bi bi-pencil-square fa-fw pe-2"></i>
                                        Edit
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Birthday END -->
                </div>
                <div class="col-sm-6">
                    <!-- Status START -->
                    <div class="d-flex align-items-center rounded border px-3 py-2">
                        <!-- Date -->
                        <p class="mb-0">
                            <i class="bi bi-phone fa-fw me-2"></i> Phone: <strong> {{auth()->user()->phone}} </strong>
                        </p>
                        <div class="dropdown ms-auto">
                            <!-- Card share action menu -->
                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction3" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction3">
                                <li>
                                    <a class="dropdown-item" href="{{route('settings')}}" wire:navigate>
                                        <i class="bi bi-pencil-square fa-fw pe-2"></i>
                                        Edit
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Status END -->
                </div>
                <div class="col-sm-6">
                    <!-- Designation START -->
                    <div class="d-flex align-items-center rounded border px-3 py-2">
                        <!-- Date -->
                        <p class="mb-0">
                            <i class="bi bi-bug fa-fw me-2"></i> <strong> {{auth()->user()->type}} </strong>
                        </p>
                        <div class="dropdown ms-auto">
                            <!-- Card share action menu -->
                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction4" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction4">
                                <li>
                                    <a class="dropdown-item" href="{{route('settings')}}" wire:navigate>
                                        <i class="bi bi-pencil-square fa-fw pe-2"></i>
                                        Edit
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Designation END -->
                </div>
                <div class="col-sm-6">
                    <!-- Lives START -->
                    <div class="d-flex align-items-center rounded border px-3 py-2">
                        <!-- Date -->
                        <p class="mb-0">
                            <i class="bi bi-geo-alt fa-fw me-2"></i> Lives in: <strong> {{auth()->user()->city}} </strong>
                        </p>
                        <div class="dropdown ms-auto">
                            <!-- Card share action menu -->
                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction5" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction5">
                                <li>
                                    <a class="dropdown-item" href="{{route('settings')}}" wire:navigate>
                                        <i class="bi bi-pencil-square fa-fw pe-2"></i>
                                        Edit
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Lives END -->
                </div>
                {{--<div class="col-sm-6">
                    <!-- Joined on START -->
                    <div class="d-flex align-items-center rounded border px-3 py-2">
                        <!-- Date -->
                        <p class="mb-0">
                            <i class="bi bi-geo-alt fa-fw me-2"></i> Joined on: <strong> Nov 26, 2019 </strong>
                        </p>
                        <div class="dropdown ms-auto">
                            <!-- Card share action menu -->
                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction6" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction6">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Joined on END -->
                </div>--}}
                <div class="col-sm-6">
                    <!-- Joined on START -->
                    <div class="d-flex align-items-center rounded border px-3 py-2">
                        <!-- Date -->
                        <p class="mb-0">
                            <i class="bi bi-envelope fa-fw me-2"></i> Email: <strong> {{auth()->user()->email}} </strong>
                        </p>
                        <div class="dropdown ms-auto">
                            <!-- Card share action menu -->
                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction7" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction7">
                                <li>
                                    <a class="dropdown-item" href="{{route('settings')}}" wire:navigate>
                                        <i class="bi bi-pencil-square fa-fw pe-2"></i>
                                        Edit
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Joined on END -->
                </div>
                {{--<div class="col-sm-6 position-relative">
                    <!-- Workplace on START -->
                    <a class="btn btn-dashed rounded w-100" href="#!"> <i class="bi bi-plus-circle-dotted me-1"></i>Add a workplace</a>
                    <!-- Workplace on END -->
                </div>
                <div class="col-sm-6 position-relative">
                    <!-- Education on START -->
                    <a class="btn btn-dashed rounded w-100" href="#!"> <i class="bi bi-plus-circle-dotted me-1"></i>Add a education</a>
                    <!-- Education on END -->
                </div>--}}
            </div>
        </div>
        <!-- Card body END -->
    </div>
</div>
