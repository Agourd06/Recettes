<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>

    <div class="font-[sans-serif] text-[#333] max-w-7xl mx-auto max-h-screen overflow-none">
        <div class="grid md:grid-cols-2 items-center gap-8 h-[70vh]">
            <form action="/login" method="post" class="max-w-lg max-md:mx-auto w-full p-6">
                @csrf
                <div class="mb-10">
                    <h3 class="text-4xl font-extrabold">Sign in</h3>
                    <p class="text-sm mt-6">Immerse yourself in a hassle-free login journey with our intuitively
                        designed login form. Effortlessly access your account.</p>
                </div>
                <div>
                    <label class="text-[15px] mb-3 block">Username</label>
                    <div class="relative flex items-center">
                        <input name="logname" type="text" required
                            class="w-full text-sm bg-gray-100 px-4 py-4 rounded-md outline-blue-600"
                            placeholder="Username" />

                    </div>
                </div>
                <div class="mt-6">
                    <label class="text-[15px] mb-3 block">Password</label>
                    <div class="relative flex items-center">
                        <input name="logpassword" type="password" required
                            class="w-full text-sm bg-gray-100 px-4 py-4 rounded-md outline-blue-600"
                            placeholder="Enter password" />
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit"
                        class="w-full shadow-xl py-3 px-4 text-sm font-semibold rounded text-white bg-[#B03000] hover:bg-[#E98765] focus:outline-none">
                        Log in
                    </button>
                </div>
                <p class="text-sm mt-10 text-center">Don't have an account <a href="{{ route('page.register') }}"
                        class="text-[#B03000] font-semibold hover:underline ml-1">Register here</a></p>
            </form>
            <div
                class="md:h-[85%] md:py-6  flex items-center relative max-md:before:hidden before:absolute before:bg-gradient-to-r before:from-gray-50 before:via-[#E38765] before:to-[#B03000] before:h-full before:w-3/4 before:right-0 before:z-0">
                <img src="https://www.44foods.com/cdn/shop/files/Site_cover_xmas_23_mobile_1000_x_1400_px.png"
                    class="rounded-md lg:w-4/5 md:w-11/12 h-[80%] z-50 relative" alt="Dining Experience" />
            </div>
        </div>
    </div>

</body>

</html>
