<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function edit(Request $request) {

        return Inertia::render('Profile/Edit', [
            'user' => $request->user(),
            'status' => session('status')
        ]);
    }

    public function updateInfo(Request $request) {

        dd($request);

        $attributes = $request->validate([
            'name' => ['required', 'min:3', 'max:16', Rule::unique(User::class)->ignore($request->user()->id)],
            'email' => ['required', 'email', Rule::unique(User::class)->ignore($request->user()->id)],
            'avatar' => ['file', 'nullable']
        ]);

        $user = $request->user();

        if($request->hasFile('avatar')) {
            if($user->avatar) {
                Storage::disk('public')->delete('avatars', $user->avatar);
            }
            $attributes['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }
    
        $user->fill($attributes);

        if($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
    
        return redirect()->route('profile.edit');
    }

    public function updatePassword(Request $request) {
        $attributes = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:3']
        ]);

        $request->user()->update([
            'password' => Hash::make($attributes['password'])
        ]);

        return redirect()->route('profile.edit');
    }

    public function destroy(Request $request) {
        $request->validate([
            'password' => ['required', 'current_password']
        ]);

        $user = $request->user();

        Auth::logout();

        if($user->avatar) {
            Storage::disk('public')->delete('avatars', $user->avatar);
        }

        $user->delete();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->route('home');
    }
}
