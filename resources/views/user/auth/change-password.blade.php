<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset password</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-900 flex justify-center items-center h-screen">
    <form action="{{ route('password.email') }}" method="POST" class="bg-slate-700 p-10 rounded-md flex flex-col w-3/12">
        @csrf
        @method('POST')
        <h1 class="text-white">Please type your email so we can send you password reset link</h1>
        <label class="text-white">Email</label>
        <input type="email" placeholder="email" name="email" required class="px-2 rounded-md">
        <button type="submit" class="w-1/2 bg-slate-800 mt-2 rounded-md p-3 text-white text-sm">Submit</button>
    </form>
</body>
</html>