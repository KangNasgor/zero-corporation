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
    @yield('user-layout')
    <div class="h-fit sm:h-[60vh] relative z-50">
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
                        <p class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">Instagram
                        </p>
                        <p class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">Facebook</p>
                    </div>
                </div>
                <div class="lg:mr-8 h-fit w-fit">
                    <h1 class="text-purple-200 font-semibold mb-2 w-fit">Company</h1>
                    <div class="flex flex-col gap-1 w-fit">
                        <p class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">About</p>
                        <p class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">Blog</p>
                    </div>
                </div>
                <div class="lg:mr-8 h-fit w-fit">
                    <h1 class="text-purple-200 font-semibold mb-2 w-fit">Job</h1>
                    <div class="flex flex-col gap-1 w-fit">
                        <p class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">Front-end
                            developer</p>
                        <p class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">Back-end
                            developer
                        </p>
                        <p class="text-sm w-fit text-purple-300/70 cursor-pointer hover:text-purple-400/70">UI/UX</p>
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
</script>
