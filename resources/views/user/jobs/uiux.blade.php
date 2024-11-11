@extends('user.user-layout')
@section('user-layout')
    <title>UI-UX Division</title>
    <section class="h-fit pt-36 mb-36 w-10/12 mx-auto">
        <h1 class="bg-purple-950/75 pb-4 pt-1 px-2 mb-14 text-purple-500 text-4xl mx-auto md:mx-0 md:text-6xl font-semibold w-fit rounded-md"
            data-aos="fade-up">UI-UX Division</h1>
        <div class="flex flex-col-reverse md:flex-row">
            <div class="text-white flex items-center pl-2 md:pl-5" data-aos="fade-up">
                <p class="w-full md:w-10/12">
                    ZERO Corp is looking for a talented UI/UX Designer to join our creative team and help shape the user
                    experience of our innovative products. We value a keen eye for design, a deep understanding of user
                    needs, and the ability to create intuitive and engaging interfaces. As a UI/UX Designer, you’ll work
                    closely with developers and product teams to craft seamless, visually stunning experiences that delight
                    our users. If you're passionate about design and user-centered solutions, come help us bring our vision
                    to life!
                </p>
            </div>
            <img src="{{ asset('assets/w_working.jpg') }}" class="w-full md:w-6/12" data-aos="fade-up">
        </div>
    </section>
    <section class="h-fit mb-36 w-10/12 mx-auto">
        <h1 class="text-xl text-white font-semibold mb-5">Our current tech stack</h1>
        <ul class="text-white list-disc pl-5">
            <li>&#128187; Figma to design a beautiful website</li>
        </ul>
    </section>
    <section class="h-fit mb-36 w-10/12 mx-auto">
        <h1 class="text-xl text-white font-semibold mb-3">Apply to your desired position here :</h1>
        <a href="mailto:rxyz643201@gmail.com" class="text-white/75">rxyz643201@gmail.com</a>
    </section>
@endsection
