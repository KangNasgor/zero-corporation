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
    <form action="{{ route('password.update') }}" method="POST" class="bg-gradient-to-br from-purple-900 to-purple-800 p-10 rounded-md flex flex-col w-10/12 sm:w-3/12">
        @csrf
        @method('POST')
        <input type="hidden" name="token" value="{{ $token }}">
        <label class="text-white mb-1">Email</label>
        <input type="email" placeholder="Email" name="email" required class="px-2 py-1 rounded-md mb-3">
        <label class="text-white mb-1">Password</label>
        <input type="password" placeholder="Password" name="password" required class="px-2 py-1 rounded-md mb-3">
        <label class="text-white mb-1">Confirm Password</label>
        <input type="password" placeholder="Confirm Password" name="password_confirmation" required class="px-2 py-1 rounded-md mb-3">
        <button type="submit" class="w-1/2 bg-slate-800 mt-2 rounded-md p-3 text-white text-sm">Submit</button>
        @if($errors->any())
        <div class="text-white">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    </form>
</body>
</html>