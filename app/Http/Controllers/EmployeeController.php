<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller{
    public function employee(Request $req) : View{
        $search = $req->input('search');
        $employee = Employee::where('status', 'active')->get();
        return view('employee.employee', compact('employee','search'));
    }
}