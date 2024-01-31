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
    <form action="/logout" method="POST">
        @csrf
        <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Log Out</button>

    </form>
    <p>Recettes</p>
    <a href="{{ route('recettePage') }}">All recipes</a>
    <section class="flex gap-8 w-[80%] mx-auto flex-wrap">
        @foreach ($recipes as $myrecipe)
            <div class="text-[20px] bg-black text-white flex flex-col items-center gap-4  w-[30%] p-4 rounded-[15px]">
                <h1>{{ $myrecipe['Title'] }}</h1>
                <p>{{ $myrecipe['Desc'] }}</p>
                <div class="flex gap-4">
                    <a href="/editing/{{ $myrecipe->id }}"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><button>Editing</button></a>

                    <form action="/deleting/{{ $myrecipe->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">DELETE</button>
                    </form>

                </div>
            </div>
        @endforeach
    </section>

</body>

</html>
