<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    /** 
     * @desc Show register page
     * @route GET /register
     */
    public function register(): View
    {
        return view('auth.register');
    }

    /** 
     * @desc Store user in database
     * @route POST /register
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = request()->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // Hash the password before saving
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');

    }
}
