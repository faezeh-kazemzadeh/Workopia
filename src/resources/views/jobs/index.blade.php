<x-layout>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

         @forelse($jobs as $job)
         <x-job-card :job="$job"/>
         @empty
         <p class="text-center text-gray-500">No job listings available at the moment.</p>
         @endforelse
           

    </div>
   
</x-layout>