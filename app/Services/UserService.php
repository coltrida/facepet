<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;

class UserService
{
    public function aggiornaDati($request)
    {
        return User::findOrFail(auth()->id())->update($request->all());
    }

    public function updatePassword($newPassword)
    {
        User::findOrFail(auth()->id())->update([
            'password' => $newPassword
        ]);
    }

    public function myLastFourFriends($idUser)
    {
        return User::with(['followers' => function($f){
            $f->latest()->take(4);
        }])
            ->find($idUser)->followers;
    }

    public function myLastFiveFollower($idUser)
    {
        return User::with(['followers' => function($f){
            $f->latest()->take(5);
        }])
            ->find($idUser)->followers;
    }

    public function myLastFiveFriends($idUser)
    {
        return User::with(['following' => function($f){
            $f->latest()->take(5);
        }])
            ->find($idUser)->following;
    }

    public function myLastFiveFollowings($idUser)
    {
        return User::with(['following' => function($f){
            $f->latest()->take(5);
        }])
            ->find($idUser)->following;
    }

    public function leggiSeCiSonoNuoveNotifiche($idUser)
    {
        return User::find($idUser)->newNotificationUnRead;
    }

    public function arrivataNuovaNotifica($idUser, $value)
    {
        User::find($idUser)->update(['newNotificationUnRead' => $value]);
    }

    public function fiveRandomUserToFollow($idUser)
    {
        return User::where('id', '!=', $idUser)->where('id', '!=', 1) // Exclude the user themselves
        ->whereDoesntHave('followers', function ($query) use ($idUser) {
            $query->where('follower_id', $idUser);
        })
            ->inRandomOrder() // Order the results randomly
            ->take(5)         // Take only the first 5 results from the random order
            ->get();
    }

    public function toggleFollower($idUser)
    {
        User::find(auth()->id())->followers()->toggle($idUser, ['crated_at' => Carbon::now()]);
    }

    public function toggleFollowing($idUser)
    {
        User::find(auth()->id())->following()->toggle($idUser, ['crated_at' => Carbon::now()]);
    }

    public function myFriends($idUser)
    {
        return User::with('following')->find($idUser)->following;
    }

    public function numberOfMyFriends($idUser)
    {
        return User::with('following')->find($idUser)->following->count();
    }

    public function numberOfMyFollowers($idUser)
    {
        return User::with('followers')->find($idUser)->followers->count();
    }

    public function getUserById($idUser)
    {
        return User::find($idUser);
    }
}
