@extends('user.user-layout')
@section('user-layout')
    <title>Back-end Division</title>
    <section class="h-fit pt-36 mb-36 w-10/12 mx-auto">
        <h1 class="bg-purple-950/75 pb-4 pt-1 px-2 mb-14 text-purple-500 text-4xl mx-auto md:mx-0 md:text-6xl font-semibold w-fit rounded-md"
            data-aos="fade-up">Back-end Division</h1>
        <div class="flex flex-col-reverse md:flex-row">
            <div class="text-white flex items-center pl-2 md:pl-5" data-aos="fade-up">
                <p class="w-full md:w-10/12">
                    Join ZERO Corp as a Back-End Developer and become an integral part of our tech team, building the
                    foundation for innovative digital solutions. We're looking for skilled developers who are passionate
                    about creating scalable, efficient, and secure server-side applications. If you have experience with
                    databases, APIs, and server-side languages, we want you to help us power our projects from behind the
                    scenes. Be a part of a collaborative and fast-paced environment where your contributions will make a
                    real impact!
                </p>
            </div>
            <img src="{{ asset('assets/person-corridor.jpg') }}" class="w-full md:w-6/12" data-aos="fade-up">
        </div>
    </section>
    <section class="h-fit mb-36 w-10/12 mx-auto">
        <h1 class="text-xl text-white font-semibold mb-5">Our current tech stack</h1>
        <ul class="text-white list-disc pl-5">
            <li>&#128187; Laravel to handle website's backend</li>
            <li>&#129302; MySQL for database</li>
            <li>👨‍💻 Laragon for server</li>
        </ul>
    </section>
    <section class="h-fit mb-36 w-10/12 mx-auto">
        <h1 class="text-xl text-white font-semibold mb-3">Apply to your desired position here :</h1>
        <a href="mailto:rxyz643201@gmail.com" class="text-white/75">rxyz643201@gmail.com</a>
    </section>
@endsection
