<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function update (User $user) {
        $this->validate(request(), [
            'firstName'      => 'required||max:100|filled',
            'lastName'       => 'required||max:100|filled',
            'email'          => 'email|required|unique:users,email,' . $user->id . '|max:255|filled',
            'phone'          => 'max:20',
            'street'         => 'max:100',
            'streetNum'      => 'max:11',
            'zip'            => 'max:10',
            'city'           => 'max:100',
            'country'        => 'max:100',
            'kvk'            => 'unique:users,kvk,' . $user->id . '|digits:8|filled',
            'btw'            => 'unique:users,btw,' . $user->id . '|max:25|filled',
            ]);

        $user->update(request()->all());

        return redirect('/profile');
    }
}
