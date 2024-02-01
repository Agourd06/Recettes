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
        <a href="/UserRecipe"
            class="text-gray-600 hover:text-white duration-300	flex items-center justify-center hover:bg-[#B03000] rounded-md font-bold w-full  text-base py-2 px-4 cursor-pointer">
            <li>My Recipes</li>
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
    <div class="font-[sans-serif] text-gray-800 bg-white max-w-4xl flex items-center mx-auto md:h-[90vh] p-4">
        <div
            class="grid md:grid-cols-3 items-center shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-xl overflow-hidden">
            <div
                class="max-md:order-1 flex flex-col justify-center space-y-16 max-md:mt-16 min-h-full bg-gradient-to-r from-[#B03000] to-[#E98765] lg:px-8 px-4 py-4">
                <div>
                    <h4 class="text-white text-lg font-semibold">You can Edit your Recipe</h4>
                    <p class="text-[13px] text-white mt-2">We invite you to share your culinary masterpiece with the world! Take a moment to create and share your unique recipe. Your creativity and expertise are valued by our community.</p>
                </div>
          
            </div>
            <form action="/editing/{{$recipe->id}}" method="post" enctype="multipart/form-data"
                class="md:col-span-2 w-full py-6 px-6 sm:px-16">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <h3 class="text-2xl font-bold">Create an Recipe</h3>
                </div>
                <div class="space-y-5">
                    <div>
                        <label class="text-sm mb-2 block">Recipe Title</label>
                        <div class="relative flex items-center">
                            <input name="Title" value="{{$recipe->Title}}" type="text" required
                                class="bg-white border border-gray-300 w-full text-sm px-4 py-2.5 rounded-md outline-none"
                                placeholder="Enter Title" />
                        </div>
                    </div>
                    <div>
                        <label class="text-sm mb-2 block">Recipe Description</label>
                        <div class="relative flex items-center">
                            <textarea name="Desc"   placeholder="Enter Description"
                                class="bg-white border border-gray-300 w-full text-sm px-4 py-2.5 rounded-md outline-none">{{ $recipe->Desc }}</textarea>

                        </div>
                    </div>
                    <div>
                        <label class="text-sm mb-2 block">Recipe Image</label>
                        <div class="relative flex items-center">
                            <input type="file" name="image" value="{{ $recipe->image }}"
                class="w-full text-black text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-[#B03000] file:hover:bg-[#B03000] file:text-white rounded" />

                        </div>
                    </div>

                </div>
                <div class="!mt-10">
                    <button type="submit"
                        class="w-full py-3 px-4 text-sm font-semibold rounded text-white bg-[#B03000] hover:bg-[#B04000] focus:outline-none">
                        Edit a Recipe
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
