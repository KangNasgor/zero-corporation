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
    <div class="h-[50vh] bg-black relative">
        <div class="h-3/4 bg-gradient-to-b from-purple-950 to-purple-950/55 w-11/12 left-0 right-0 m-auto rounded-md absolute bottom-5">

        </div>
    </div>
</body>
</html>
<script>
    AOS.init();
</script>