@extends('user.user-layout')
@section('user-layout')
    <div class="h-[50vh] flex items-center justify-center">
        <div class="bg-purple-950/75 px-3 pt-2 pb-5 rounded-md w-fit mx-auto">
            <h1 class="w-fit text-purple-300 font-semibold text-6xl mb-2">Blogs</h1>
            <p class="text-white/75 text-sm w-fit mx-auto">Latest articles for you</p>
        </div>
    </div>
    <div class="h-screen grid grid-cols-2 w-10/12 mx-auto">
        <div class="bg-purple-700/75 w-9/12 h-fit rounded-md p-5 mx-auto text-white group">
            <div class="bg-[url('/public/assets/person-working.jpg')] mx-auto h-52 bg-center transition-all bg-[length:100%] hover:bg-[length:110%] mb-5"></div>
            <h1 class="text-xl mb-3 font-semibold">How to utilize tech more in life</h1>
            <p class="text-sm opacity-70">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta repudiandae aperiam laudantium, recusandae
                tempora ut quo cupiditate doloremque omnis ab tempore eius similique, rem ipsum necessitatibus atque labore
                voluptate laborum.
            </p>
        </div>
        <div class="bg-purple-700/75 w-9/12 h-fit rounded-md pt-5 pb-5 px-5 mx-auto text-white">
            <div class="bg-[url('/public/assets/person-corridor.jpg')] mx-auto h-52 bg-center transition-all bg-[length:100%] hover:bg-[length:110%] mb-5"></div>
            <h1 class="text-xl mb-3 font-semibold">How to be more creative</h1>
            <p class="text-sm opacity-70">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta repudiandae aperiam laudantium, recusandae
                tempora ut quo cupiditate doloremque omnis ab tempore eius similique, rem ipsum necessitatibus atque labore
                voluptate laborum.
            </p>
        </div>
    </div>
@endsection
