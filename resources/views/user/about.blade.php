@extends('user/user-layout')
@section('user-layout')
<div class="bg-black h-screen mb-10 pt-10">
    <div class="p-3 rounded-md bg-purple-950/75 w-fit mx-auto mb-14">
        <h1 class="text-center text-purple-700 font-semibold text-4xl w-fit">About our company</h1>
        <p class="text-sm text-purple-700 font-medium w-fit mx-auto opacity-65">Lorem ipsum</p>
    </div>
    <div class="flex gap-3 w-10/12 mx-auto justify-center">
        <div class="bg-[url('/public/assets/person-working.jpg')] w-5/12 bg-cover"></div>
        <div class="w-6/12">
            <h1 class="text-white font-semibold text-3xl mb-5">How we started this company</h1>
            <p class="text-white w-6/12">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore ab saepe exercitationem accusantium, tempore facilis ipsum cumque soluta nulla atque. Fugiat nostrum excepturi praesentium molestiae adipisci inventore vel. Officia, id.</p>
        </div>
    </div>
</div>
@endsection