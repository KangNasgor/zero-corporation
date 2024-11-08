@extends('./../layout')
@section('layout')
    <title>Edit Blog</title>
    <div>
        <div class="h-screen flex flex-col justify-center items-center">
            <form action="{{ route('blog.edit', $blogs->id) }}" method="POST" enctype="multipart/form-data" class="w-fit h-2/4 mx-auto pt-10 grid grid-cols-2 gap-3">
                @csrf
                @method('PUT')
                <label class="text-white text-xl">Title</label>
                <input name="title" type="text" placeholder="Title" required class="rounded-md px-2" value="{{ $blogs->title }}">
                <label class="text-white text-xl">Description</label>
                <textarea name="description" placeholder="Description" required class="rounded-md px-2">{{ $blogs->description }}</textarea>
                <label class="text-white text-xl">Image</label>
                <input name="image" type="file" accept="image/*" required class="rounded-md px-2 text-white">
                <label class="text-white text-xl">Paragraph-1</label>
                <textarea name="paragraph1" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph1 }}</textarea>
                <label class="text-white text-xl">Paragraph-2</label>
                <textarea name="paragraph2" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph2 }}</textarea>
                <label class="text-white text-xl">Paragraph-3</label>
                <textarea name="paragraph3" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph3 }}</textarea>
                <label class="text-white text-xl">Paragraph-4</label>
                <textarea name="paragraph4" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph4 }}</textarea>
                <label class="text-white text-xl">Paragraph-5</label>
                <textarea name="paragraph5" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph5 }}</textarea>
                <label class="text-white text-xl">Paragraph-6</label>
                <textarea name="paragraph6" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph6 }}</textarea>
                <label class="text-white text-xl">Paragraph-7</label>
                <textarea name="paragraph7" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph7 }}</textarea>
                <label class="text-white text-xl">Paragraph-8</label>
                <textarea name="paragraph8" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph8 }}</textarea>
                <label class="text-white text-xl">Paragraph-9</label>
                <textarea name="paragraph9" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph9 }}</textarea>
                <label class="text-white text-xl">Paragraph-10</label>
                <textarea name="paragraph10" placeholder="Description" class="rounded-md px-2">{{ $blogs->paragraph10 }}</textarea>
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
