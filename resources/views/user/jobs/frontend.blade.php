<title>Front-end Division</title>
@extends('user.user-layout')
@section('user-layout')
    <section class="h-fit pt-36 mb-36 w-10/12 mx-auto">
        <h1 class="bg-purple-950/75 pb-4 pt-1 px-2 mb-14 text-purple-500 text-4xl mx-auto md:mx-0 md:text-6xl font-semibold w-fit rounded-md"
            data-aos="fade-up">Front-end Division</h1>
        <div class="flex flex-col-reverse md:flex-row">
            <div class="text-white flex items-center pl-2 md:pl-5" data-aos="fade-up">
                <p class="w-full md:w-10/12">
                    Work at ZERO Corp and become a part of a forward-thinking team dedicated to creating groundbreaking
                    solutions. We value creativity, innovation, and a passion for technology. As a member of our team,
                    you'll collaborate in an inspiring environment where your contributions matter. Join us in shaping the
                    future and making a real impact in the tech industry!
                </p>
            </div>
            <img src="{{ asset('assets/person-working.jpg') }}" class="w-full md:w-6/12" data-aos="fade-up">
        </div>
    </section>
    <section class="h-fit mb-36 w-10/12 mx-auto">
        <h1 class="text-xl text-white font-semibold mb-5">Our current tech stack</h1>
        <ul class="text-white list-disc pl-5">
            <li>&#128187; HTML5 for basic web development</li>
            <li>&#129302; Reactjs for interactive dynamic website</li>
            <li>👨‍💻 Nextjs for fast dynamic server-side website</li>
            <li>&#128133; Tailwind to make the websites look pretty</li>
        </ul>
    </section>
    <section class="h-fit mb-36 w-10/12 mx-auto">
        <h1 class="text-xl text-white font-semibold mb-3">Apply to your desired position here :</h1>
        <a href="mailto:rxyz643201@gmail.com" class="text-white/75">rxyz643201@gmail.com</a>
    </section>
@endsection
