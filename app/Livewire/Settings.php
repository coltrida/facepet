<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Settings extends Component
{
    public $name;
    public $surname;
    public $username;
    public $birthdate;
    public $type;
    public $description;
    public $phone;
    public $email;
    public $city;

    public $oldPassword;
    public $newPassword;
    public $repeatNewPassword;

    public $seePassword;

    public function mount(UserService $userService)
    {
        $this->seePassword = false;

        $user = $userService->getUserById(auth()->id());

        $this->name = $user->name;
        $this->surname = $user->surname;
        $this->username = $user->username;
        $this->birthdate = $user->birthdate;
        $this->type = $user->type;
        $this->description = $user->description;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->city = $user->city;
    }

    public function updateUser(UserService $userService)
    {
        $request = new Request();
        $request->merge([
            'name'          => $this->name,
            'surname'       => $this->surname,
            'username'      => $this->username,
            'birthdate'     => $this->birthdate,
            'type'          => $this->type,
            'description'   => $this->description,
            'phone'         => $this->phone,
            'email'         => $this->email,
            'city'          => $this->city,
        ]);
        $userService->aggiornaDati($request);
        $this->dispatch('dataUpdated', 'data updated');
    }

    public function changePassword(UserService $userService)
    {
        if (! Hash::check($this->oldPassword, auth()->user()->password)) {
            $this->dispatch('errorePassword', 'The current password incorrect!');
        } elseif ($this->newPassword !== $this->repeatNewPassword){
            $this->dispatch('errorePassword', 'The repeat password dont match');
        } else{
            $userService->updatePassword(Hash::make($this->newPassword));
            $this->reset(['oldPassword', 'newPassword', 'repeatNewPassword']);
            $this->dispatch('dataUpdated', 'Password Updated!');
        }
    }

    public function toggleSeePassword()
    {
        $this->seePassword = !$this->seePassword;
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
