<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Job;
class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //get test user 
        $testUser = User::where('email', 'test@test.com')->firstOrFail
        ();

        //get all job Ids
        $jobIds = Job::pluck('id')->toArray();

        $randomJobIds = array_rand($jobIds, 3);

        // Attach selected jobs to test user
        foreach ($randomJobIds as $jobId) {
            $testUser->bookmarkedJobs()->attach($jobIds[$jobId]);

        }
    }
}
