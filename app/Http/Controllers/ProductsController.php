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
    public function updateView(Request $req, int $id): View{
        $products = Products::where('id', $id)->first();
        return view('product.update', compact('products'));
    }
    public function update(Request $req, int $id){
        $products = Products::where('id', $id)->first();
        $products->update([
            'name' => $req->input('name'),
            'price' => $req->input('price'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('products', $products->id);
    }
    public function history(Request $req): View
    {
        $search = $req->input('search');

        if ($search) {
            $products = Products::where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->get();
        } else {
            $products = Products::where('status', 'unactive')->get();
        }
        return view('product/history', compact('products', 'search'));
    }
    public function softdelete(int $id){
        $products = Products::where('id', $id)->first();
        $products->update([
            'status' => 'unactive',
        ]);
        return redirect()->route('products');
    }
    public function api()
    {
        $products = Products::where('status', 'active')->get();
        return response()->json($products);
    }
}
