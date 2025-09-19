<x-layout>
    <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
        <h2 class="text-4xl text-center font-bold mb-4">Login</h2>
        <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <x-inputs.text id="email" name="email" type="email" placeholder="Email Address" />
            <x-inputs.text id="password" name="password" type="password" placeholder="Password" />
            <div class="flex items-center mb-4">
                <input id="remember" type="checkbox" name="remember" value="1" class="mr-2">
                <label for="remember" class="text-gray-700">Remember Me</label>
            </div>
            <button
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none">Login</button>
        </form>
        <p class="mt-4 text-gray-700">Don't have an account? <a href="{{ route('register') }}"
                class="text-blue-900 hover:underline">Register</a></p>

    </div>
</x-layout>
