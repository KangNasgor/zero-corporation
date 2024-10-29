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
    <div class="h-screen"></div>
</body>
</html>
<script>
    AOS.init();
</script>