@extends('./../layout')
@section('layout')
    <title>Create Blog</title>
    <div>
        <div class="h-screen flex flex-col justify-center items-center">
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="w-fit h-2/4 mx-auto pt-10 grid grid-cols-2 gap-3">
                @csrf
                <label class="text-white text-xl">Title</label>
                <input name="title" type="text" placeholder="Title" required class="rounded-md px-2">
                <label class="text-white text-xl">Description</label>
                <textarea name="description" placeholder="Description" required class="rounded-md px-2"></textarea>
                <label class="text-white text-xl">Image</label>
                <input name="image" type="file" accept="image/*" required class="rounded-md px-2 text-white">
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
            @if ($errors->any())
                <div class="bg-red-600/50 border w-fit mx-auto border-red-600 py-9 px-5 rounded-md">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm text-white">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
