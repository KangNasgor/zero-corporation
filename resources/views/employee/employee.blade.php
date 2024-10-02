@extends('layout')
@section('layout')
<title>Products</title>
    <div class="">
        <div class="flex gap-3 mb-10 w-10/12 mx-auto pl-4">
            <a href="{{ route('create-products') }}">
                <button class="text-white bg-slate-600 py-2 px-3 rounded-md">
                    Create
                </button>
            </a>
            <button class="text-white bg-slate-600 py-2 px-3 rounded-md">
                History
            </button>
        </div>
        <div class="w-10/12 mx-auto flex flex-col gap-3 items-end">
            <form method="GET" action="/products">
                <i class="fa-solid fa-magnifying-glass text-white mr-5"></i>
                <input type="text" name="search" class="rounded-md p-2 bg-slate-600 text-white">
            </form>
            <table class="table-auto border-collapse w-full rounded-md text-sm bg-slate-800 text-slate-200">
                <thead>
                    <tr>
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">No</th>
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">Name</th>
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">Price</th>
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">Status</th>
                    </tr>
                </thead>
                <tbody id="productsBody">
                    @if($employee->isEmpty())
                    <tr>
                        <td class="border-b border-slate-700 p-4 pl-8 text-lg text-slate-400">No Items Found.</td> 
                    </tr>
                    @elseif($employee)
                    @foreach ($employee as $emp)
                        <tr>
                            <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{ $emp->id }}</td>
                            <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{ $emp->name }}</td>
                            <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">
                                Rp.{{ number_format($emp->salary, 2, ',', '.') }}</td>
                            <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{ $emp->status }}</td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
