<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Products;

class HomeController extends Controller
{
    public function home():View{
        $products = Products::where('status', 'active')->get();
        return view('home', compact('products'));
    }

}
