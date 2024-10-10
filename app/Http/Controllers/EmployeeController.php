<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $validate = Validator::make($req->all(),[
            'name' => ['bail','required','max:20'],
            'age' => ['bail', 'numeric', 'max:99'],
            'salary' => ['bail', 'numeric'],
            'status' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        else{
            Employee::create([
                'name' => $req->input('name'),
                'age' => $req->input('age'),
                'salary' => $req->input('salary'),
                'status' => $req->input('status')
            ]);
            return redirect()->route('employee');
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
            'age' => $req->input('age'),
            'salary' => $req->input('salary'),
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
        $employee = Employee::where('id', $id)->first();
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