@extends('user.user-layout')
@section('user-layout')
    <div class="h-[40vh] flex justify-center items-center">
        <div class="w-fit">
            <h1 class="text-white text-5xl font-semibold w-fit mx-auto mb-5"> Boosting Productivity with Technology </h1>
            <p class="text-white/75 font-medium w-fit">By Leonard Alfareno</p>
        </div>
    </div>
    <div class="h-fit w-9/12 mx-auto py-10 mb-32 flex justify-center items-center">
        <div class="w-fit">
            <img src="{{ asset('storage/blog/BoostingProductivitywithTechnology/BoostingProductivitywithTechnology.jpg') }}" alt="img" width="700" height="300" class="mx-auto">
        </div>
    </div>
    
@endsection