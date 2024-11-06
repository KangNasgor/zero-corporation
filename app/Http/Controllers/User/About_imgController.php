<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About_img;
use Illuminate\Support\Facades\DB;
use Storage;

class About_imgController extends Controller
{
    public function aboutimgView(Request $req){
        $search = $req->input('search');
        if($search){
            $contents = About_img::where('name', 'like', '%' . $search . '%')
            ->orWhere('role', 'like', '%' . $search . '%'); 
        }
        else{
            $contents = About_img::where('status', 'active')->get();
        }
        return view('aboutimg.aboutimg', compact('contents'));
    }
    public function createView(Request $req){
        $content = About_img::where('status', 'active')->get();
        return view('aboutimg.create', compact('content'));
    }
    public function create(Request $req){
        $req->validate([
            'image' => ['bail', 'required'],
            'name' => ['bail', 'string', 'max:255'],
            'role' => ['bail', 'required'],
            'status' => ['required'],
        ]);
        $img = $req->file('image')->storeAs('aboutimages/' . str_replace(' ','',$req->input('name')), str_replace(' ', '', $req->input('name')) . '.jpg', 'public');
        About_img::create([
            'image' => $img,
            'name' => $req->input('name'),
            'role' => $req->input('role'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('about.image');
    }
    public function updateView(Request $req, int $id){
        $content = About_img::where('id', $id)->first();
        return view('aboutimg.edit', compact('content'));
    }
    public function update(Request $req, int $id){
        $req->validate([
            'image' => ['bail', 'required', 'image'],
            'name' => ['bail', 'string', 'required', 'max:255'],
            'role' => ['bail', 'required', 'max:255'],
            'status' => ['required'],
        ]);
        $oldImg = About_img::findOrFail($id);
        if($oldImg->image && Storage::disk('public')->exists($oldImg->image)){ // Delete old image
            Storage::disk('public')->delete($oldImg->image);
            Storage::disk('public')->deleteDirectory('aboutimages/'. str_replace(' ', '', $oldImg->name));
        }
        $img = $req->file('image')->storeAs('aboutimages/' . str_replace(' ','',$req->input('name')), str_replace(' ', '', $req->input('name')) . '.jpg', 'public');
        About_img::where('id', $id)->first()->update([
            'image' => $img,
            'name' => $req->input('name'),
            'role' => $req->input('role'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('about.image');
    }
    public function history(Request $req){
        $search = $req->input('search');
        if($search){
            $content = About_img::where('name', 'like', '%' . $search . '%')
            ->orWhere('value', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->get();
        }
        else{
            $content = About_img::where('status', 'unactive')->get();
        }
        return view('aboutimg.history', compact('content'));
    }
    public function softDelete(int $id){
        $content = About_img::where('id', $id)->first();
        $content->update([
            'status' => 'unactive',
        ]);
        return redirect()->route('about.image');
    }
    public function restore(int $id){
        $content = About_img::where('id', $id)->first();
        $content->update([
            'status' => 'active',
        ]);
        return redirect()->route('about.image');
    }
    public function delete(int $id){
        $img = About_img::findOrFail($id);
        if($img->image && Storage::disk('public')->exists($img->image)){ // Delete old image
            Storage::disk('public')->delete($img->image);
            Storage::disk('public')->deleteDirectory('aboutimages/'. str_replace(' ', '', $img->name));
        }
        About_img::where('id', $id)->delete();
        $maxId = About_img::max('id');
        DB::statement('ALTER TABLE about_imgs AUTO_INCREMENT =' . $maxId + 1);
        return redirect()->route('aboutimg.history');
    }
}