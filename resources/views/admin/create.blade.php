@extends('./../layout')
@section('layout')
<title>Create Product</title>
<div>
    <div class="h-screen flex justify-center items-center">
        <form action="/admin/create/store" method="POST" class="w-fit h-2/4 mx-auto pt-10 flex flex-col gap-3">
            @csrf
            <div class="flex gap-3">
                <label class="text-white text-xl">Name</label>
                <input name="name" type="text" placeholder="Name" required class="rounded-md p-2">
            </div>
            <div class="flex gap-6">
                <label class="text-white text-xl">Password</label>
                <input name="password" type="password" placeholder="Password" required class="rounded-md p-2">
            </div>
            <div class="flex gap-3">
                <label class="text-white text-xl">Role</label>
                <select name="role_id"  required class="rounded-md p-2">
                    <option value="1">User</option>
                    <option value="2">Admin</option>
                    <option value="3">Super Admin</option>
                </select>
            </div>
            <div class="flex gap-3">
                <label class="text-white text-xl">Status</label>
                <select name="status" required class="rounded-md p-2">
                    <option value="active">Active</option>
                    <option value="unactive">Unactive</option>
                </select>
            </div>
            <button class="w-2/4 mx-auto bg-slate-700 p-2 rounded-md text-white" type="submit">Store</button>
            <button class="w-2/4 mx-auto bg-slate-700 p-2 rounded-md text-white" type="reset">Reset</button>
        </form>
    </div>
</div>
@endsection