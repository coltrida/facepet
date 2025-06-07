<div>
    <div class="card">
        <!-- Card header START -->
        <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
            <h1 class="card-title h4">Albums</h1>
            <!-- Button modal -->
            <a class="btn btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateAlbum"> <i class="fa-solid fa-plus pe-1"></i> Create album</a>
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
</div>
