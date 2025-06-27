<div class="card-footer">
    <div class="d-sm-flex align-items-end">
        <textarea wire:model="testoMessaggio" class="form-control mb-sm-0 mb-3" data-autoresize placeholder="Type a message" rows="1"></textarea>
        <button class="btn btn-sm btn-danger-soft ms-sm-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
        <button class="btn btn-sm btn-secondary-soft ms-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
        <button wire:click="addMessage" class="btn btn-sm btn-primary ms-2"><i class="fa-solid fa-paper-plane fs-6"></i></button>
    </div>
</div>
