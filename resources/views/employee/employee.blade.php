@extends('layout')
@section('layout')
    <title>Employee</title>
    <div class="">
        <div class="w-10/12 mx-auto mt-28 flex flex-col gap-3 items-end">
            <div class="flex items-center gap-4">
                <div class="flex gap-3 w-10/12 mx-auto pl-4">
                    <a href="{{ route('employee.create') }}">
                        <button class="text-white bg-slate-600 py-2 px-3 rounded-md">
                            Create
                        </button>
                    </a>
                    <a href="{{ route('employee.history') }}">
                        <button class="text-white bg-slate-600 py-2 px-3 rounded-md">
                            History
                        </button>
                    </a>
                </div>
                <form method="GET" action="{{ route('employee') }}" class="flex items-center">
                    <i class="fa-solid fa-magnifying-glass text-white mr-5"></i>
                    <input type="text" name="search" class="rounded-md p-2 bg-slate-600 text-white">
                </form>
            </div>
            <table class="table-auto border-collapse w-full rounded-md text-sm bg-slate-800 text-slate-200">
                <thead>
                    <tr>
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">ID</th>
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">Name</th>
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">Age</th>
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">Salary</th>
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">Options</th>
                    </tr>
                </thead>
                <tbody id="employeeBody">
                    @if ($employee->isEmpty())
                        <tr>
                            <td class="border-b border-slate-700 p-4 pl-8 text-lg text-slate-400">No Items Found.</td>
                        </tr>
                    @elseif($employee)
                        @foreach ($employee as $emp)
                            <tr>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{ $emp->id }}</td>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{ $emp->name }}</td>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{ $emp->age }}</td>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">Rp.{{ number_format($emp->salary, 2, ',', '.') }}</td>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-200">
                                    <a href="{{ route('employee.editpage', $emp->id) }}">
                                        <button class="bg-teal-300 text-black py-2 px-3 rounded-md">
                                            Edit
                                        </button>
                                    </a>
                                    <a>
                                        <button class="bg-red-600 py-2 px-3 rounded-md delete-button" data-id="{{ $emp->id }}">
                                            Delete
                                        </button>
                                        <div class="bg-black/75 w-full h-full hidden justify-center items-center fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50" id="modal-{{ $emp->id }}">
                                            <div class="h-1/4 w-1/4 p-5 flex flex-col justify-between bg-slate-500 rounded-md">
                                                <div class="flex items-center justify-between">
                                                    <h1 class="text-xl">Delete "{{ $emp->name }}"?</h1>
                                                    <div class="flex flex-col gap-px cursor-pointer p-1 close-modal"
                                                        data-id="{{ $emp->id }}">
                                                        <div class="bg-slate-800 h-px w-3 -rotate-45 translate-y-px"></div>
                                                        <div class="bg-slate-800 h-px w-3 rotate-45 -translate-y-px"></div>
                                                    </div>
                                                </div>
                                                <div class="flex gap-2 w-full justify-evenly">
                                                    <form action="{{ route('employee.softdelete', $emp->id) }}"
                                                        method="POST" class="w-fit bg-red-600 p-2 rounded-md">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit">
                                                            Delete
                                                        </button>
                                                    </form>
                                                    <button class="w-fit bg-teal-400 text-black p-2 rounded-md close-modal" data-id="{{ $emp->id }}">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // I love it raw :p
        let deleteButton = document.querySelectorAll(".delete-button");
        let closeModal = document.querySelectorAll(".close-modal");
        deleteButton.forEach(button => {
            button.onclick = function() {
                let id = this.getAttribute('data-id');
                let modal = document.getElementById('modal-' + id)
                modal.style.display = "flex";
            }
        });
        closeModal.forEach(button => {
            button.onclick = function() {
                let id = this.getAttribute('data-id');
                let modal = document.getElementById("modal-" + id);
                modal.style.display = "none";
            }
        })
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }
    </script>
@endsection
