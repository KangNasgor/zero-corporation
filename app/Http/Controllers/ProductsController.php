<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function home(Request $req): View
    {
        $search = $req->input('search');

        if ($search) {
            $products = Products::where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->get();
        } else {
            $products = Products::where('status', 'active')->get();
        }
        return view('product/product', compact('products', 'search'));
    }
    public function createView(): View
    {
        $products = Products::where('status', 'active')->get();
        return view('product/create', compact('products'));
    }
    public function create(Request $req)
    {
        Products::create([
            'name' => $req->input('name'),
            'price' => $req->input('price'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('products');
    }
    public function api()
    {
        $products = Products::where('status', 'active')->get();
        return response()->json($products);
    }
}
