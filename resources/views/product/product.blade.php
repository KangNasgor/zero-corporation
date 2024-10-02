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
                        <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-left">Options</th>
                    </tr>
                </thead>
                <tbody id="productsBody">
                    @if ($products->isEmpty())
                        <tr>
                            <td class="border-b border-slate-700 p-4 pl-8 text-lg text-slate-400">No Items Found.</td>
                        </tr>
                    @elseif($products)
                        @foreach ($products as $prod)
                            <tr>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{ $prod->id }}</td>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{ $prod->name }}</td>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">
                                    Rp.{{ number_format($prod->price, 2, ',', '.') }}</td>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{ $prod->status }}</td>
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-200">
                                    <a href="{{ route('products.editpage', $prod->id) }}">
                                        <button class="bg-teal-300 text-black py-2 px-3 rounded-md">
                                            Edit
                                        </button>
                                    </a>
                                    <a>
                                        <button class="bg-red-600 py-2 px-3 rounded-md">
                                            Delete
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
