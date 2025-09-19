<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class DashboardController extends Controller
{
    // @desc Show all Users job Listings
    // @route Get /dashboard
    public function index(): View
    {
        // Get logged in User
        $user = Auth::user();

        //Get the User Listings
        $jobs = Job::where('user_id', $user->id)->get();

        return view('dashboard.index', compact('user', 'jobs'));
    }
}
