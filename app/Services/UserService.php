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

    public function myFriendsWithMessages($idUser)
    {
        // 1. Esegui l'eager loading delle relazioni sentMessages e receivedMessages.
        // Questo recupera tutti gli utenti e per ciascuno, tutti i messaggi inviati e ricevuti.
        $users = User::with(['following' => function($u){
            $u->with(['sentMessages', 'receivedMessages']);
        }])->find($idUser)->following;

     //   $users = User::with(['sentMessages', 'receivedMessages'])->get();

        // 2. Per ogni utente, combina e ordina i messaggi.
        $usersWithSortedMessages = $users->map(function ($user) {
            // Combina i messaggi inviati e ricevuti in una singola collezione
            $allMessages = $user->sentMessages->merge($user->receivedMessages);

            // Ordina tutti i messaggi per data di creazione (dal più vecchio al più recente)
            $sortedMessages = $allMessages->sortBy('created_at')->values();

            // Aggiungi la collezione ordinata all'utente come una nuova proprietà temporanea
            $user->combined_messages = $sortedMessages;

            // Opzionalmente, se non vuoi che le relazioni originali siano presenti
            // o se vuoi pulire l'oggetto, puoi rimuoverle:
             unset($user->sentMessages);
             unset($user->receivedMessages);

            return $user;
        });

        return $usersWithSortedMessages;
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
