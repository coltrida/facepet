<?php

namespace App\Services;

use App\Models\User;

class NotifyService
{
    public function myLastNotify($idUser)
    {
        return User::with(['notifies' => function($n){
            $n->with('sender')->latest()->take(4);
        }])->find($idUser)->notifies;
    }
}
