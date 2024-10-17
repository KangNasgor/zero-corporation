<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Products;
use App\Models\Employee;
use App\Models\Admin;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(): View{
        $products = Products::where('status', 'active')->get();
        $unactiveProducts = Products::where('status', 'unactive')->get();
        $employees = Employee::where('status', 'active')->get();
        $unactiveEmployees = Employee::where('status', 'unactive')->get();
        $admin = Admin::where('status', 'active')->get();
        $unactiveAdmin = Admin::where('status', 'unactive')->get();
        return view('dashboard', compact('products', 'employees', 'unactiveProducts', 'unactiveEmployees', 'admin', 'unactiveAdmin'));
    }
}
