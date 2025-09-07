@props(['heading'=>'Looking to hire?', 'subheading'=>'Post your job openings and find the perfect candidates today.'])
<section class="container mx-auto m-6">
    <div class="bg-blue-800 text-white rounded p-4 flex items-center justify-between flex-col md:flex-row gap-4">
        <div class="">
            <h2 class="text-xl font-semibold">
                {{$heading}} 
            </h2>
            <p class="text-gray-200 text-lg mt-2">{{$subheading}}</p>
        </div>
        <x-button-link href="jobs/create" icon="edit">Create Job</x-button-link>
    </div>
</section>