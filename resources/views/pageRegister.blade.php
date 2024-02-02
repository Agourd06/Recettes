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
  
    <div class="font-[sans-serif] text-[#333] relative">
        <div class="h-[240px] font-[sans-serif]">
            <img src="https://portalupiwine.com/wp-content/uploads/2023/10/Italian-Holiday-Meal.jpeg" alt="Banner Image" class="w-full h-full object-cover" />
        </div>
        <div class="relative -mt-40 m-4">
            <form class="bg-white max-w-xl w-full mx-auto shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6 rounded-md" action="/register" method="post">
            @csrf
           
                <div class="mb-12">
                    <h3 class="text-3xl font-extrabold text-center">Create an account</h3>
                </div>
                <div class="text-red-500 text-[20px] w-full text-center">
                    @if ($errors->any())
                        <div>{{ $errors->first() }}</div>
                    @endif
                </div>
                <div>
                    <label class="text-xs block mb-2">Full Name</label>
                    <div class="relative flex items-center">
                        <input name="name" type="text"  class="w-full bg-transparent text-sm border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" placeholder="Enter name" />

                    </div>
                </div>
                <div class="mt-10">
                    <label class="text-xs block mb-2">Email</label>
                    <div class="relative flex items-center">
                        <input name="email" type="text"  class="w-full bg-transparent text-sm border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" placeholder="Enter email" />

                    </div>
                </div>
                <div class="mt-10">
                    <label class="text-xs block mb-2">Password</label>
                    <div class="relative flex items-center">
                        <input name="password" type="password"  class="w-full bg-transparent text-sm border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" placeholder="Enter password" />

                    </div>
                    <ul class="mt-2 px-4 grid sm:grid-cols-2 gap-y-1 gap-x-6 w-max list-disc">
                        <li class="text-xs text-orange-500">minimum 3 characters</li>
                        <li class="text-xs text-orange-500">maximum 16 characters</li>
                      </ul>
                </div>

                <div class="mt-12">
                    <button type="submit" class="w-full shadow-xl py-2.5 px-8 text-sm font-semibold rounded-md text-white bg-[#B03000] hover:bg-[#E98765] focus:outline-none transition-all">
                        Register
                    </button>
                    <p class="text-sm mt-8 text-center">Already have an account? <a href="/" class="text-[#B03000] font-semibold hover:underline ml-1">Login here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
