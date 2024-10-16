<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function home(Request $req): View
    {
        $search = $req->input('search');

        if ($search) {
            $products = Products::where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('handler', 'like', '%' . $search . '%')
                ->get();
        } else {
            $products = Products::with('handler')->where('status', 'active')->get();
        }
        return view('product/product', compact('products', 'search'));
    }
    public function createView(): View
    {
        $products = Products::where('status', 'active')->get();
        $handler = Employee::where('status', 'active')->get();
        return view('product/create', compact('products', 'handler'));
    }
    public function create(Request $req)
    {
        $validate = $req->validate([
            'name' => ['bail','required','max:15'],
            'price' => ['bail', 'numeric'],
            'status' => ['required']
        ]);
        if($validate){
            Products::create([
                'name' => $req->input('name'),
                'price' => $req->input('price'),
                'status' => $req->input('status'),
                'handler_id' => $req->input('handler'),
            ]);
            return redirect()->route('products');
        }
        else{
            return view('product/create');
        }
    }
    public function updateView(Request $req, int $id): View{
        $products = Products::where('id', $id)->first();
        $handler = Employee::where('status', 'active')->get();
        return view('product.update', compact('products', 'handler'));
    }
    public function update(Request $req, int $id){
        $products = Products::where('id', $id)->first();
        $products->update([
            'name' => $req->input('name'),
            'price' => $req->input('price'),
            'status' => $req->input('status'),
            'handler_id' => $req->input('handler'),
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
    public function delete(int $id){
        $products = Products::where('id', $id)->first();
        $products->delete();
        $maxId = Products::max('id');
        DB::statement('ALTER TABLE products AUTO_INCREMENT = ' . $maxId + 1);

        return redirect()->route('products.history');
    }
    public function restore(int $id){
        $products = Products::where('id', $id)->first();
        $products->update([
            'status' => 'active',
        ]);
        return redirect()->route('products');
    }
    public function api()
    {
        $products = Products::where('status', 'active')->get();
        return response()->json($products);
    }
}
