<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home(Request $req): View
    {
        $search = $req->input('search');

        if ($search) {
            $admin = admin::where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->get();
        } else {
            $admin = Admin::where('status', 'active')->get();
        }
        return view('admin/admin', compact('admin', 'search'));
    }
    public function createView(): View
    {
        $admin = admin::where('status', 'active')->get();
        return view('admin/create', compact('admin'));
    }
    public function create(Request $req)
    {
        $validate = $req->validate([
            'name' => ['bail','required','max:15'],
            'price' => ['bail', 'numeric'],
            'status' => ['required']
        ]);
        if($validate){
            admin::create([
                'name' => $req->input('name'),
                'price' => $req->input('price'),
                'status' => $req->input('status'),
            ]);
            return redirect()->route('admin');
        }
        else{
            return view('admin/create');
        }
    }
    public function updateView(Request $req, int $id): View{
        $admin = admin::where('id', $id)->first();
        return view('admin/edit', compact('admin'));
    }
    public function update(Request $req, int $id){
        $admin = admin::where('id', $id)->first();
        $admin->update([
            'name' => $req->input('name'),
            'price' => $req->input('price'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('admin', $admin->id);
    }
    public function history(Request $req): View
    {
        $search = $req->input('search');

        if ($search) {
            $admin = admin::where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->get();
        } else {
            $admin = admin::where('status', 'unactive')->get();
        }
        return view('admin/history', compact('admin', 'search'));
    }
    public function softdelete(int $id){
        $admin = admin::where('id', $id)->first();
        $admin->update([
            'status' => 'unactive',
        ]);
        return redirect()->route('admin');
    }
    public function delete(int $id){
        $admin = admin::where('id', $id)->first();
        $admin->delete();
        $maxId = admin::max('id');
        DB::statement('ALTER TABLE admin AUTO_INCREMENT = ' . $maxId + 1);

        return redirect()->route('admin/history');
    }
    public function restore(int $id){
        $admin = admin::where('id', $id)->first();
        $admin->update([
            'status' => 'active',
        ]);
        return redirect()->route('admin');
    }
}
