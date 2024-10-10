@extends('./../layout')
@section('layout')
    <title>Add Employee</title>
    <div>
        <div class="h-screen flex flex-col justify-center items-center">
            <form action="{{ route('employee.edit', $employee->id) }}" method="POST" class="w-fit h-2/4 mx-auto pt-10 grid grid-cols-2 gap-3">
                @csrf
                @method('PUT')
                <label class="text-white text-xl">Name</label>
                <input name="name" type="text" placeholder="Paul Johnson" required class="rounded-md p-2" value="{{ $employee->name }}">
                <label class="text-white text-xl">Age</label>
                <input name="age" type="number" placeholder="99" required class="rounded-md p-2" value="{{ $employee->age }}">
                <label class="text-white text-xl">Salary</label>
                <input name="salary" type="number" placeholder="1500000" required class="rounded-md p-2" value="{{ $employee->salary }}">
                <label class="text-white text-xl">Status</label>
                <select name="status" placeholder="Name" required class="rounded-md p-2">
                    <option value="active">Active</option>
                    <option value="unactive">Unactive</option>
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
