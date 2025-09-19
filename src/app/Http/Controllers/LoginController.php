<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /** 
     * @desc Show login page
     * @route GET /login
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /** 
     * @desc Authenticate user and log them in
     * @route POST /login
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = request()->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $remember = $request->boolean('remember');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials, $remember)) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Login successful.');
        }
        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    /** 
     * @desc Log the user out
     * @route POST /logout
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        // Invalidate the session
        $request->session()->invalidate();
        // regenerate CSRF token
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
}
