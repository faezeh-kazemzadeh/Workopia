<header class="bg-blue-900 text-white p-4 relative" x-data="{ mobileMenuOpen: false }" x-on:navigate.window="mobileMenuOpen = false">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <h1 class="text-2xl font-semibold">
            <a href="{{ url('/') }}">Workopia</a>
        </h1>

        <!-- Hamburger Button (mobile only) -->
        <button class="md:hidden text-white" @click="mobileMenuOpen = !mobileMenuOpen"
            :aria-expanded="mobileMenuOpen.toString()">
            <i class="fa fa-bars fa-2x" x-show="!mobileMenuOpen"></i>

            <i class="fa fa-times fa-2x" x-show="mobileMenuOpen"></i>
        </button>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex items-center space-x-4">
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="jobs">All Jobs</x-nav-link>
            @auth
                <x-nav-link href="jobs/saved">Saved jobs</x-nav-link>
                <x-nav-link href="dashboard" icon="gauge">Dashboard</x-nav-link>
                <x-logout-button />
                <x-button-link href="jobs/create" icon="edit">Create Job</x-button-link>
            @else
                <x-nav-link href="login">Login</x-nav-link>
                <x-nav-link href="register">Register</x-nav-link>
            @endauth
        </nav>
    </div>

    <!-- Mobile Menu (dropdown under header) -->
    <nav x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="max-h-0" x-transition:enter-end="max-h-96"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="max-h-96"
        x-transition:leave-end="max-h-0"
        class="overflow-hidden absolute left-0 top-full w-full bg-blue-900 text-white flex flex-col space-y-2 px-4 py-3 md:hidden shadow-lg z-40"
        @click.away="mobileMenuOpen = false">
        <x-nav-link :mobile="true" href="/">Home</x-nav-link>
        <x-nav-link :mobile="true" href="jobs">All Jobs</x-nav-link>
        @auth
            <x-nav-link :mobile="true" href="jobs/saved">Saved jobs</x-nav-link>

            <x-nav-link :mobile="true" href="dashboard" icon="gauge">Dashboard</x-nav-link>
            <div class="pt-2">
                <x-logout-button />
            </div>

            <x-button-link :mobile="true" href="jobs/create" icon="edit">Create Job</x-button-link>
        @else
            <x-nav-link :mobile="true" href="login">Login</x-nav-link>
            <x-nav-link :mobile="true" href="register">Register</x-nav-link>
        @endauth
    </nav>
</header>
