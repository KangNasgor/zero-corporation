@extends('./../layout')
@section('layout')
    <title>Add Dashboard Content</title>
    <div>
        <div class="h-screen flex flex-col justify-center items-center">
            <form action="/dashboardcontent/create/store" method="POST" enctype="multipart/form-data" class="w-fit h-2/4 mx-auto pt-10 grid grid-cols-2 gap-3">
                @csrf
                @method('POST')
                <label class="text-white text-xl">Title</label>
                <select name="product_id" required class="rounded-md p-2">
                    <option value="1">Website</option>
                    <option value="2">Poster</option>
                    <option value="3">Artificial Intelligence</option>
                    <option value="4">Anti Virus</option>
                </select>
                <label class="text-white text-xl">Description</label>
                <textarea name="description" placeholder="Product description" required class="rounded-md p-2"></textarea>
                <label class="text-white text-xl">Image</label>
                <input name="image" type="file" accept="image/*" required class="rounded-md p-2">
                <label class="text-white text-xl">Status</label>
                <select name="status" required class="rounded-md p-2">
                    <option value="Active">Active</option>
                    <option value="Unactive">Unactive</option>
                </select>
                <div class="flex gap-3">
                    <button class="w-2/4 mx-auto bg-slate-700 p-2 rounded-md text-white" type="submit">Store</button>
                    <button class="w-2/4 mx-auto bg-slate-700 p-2 rounded-md text-white" type="reset">Reset</button>
                </div>
            </form>
            @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
