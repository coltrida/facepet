<div class="card">
    <div class="position-relative">
        <div class="h-200px rounded-top"
             style="{{\Illuminate\Support\Facades\Storage::disk('public')->exists('/landscapes/'.auth()->user()->id.'.jpg') ?
                    'background-image:url(/storage/landscapes/'.auth()->id().'.jpg?v='.$version.');' : 'background-image:url(/img/mare.jpg);'}}

                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                "></div>

        <a type="button" class="btn btn-primary position-absolute top-0 end-0 mt-3 me-3"
           href="#" data-bs-toggle="modal" data-bs-target="#modalChangeLandscapePhoto">
            <i class="bi bi-pencil-fill pe-1"></i> Change Landscape Photo </a>
    </div>
    <!-- Card body START -->
    <div class="card-body py-0">
        <div class="d-sm-flex align-items-start text-center text-sm-start">
            <div>
                <!-- Avatar -->
                <div class="avatar avatar-xxl mt-n5 mb-3">
                    <img class="avatar-img rounded-circle border border-white border-3"
                         src="{{asset(auth()->user()->pathPhoto)}}?v={{ $version }}" alt="avatar">
                </div>
            </div>
            <div class="ms-sm-4 mt-sm-3">
                <!-- Info -->
                <h1 class="mb-0 h5">{{auth()->user()->username}} <i class="bi bi-patch-check-fill text-success small"></i></h1>
                <p>250 connections</p>
            </div>
            <!-- Button -->
            <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                <a class="btn btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalChangeProfilePhoto">
                    <i class="bi bi-pencil-fill pe-1"></i> Change Profile Photo</a>
            </div>
        </div>
        <!-- List myProfile -->
        <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
            <li class="list-inline-item"><i class="bi bi-bug me-1"></i>{{auth()->user()->type}}</li>
            <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i>{{auth()->user()->city}}</li>
            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined at {{auth()->user()->created_at->format('m/d/Y')}}</li>
        </ul>
    </div>
    <!-- Card body END -->
    <div class="card-footer mt-3 pt-2 pb-0">
        <!-- Nav myProfile pages -->
        <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
            <li class="nav-item">
                <button wire:click="changeMenu(1)"
                        class="nav-link {{ $subMenu == 1 ? 'active' : '' }}">
                    Posts
                </button>
            </li>
            <li class="nav-item">
                <button wire:click="changeMenu(2)"
                        class="nav-link {{ $subMenu == 2 ? 'active' : '' }}">
                    About
                </button>
            </li>
            <li class="nav-item">
                <button wire:click="changeMenu(3)"
                        class="nav-link {{ $subMenu == 3 ? 'active' : '' }}">
                    Connections <span class="badge bg-success bg-opacity-10 text-success small"> 230</span>
                </button>
            </li>
            <li class="nav-item">
                <button wire:click="changeMenu(4)"
                        class="nav-link {{ $subMenu == 4 ? 'active' : '' }}">
                    Albums
                </button>
            </li>
            <li class="nav-item">
                <button wire:click="changeMenu(5)"
                        class="nav-link {{ $subMenu == 5 ? 'active' : '' }}">
                    Videos
                </button>
            </li>
        </ul>
    </div>

    <!-- Modal change Profile Photo START -->
    <div class="modal fade" id="modalChangeProfilePhoto" tabindex="-1" aria-labelledby="modalLabelChangeProfilePhoto" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelChangeProfilePhoto">Change Profile Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="saveProfilePhoto">
                    <div class="modal-body">
                    <!-- Form START -->
                        <!-- Upload Photos or Videos -->
                        <div class="mb-3">
                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                            <!-- Dropzone photo START -->
                            <label class="form-label">Upload Photo</label>
                            {{--<div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":1}'>
                                <div class="dz-message">
                                    <i class="fa-solid fa-folder-open display-3"></i>
                                    <p>Drop image here or click to upload.</p>
                                </div>
                            </div>--}}
                            <input type="file" class="form-control" wire:model="photo" placeholder="">
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <!-- Dropzone photo END -->
                        </div>
                    <!-- Form END -->
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        @if($photo)
                            <img src="{{$photo->temporaryUrl()}}" alt="" class="rounded" >
                        @endif
                        <button type="submit" class="btn btn-success-soft" data-bs-dismiss="modal">Update Profile Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal change Profile Photo END -->

    <!-- Modal change Profile Photo START -->
    <div class="modal fade" id="modalChangeLandscapePhoto" tabindex="-1" aria-labelledby="modalLabelChangeLandscape" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelChangeLandscape">Change Landscape Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="saveLandscapePhoto">
                    <div class="modal-body">
                        <!-- Form START -->
                        <!-- Upload Photos or Videos -->
                        <div class="mb-3">
                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <!-- Dropzone photo START -->
                                <label class="form-label">Upload Photos or Videos</label>
                                {{--<div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":1}'>
                                    <div class="dz-message">
                                        <i class="fa-solid fa-folder-open display-3"></i>
                                        <p>Drop image here or click to upload.</p>
                                    </div>
                                </div>--}}
                                <input type="file" class="form-control" wire:model="photoLandscape" placeholder="">
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <!-- Dropzone photo END -->
                        </div>
                        <!-- Form END -->
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        @if($photoLandscape)
                            <img src="{{$photoLandscape->temporaryUrl()}}" alt="" class="rounded" >
                        @endif
                        <button type="submit" class="btn btn-success-soft" data-bs-dismiss="modal">Update Landscape Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal change Profile Photo END -->
</div>

