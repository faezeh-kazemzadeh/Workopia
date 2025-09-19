<x-layout>
    <section class="flex flex-col gap-4 md:flex-row">

        {{-- Profiel Info Form --}}

        <div class="bg-white p-8 rounded-lg shadow-md w-full">

            <h3 class="text-3xl text-center font-bold mb-4">
                Profile Info
            </h3>
            @if ($user->avatar)
                <div class="mt-2 flex justify-center">
                    <img src="/storage/{{ $user->avatar }}" alt="{{ $user->name }}"
                        class="w-32 h-32 object-cover rounded-full">
                </div>
            @endif
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-inputs.text id="name" name="name" label="Name" value="{{ $user->name }}" />
                <x-inputs.text id="email" name="email" label="Email address" value="{{ $user->email }}"
                    type="email" />
                <x-inputs.file id="avatar" name="avatar" label="Upload Avatar" />
                <button type="submit"
                    class="w-full bg-green-500 text-white px-4 py-2 border rounded hover:bg-green-600 focus:outline-none">
                    Save</button>
            </form>
        </div>
        {{-- Job Listings --}}
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">
                My Job Listing
            </h3>
            @forelse($jobs as $job)
                <div class="flex justify-between items-center border-b-2 border-gray-200 py-2">
                    <div class="flex ">
                        @if ($job->company_logo)
                            <img src="/storage/{{ $job->company_logo }}" alt="{{ $job->company_name }}"
                                class="w-1/8 rounded-lg mr-2">
                        @endif
                        <div>
                            <h3 class="text-xl font-semibold">{{ $job->title }}</h3>
                            <p class="text-gray-700">{{ $job->job_type }}</p>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('jobs.edit', $job->id) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded text-sm">Edit</a>
                        <form action="{{ route('jobs.destroy', $job->id) }}?from=dashboard" method="post"
                            onsubmit="return confirm('Are you sure you want to delete this job?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-700">You have no Job Listings</p>
            @endforelse
        </div>
    </section>
    <x-bottom-banner />

</x-layout>
