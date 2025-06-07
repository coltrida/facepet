<div>
    <div class="row g-4">

        <!-- Main content START -->
        <div class="col-lg-8 vstack gap-4">
            <!-- My profile START -->
            <livewire:component.my-profile-nav-bar :subMenu="$subMenu"/>
            <!-- My profile END -->

            <!-- Share feed START -->
            <livewire:component.modal-actions />
            <!-- Share feed END -->

            @if($subMenu == 1)
                <livewire:component.my-profile.my-posts />
            @elseif($subMenu == 2)
                <livewire:component.my-profile.about />
            @elseif($subMenu == 3)
                <livewire:component.my-profile.connections />
            @elseif($subMenu == 4)
                <livewire:component.my-profile.albums />
            @elseif($subMenu == 5)
                <livewire:component.my-profile.photos-of-album :idAlbum="$idAlbum" />
            @endif



        </div>
        <!-- Main content END -->

        <!-- Right sidebar START -->
        <div class="col-lg-4">

            <div class="row g-4">

                <!-- Card START -->
                <livewire:component.my-profile-about />
                <!-- Card END -->

                <!-- Card START -->
                <livewire:component.my-profile-random-photos />
                <!-- Card END -->

                <!-- Card START -->
                <livewire:component.my-profile-friends />
                <!-- Card END -->
            </div>

        </div>
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
</div>


@script
<script>
    Livewire.on('updatePosts', message => {
        Swal.fire({
            title: 'Done!',
            text: message,
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    });

</script>
@endscript

