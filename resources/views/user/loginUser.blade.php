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
    <body class="bg-black h-screen">
        <div class="flex flex-col justify-center h-screen gap-3">
            <form class="bg-gradient-to-br from-purple-950 via-purple-900 to-purple-800 w-fit p-5 rounded-md mx-auto" method="POST" action="{{ route('login.user') }}">
                @csrf
                @method('POST')
                <div class="w-full mx-auto flex flex-col gap-5">
                    <h1 class="text-xl text-white w-fit mx-auto">Login dulu masbro!</h1>
                    <div>
                        <h1 class="text-white w-fit mb-2">Nama</h1>
                        <input class="mx-auto w-full rounded-md px-2 py-1" name="name">
                    </div>
                    <div class="w-full">
                        <h1 class="text-white w-fit mb-2">Password</h1>
                        <div class="flex items-center gap-2">
                            <input class="mx-auto w-full rounded-md px-2 py-1" type="password" name="password" id="password">
                            <i class="fa-regular fa-eye text-white block min-w-6 cursor-pointer" id="eyeOn"></i>
                            <i class="fa-regular fa-eye-slash text-white hidden min-w-6 cursor-pointer" id="eyeOff"></i>
                        </div>
                    </div>
                    <a class="text-sm text-cyan-400" href="{{ route('registerUserView') }}">Belum punya akun? daftar dulu coy!</a>
                    <button class="bg-purple-500 w-fit rounded-md py-2 px-3 mx-auto text-white" type="submit">
                        Gas!
                    </button>
                </div>
            </form>
            <div class="hidden bg-red-600/50 border w-fit mx-auto border-red-600 py-9 px-5 rounded-md" id="failedMessageDiv">
                @if (session('account-404'))
                    <div id="accountFailedMessage">
                        {{ session('account-404') }}
                    </div>
                @endif
                @if (session('creds-failed'))
                    <div id="credsFailedMessage">
                        {{ session('creds-failed') }}
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
<script>
    let accountFailedMessage = document.getElementById('accountFailedMessage');
    let credsFailedMessage = document.getElementById('credsFailedMessage');
    let failedMessageDiv = document.getElementById('failedMessageDiv');
    if(accountFailedMessage || credsFailedMessage){
        failedMessageDiv.style.display = "block";
    }
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