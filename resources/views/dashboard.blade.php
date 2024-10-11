@extends('layout')
@section('layout')

    <head>
        <title>Dashboard</title>
    </head>

    <body>
        <div class="bg-black/75 w-full h-full hidden justify-center items-center fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 modal" id="failed-modal">
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
    </body>
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
    </script>
@endsection
