@extends('user/user-layout')
@section('user-layout')
<div class="bg-black h-screen flex justify-center items-center mb-10 pt-10">
    <div class="p-3 rounded-md bg-purple-950/75 w-fit mx-auto mb-14">
        <h1 class="text-center text-purple-500 font-semibold text-6xl w-fit mb-3">About our company</h1>
        <p class="text-lg text-purple-600 font-medium w-fit mx-auto opacity-65">Lorem ipsum</p>
    </div>
</div>
<div class="h-screen">
    <div class="flex gap-10 w-10/12 mx-auto justify-center mb-36">
        <div class="bg-[url('/public/assets/person-working.jpg')] w-5/12 bg-cover" data-aos="fade-up"></div>
        <div class="w-6/12">
            <h1 class="text-white font-semibold text-5xl mb-10 leading-tight" data-aos="fade-up">How we started this <span class="bg-purple-950/75 text-purple-500 px-2 pb-2 rounded-md">company</span></h1>
            <p class="text-white w-6/12" data-aos="fade-up">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore ab saepe exercitationem accusantium, tempore facilis ipsum cumque soluta nulla atque. Fugiat nostrum excepturi praesentium molestiae adipisci inventore vel. Officia, id.</p>
        </div>
    </div>
</div>
<div class="h-screen">
    <div class="flex gap-3 w-10/12 mx-auto justify-center">
        <div class="w-5/12">
            <h1 class="text-white font-semibold text-5xl mb-10" data-aos="fade-up">Our <span class="bg-purple-950/75 text-purple-500 px-2 pb-3 rounded-md">goals</span></h1>
            <p class="text-white w-9/12" data-aos="fade-up">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore ab saepe exercitationem accusantium, tempore facilis ipsum cumque soluta nulla atque. Fugiat nostrum excepturi praesentium molestiae adipisci inventore vel. Officia, id.</p>
        </div>
        <div class="bg-[url('/public/assets/person-working.jpg')] w-6/12 bg-cover" data-aos="fade-up"></div>
    </div>
</div>
<div class="h-screen">
    <h1 class="text-white font-semibold text-5xl mb-10 mx-auto w-fit" data-aos="fade-up">Our great<span class="bg-purple-950/75 text-purple-500 px-2 pb-3 rounded-md ml-1">members</span></h1>
    <div class="w-10/12 mx-auto flex gap-5 justify-center mb-10">
        <div class="w-fit flex flex-col items-center">
            <img src="{{ asset('assets/w.jpg') }}" width="120" height="120" class="rounded-full" data-aos="fade-up">
            <h1 class="text-lg text-white w-fit" data-aos="fade-up">Leonard Alfareno</h1>
            <p class="text-md text-white w-fit" data-aos="fade-up">Project Leader</p>
        </div>
        <div class="w-fit flex flex-col items-center">
            <img src="{{ asset('assets/w.jpg') }}" width="120" height="120" class="rounded-full" data-aos="fade-up">
            <h1 class="text-lg text-white w-fit" data-aos="fade-up">Leonard Alfareno</h1>
            <p class="text-md text-white w-fit" data-aos="fade-up">Supervisor</p>
        </div>
        <div class="w-fit flex flex-col items-center">
            <img src="{{ asset('assets/w.jpg') }}" width="120" height="120" class="rounded-full" data-aos="fade-up">
            <h1 class="text-lg text-white w-fit" data-aos="fade-up">Leonard Alfareno</h1>
            <p class="text-md text-white w-fit" data-aos="fade-up">Project Manager</p>
        </div>
        <div class="w-fit flex flex-col items-center">
            <img src="{{ asset('assets/w.jpg') }}" width="120" height="120" class="rounded-full" data-aos="fade-up">
            <h1 class="text-lg text-white w-fit" data-aos="fade-up">Leonard Alfareno</h1>
            <p class="text-md text-white w-fit" data-aos="fade-up">Front-end Developer</p>
        </div>
    </div>
    <div class="w-10/12 mx-auto flex gap-5 justify-center mb-10">
        <div class="w-fit flex flex-col items-center">
            <img src="{{ asset('assets/w.jpg') }}" width="120" height="120" class="rounded-full" data-aos="fade-up">
            <h1 class="text-lg text-white w-fit" data-aos="fade-up">Leonard Alfareno</h1>
            <p class="text-md text-white w-fit" data-aos="fade-up">Back-end Developer</p>
        </div>
        <div class="w-fit flex flex-col items-center">
            <img src="{{ asset('assets/w.jpg') }}" width="120" height="120" class="rounded-full" data-aos="fade-up">
            <h1 class="text-lg text-white w-fit" data-aos="fade-up">Leonard Alfareno</h1>
            <p class="text-md text-white w-fit" data-aos="fade-up">UI/UX Designer</p>
        </div>
    </div>
</div>
@endsection