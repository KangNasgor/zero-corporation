<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <script src="https://kit.fontawesome.com/3ab26b6439.js" crossorigin="anonymous"></script>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-slate-800 grid place-items-center h-screen">
        <form class="bg-slate-700 w-fit p-5 rounded-md mx-auto" method="POST" action="{{ route('login.user') }}">
            @csrf
            @method('POST')
            <div class="w-full mx-auto flex flex-col gap-5">
                <h1 class="text-xl text-white w-fit mx-auto">Daftar dulu kang!</h1>
                <div>
                    <h1 class="text-white w-fit mb-2">Nama</h1>
                    <input class="mx-auto w-full rounded-md px-2 py-1" name="name">
                </div>
                <div>
                    <h1 class="text-white w-fit mb-2">Email</h1>
                    <input class="mx-auto w-full rounded-md px-2 py-1" name="email" type="email">
                </div>
                <div class="w-full">
                    <h1 class="text-white w-fit mb-2">Password</h1>
                    <div class="flex items-center gap-2">
                        <input class="mx-auto w-full rounded-md px-2 py-1" type="password" name="password" id="password">
                        <i class="fa-regular fa-eye text-white block min-w-6" id="eyeOn"></i>
                        <i class="fa-regular fa-eye-slash text-white hidden min-w-6" id="eyeOff"></i>
                    </div>
                </div>
                <button class="bg-slate-500 w-fit rounded-md py-2 px-3 mx-auto text-white" type="submit">
                    Gas!
                </button>
            </div>
        </form>
    </body>
</html>
<script>
    let password = document.getElementById('password');
    let eyeOn = document.getElementById('eyeOn');
    let eyeOff = document.getElementById('eyeOff');
    eyeOn.onclick = function(){
        eyeOn.style.display = "none";
        eyeOff.style.display = "block";
        password.type = "text";
    }
    eyeOff.onclick = function(){
        eyeOn.style.display = "block";
        eyeOff.style.display = "none";
        password.type = "password";
    }
</script>