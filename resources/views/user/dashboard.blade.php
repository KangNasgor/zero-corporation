<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/3ab26b6439.js" crossorigin="anonymous"></script>
</head>

<body class="bg-slate-900">
    <div class="flex flex-col gap-1 ml-5 mt-3 w-fit fixed z-40 cursor-pointer"
        onclick="openMenu('bar-1', 'bar-2', 'bar-3')">
        <div class="h-1 w-6 bg-white transition rounded-sm" id="bar-1"></div>
        <div class="h-1 w-6 bg-white transition rounded-sm" id="bar-2"></div>
        <div class="h-1 w-6 bg-white transition rounded-sm" id="bar-3"></div>
    </div>
    <div class="h-full fixed w-7/12 md:w-2/12 bg-slate-800 text-center pt-12 z-30 overflow-x-hidden -translate-x-full transition overflow-hidden"
        id="sidebar">
        <div class="h-full w-10/12 bg-slate-900 mx-auto rounded-md">
            <div class="pl-3 pt-3 mb-4">
                <p class="text-sm text-white w-fit">Menu</p>
            </div>
            <div class="flex flex-col gap-3 pl-1">
                <a href="{{ route('dashboard.user') }}">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-lg">
                            <i class="fa-solid fa-table-columns text-white"></i>
                            <p class="text-white w-fit">Dashboard</p>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-lg">
                            <i class="fa-solid fa-bag-shopping text-white"></i>
                            <p class="text-white w-fit">Products</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="pl-3 pt-3 mb-4">
                <p class="text-sm text-white w-fit">Account</p>
            </div>
            <div class="flex flex-col gap-3 pl-1">
                <a href="{{ route('profile.user') }}">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-lg">
                            <i class="fa-solid fa-user text-white"></i>
                            <p class="text-white w-fit">Profile</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="pt-10">
        <section class="h-screen">
            <h1 class="text-white text-3xl text-center">{{ $headingText }}</h1>
        </section>
        <section class="h-screen">
            <h1 class="text-white mx-auto text-5xl w-fit mb-5">Products</h1>
            <div class="bg-slate-700 rounded-md w-9/12 p-5 mx-auto grid grid-cols-3 text-white">
                @foreach ($content as $cont)
                    <div class=" bg-slate-500 w-9/12 mx-auto rounded-md mb-7 transition hover:scale-105 hover:shadow-xl cursor-pointer product"
                        data-id="{{ $cont->id }}" onclick="openModal()">
                        <img src="{{ asset('storage/' . $cont->image) }}" alt="{{ $cont->product->name }}">
                        <div class="p-3">
                            <h1 class="text-xl mb-2">{{ $cont->product->name }}</h1>
                            <p class="text-sm text-slate-300">{{ $cont->description }}</p>
                        </div>
                    </div>
                    <div class="bg-black/75 w-full h-full hidden justify-center items-center fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 modal"
                        id="modal-{{ $cont->id }}">
                        <div class="bg-slate-600 w-6/12 p-5 rounded-md">
                            <div class="flex items-center mb-5">
                                <div class="flex flex-col gap-px cursor-pointer p-1 close-modal" data-id="{{ $cont->id }}">
                                    <div class="bg-slate-800 h-1 w-6 -rotate-45 translate-y-[2.8px]"></div>
                                    <div class="bg-slate-800 h-1 w-6 rotate-45 -translate-y-[2.8px]"></div>
                                </div>
                            </div>
                            <div class="w-full flex items-center gap-5">
                                <div class="w-6/12">
                                    <img src="{{ asset('storage/' . $cont->image) }}" alt="{{ $cont->product->name }}">
                                </div>
                                <div class="w-6/12">
                                    <h1 class="text-2xl font-semibold mb-5">{{ $cont->product->name }}</h1>
                                    <p class="mb-5">{{ $cont->modal_description }}</p>
                                    <a href="{{ 'https://wa.me/6288232841353/?text=Hello!+I+want+to+buy+' . $cont->product->name }}" target="_blank">
                                        <button class="text-white bg-slate-800 py-2 px-3 rounded-md">
                                            Buy
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</body>

</html>
<script>
    let opened = false;
    const sidebar = document.getElementById('sidebar');

    function openMenu(bar1Id, bar2Id, bar3Id) {

        const bar1 = document.getElementById(bar1Id);
        const bar2 = document.getElementById(bar2Id);
        const bar3 = document.getElementById(bar3Id);

        if (opened == false) {
            bar1.style.transform = "translate(0, 8px) rotate(-45deg)";
            bar2.style.opacity = "0";
            bar3.style.transform = "translate(0, -8px) rotate(45deg)";
            opened = true;
            sidebar.classList.add('translate-x-0');
            sidebar.classList.remove('-translate-x-full');
        } else if (opened == true) {
            bar1.style.transform = "translate(0, 0) rotate(0)";
            bar2.style.opacity = "100";
            bar3.style.transform = "translate(0, 0) rotate(0)";
            opened = false;
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
        }
    }

    let productModal = document.querySelectorAll('.modal');
    let product = document.querySelectorAll('.product');
    let closeModalButton = document.querySelectorAll('.close-modal');
    product.forEach(prod => {
        prod.onclick = function() {
            let id = this.getAttribute("data-id");
            let modal = document.getElementById("modal-" + id);
            modal.style.display = "flex";
        }
    });
    closeModalButton.forEach(closeButton => {
        closeButton.onclick = function(){
            let id = this.getAttribute('data-id');
            let modal = document.getElementById('modal-' + id);
            modal.style.display = "none";
        }
    });
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = "none";
        }
    }
</script>