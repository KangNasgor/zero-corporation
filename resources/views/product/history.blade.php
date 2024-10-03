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
                    <a href="{{ route('products') }}">
                        <button class="text-white bg-slate-600 py-2 px-3 rounded-md">
                            Home
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
                                <td class="border-b border-slate-700 p-4 pl-8 text-slate-200 flex gap-2 w-fit">
                                    <form class="w-fit" action="{{ route('products.restore', $prod->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class="bg-teal-300 text-black py-2 px-3 rounded-md">
                                            Restore
                                        </button>
                                    </form>
                                    <a>
                                        <button class="bg-red-600 py-2 px-3 rounded-md delete-button" data-id="{{ $prod->id }}">
                                            Delete
                                        </button>
                                        <div class="bg-black/75 w-full h-full hidden fixed justify-center items-center left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 modal" id="modal-{{ $prod->id }}">
                                            <div class="w-1/4 h-1/4 bg-slate-500 rounded-md">
                                                Delete "{{ $prod->id }}" permanently?
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
        deleteButton.forEach(button => {
            button.onclick = function(){
                let id = this.getAttribute('data-id');
                let modal = document.getElementById('modal-' + id);
                modal.style.display = "flex";
                console.log("modal showed");
            }
        });
        window.onclick = function(event){
            if(event.target.classList.contains("modal")){
                event.target.style.display = "none";
            }
        }
    </script>
@endsection