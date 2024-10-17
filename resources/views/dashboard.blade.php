@extends('layout')
@section('layout')

    <head>
        <title>Dashboard</title>
    </head>
    <div>
        <div class="bg-black/75 w-full h-full hidden justify-center items-center fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 modal"
            id="failed-modal">
            <div class="h-1/4 w-1/4 p-5 flex flex-col justify-between bg-slate-500 rounded-md">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col gap-px cursor-pointer p-1 close-modal">
                        <div class="bg-slate-800 h-px w-3 -rotate-45 translate-y-px"></div>
                        <div class="bg-slate-800 h-px w-3 rotate-45 -translate-y-px"></div>
                    </div>
                </div>
                <div id="role-failed-message">
                    {{ session('role-failed') }}
                </div>
                <div class="flex gap-2 w-full justify-evenly">
                </div>
            </div>
        </div>
        <div class="flex w-11/12 justify-center mx-auto mt-10 gap-5">
            <div class="w-fit h-36 overflow-hidden bg-slate-600 rounded-md text-white" id="content1">
                @if ($products->isEmpty())
                    <h1 class="text-3xl">No active products.</h1>
                @else
                    <div class="flex justify-end relative">
                        <button onclick="toggleReadMore('content1', this)" class="mt-2 mr-3">
                            <i class="fa-solid fa-expand"></i>
                        </button>
                    </div>
                    <div class="mx-9 mb-10">
                        <h1 class="text-3xl mb-4 w-fit">Products</h1>
                        @foreach ($products as $prod)
                            <ul class="list-disc">
                                <li class="leading-7">{{ $prod->name }}</li>
                            </ul>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="w-fit h-36 overflow-hidden bg-slate-600 rounded-md text-white" id="content2">
                @if ($employees->isEmpty())
                    <h1 class="text-3xl">No active employee.</h1>
                @else
                    <div class="flex justify-end">
                        <button onclick="toggleReadMore('content2', this)" class="mt-2 mr-3">
                            <i class="fa-solid fa-expand"></i>
                        </button>
                    </div>
                    <div class="mx-9 mb-10">
                        <h1 class="text-3xl mb-4">Employee</h1>
                        @foreach ($employees as $emp)
                            <ul class="list-disc">
                                <li class="leading-7">{{ $emp->name }}</li>
                            </ul>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="w-fit h-36 overflow-hidden bg-slate-600 rounded-md text-white" id="content3">
                @if ($admin->isEmpty())
                    <h1 class="text-3xl">No active admin.</h1>
                @else
                    <div class="flex justify-end">
                        <button onclick="toggleReadMore('content3', this)" class="mt-2 mr-3">
                            <i class="fa-solid fa-expand"></i>
                        </button>
                    </div>
                    <div class="mx-9 mb-10">
                        <h1 class="text-3xl mb-4">Admin</h1>
                        @foreach ($admin as $adm)
                            <ul class="list-disc">
                                <li class="leading-7">{{ $adm->name }}</li>
                            </ul>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        const roleFailedMessage = document.getElementById('role-failed-message').innerText;
        const failModal = document.getElementById('failed-modal');
        if (roleFailedMessage.trim() !== "") {
            failModal.style.display = "flex";
        }
        const closeModalButtons = document.querySelectorAll('.close-modal');
        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                failModal.style.display = 'none';
            });
        });
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }
        function toggleReadMore(contentId, button) {

            const content = document.getElementById(contentId);
            const icon = button.querySelector('i');

            if (content.classList.contains('h-36')) {
                content.classList.remove('h-36');
                content.classList.remove('overflow-hidden');
                content.classList.add('h-fit');
                icon.classList.remove('fa-expand');
                icon.classList.add('fa-compress');
            }
            else {
                content.classList.add('h-36');
                content.classList.add('overflow-hidden');
                content.classList.remove('h-fit');
                icon.classList.add('fa-expand');
                icon.classList.remove('fa-compress');
            }
        }
    </script>
@endsection
