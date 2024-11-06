@extends('user/user-layout')
@section('user-layout')
    <div class="bg-black h-screen flex justify-center items-center mb-10 pt-10">
        <div class="w-fit h-fit flex flex-col items-center">
            <div class="p-3 rounded-md md:bg-purple-950/75 w-fit mx-auto mb-14">
                <h1 class="text-center text-purple-500 font-semibold text-4xl md:text-6xl w-fit mb-3">{{ $headingText }}</h1>
                <p class="text-md md:text-lg text-purple-600 font-medium w-fit mx-auto opacity-65">{{ $headingSubText }}</p>
            </div>
            <a class="w-fit" href="#content">
                <button class="bg-purple-900 p-3 rounded-md text-purple-300 font-medium tracking-wide">Get started</button>
            </a>
        </div>
    </div>
    <div class="h-fit md:h-screen" id="content">
        <div class="flex flex-col md:flex-row gap-10 w-10/12 mx-auto justify-center pt-36 mb-36">
            <div class="bg-[url('/public/assets/person-working.jpg')] w-full h-36 md:h-auto md:w-5/12 bg-cover" data-aos="fade-up"></div>
            <div class="w-full md:w-6/12">
                <h1 class="text-white font-semibold text-3xl md:text-4xl mb-10 leading-tight" data-aos="fade-up">
                    How we started this
                    <span class="bg-purple-950/75 text-purple-500 px-2 pb-2 rounded-md">company</span>
                </h1>
                <p class="text-white w-full md:w-8/12 mb-5" data-aos="fade-up">We started this company because we think technologies
                    need
                    to
                    be more common among everyone, therefore we give our customers the best option in technologies to be
                    used easily.
                </p>
                <p class="text-white w-full md:w-8/12" data-aos="fade-up">We launch ZERO corp at late 2024 as a company that serves
                    customers with unlimited option of robust technologies to boost their productivity.
                </p>
            </div>
        </div>
    </div>
    <div class="h-fit md:h-screen">
        <div class="flex flex-col-reverse md:flex-row gap-3 w-10/12 mx-auto justify-center pt-36 mb-36">
            <div class="w-full md:w-5/12">
                <h1 class="text-white font-semibold text-3xl md:text-5xl mt-5 md:mt-0 mb-10" data-aos="fade-up">Our <span
                        class="bg-purple-950/75 text-purple-500 px-2 pb-3 rounded-md">goals</span></h1>
                <p class="text-white w-full md:w-9/12" data-aos="fade-up">We want to make more people understand and utilize
                    technologies easier than before, and with this one principle we serve hundreds of customers with
                    our latest technologies and work as easily as you never have before.
                </p>
            </div>
            <div class="bg-[url('/public/assets/person-working.jpg')] w-full h-36 md:h-auto md:w-6/12 bg-cover" data-aos="fade-up"></div>
        </div>
    </div>
    <div class="h-fit md:h-screen pt-36 mb-36">
        <h1 class="text-white font-semibold text-3xl md:text-5xl mb-10 mx-auto w-fit" data-aos="fade-up">Our great<span
                class="bg-purple-950/75 text-purple-500 px-2 pb-3 rounded-md ml-1">members</span></h1>
        <div class="w-10/12 mx-auto grid gap-5 grid-cols-2 md:gap-0 md:grid-cols-4 mb-10">
            <div class="w-fit flex flex-col items-center mb-6">
                <img src="{{ asset('assets/guts.jpg') }}" width="120" height="120" class="rounded-full mb-3"
                    data-aos="fade-up">
                <h1 class="text-md md:text-lg text-white w-fit" data-aos="fade-up">Guts</h1>
                <p class="text-sm md:text-md text-white w-fit" data-aos="fade-up">Project Leader</p>
            </div>
            <div class="w-fit flex flex-col items-center mb-6">
                <img src="{{ asset('assets/altair.jpg') }}" width="120" height="120" class="rounded-full mb-3"
                    data-aos="fade-up">
                <h1 class="text-md md:text-lg text-white w-fit" data-aos="fade-up">Altaïr Ibn-LaʼAhad</h1>
                <p class="text-sm md:text-md text-white w-fit" data-aos="fade-up">Supervisor</p>
            </div>
            <div class="w-fit flex flex-col items-center mb-6">
                <img src="{{ asset('assets/aeri.jpg') }}" width="120" height="120" class="rounded-full mb-3 aspect-square"
                    data-aos="fade-up">
                <h1 class="text-md md:text-lg text-white w-fit" data-aos="fade-up">Uchinaga Aeri</h1>
                <p class="text-sm md:text-md text-white w-fit" data-aos="fade-up">Project Manager</p>
            </div>
            <div class="w-fit flex flex-col items-center mb-6">
                <img src="{{ asset('assets/ningning.jpg') }}" width="120" height="120" class="rounded-full mb-3"
                    data-aos="fade-up">
                <h1 class="text-md md:text-lg text-white w-fit" data-aos="fade-up">Ning Yizhuo</h1>
                <p class="text-sm md:text-md text-white w-fit" data-aos="fade-up">UI/UX Designer</p>
            </div>
            <div class="w-fit flex flex-col items-center mb-6">
                <img src="{{ asset('assets/w.jpg') }}" width="120" height="120" class="rounded-full mb-3"
                    data-aos="fade-up">
                <h1 class="text-md md:text-lg text-white w-fit" data-aos="fade-up">Leonard Alfareno</h1>
                <p class="text-sm md:text-md text-white w-fit" data-aos="fade-up">Back-end Developer</p>
            </div>
            <div class="w-fit flex flex-col items-center mb-6">
                <img src="{{ asset('assets/w.jpg') }}" width="120" height="120" class="rounded-full mb-3"
                    data-aos="fade-up">
                <h1 class="text-md md:text-lg text-white w-fit" data-aos="fade-up">Leonard Alfareno</h1>
                <p class="text-sm md:text-md text-white w-fit" data-aos="fade-up">Front-end Developer</p>
            </div>
        </div>
    </div>
@endsection
