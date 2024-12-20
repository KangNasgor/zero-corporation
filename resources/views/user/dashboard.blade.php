@extends('user/user-layout')
@section('user-layout')

    <head>
        <title>{{ $title }}</title>
    </head>

    <div class="bg-black">
        <div class="">
            <section class="h-screen mb-20 flex flex-col items-center justify-center gap-10">
                <h1
                    class="bg-gradient-to-r from-purple-700 via-purple-600 to-purple-500 w-full sm:w-7/12 mx-auto text-5xl/snug sm:text-6xl/snug text-center font-semibold text-transparent bg-clip-text">
                    {{ $headingText }}
                </h1>
                <div class="flex gap-3">
                    <a href="{{ route('dashboard.user') }}#products">
                        <button
                            class="bg-gradient-to-br from-purple-700 to-purple-800 px-5 py-3 rounded-md text-white font-semibold mx-auto">
                            Products
                        </button>
                    </a>
                    <a href="{{ route('dashboard.user') }}#about">
                        <button
                            class="bg-gradient-to-bl from-purple-700 to-purple-800 px-5 py-3 rounded-md text-white font-semibold mx-auto">
                            See more
                        </button>
                    </a>
                </div>
            </section>
            <section class="h-screen">
                <div class="h-2/4 w-10/12 relative mx-auto" data-aos="fade-up">
                    <div class="bg-[url('/public/assets/person-working.jpg')] bg-cover h-full w-full mx-auto mb-5 sm:mb-0">
                    </div>
                    <div
                        class="w-full sm:absolute sm:top-0 text-base text-center font-semibold bg-gray-500/30 backdrop-blur-sm p-3">
                        <div class="w-full flex flex-col sm:flex-row items-center justify-center gap-3">
                            <div class="bg-purple-950 backdrop-blur-sm px-2 py-1 rounded-md">
                                <h1 class="bg-purple-300 text-transparent text-sm sm:text-base bg-clip-text">Trusted by over
                                    100 companies :</h1>
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
            <section class="h-fit pt-36 mb-36 w-10/12 mx-auto" id="about">
                <h1 class="bg-purple-950/75 pb-4 pt-1 px-2 mb-14 text-purple-500 text-4xl mx-auto md:mx-0 md:text-6xl font-semibold w-fit rounded-md"
                    data-aos="fade-up">About our company</h1>
                <div class="flex flex-col-reverse md:flex-row">
                    <div class="text-white flex items-center pl-2 md:pl-5" data-aos="fade-up">
                        <p class="w-full md:w-10/12">
                            At ZERO Corp, we’re dedicated to empowering people and businesses to harness the full potential
                            of technology with ease. Specializing in innovative tech solutions like custom websites,
                            artificial intelligence, antivirus software, and more, we focus on simplifying complex
                            technologies. Our mission is to make digital tools accessible and straightforward, helping you
                            thrive in a connected world.
                        </p>
                    </div>
                    <img src="{{ asset('assets/person-corridor.jpg') }}" class="w-full md:w-6/12" data-aos="fade-up">
                </div>
            </section>
            <section class="h-fit mb-36" id="products">
                <div class="bg-purple-950/75 backdrop-blur rounded-md px-4 py-2 w-fit mx-auto mb-5" data-aos="fade-up">
                    <h1
                        class="bg-gradient-to-r from-purple-700 via-purple-600 to-purple-500 bg-clip-text text-transparent font-semibold text-6xl tracking-wide w-fit mb-3">
                        Products
                    </h1>
                    <p class="text-purple-500 w-fit mx-auto text-sm opacity-60">Our best products, just for you.</p>
                </div>
                <div class="bg-black rounded-md w-full sm:w-8/12 p-5 mx-auto grid grid-cols-1 sm:grid-cols-2 text-white"
                    data-aos="fade-up">
                    @foreach ($content as $cont)
                        <div class="bg-purple-800/50 backdrop-blur-md w-10/12 mx-auto rounded-md mb-7"
                            id="product-{{ $cont->product_id }}">
                            <img src="{{ asset('storage/' . $cont->image) }}" alt="{{ $cont->product->name }}">
                            <div class="px-3 pt-3 pb-10">
                                <h1 class="text-2xl text-purple-300 mb-2">{{ $cont->product->name }}</h1>
                                <p class="text-sm text-purple-400 opacity-70 mb-5">{{ $cont->description }}</p>
                                <button
                                    class="bg-gradient-to-bl from-purple-700 to-purple-800 p-3 rounded-md text-white text-sm mx-auto mb-5 transform transition hover:scale-105 hover:shadow-xl product"
                                    data-id="{{ $cont->id }}">
                                    See more
                                </button>
                                <div class="h-px w-full bg-purple-300"></div>
                            </div>
                        </div>
                        <div class="bg-black/75 w-full h-full hidden justify-center items-center fixed left-1/2 top-1/2 p-3 sm:p-0 transform -translate-x-1/2 -translate-y-1/2 z-50 modal"
                            id="modal-{{ $cont->id }}">
                            <div class="bg-purple-950 sm:w-6/12 p-3 sm:p-5 rounded-md">
                                <div class="flex items-center mb-5">
                                    <div class="flex flex-col gap-px cursor-pointer p-1 close-modal"
                                        data-id="{{ $cont->id }}">
                                        <div class="bg-purple-300 h-1 w-6 -rotate-45 translate-y-[2.8px]"></div>
                                        <div class="bg-purple-300 h-1 w-6 rotate-45 -translate-y-[2.8px]"></div>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col sm:flex-row items-center gap-5">
                                    <div class="w-10/12 sm:w-6/12">
                                        <img src="{{ asset('storage/' . $cont->image) }}"
                                            alt="{{ $cont->product->name }}">
                                    </div>
                                    <div class="sm:w-6/12">
                                        <h1 class="text-3xl text-purple-300 font-semibold mb-5">{{ $cont->product->name }}
                                        </h1>
                                        <p class="mb-5 text-purple-500">{{ $cont->modal_description }}</p>
                                        <div class="w-fit mx-auto sm:mx-0">
                                            <a href="{{ 'https://wa.me/6288232841353/?text=Hello!+I+want+to+buy+' . $cont->product->name }}"
                                                target="_blank">
                                                <button
                                                    class="text-purple-950 font-semibold bg-purple-300 py-2 px-7 sm:px-3 rounded-md">
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
        </div>
    </div>
    <script>
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
            closeButton.onclick = function() {
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