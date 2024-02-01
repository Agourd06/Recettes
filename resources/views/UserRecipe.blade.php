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
    <ul class="flex bg-gray-200 rounded-md p-1.5 overflow-hidden font-sans max-h-[10vh]">
        <a href="/recettePage" class="flex items-center">
            <li><img src="{{ asset('image/foodlogo.png') }}" alt="" class="w-[800px]"></li>
        </a>
        <a href="/recettePage"
            class="text-gray-600 hover:text-white duration-300	flex items-center justify-center hover:bg-[#B03000] rounded-md font-bold w-full  text-base py-2 px-4 cursor-pointer">
            <li>Recipes</li>
        </a>
        <a href="/recettePage"
            class="text-gray-600 hover:text-white duration-300	flex items-center justify-center hover:bg-[#B03000] rounded-md font-bold w-full  text-base py-2 px-4 cursor-pointer">
            <li>All Recipes</li>
        </a>
        <a href="/add-page"
            class="text-gray-600 hover:text-white duration-300	flex items-center justify-center hover:bg-[#B03000] rounded-md font-bold w-full  text-base py-2 px-4 cursor-pointer">
            <li>Add Recipes</li>
        </a>
        <form action="/logout" method="POST"
            class="text-gray-600 hover:text-white duration-300	flex items-center justify-center hover:bg-[#B03000] rounded-md font-bold w-full  text-base py-2 px-4 cursor-pointer">
            @csrf
            <button>Log Out</button>

        </form>
    </ul>
    <div class="bg-white font-[sans-serif] my-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h2
                    class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-pink-400 after:rounded-full">
                    My RECIPES</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16 max-md:max-w-lg mx-auto">
                @foreach ($recipes as $myrecipe)
                    <div
                        class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative group">

                        <img src="{{ asset('storage/image/' . $myrecipe['image']) }}" alt="{{ $myrecipe['Title'] }}"
                            class="w-full h-96 object-cover" />


                        <div class="p-6 absolute  bottom-0 left-0 right-0 bg-white opacity-90">
                            <div class="flex justify-rounded gap-24">
                                <div class="max-w-[90px] text-wrap">
                                    <h3 class="text-xl font-bold text-[#333] max-w-full ">{{ $myrecipe['Title'] }}</h3></div>
                                <div class="flex">
                                    <a href="/editing/{{ $myrecipe->id }}"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        <button>Editing</button>
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
                                <p class="text-gray-600 text-sm">{!! $myrecipe['Desc'] !!}</p>
                            </div>
                        </div>


                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
