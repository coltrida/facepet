<?php

namespace App\Services;

use App\Models\Notify;
use App\Models\User;

class NotifyService
{
    public function myLastNotify($idUser)
    {
        return User::with(['notifies' => function($n){
            $n->with('sender')->latest()->take(4);
        }])->find($idUser)->notifies;
    }

    public function createNotify($request)
    {
        return Notify::create($request->all());
    }

    public function readNotify($idNotify)
    {
        Notify::find($idNotify)
            ->update([
                'read' => 1
            ]);
    }

    public function readAllNotifications($idUser)
    {
        User::find($idUser)->notifies()->update(['read' => 1]);
    }

    public function allMyNotifications($idUser)
    {
        return User::with(['notifies' => function($n){
            $n->with('sender')->latest();
        }])->find($idUser)->notifies;
    }

    public function controllaSeEsisteNotificaNonLetta($idUser)
    {
        return User::with(['notifies' => function($n){
            $n->where('read', 0);
        }])->find($idUser)->notifies->count() > 0;
    }

    public function deleteNotify($idNotify)
    {
        Notify::find($idNotify)->delete();
    }
}
