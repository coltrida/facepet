<div>
    <div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
        <div class="nav-item w-100">
            <form class="rounded position-relative" wire:submit="eseguiRicerca">
                <input wire:model.live="search" class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit">
                    <i class="bi bi-search fs-5"> </i>
                </button>
            </form>
        </div>
    </div>
</div>
