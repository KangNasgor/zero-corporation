@extends('./../layout')
@section('layout')
    <title>Create Product</title>
    <div>
        <div class="h-screen flex justify-center items-center">
            <form action="{{ route('products.edit', $products->id) }}" method="POST" class="w-fit h-2/4 mx-auto pt-10 grid grid-cols-2 gap-3">
                @csrf
                @method('PUT')
                <label class="text-white text-xl">Name</label>
                <input name="name" placeholder="Name" required class="rounded-md p-2" value="{{ $products->name }}">
                <label class="text-white text-xl">Price</label>
                <input name="price" placeholder="Price" required class="rounded-md p-2" value="{{ $products->price }}">
                <label class="text-white text-xl">Status</label>
                <select name="status" required class="rounded-md p-2">
                    <option value="active">Active</option>
                    <option value="unactive">Unactive</option>
                </select>
                <label class="text-white text-xl">Handler</label>
                <select name="handler" placeholder="" required class="rounded-md p-2">
                    @foreach ($handler as $handle)
                        <option value="{{ $handle->id }}" {{ $handle->id == $products->handler_id ? 'selected' : '' }}>{{ $handle->name }}</option>
                    @endforeach
                </select>
                <div class="flex gap-3">
                    <button class="w-2/4 mx-auto bg-slate-700 p-2 rounded-md text-white" type="submit">Update</button>
                    <button class="w-2/4 mx-auto bg-slate-700 p-2 rounded-md text-white" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
