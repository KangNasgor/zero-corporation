<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-900">
    <h1 class="text-white text-center">Berhasil Log In Kang! Mantap</h1>
    <a class="bg-slate-800 text-white p-5 rounded-md" href="{{ route('logout.user') }}">
        Logout
    </a>
</body>
</html>