@props(['title' => 'Find Your Dream Job Today'])
<section class="hero relative bg-cover bg-center bg-no-repeat h-80 flex items-center">
    <div class="overlay"></div>
    <div class="container mx-auto text-center z-10">
        <h2 class="text-4xl md:text-5xl text-white font-bold mb-8">
            {{$title}}
        </h2>
        <form action="" class="block mx-5 md:mx-auto md:space-x-2">
            <input type="text" name="keywords" placeholder="keywords" class="w-full md:w-72 p-3 focus:outline-none bg-white mt-2 md:mt-0">
            <input type="text" name="location" placeholder="location" class="w-full md:w-72 p-3 focus:outline-none mt-2 md:mt-0 bg-white my-2 ">
            <button type="submit" class="w-full md:w-auto bg-blue-700 hover:bg-blue-600 text-white px-4 py-3 focus:outline-none"><i class="fa fa-search mr-1"></i>Search</button>
        </form>
    </div>

</section>