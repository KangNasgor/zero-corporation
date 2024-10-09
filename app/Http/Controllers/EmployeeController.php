<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller{
    public function home(Request $req): View
    {
        $search = $req->input('search');

        if ($search) {
            $employee = employee::where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->get();
        } else {
            $employee = employee::where('status', 'active')->get();
        }
        return view('product/product', compact('employee', 'search'));
    }
    public function createView(): View
    {
        $employee = employee::where('status', 'active')->get();
        return view('product/create', compact('employee'));
    }
    public function create(Request $req)
    {
        $validate = $req->validate([
            'name' => ['bail','required','max:15'],
            'price' => ['bail', 'numeric'],
            'status' => ['required']
        ]);
        if($validate){
            employee::create([
                'name' => $req->input('name'),
                'price' => $req->input('price'),
                'status' => $req->input('status'),
            ]);
            return redirect()->route('employee');
        }
        else{
            return view('product/create');
        }
    }
    public function updateView(Request $req, int $id): View{
        $employee = employee::where('id', $id)->first();
        return view('product.update', compact('employee'));
    }
    public function update(Request $req, int $id){
        $employee = employee::where('id', $id)->first();
        $employee->update([
            'name' => $req->input('name'),
            'price' => $req->input('price'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('employee', $employee->id);
    }
    public function history(Request $req): View
    {
        $search = $req->input('search');

        if ($search) {
            $employee = employee::where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->get();
        } else {
            $employee = employee::where('status', 'unactive')->get();
        }
        return view('product/history', compact('employee', 'search'));
    }
    public function softdelete(int $id){
        $employee = employee::where('id', $id)->first();
        $employee->update([
            'status' => 'unactive',
        ]);
        return redirect()->route('employee');
    }
    public function delete(int $id){
        $employee = employee::where('id', $id)->first();
        $employee->delete();
        $maxId = employee::max('id');
        DB::statement('ALTER TABLE employee AUTO_INCREMENT = ' . $maxId + 1);

        return redirect()->route('employee.history');
    }
    public function restore(int $id){
        $employee = employee::where('id', $id)->first();
        $employee->update([
            'status' => 'active',
        ]);
        return redirect()->route('employee');
    }
}