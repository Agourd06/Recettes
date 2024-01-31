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
    <section class="h-screen w-screen flex justify-center items-center flex-col gap-8">
        <div class="border border-solid w-screen h-[1px]"></div>

        <h1 class="text-[20px]">Edit Recipe</h1>

        <form action="/editing/{{$recipe->id}}" method="post" class="flex flex-col gap-6 ">
            @csrf
            @method('PUT')
            <input type="text" name="Title" value="{{$recipe->Title}}" placeholder="Title" class="outline px-2">
            <textarea name="Desc" id="" placeholder="Description" class="outline px-2">{{$recipe->Desc}}</textarea>
            <button type="submit">Edit</button>
        </form>
    </section>
</body>

</html>
