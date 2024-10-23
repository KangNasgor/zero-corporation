@extends('./../layout')
@section('layout')
    <title>Edit Dashboard Content</title>
    <div>
        <div class="h-screen flex flex-col justify-center items-center">
            <form action="{{ route('dashboardcontent.edit', $dashboardcontent->id) }}" method="POST" enctype="multipart/form-data" class="w-fit h-2/4 mx-auto pt-10 grid grid-cols-2 gap-3">
                @csrf
                @method('PUT')
                <label class="text-white text-xl">Product</label>
                <select name="product_id" required class="rounded-md p-2">
                    <option value="1" {{ $dashboardcontent->product_id == 1 ? 'selected' : '' }}>Website</option>
                    <option value="2" {{ $dashboardcontent->product_id == 2 ? 'selected' : '' }}>Poster</option>
                    <option value="3" {{ $dashboardcontent->product_id == 3 ? 'selected' : '' }}>Artificial Intelligence</option>
                    <option value="4" {{ $dashboardcontent->product_id == 4 ? 'selected' : '' }}>Anti Virus</option>
                </select>
                <label class="text-white text-xl">Description</label>
                <input name="description" type="text" placeholder="Description of the content" required class="rounded-md p-2" value="{{ $dashboardcontent->description }}">
                <label class="text-white text-xl">Modal Description</label>
                <textarea name="modal_description" placeholder="Product description" required class="rounded-md p-2"></textarea>
                <label class="text-white text-xl">Image</label>
                <input name="image" type="file" class="rounded-md p-2 text-white" value="{{ $dashboardcontent->image }}">
                <label class="text-white text-xl">Status</label>
                <select name="status" required class="rounded-md p-2">
                    <option value="active" {{ $dashboardcontent->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="unactive" {{ $dashboardcontent->status == 'unactive' ? 'selected' : '' }}>Unactive</option>
                </select>
                
                <div class="flex gap-3">
                    <button class="w-2/4 mx-auto bg-slate-700 p-2 rounded-md text-white" type="submit">Update</button>
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
