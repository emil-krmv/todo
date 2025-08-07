<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $creds = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create($creds);

        Mail::to($user)->send(new UserRegistered($user->name));
        event(new Registered($user));

        Auth::login($user);

        return to_route('tasks.index');
    }
}
