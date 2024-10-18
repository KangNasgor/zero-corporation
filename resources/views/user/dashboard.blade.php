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
    <div class="flex flex-col gap-1 mt-5 ml-5 w-fit" onclick="openMenu('bar-1', 'bar-2', 'bar-3')">
        <div class="h-1 w-6 bg-white transition" id="bar-1"></div>
        <div class="h-1 w-6 bg-white transition" id="bar-2"></div>
        <div class="h-1 w-6 bg-white transition" id="bar-3"></div>
    </div>
    <a href="{{ route('logout.user') }}" class="w-fit block mx-auto">
        <div class="bg-slate-800 text-white p-5 rounded-md w-fit mt-10">
            Logout
        </div>
    </a>
</body>
</html>
<script>
    let opened = false;
    function openMenu(bar1Id, bar2Id, bar3Id){
        const bar1 = document.getElementById(bar1Id);
        const bar2 = document.getElementById(bar2Id);
        const bar3 = document.getElementById(bar3Id);
        if(opened == false){
            bar1.style.transform = "translate(0, 8px) rotate(-45deg)";
            bar2.style.opacity = "0";
            bar3.style.transform = "translate(0, -8px) rotate(45deg)";
            opened = true;
        }
        else if(opened == true){
            bar1.style.transform = "translate(0, 0) rotate(0)";
            bar2.style.opacity = "100";
            bar3.style.transform = "translate(0, 0) rotate(0)";
            opened = false;
        }
        
    }
</script>