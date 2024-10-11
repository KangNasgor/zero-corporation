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
        <div class="flex w-11/12 mx-auto mt-10 gap-5">
            <div class="w-fit px-9 pb-10 h-36 overflow-hidden bg-slate-600 rounded-md text-white transition-all duration-300 ease-in-out" id="content1">
                <div class="flex justify-end">
                    <button onclick="toggleReadMore('content1', this)" class="mt-3 text-blue-400 hover:underline">
                        <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
                    </button>
                </div>
                @if ($products->isEmpty())
                    <h1 class="text-3xl">No active products.</h1>
                @else
                    <h1 class="text-3xl mb-4 w-fit">Active Products</h1>
                    @foreach ($products as $prod)
                        <ul class="list-disc">
                            <li>{{ $prod->name }}</li>
                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="w-fit px-9 py-10 h-fit bg-slate-600 rounded-md text-white">
                @if ($employees->isEmpty())
                    <h1 class="text-3xl">No active employee.</h1>
                @else
                    <h1 class="text-3xl mb-4">Active Employee</h1>
                    @foreach ($employees as $emp)
                        <ul class="list-disc">
                            <li>{{ $emp->name }}</li>
                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="w-fit px-9 py-10 h-fit bg-slate-600 rounded-md text-white">
                @if ($admin->isEmpty())
                    <h1 class="text-3xl">No active admin.</h1>
                @else
                    <h1 class="text-3xl mb-4">Active Admin</h1>
                    @foreach ($admin as $adm)
                        <ul class="list-disc">
                            <li>{{ $adm->name }}</li>
                        </ul>
                    @endforeach
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
                content.classList.add('w-fit');
                icon.classList.remove('fa-up-right-and-down-left-from-center');
                icon.classList.add('fa-compress');
            }
            else {
                content.classList.add('h-36');
                content.classList.add('overflow-hidden');
                content.classList.remove('w-fit');
                icon.classList.add('fa-up-right-and-down-left-from-center');
                icon.classList.remove('fa-compress');
            }
        }
    </script>
@endsection
