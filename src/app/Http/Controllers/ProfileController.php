<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //@desc update profile info
    // @route PUT /profile
    public function update(Request $request): RedirectResponse
    {
        // get logged in user
        $user = Auth::user();

        // validate Data
        $validatedData = $request->validate([
            "name" => 'required|string',
            "email" => 'required|string|email',
            "avatar" => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        if ($request->hasFile('avatar')) {
            // delete old avatar if it exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            // store new avatar
            $validatedData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($validatedData);
        return redirect()->route('dashboard')->with('success', 'Profile Info updated');
    }
}
