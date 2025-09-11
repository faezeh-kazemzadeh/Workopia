<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Job;
use Illuminate\Database\QueryException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Job::factory()->count(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('job_listing')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(TestUserSeeder::class);
        $this->call(RandomUserSeeder::class, );
        $this->call(JobSeeder::class);
    }
}
