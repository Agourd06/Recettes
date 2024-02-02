<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    @include('layouts/navbarlog')

    <div
        class="relative font-[sans-serif] before:absolute before:w-full before:h-full before:inset-0 before:bg-black before:opacity-50 before:z-10">
        <img src="https://www.allrecipes.com/thmb/hoEsUdGmsiFyvXm5Ed5t2Gd1u7k=/1900x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/2400-240708-broccoli-and-chicken-stir-fry-3x4-186-b7f290a400134ae9910f2e67ff50d9f2.jpg"
            alt="Banner Image" class="absolute inset-0 w-full h-full object-cover" />
        <div
            class="min-h-[380px] relative z-50 h-full max-w-6xl mx-auto flex flex-col justify-center items-center text-center text-white p-6">
            <h2 class="sm:text-4xl text-2xl font-bold mb-6">Your Culinary Companion</h2>
            <p class="text-base text-center text-gray-200">Explore the world of <a
                    class="text-[#B03000] font-bold">FOOD</a> HOUSE, where delicious recipes come to life! Dive into
                easy-to-follow cooking adventures that celebrate flavor and fun. Join our food-loving community and
                discover a world of culinary delights waiting to be savored and shared. Let's cook up something amazing
                together!</p>
            <form action="/search" method="get"
                class="bg-white text-black mt-6 flex px-1 py-1 rounded-full border border-[#B03000] overflow-hidden max-w-md mx-auto font-[sans-serif]">
                <input type='search' name ="search" placeholder='Search Something...'
                    class="w-full outline-none bg-white pl-4 text-sm" />
                <button type='submit'
                    class="bg-[#B03000] hover:bg-[#B04000] transition-all text-white text-sm rounded-full px-5 py-2.5">Search</button>
            </form>

        </div>

    </div>

    <div class="bg-white font-[sans-serif] my-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h2
                    class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-pink-400 after:rounded-full">
                    RECIPES</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16 max-md:max-w-lg mx-auto">
                @foreach ($recipes as $recipe)

                    <div
                        class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative group">
                        <img src="{{ asset('storage/image/' . $recipe['image']) }}" alt="{{ $recipe['Title'] }}" class="w-full h-96 object-cover" />
                        <div class="p-6 absolute bottom-0 left-0 right-0 bg-white opacity-90">
                            <h3 class="text-xl font-bold text-[#333]">{{ $recipe['Title'] }}</h3>
                            <div
                                class="h-0 overflow-hidden group-hover:h-full group-hover:mt-4 transition-all duration-300">
                                <p class="text-gray-600 text-sm">{!! nl2br($recipe['Desc']) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <footer class="bg-gray-200 py-12 px-8 font-[sans-serif]">
        <div class="md:flex md:items-center ">
            <div class="md:w-76 max-md:text-center">
                <a href='javascript:void(0)' class="max-md:mx-auto"><img src="{{ asset('image/foodlogo.png') }}"
                        alt="logo" class='w-48 inline-block' /></a>
            </div>
            <div class="max-md:mt-8 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-3 items-center mb-8">
                    <ul
                        class="col-span-2 md:flex max-lg:justify-center max-md:text-center md:space-x-4 max-md:space-y-4">
                        <li>
                            <a href='' class='hover:text-[#B03000] text-[#B05000] text-[15px]'>Recipes</a>
                        </li>
                        <li>
                            <a href='/UserRecipe' class='hover:text-[#B03000] text-[#B05000] text-[15px]'>Profile</a>
                        </li>
                        <li>
                            <a href='' class='hover:text-[#B03000] text-[#B05000] text-[15px]'>Add recipe</a>
                        </li>
                        <li>
                            <a href='/' class='hover:text-[#B03000] text-[#B05000] text-[15px]'>log out</a>
                        </li>

                    </ul>

                </div>
                <div class="border-t text-center border-[#6b5f5f] pt-8 mt-8">
                    <div class="text-center flex items-center justify-center mt-12 ">
                        <p class='text-sm text-[#B03000]  '>Copyright © 2024 foodHouse All Rights Reserved.</p>

                    </div>
                </div>
            </div>
    </footer>
</body>

</html>
