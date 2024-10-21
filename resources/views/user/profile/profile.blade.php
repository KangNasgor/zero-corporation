<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/3ab26b6439.js" crossorigin="anonymous"></script>
</head>
<body class="bg-slate-900">
    <a href="{{ route('dashboard.user') }}">
        <div class="flex items-center text-white gap-2 ml-2 mt-2">
            <i class="fa-solid fa-arrow-left"></i>
            <p>Back</p>
        </div>
    </a>
    <div class="bg-slate-800 w-10/12 grid grid-cols-2 gap-5 mt-10 p-10 mx-auto rounded-md">
        <div class="bg-slate-700 w-72 p-5 mx-auto rounded-md">
            <h1 class="text-white text-xl text-center">User Data</h1>
            <p class="text-white">Nama : {{ Auth::user()->name }}</p>
            <p class="text-white">Email : {{ Auth::user()->email }}</p>
        </div>
        <div class="bg-slate-700 w-72 p-5 mx-auto rounded-md">
            ..Other data
        </div>
        <div class="bg-slate-700 w-72 p-5 mx-auto rounded-md">
            ..Other data
        </div>
        <div class="bg-slate-700 w-72 p-5 mx-auto rounded-md">
            ..Other data
        </div>
    </div>
</body>
</html>