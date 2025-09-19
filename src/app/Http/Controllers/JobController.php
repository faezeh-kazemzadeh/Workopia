<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class JobController extends Controller
{
    use AuthorizesRequests;
    // @desc Show all jobs
    // @route GET /login
    public function index(): View
    {
        $jobs = Job::latest()->paginate(3);
        return view('jobs.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        /** 
         *  @desc Show Create Job page
         * @route GET /jobs/create
         */
        return view('jobs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request): RedirectResponse
    {
        /** 
         *  @desc Save Job to Database
         * @route {POST} /jobs/store
         */
        $validatedData = $request->validated();


        //hardcoded user_id for testing
        $validatedData['user_id'] = auth()->user()->id;

        // Check if a logo file is uploaded
        if ($request->hasFile('company_logo')) {
            // Store the file and get its path
            $path = $request->file('company_logo')->store('logos', 'public');
            $validatedData['company_logo'] = $path;
        }
        Job::create($validatedData);
        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job): View
    {
        /** 
         *  @desc Display a single Job 
         * @route GET /jobs/{id}
         */
        return view('jobs.show', compact('job'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job): View
    {

        //check if user is authorized
        $this->authorize('update', $job);
        /** 
         *  @desc Show edit Job form
         * @route GET /jobs/{id}/edit
         */
        return view('jobs.form', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job): RedirectResponse
    {

        //check if user is authorized
        $this->authorize('update', $job);
        /** 
         *  @desc show Update Job 
         * @route PUT /jobs/{id}
         */
        $validatedData = $request->validated();

        if ($request->hasFile('company_logo')) {
            $validatedData['company_logo'] = $request->file('company_logo')->store('logos', 'public');
        }

        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job): RedirectResponse
    {

        //check if user is authorized
        $this->authorize('delete', $job);
        /** 
         *  @desc Delete a Job 
         * @route DELETE /jobs/{id}
         */
        // if the job has a logo, you might want to delete the file as well
        if ($job->company_logo) {
            // Storage::delete('public/logos/' . $job->company_logo);
            Storage::disk('public')->delete($job->company_logo);
        }
        // if ($job->company_logo) {
        //     Storage::delete('public/logos/' . $job->company_logo);
        // }

        $job->delete();

        // check if request came from dashboard
        if (request()->query('from') == 'dashboard') {
            return redirect()->route('dashboard')->with('success', 'Job Listing deleted successfully.');

        }
        return redirect()->route('jobs.index')->with('success', 'Job Listing deleted successfully.');
    }
}
