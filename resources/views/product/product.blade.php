@extends('layout')
@section('layout')
    <title>Products</title>
    <div class="">
        <div class="w-10/12 mx-auto mt-28 flex flex-col gap-3 items-end">
            <div class="flex items-center gap-4">
                <div class="flex gap-3 w-10/12 mx-auto pl-4">
                    <a href="{{ route('create-products') }}">
                        <button class="text-white bg-slate-600 py-2 px-3 rounded-md">
                            Create
                        </button>
                    </a>
                    <a href="{{ route('products.history') }}">
                        <button class="text-white bg-slate-600 py-2 px-3 rounded-md">
                            History
                        </button>
                    </a>
                </div>
                <form method="GET" action="/products" class="flex items-center">
                    <i class="fa-solid fa-magnifying-glass text-white mr-5"></i>
                    <input type="text" name="search" class="rounded-md p-2 bg-slate-600 text-white">
                </form>
            </div>
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
                                        <button class="bg-red-600 py-2 px-3 rounded-md delete-button" data-id="{{ $prod->id }}">
                                            Delete
                                        </button>
                                        <div class="bg-black/75 w-full h-full hidden justify-center items-center fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 modal" id="modal-{{ $prod->id }}">
                                            <div class="h-1/4 w-1/4 p-5 bg-slate-500 rounded-md">
                                                <div class="flex items-center justify-between">
                                                    <h1 class="text-xl">Delete "{{ $prod->name }}"?</h1>
                                                    <div class="flex flex-col gap-px cursor-pointer p-1 close-modal" data-id="{{ $prod->id }}">
                                                        <div class="bg-slate-800 h-px w-3 -rotate-45 translate-y-px"></div>
                                                        <div class="bg-slate-800 h-px w-3 rotate-45 -translate-y-px"></div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('products.softdelete', $prod->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit">
                                                        Delete
                                                    </button>
                                                </form>
                                                <button>
                                                    Cancel
                                                </button>
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
        let deleteButton = document.querySelectorAll(".delete-button");
        let closeModal = document.querySelectorAll(".close-modal");
        deleteButton.forEach(button => {
            button.onclick = function(){
                let id = this.getAttribute('data-id'); 
                let modal = document.getElementById('modal-' + id)
                modal.style.display = "flex";
            }
        });
        closeModal.forEach(button => {
            button.onclick = function(){
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
