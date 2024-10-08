<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <!-- FontAwesomeIcons -->
    <script src="https://kit.fontawesome.com/3ab26b6439.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="bg-slate-900">
    <nav class="flex items-center bg-slate-700 mb-5">
        <a class="text-white w-fit text-2xl p-4" href="{{route('home')}}">ZERO</a>
        <a class="text-slate-300 w-fit text-lg p-4" href="{{route('products')}}">Products</a>
        <a class="text-slate-300 w-fit text-lg p-4" href="{{route('employee')}}">Employee</a>
        <a class="text-slate-300 w-fit text-lg p-4" href="{{route('products')}}">Products</a>
        <a class="text-slate-300 w-fit text-lg p-4" href="{{route('products')}}">Products</a>
        <a class="text-slate-300 w-fit text-lg p-4" href="{{ route('logout') }}">Logout</a>
    </nav>
    <div class="">
        @yield('layout')
    </div>
</body>

</html>

