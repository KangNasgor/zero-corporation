@extends('user/user-layout')
@section('user-layout')
<div class="bg-black h-screen pt-5">
    <div class="bg-gradient-to-r from-[#4B0082] to-[#8A2BE2] w-10/12 gap-5  p-3 sm:p-10 mx-auto rounded-md">
        <div class="bg-purple-600 w-10/12 sm:w-72 p-2 sm:p-5 h-fit mx-auto rounded-md">
            <h1 class="text-white text-xl mx-auto mb-3 w-fit">User Data</h1>
            <div class="flex flex-col gap-1 w-fit" id="data">
                <p class="text-white w-fit">Nama : {{ Auth::user()->name }}</p>
                <p class="text-white w-fit">Email : {{ Auth::user()->email }}</p>
                <i class="fa-solid fa-pen-to-square text-white cursor-pointer w-fit" id="edit-data"
                    onclick="openEditMode()"></i>
                <a href="{{ route('password.request') }}" class="w-fit">
                    <button type="button" class="w-full bg-purple-950 mt-2 rounded-md p-2 text-white text-sm">
                        Change password
                    </button>
                </a>
            </div>
            <form class="hidden grid-cols-2 gap-1" id="input-data"
                action="{{ route('profile.update', Auth::user()->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="text-white w-fit">Nama :</label>
                <input class="rounded-md px-2" value="{{ Auth::user()->name }}" name="name">
                <label class="text-white w-fit">Email :</label>
                <input class="rounded-md px-2" value="{{ Auth::user()->email }}" name="email">
                <button type="submit" id="submit" class="bg-cyan-500 rounded-md py-1"
                    onclick="closeEditMode()">Submit</button>
                <button type="button" id="cancel" class="bg-red-600 rounded-md py-1"
                    onclick="closeEditMode()">Cancel</button>
            </form>
            <a href="{{ route('logout.user') }}" class="w-fit block mt-3">
                <div class="bg-red-600 text-white px-4 py-3 rounded-md w-fit">
                    Logout
                </div>
            </a>
        </div>
    </div>
</div>
<script>
    let inputData = document.getElementById("input-data");
    let data = document.getElementById("data");

    function openEditMode() {
        inputData.style.display = "grid";
        data.style.display = "none";
    }

    function closeEditMode() {
        inputData.style.display = "none";
        data.style.display = "flex";
    }
</script>
@endsection
