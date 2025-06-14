<div>
    <div class="card">
        <!-- Card header START -->
        <div class="card-header d-sm-flex align-items-center justify-content-between border-0 pb-0">
            <h5 class="card-title">{{$albumWithphotos->title}}</h5>
            <!-- Button modal -->
            <div>
                <a href="#" wire:click="backToAlbum" class="btn btn-warning">Back</a>
                <a class="btn btn-sm btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalAddPhotoToAlbum">
                    <i class="fa-solid fa-plus pe-1"></i>
                    Add Photo
                </a>
            </div>

        </div>
        <!-- Card header END -->
        <!-- Card body START -->
        <div class="card-body">
            <!-- Photos of you tab START -->
            <div class="row g-3">
                @foreach($albumWithphotos->photos as $photo)
                    <!-- Photo item START -->
                    <div class="col-sm-6 col-md-4 col-lg-3" wire:key="photo-{{ $photo->id }}">
                        <!-- Photo -->
                        <a href="{{$photo->pathPhoto}}" data-gallery="image-popup" data-glightbox="description: .custom-desc-{{$photo->id}}; descPosition: left;">
                            <img class="rounded img-fluid" src="{{$photo->pathPhoto}}" alt="">
                        </a>
                        <!-- likes -->
                        <ul class="nav nav-stack py-2 small">
                            <li class="nav-item">
                                <a class="nav-link" href="#!"> <i class="bi bi-heart-fill text-danger pe-1"></i>22k </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!"> <i class="bi bi-chat-left-text-fill pe-1"></i>3k </a>
                            </li>
                        </ul>
                        <!-- glightbox Albums left bar START -->
                        <div class="glightbox-desc custom-desc-{{$photo->id}}" >
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar me-2">
                                        <img class="avatar-img rounded-circle" src="{{$albumWithphotos->user->pathPhoto}}" alt="">
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <div class="nav nav-divider">
                                            <h6 class="nav-item card-title mb-0">{{$albumWithphotos->user->username}}</h6>
                                            <span class="nav-item small"> 2hr</span>
                                        </div>
                                        <p class="mb-0 small">{{$albumWithphotos->user->type}}</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0">
                                {{$photo->body}}
                            </p>
                            <ul class="nav nav-stack py-3 small">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#!"> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked (56)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                                </li>
                            </ul>
                            <!-- Add comment -->
                            <div class="d-flex mb-3">
                                <!-- Avatar -->
                                <div class="avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="{{auth()->user()->pathPhoto}}" alt="">
                                </div>
                                <!-- Comment box  -->
                                <form class="position-relative w-100" wire:submit.prevent="addComment({{$photo->id}})">
                                    <textarea wire:model="bodyCommentPhoto.{{ $photo->id }}"
                                              class="one form-control pe-4 bg-light"
                                              data-autoresize rows="1"
                                              placeholder="Add a comment..."></textarea>
                                    <!-- Emoji button -->
                                    <div class="position-absolute top-0 end-0">
                                        <button class="btn" type="submit">🙂</button>
                                    </div>
                                </form>

                                <!-- FORM fuori dal DOM Livewire -->
                                {{--<form x-data="{ comment: '' }"
                                      @submit.prevent="Livewire.dispatch('submitComment', { idPhoto: {{ $photo->id }}, body: comment })">
                                    <textarea x-model="comment"></textarea>
                                    <button type="submit">Invia</button>
                                </form>--}}

                            </div>
                            <!-- Comment wrap START -->
                            <ul class="comment-wrap list-unstyled ">
                                <!-- Comment item START -->
                                @foreach($photo->commentsPhoto as $comment)
                                    <li class="comment-item" wire:key="comment-{{ $comment->id }}">
                                        <div class="d-flex">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle" src="{{$comment->user->pathPhoto}}" alt="">
                                            </div>
                                            <div class="ms-2">
                                                <!-- Comment by -->
                                                <div class="bg-light rounded-start-top-0 p-3 rounded">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="me-2">
                                                            <h6 class="mb-1"> <a href="#!"> {{$comment->user->username}} </a></h6>
                                                            <p class="small mb-0">{{$comment->body}}</p>
                                                        </div>
                                                        <small>5hr</small>
                                                    </div>
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
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Comment wrap END -->
                        </div>
                        <!-- glightbox Albums left bar END  -->
                    </div>
                    <!-- Photo item END -->
                @endforeach

            </div>
            <!-- Photos of you tab END -->
        </div>
        <!-- Card body END -->
    </div>

    <!-- Modal create Feed photo START -->
    <div class="modal fade" id="modalAddPhotoToAlbum" tabindex="-1" aria-labelledby="feedModalAddPhotoToAlbum" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="feedModalAddPhotoToAlbum">Add photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <form wire:submit="savePhoto">
                    <div class="modal-body">
                        <!-- Add Feed -->
                        <div class="d-flex mb-3">
                            <!-- Avatar -->
                            <!-- Feed box  -->
                            <div class="w-100">
                                <textarea
                                    class="form-control pe-4 fs-3 lh-1 border-0"
                                    rows="2"
                                    placeholder="Comment of photo..."
                                    wire:model="bodyPhoto"
                                >
                                </textarea>
                            </div>
                        </div>

                        <!-- Dropzone photo START -->
                        <div>
                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <!-- Dropzone photo START -->
                                <label class="form-label">Upload Photos</label>
                                <input type="file" class="form-control" wire:model="newPhoto" placeholder="">
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal feed body END -->

                    <!-- Modal feed footer -->
                    <div class="modal-footer ">
                        @if($newPhoto)
                            <img src="{{$newPhoto->temporaryUrl()}}" alt="" class="rounded" >
                        @endif
                        <!-- Button -->
                        <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success-soft" data-bs-dismiss="modal">Post</button>
                    </div>
                </form>
                <!-- Modal feed footer -->
            </div>
        </div>
    </div>
    <!-- Modal create Feed photo END -->
</div>
