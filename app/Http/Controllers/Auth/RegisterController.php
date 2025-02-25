<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function create() {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request, User $user) {

        
        $attributes = $request->validate([
            'avatar' => ['file', 'nullable'],
            'name' => ['required', 'min:3', 'max:16', 'unique:users'],
            'email' => ['required', 'lowercase', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);


        if($request->hasFile('avatar')) {
            $attributes['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        $user = $user->create($attributes);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
