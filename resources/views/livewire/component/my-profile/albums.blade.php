<div>
    <div class="card">
        <!-- Card header START -->
        <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
            <h1 class="card-title h4">Albums</h1>
            <!-- Button modal -->
            <a class="btn btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateAlbum">
                <i class="fa-solid fa-plus pe-1"></i>
                Create album
            </a>
        </div>
        <!-- Card header START -->
        <!-- Card body START -->
        <div class="card-body">
            <!-- Album Tab content START -->
            <div class="tab-content mb-0 pb-0">
                <!-- Photos of you tab START -->
                <div class="tab-pane fade show active" id="tab-1">
                    <div class="row g-3">
                        <!-- Photo item START -->
                        @foreach($myAlbums as $album)
                            <div class="col-6 col-lg-3 position-relative">
                                <!-- Dropdown END -->
                                <p>{{$album->title}}</p>
                                <button style="border: none" wire:click="$dispatch('selectAlbum', { idAlbum: {{$album->id}} })">
                                    <img class="rounded img-fluid" src="{{$album->pathPhoto}}" alt="">
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Album Tab content END -->
        </div>
        <!-- Card body END -->
    </div>

    <!-- Modal create Feed photo START -->
    <div class="modal fade" id="modalCreateAlbum" tabindex="-1" aria-labelledby="feedModalCreateAlbum" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="feedModalCreateAlbum">New Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <form wire:submit="saveAlbum">
                    <div class="modal-body">
                        <!-- Add Feed -->
                        <div class="d-flex mb-3">
                            <!-- Feed box  -->
                            <div class="w-100">
                                <textarea
                                    class="form-control pe-4 fs-3 lh-1 border-0"
                                    rows="2"
                                    placeholder="Album name..."
                                    wire:model="nameAlbum"
                                >
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Modal feed body END -->
                    <!-- Modal feed footer -->
                    <div class="modal-footer ">
                        <!-- Button -->
                        <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success-soft" data-bs-dismiss="modal">Save</button>
                    </div>
                </form>
                <!-- Modal feed footer -->
            </div>
        </div>
    </div>
    <!-- Modal create Feed photo END -->
</div>
