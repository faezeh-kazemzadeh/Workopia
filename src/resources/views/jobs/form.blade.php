<x-layout>
    <x-slot name="title">{{ isset($job) ? 'Edit Job' : 'Create New Job' }}</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">{{ isset($job) ? 'Edit Job' : 'Create New Job' }}</h2>


        <form action="{{ isset($job) ? route('jobs.update', $job->id) : route('jobs.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @if (isset($job))
                @method('PUT')
            @endif
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Job Info</h2>

            <x-inputs.text name="title" id="title" placeholder="Software Engineer" label="title"
                :value="$job->title ?? ''" />


            <x-inputs.text-area name="description" id="description"
                placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..."
                label="Job Description" :value="$job->description ?? ''" />

            <x-inputs.text type="number" name="salary" id="salary" placeholder="50000" label="Annual Salary"
                :value="$job->salary ?? ''" />

            <x-inputs.text-area name="requirements" id="requirements"
                placeholder="Bachelor's degree in Computer Science or related field..." label="Requirements"
                :value="$job->requirements ?? ''" />

            <x-inputs.text-area name="benefits" id="benefits" placeholder="Health insurance, 401(k) matching..."
                label="Benefits" :value="$job->benefits ?? ''" />

            <x-inputs.text name="tags" id="tags" placeholder="e.g., remote,full-time,senior" label="Tags"
                :value="$job->tags ?? ''" />


            <x-inputs.select name="job_type" id="job_type" :options="[
                'Full-Time' => 'Full-Time',
                'Part-Time' => 'Part-Time',
                'Contract' => 'Contract',
                'Temporary' => 'Temporary',
                'Internship' => 'Internship',
                'Volunteer' => 'Volunteer',
                'On-Call' => 'On-Call',
            ]" label="Job Type" :selected="$job->job_type ?? ''">Choose
                job type...</x-inputs.select>

            <x-inputs.select name="is_remote" id="is_remote" :options="[
                '0' => 'No',
                '1' => 'Yes',
            ]" label="Remote" :selected="$job->is_remote ?? ''" />

            <x-inputs.text name="address" id="address" placeholder="e.g., New York, NY or Remote" label="Address"
                :value="$job->address ?? ''" />

            <x-inputs.text name="city" id="city" placeholder="e.g., New York" label="City"
                :value="$job->city ?? ''" />

            <x-inputs.text name="state" id="state" placeholder="e.g., NY" label="State" :value="$job->state ?? ''" />

            <x-inputs.text name="zip_code" id="zip_code" placeholder="e.g., 10001" label="Zip Code"
                :value="$job->zip_code ?? ''" />

            <x-inputs.text name="company_name" id="company_name" placeholder="Enter Company Name" label="Company Name"
                :value="$job->company_name ?? ''" />


            <x-inputs.text-area name="company_description" id="company_description" placeholder="About the company..."
                label="Company Description" :value="$job->company_description ?? ''" />
            <x-inputs.text name="company_website" id="company_website" placeholder="Enter Company Website"
                label="Company Website" :value="$job->company_website ?? ''" type="url" />

            <x-inputs.text name="contact_phone" id="contact_phone" placeholder="Enter Contact Phone"
                label="Contact Phone" :value="$job->contact_phone ?? ''" />
            <x-inputs.text type="email" name="contact_email" id="contact_email" placeholder="Enter Contact E-mail"
                label="Contact E-mail" :value="$job->contact_email ?? ''" />

            <x-inputs.file name="company_logo" id="company_logo" label="Company Logo" />
            <button type="submit"
                class="bg-green-500 hover:bg-green-600 px-4 py-2 my-3 text-white rounded focus:outline-none">{{ isset($job) ? 'Update Job' : 'Create Job' }}</button>
        </form>
    </div>

</x-layout>
