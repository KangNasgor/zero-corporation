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
    <form action="{{ route('password.update') }}" method="POST" class="bg-slate-700 p-10 rounded-md flex flex-col w-3/12">
        @csrf
        @method('POST')
        <input type="hidden" name="token" value="{{ $token }}">
        <label class="text-white">Email</label>
        <input type="email" placeholder="email" name="email" required class="px-2 rounded-md">
        <label class="text-white">Password</label>
        <input type="password" placeholder="password" name="password" required class="px-2 rounded-md">
        <label class="text-white">Confirm Password</label>
        <input type="password" placeholder="Confirm Password" name="password_confirmation" required class="px-2 rounded-md">
        <button type="submit" class="w-1/2 bg-slate-800 mt-2 rounded-md p-3 text-white text-sm">Submit</button>
    </form>
</body>
</html>