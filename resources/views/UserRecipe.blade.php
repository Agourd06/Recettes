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
    @auth
    @include('layouts/navbar')

    <div class="bg-white font-[sans-serif] my-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h2
                    class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-pink-400 after:rounded-full">
                    My RECIPES</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16 max-md:max-w-lg mx-auto">
                @forelse ($recipes as $myrecipe)
                    <div
                        class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative group">

                        <img src="{{ asset('storage/image/' . $myrecipe['image']) }}" alt="{{ $myrecipe['Title'] }}"
                            class="w-full h-96 object-cover" />


                        <div class="p-6 absolute  bottom-0 left-0 right-0 bg-white opacity-90">
                            <div class="flex justify-rounded gap-24">
                                <div class="">
                                    <h3 class="text-[18px] font-bold text-[#333]  ">{{ $myrecipe['Title'] }}</h3>
                                </div>
                                <div class="flex">
                                    <a href="/editing/{{ $myrecipe->id }}"
                                        class="text-gray-900 bg-white max-h-[42px] border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        <button>EDITING</button>
                                    </a>
                                    <form action="/deleting/{{ $myrecipe->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">DELETE</button>
                                    </form>
                                </div>
                            </div>
                            <div
                                class="h-0 overflow-hidden group-hover:h-full group-hover:mt-4 transition-all duration-300">
                                <p class="text-gray-600 text-sm">{!! nl2br($myrecipe['Desc']) !!}</p>

                            </div>
                        </div>


                    </div>
                @empty
                    <div class="w-full text-right">
                        <p class="text-[20px] text-gray-600">No recipes found</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    @else
    <div class="bg-white font-[sans-serif] my-8 text-center">
        <h2 class="text-3xl font-extrabold text-[#333] mb-6">Access Denied</h2>
        <p class="text-base text-center text-gray-600">You need to be logged in to view this page.</p>
        <a href="/login" class="text-[#B03000] font-bold">Login</a>
    </div>
@endauth
<footer class="bg-gray-200 py-12 px-8 font-[sans-serif]">
    <div class="md:flex md:items-center ">
      <div class="md:w-76 max-md:text-center">
        <a href='javascript:void(0)' class="max-md:mx-auto"><img src="{{ asset('image/foodlogo.png') }}"
          alt="logo" class='w-48 inline-block' /></a>
      </div>
      <div class="max-md:mt-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 items-center mb-8">
          <ul class="col-span-2 md:flex max-lg:justify-center max-md:text-center md:space-x-4 max-md:space-y-4">
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
