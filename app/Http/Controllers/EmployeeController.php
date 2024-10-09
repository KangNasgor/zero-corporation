<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller{
    public function employee(Request $req): View
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
        return view('employee/employee', compact('employee', 'search'));
    }
    public function createView(): View
    {
        $employee = employee::where('status', 'active')->get();
        return view('employee/create', compact('employee'));
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
            return view('employee/create');
        }
    }
    public function updateView(Request $req, int $id): View{
        $employee = employee::where('id', $id)->first();
        return view('employee/edit', compact('employee'));
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
        return view('employee/history', compact('employee', 'search'));
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