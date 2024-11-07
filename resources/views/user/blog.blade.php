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
        <a href="{{ route('blog-1') }}">
            <div class="bg-purple-700/75 group w-10/12 lg:w-9/12 h-fit rounded-md p-5 mb-10 mx-auto text-white cursor-pointer">
                <div
                    class="bg-[url('/public/assets/person-working.jpg')] mx-auto h-52 bg-center transition-all bg-no-repeat bg-[length:100%] group-hover:bg-[length:107%] mb-0 md:mb-5">
                </div>
                <h1 class="text-xl mb-3 font-semibold">How to utilize tech more in life</h1>
                <p class="text-sm opacity-70">
                    Discover practical ways to integrate technology into everyday life, from productivity tools and smart
                    devices to personal projects.
                </p>
                <p class="text-xs opacity-70 mt-5">
                    21/10/2024 | 10min
                </p>
            </div>
        </a>
        <a href="{{ route('blog-2') }}">
            <div class="bg-purple-700/75 group w-10/12 lg:w-9/12 h-fit rounded-md p-5 mb-10 mx-auto text-white cursor-pointer">
                <div
                    class="bg-[url('/public/assets/person-corridor.jpg')] mx-auto h-52 bg-center transition-all bg-no-repeat bg-[length:100%] group-hover:bg-[length:107%] mb-0 md:mb-5">
                </div>
                <h1 class="text-xl mb-3 font-semibold">How to be more creative</h1>
                <p class="text-sm opacity-70">
                    Learn how to cultivate a mindset that encourages curiosity, experimentation,
                    and innovation in all areas of life.
                </p>
                <p class="text-xs opacity-70 mt-5">
                    21/10/2024 | 10min
                </p>
            </div>
        </a>
        <a href="{{ route('blog-3') }}">
            <div class="bg-purple-700/75 group w-10/12 lg:w-9/12 h-fit rounded-md p-5 mb-10 mx-auto text-white cursor-pointer">
                <div
                    class="bg-[url('/public/assets/n_meditasi.png')] mx-auto h-52 bg-center transition-all bg-no-repeat bg-[length:100%] group-hover:bg-[length:107%] mb-0 md:mb-5">
                </div>
                <h1 class="text-xl mb-3 font-semibold">Balancing Tech Use for Mental Well-being</h1>
                <p class="text-sm opacity-70">
                    Get practical advice on using technology mindfully to support mental health. Learn how to set boundaries,
                    manage screen time, and use apps that encourage relaxation and self-care.
                </p>
                <p class="text-xs opacity-70 mt-5">
                    21/10/2024 | 10min
                </p>
            </div>
        </a>
        <a href="{{ route('blog-4') }}">
            <div class="bg-purple-700/75 group w-10/12 lg:w-9/12 h-fit rounded-md p-5 mb-10 mx-auto text-white cursor-pointer">
                <div
                    class="bg-[url('/public/assets/w_working.jpg')] mx-auto h-52 bg-center transition-all bg-no-repeat bg-[length:100%] group-hover:bg-[length:107%] mb-0 md:mb-5">
                </div>
                <h1 class="text-xl mb-3 font-semibold">Cultivating a Creative Mindset in the Digital Age</h1>
                <p class="text-sm opacity-70">
                    Discover how to leverage digital tools to fuel your creativity. From brainstorming apps to online
                    inspiration boards, find out how tech can enhance your creative process.
                </p>
                <p class="text-xs opacity-70 mt-5">
                    21/10/2024 | 10min
                </p>
            </div>
        </a>
        <a href="{{ route('blog-5') }}">
            <div class="bg-purple-700/75 group w-10/12 lg:w-9/12 h-fit rounded-md p-5 mb-10 mx-auto text-white cursor-pointer">
                <div
                    class="bg-[url('/public/assets/ww_laptop.jpeg')] mx-auto h-52 bg-center transition-all bg-no-repeat bg-[length:100%] group-hover:bg-[length:107%] mb-0 md:mb-5">
                </div>
                <h1 class="text-xl mb-3 font-semibold">Simple Tech Habits for a Smarter Lifestyle</h1>
                <p class="text-sm opacity-70">
                    Learn easy, tech-savvy habits to streamline your day. From setting up reminders to automating tasks, these
                    tips show how small tech changes can make a big difference in your routine.
                </p>
                <p class="text-xs opacity-70 mt-5">
                    21/10/2024 | 10min
                </p>
            </div>
        </a>
    </div>
@endsection
