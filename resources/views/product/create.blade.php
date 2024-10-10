@extends('./../layout')
@section('layout')
    <title>Create Product</title>
    <div>
        <div class="h-screen flex justify-center items-center">
            <form action="/products/create/store" method="POST" class="w-fit h-2/4 mx-auto pt-10 grid grid-cols-2 gap-3">
                @csrf
                <label class="text-white text-xl">Name</label>
                <input name="name" type="text" placeholder="Name" required class="rounded-md px-2">
                <label class="text-white text-xl">Price</label>
                <input name="price" type="number" placeholder="Name" required class="rounded-md px-2">
                <label class="text-white text-xl">Status</label>
                <select name="status" placeholder="Name" required class="rounded-md px-2">
                    <option value="active">Active</option>
                    <option value="unactive">Unactive</option>
                </select>
                <div class="flex gap-3">
                    <button class="w-2/4 mx-auto bg-slate-700 px-2 rounded-md text-white" type="submit">Store</button>
                    <button class="w-2/4 mx-auto bg-slate-700 px-2 rounded-md text-white" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
