@extends('./../layout')
@section('layout')
    <title>Create About</title>
    <div>
        <div class="h-screen flex justify-center items-center">
            <form action="{{ route('aboutcontent.store') }}" method="POST" class="w-fit h-2/4 mx-auto pt-10 grid grid-cols-2 gap-3">
                @csrf
                <label class="text-white text-xl">Name</label>
                <input name="name" type="text" placeholder="Name" required class="rounded-md px-2">
                <label class="text-white text-xl">Value</label>
                <textarea name="value" placeholder="Value" required class="rounded-md px-2 pt-2"></textarea>
                <label class="text-white text-xl">Status</label>
                <select name="status" required class="rounded-md px-2">
                    <option value="active">Active</option>
                    <option value="unactive">Unactive</option>
                </select>
                <div class="flex gap-3">
                    <button class="w-2/4 mx-auto bg-slate-700 px-2 rounded-md text-white" type="submit">Store</button>
                    <button class="w-2/4 mx-auto bg-slate-700 px-2 rounded-md text-white" type="reset">Reset</button>
                </div>
            </form>
        </div>
            @if ($errors->any())
            <div class="bg-red-600/50 border w-fit mx-auto border-red-600 py-9 px-5 rounded-md">
                @foreach ($errors->all() as $error)
                    <p class="text-sm text-white">{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection
