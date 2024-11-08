@extends('user.user-layout')
@section('user-layout')
    <title>Blogs</title>
    <div class="h-[50vh] flex items-center justify-center">
        <div class="bg-purple-950/75 px-3 pt-2 pb-5 rounded-md w-fit mx-auto">
            <h1 class="w-fit text-purple-300 font-semibold text-6xl mb-2">Blogs</h1>
            <p class="text-white/75 text-sm w-fit mx-auto">Latest articles for you</p>
        </div>
    </div>
    <div class="h-fit grid grid-cols-1 lg:grid-cols-2 w-full md:w-10/12 mx-auto">
        @foreach ($blogs as $blog)
            <div
                class="bg-purple-700/75 group w-10/12 lg:w-9/12 h-fit rounded-md p-5 mb-10 mx-auto text-white cursor-pointer">
                <a href="/blog/{{ Str::slug($blog->title, '-') }}">
                    <div style="background-image: url('{{ asset('storage/' . $blog->image) }}')"
                        class=" mx-auto h-52 bg-center transition-all bg-no-repeat bg-[length:100%] group-hover:bg-[length:107%] mb-0 md:mb-5">
                    </div>
                    <h1 class="text-xl mb-3 font-semibold">{{ $blog->title }}</h1>
                    <p class="text-sm opacity-70">{{ $blog->description }}</p>
                    <p class="text-xs opacity-70 mt-5">{{ $blog->created_at }} | 10min </p>
                </a>
            </div>
        @endforeach
    </div>
@endsection
