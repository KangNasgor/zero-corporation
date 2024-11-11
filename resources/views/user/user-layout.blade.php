<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/3ab26b6439.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    {{-- <script>
        module.exports = {
            theme: {
                extend: {
                    backgroundImage: {
                        'person-working': "url('/assets/person-working.jpg')",
                    }
                }
            }
        }
    </script> --}}
</head>

<body class="bg-black">
    <div class="flex flex-col gap-1 ml-7 mt-3 w-fit fixed z-40 cursor-pointer"
        onclick="openMenu()">
        <div class="h-1 w-6 bg-purple-500 transition rounded-sm" id="bar-1"></div>
        <div class="h-1 w-6 bg-purple-500 transition rounded-sm" id="bar-2"></div>
        <div class="h-1 w-6 bg-purple-500 transition rounded-sm" id="bar-3"></div>
    </div>
    <div class="h-full fixed w-7/12 md:w-2/12 text-center z-30 overflow-x-hidden -translate-x-full transition overflow-hidden"
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
                <a href="{{ route('about.user') }}">
                    <div class="flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-building text-white"></i>
                            <p class="text-white w-fit">About</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('dashboard.user') }}#products">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-bag-shopping text-white"></i>
                            <p class="text-white w-fit">Products</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('blog.user') }}">
                    <div class="flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-newspaper text-white"></i>
                            <p class="text-white w-fit">Blogs</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="h-px w-11/12 mx-auto bg-purple-300 mt-4"></div>
            <div class="pl-3 pt-3 mb-4">
                <p class="text-sm text-purple-300 w-fit">Career</p>
            </div>
            <div class="flex flex-col gap-3 pl-1">
                <a href="{{ route('jobs.frontend') }}">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-laptop text-white"></i>
                            <p class="text-white w-fit">Front-end Dev</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('jobs.backend') }}">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-gear text-white"></i>
                            <p class="text-white w-fit">Back-end Dev</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('jobs.uiux') }}">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-wand-magic-sparkles text-white"></i>
                            <p class="text-white w-fit">UI/UX</p>
                        </div>
                    </div>
                </a>
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
                <a href="{{ route('logout.user') }}">
                    <div class=" flex justify-start w-11/12 mx-auto">
                        <div class="flex items-center gap-2 text-md">
                            <i class="fa-solid fa-right-from-bracket text-red-500"></i> 
                            <p class="text-red-500 w-fit">Log Out</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @yield('user-layout')
    <div class="h-fit mt-10 mb-3 relative">
        <div class="flex flex-col sm:flex-row gap-5 h-fit sm:h-3/4 bg-gradient-to-b from-purple-950 to-purple-950/55 w-11/12 mx-auto rounded-md px-3 py-5 lg:px-10">
            <div class="w-full sm:w-3/12">
                <h1 class="text-lg text-purple-200 font-semibold">ZERO corp</h1>
                <p class="text-sm text-purple-300/80">ZERO Corp delivers innovative tech solutions, from AI and custom
                    software to professional websites, to help businesses thrive in a digital world.</p>
            </div>
            <div class="h-fit grid grid-cols-2 gap-2 sm:gap-0 sm:grid-rows-2 sm:grid-flow-col">
                <div class="lg:mr-8 h-fit w-fit">
                    <h1 class="text-purple-200 font-semibold mb-2 w-fit">Products</h1>
                    <div class="flex flex-col gap-1 w-fit">
                        <a href="#product-1"
                            class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Website</a>
                        <a href="#product-3"
                            class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">A.I</a>
                        <a href="#product-2"
                            class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Anti Virus</a>
                    </div>
                </div>
                <div class="lg:mr-8 h-fit w-fit">
                    <h1 class="text-purple-200 font-semibold mb-2 w-fit">Contacts</h1>
                    <div class="flex flex-col gap-1 w-fit">
                        <a class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70" href="https://www.instagram.com/aester.bluu/" target="_blank">Instagram</a>
                        <a class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70" href="https://www.facebook.com/leonard.alfareno.9" target="_blank">Facebook</a>
                        <a class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70" href="https://www.youtube.com/@AesterbluuXZ" target="_blank">Youtube</a>
                    </div>
                </div>
                <div class="lg:mr-8 h-fit w-fit">
                    <h1 class="text-purple-200 font-semibold mb-2 w-fit">Company</h1>
                    <div class="flex flex-col gap-1 w-fit">
                        <a class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70" href="{{ route('about.user') }}">About</a>
                        <a class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70" href="{{ route('blog.user') }}">Blog</a>
                    </div>
                </div>
                <div class="lg:mr-8 h-fit w-fit">
                    <h1 class="text-purple-200 font-semibold mb-2 w-fit">Job</h1>
                    <div class="flex flex-col gap-1 w-fit">
                        <a href="{{ route('jobs.frontend') }}" class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">Front-end
                            developer</a>
                        <a href="{{ route('jobs.backend') }}" class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">Back-end
                            developer
                        </a>
                        <a href="{{ route('jobs.uiux') }}" class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">UI/UX</a>
                    </div>
                </div>
                <div class="lg:mr-8 h-fit w-fit">
                    <h1 class="text-purple-200 font-semibold mb-2 w-fit">Legal</h1>
                    <div class="flex flex-col gap-1 w-fit">
                        <p class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">Terms of
                            service
                        </p>
                        <p class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">Privacy
                            policy</p>
                    </div>
                </div>
            </div>
            <div>
                <h1 class="text-white font-semibold text-xl mb-3">Find us here</h1>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253866.3154296647!2d107.290844!3d-6.176093!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697fdf0cdd47ef%3A0x401576d14fed990!2sRengasdengklok%2C%20Karawang%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1730686109680!5m2!1sen!2sid"
                    width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="hidden lg:block"></iframe>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253866.3154296647!2d107.290844!3d-6.176093!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697fdf0cdd47ef%3A0x401576d14fed990!2sRengasdengklok%2C%20Karawang%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1730686109680!5m2!1sen!2sid"
                    width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="hidden sm:block lg:hidden mx-auto"></iframe>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253866.3154296647!2d107.290844!3d-6.176093!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697fdf0cdd47ef%3A0x401576d14fed990!2sRengasdengklok%2C%20Karawang%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1730686109680!5m2!1sen!2sid"
                    width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="md:hidden mx-auto"></iframe>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    AOS.init();
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
</script>
