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
    @guest
    <a href="/"
    class="text-gray-600 hover:text-white duration-300	flex items-center justify-center hover:bg-[#B03000] rounded-md font-bold w-full  text-base py-2 px-4 cursor-pointer">
    <li>Login</li>
</a>
<a href="/page-register"
    class="text-gray-600 hover:text-white duration-300	flex items-center justify-center hover:bg-[#B03000] rounded-md font-bold w-full  text-base py-2 px-4 cursor-pointer">
    <li>Register</li>
</a>
    @endguest

    @auth
    <form action="/logout" method="POST"
    class="text-gray-600 hover:text-white duration-300	flex items-center justify-center hover:bg-[#B03000] rounded-md font-bold w-full  text-base py-2 px-4 cursor-pointer">
    @csrf
    <button>Log Out</button>
</form>
    @endauth

</ul>
