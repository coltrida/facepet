<div class="row gx-0">

    <livewire:component.messaging.list-friends :idUser="$idUser"/>

    <!-- Chat conversation START -->
    <div class="col-lg-8 col-xxl-9">
        <div class="card card-chat rounded-start-lg-0 border-start-lg-0">

            <livewire:component.messaging.list-of-messages :idUser="$idUser"/>

            <livewire:component.messaging.form-insert-message />

        </div>
    </div>
    <!-- Chat conversation END -->
</div> <!-- Row END -->
