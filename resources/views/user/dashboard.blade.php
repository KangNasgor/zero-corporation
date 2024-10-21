<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/3ab26b6439.js" crossorigin="anonymous"></script>
</head>
<body class="bg-slate-900 h-screen">
    <div class="flex flex-col gap-1 ml-5 w-fit fixed z-40 mt-5" onclick="openMenu('bar-1', 'bar-2', 'bar-3')">
        <div class="h-1 w-6 bg-white transition rounded-sm" id="bar-1"></div>
        <div class="h-1 w-6 bg-white transition rounded-sm" id="bar-2"></div>
        <div class="h-1 w-6 bg-white transition rounded-sm" id="bar-3"></div>
    </div>
    <div class="h-full fixed w-2/12 bg-slate-700 text-center pt-12 z-30 overflow-x-hidden -translate-x-full transition" id="sidebar">
        <a href="{{ route('profile.user') }}">
            <div class="bg-slate-600 py-4 flex justify-center">
                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-user text-white"></i>
                    <p class="text-white w-fit">Profile</p>
                </div>
            </div>
        </a>
    </div>
    <a href="{{ route('logout.user') }}" class="w-fit block mx-auto">
        <div class="bg-slate-800 text-white p-5 rounded-md w-fit">
            Logout
        </div>
    </a>
</body>
</html>
<script>
    let opened = false;
    const sidebar = document.getElementById('sidebar');
    function openMenu(bar1Id, bar2Id, bar3Id){
        const bar1 = document.getElementById(bar1Id);
        const bar2 = document.getElementById(bar2Id);
        const bar3 = document.getElementById(bar3Id);
        if(opened == false){
            bar1.style.transform = "translate(0, 8px) rotate(-45deg)";
            bar2.style.opacity = "0";
            bar3.style.transform = "translate(0, -8px) rotate(45deg)";
            opened = true;
            sidebar.classList.add('translate-x-0');
            sidebar.classList.remove('-translate-x-full');
        }
        else if(opened == true){
            bar1.style.transform = "translate(0, 0) rotate(0)";
            bar2.style.opacity = "100";
            bar3.style.transform = "translate(0, 0) rotate(0)";
            opened = false;
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
        }
    }
</script>