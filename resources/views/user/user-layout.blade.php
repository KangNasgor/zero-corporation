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

<body>
    @yield('user-layout')
    <div class="h-[60vh] bg-black relative">
        <div
            class="flex gap-5 h-3/4 bg-gradient-to-b from-purple-950 to-purple-950/55 w-11/12 left-0 right-0 m-auto rounded-md absolute bottom-5 md:px-5 lg:px-10 py-5">
            <div class="w-3/12">
                <h1 class="text-lg text-purple-200 font-semibold">ZERO corp</h1>
                <p class="text-sm text-purple-300/80">ZERO Corp delivers innovative tech solutions, from AI and custom
                    software to professional websites, to help businesses thrive in a digital world.</p>
            </div>
            <div class="grid grid-rows-2 grid-flow-col">
                <div class="mr-8">
                    <h1 class="text-purple-200 font-semibold mb-2">Products</h1>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Website</p>
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Artificial
                            intelligence</p>
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Anti Virus</p>
                    </div>
                </div>
                <div class="mr-8">
                    <h1 class="text-purple-200 font-semibold mb-2">Contacts</h1>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Instagram</p>
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Facebook</p>
                    </div>
                </div>
                <div class="mr-8">
                    <h1 class="text-purple-200 font-semibold mb-2">Company</h1>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">About</p>
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Blog</p>
                    </div>
                </div>
                <div class="mr-8">
                    <h1 class="text-purple-200 font-semibold mb-2">Job</h1>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Front-end
                            developer</p>
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Back-end developer
                        </p>
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">UI/UX</p>
                    </div>
                </div>
                <div class="mr-8">
                    <h1 class="text-purple-200 font-semibold mb-2">Legal</h1>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Terms of service
                        </p>
                        <p class="text-sm text-purple-300/70 cursor-pointer hover:text-purple-400/70">Privacy policy</p>
                    </div>
                </div>
            </div>
            <div>
                <h1 class="text-white font-semibold text-xl mb-3">Find us here</h1>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253866.3154296647!2d107.290844!3d-6.176093!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697fdf0cdd47ef%3A0x401576d14fed990!2sRengasdengklok%2C%20Karawang%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1730686109680!5m2!1sen!2sid"
                    width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    AOS.init();
</script>
