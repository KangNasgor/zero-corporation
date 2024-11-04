<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset password</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black flex justify-center items-center h-screen">
    <form action="{{ route('password.email') }}" method="POST" class="bg-gradient-to-br from-purple-900 to-purple-800 p-10 rounded-md flex flex-col w-3/12">
        @csrf
        @method('POST')
        <h1 class="text-white mb-3">Please type your email so we can send you password reset link</h1>
        <label class="text-white mb-2">Email</label>
        <input type="email" placeholder="Email" name="email" required class="px-2 py-1 rounded-md mb-4">
        <button type="submit" class="w-1/2 bg-purple-500 mt-2 rounded-md p-3 text-white text-sm">Submit</button>
    </form>
</body>
</html>