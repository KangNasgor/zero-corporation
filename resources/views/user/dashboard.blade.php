@extends('user/user-layout')
@section('user-layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
</head>

<div class="bg-black">
    <div class="flex flex-col gap-1 ml-7 mt-3 w-fit fixed z-40 cursor-pointer"
        onclick="openMenu()">
        <div class="h-1 w-6 bg-purple-500 transition rounded-sm" id="bar-1"></div>
        <div class="h-1 w-6 bg-purple-500 transition rounded-sm" id="bar-2"></div>
        <div class="h-1 w-6 bg-purple-500 transition rounded-sm" id="bar-3"></div>
    </div>
    <div class="h-full fixed w-4/12 md:w-2/12 text-center z-30 overflow-x-hidden -translate-x-full transition overflow-hidden"
        id="sidebar">
        <div class="h-full w-10/12 bg-purple-950 mx-auto rounded-md">
            <div class="pl-3 pt-10 mb-4">
                <p class="text-sm text-purple-300 w-fit">Menu</p>
            </div>
            <div class="flex flex-col gap-3 pl-1">
                <a href="{{ route('dashboard.user') }}">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-table-columns text-white"></i>
                            <p class="text-white w-fit">Dashboard</p>
                        </div>
                    </div>
                </a>
                <a href="#products">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-bag-shopping text-white"></i>
                            <p class="text-white w-fit">Products</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="h-px w-11/12 mx-auto bg-purple-300 mt-4"></div>
            <div class="pl-3 pt-3 mb-4">
                <p class="text-sm text-purple-300 w-fit">Account</p>
            </div>
            <div class="flex flex-col gap-3 pl-1">
                <a href="{{ route('profile.user') }}">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-user text-white"></i>
                            <p class="text-white w-fit">Profile</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="">
        <section class="h-screen mb-20 flex flex-col items-center justify-center gap-10">
                <h1 class="bg-gradient-to-r from-purple-700 via-purple-600 to-purple-500 w-9/12 sm:w-7/12 mx-auto text-5xl sm:text-6xl text-center font-semibold text-transparent bg-clip-text leading-snug">
                    {{ $headingText }}
                </h1>
                <div class="flex gap-3">
                    <button class="bg-gradient-to-br from-purple-700 to-purple-800 px-5 py-3 rounded-md text-white font-semibold mx-auto">
                        Products
                    </button>
                    <button class="bg-gradient-to-bl from-purple-700 to-purple-800 px-5 py-3 rounded-md text-white font-semibold mx-auto">
                        See more
                    </button>
                </div>
        </section>
        <section class="h-screen">
            <div class="h-2/4 w-10/12 relative mx-auto" data-aos="fade-up">
                <div class="bg-[url('/public/assets/person-working.jpg')] bg-cover h-full w-full mx-auto mb-5 sm:mb-0"></div>
                <div class="w-full sm:absolute sm:top-0 text-base text-center font-semibold bg-gray-500/30 backdrop-blur-sm p-3">
                    <div class="w-full flex flex-col sm:flex-row items-center justify-center gap-3">
                        <div class="bg-purple-950 backdrop-blur-sm px-2 py-1 rounded-md">
                            <h1 class="bg-purple-300 text-transparent text-sm sm:text-base bg-clip-text">Trusted by over 100 companies :</h1>
                        </div>
                        <div class="flex gap-3">
                            <img src="{{ asset('assets/riot-games.png') }}" class="w-10 h-10">
                            <img src="{{ asset('assets/tencent.png') }}" class="w-18 h-10">
                            <img src="{{ asset('assets/coca-cola.png') }}" class="w-14 h-10">
                            <img src="{{ asset('assets/activision.svg') }}" class="w-10 h-10">
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <section class="h-screen" id="products">
            <div class="bg-purple-950/75 backdrop-blur rounded-md px-4 py-2 w-fit mx-auto mb-5" data-aos="fade-up">
                <h1 class="bg-gradient-to-r from-purple-700 via-purple-600 to-purple-500 bg-clip-text text-transparent font-semibold text-6xl tracking-wide w-fit mb-3">
                    Products
                </h1>
                <p class="text-purple-500 w-fit mx-auto text-sm opacity-60">Our best products, just for you.</p>
            </div>
            <div class="bg-black rounded-md w-full sm:w-8/12 p-5 mx-auto grid grid-cols-1 sm:grid-cols-2 text-white" data-aos="fade-up">
                @foreach ($content as $cont)
                    <div class="bg-purple-800/50 backdrop-blur-md w-10/12 mx-auto rounded-md mb-7" id="product-{{ $cont->product_id }}">
                        <img src="{{ asset('storage/' . $cont->image) }}" alt="{{ $cont->product->name }}">
                        <div class="px-3 pt-3 pb-10">
                            <h1 class="text-2xl text-purple-300 mb-2">{{ $cont->product->name }}</h1>
                            <p class="text-sm text-purple-400 opacity-70 mb-5">{{ $cont->description }}</p>
                            <button class="bg-gradient-to-bl from-purple-700 to-purple-800 p-3 rounded-md text-white text-sm mx-auto mb-5 transform transition hover:scale-105 hover:shadow-xl product" data-id="{{ $cont->id }}" >
                                See more
                            </button>
                            <div class="h-px w-full bg-purple-300"></div>
                        </div>
                    </div>
                    <div class="bg-black/75 w-full h-full hidden justify-center items-center fixed left-1/2 top-1/2 p-3 sm:p-0 transform -translate-x-1/2 -translate-y-1/2 z-50 modal"
                        id="modal-{{ $cont->id }}">
                        <div class="bg-purple-950 sm:w-6/12 p-3 sm:p-5 rounded-md">
                            <div class="flex items-center mb-5">
                                <div class="flex flex-col gap-px cursor-pointer p-1 close-modal" data-id="{{ $cont->id }}">
                                    <div class="bg-purple-300 h-1 w-6 -rotate-45 translate-y-[2.8px]"></div>
                                    <div class="bg-purple-300 h-1 w-6 rotate-45 -translate-y-[2.8px]"></div>
                                </div>
                            </div>
                            <div class="w-full flex flex-col sm:flex-row items-center gap-5">
                                <div class="w-10/12 sm:w-6/12">
                                    <img src="{{ asset('storage/' . $cont->image) }}" alt="{{ $cont->product->name }}">
                                </div>
                                <div class="sm:w-6/12">
                                    <h1 class="text-3xl text-purple-300 font-semibold mb-5">{{ $cont->product->name }}</h1>
                                    <p class="mb-5 text-purple-500">{{ $cont->modal_description }}</p>
                                    <div class="w-fit mx-auto sm:mx-0">
                                        <a href="{{ 'https://wa.me/6288232841353/?text=Hello!+I+want+to+buy+' . $cont->product->name }}" target="_blank">
                                            <button class="text-purple-950 font-semibold bg-purple-300 py-2 px-7 sm:px-3 rounded-md">
                                                Buy
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="h-screen w-full"></section>
    </div>
</div>
<script>
    let opened = false;
    const sidebar = document.getElementById('sidebar');
    const bar1 = document.getElementById("bar-1");
    const bar2 = document.getElementById("bar-2");
    const bar3 = document.getElementById("bar-3");
    function openMenu() {
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
@endsection