<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Job;
class BookmarkController extends Controller
{
    // @desc Get all users Bokkmarks
    // @route Get /bookmarks
    public function index(): View
    {
        $user = Auth::user();

        $bookmarks = $user->bookmarkedJobs()->orderBy("created_at", "desc")->paginate(9);

        return view("jobs.bookmarked", compact("bookmarks"));
    }

    // @desc Create new Bokkmarked Job
    // @route Post /bookmarks/{job}
    public function store(Job $job): RedirectResponse
    {
        $user = Auth::user();

        // Check if the Job is already bookmarked
        if ($user->bookmarkedJobs()->where("job_id", $job->id)->exists()) {
            return back()->with('info', 'Job is already bookmarked');
        }

        $user->bookmarkedJobs()->attach($job->id);

        return back()->with('success', 'Job bookmarked');
    }
    // @desc Remove Bokkmarked Job
    // @route DELETE /bookmarks/{job}
    public function destroy(Job $job): RedirectResponse
    {
        $user = Auth::user();

        // Check if the Job is already bookmarked
        if (!$user->bookmarkedJobs()->where("job_id", $job->id)->exists()) {
            return back()->with('error', 'Job is not bookmarked');
        }

        // remove bookmark
        $user->bookmarkedJobs()->detach($job->id);

        return back()->with('success', ' bookmark removed successfully');
    }
}
