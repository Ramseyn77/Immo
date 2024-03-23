<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class=" flex justify-center items-center py-3 space-x-10 bg-blue-400">
        <div class=" text-2xl text-white font-bold">T-Ressources</div>
        <div class="flex text-sm translate-y-[5%] justify-center text-gray-100 space-x-6"> 
            <a class="hover:text-gray-200 hover:cursor:pointer" href="{{route('categories.index')}}">Home</a>
            <a class="hover:text-gray-200 hover:cursor:pointer" href="{{route('categories.create')}}">Create</a>
            <a class="hover:text-gray-200 hover:cursor:pointer" href="#">About</a>
        </div>
    </div>

    @yield('content')

</body>
</html>