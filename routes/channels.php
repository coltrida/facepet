<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('user.{id}', function ($user, $id) {
    if ((int) $user->id === (int) $id) {
        return true;
    }
});


