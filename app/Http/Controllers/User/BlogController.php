<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Blog;
use Storage;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function blog(): View{
        return view('user.blog');
    }
    public function blogView(Request $req){
        $search = $req->input('search');
        if($search){
            $blogs = Blog::where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')->get();
        }
        else{
            $blogs = Blog::where('status', 'active')->get();
        }
        return view('blogs.blogs', compact('blogs'));
    }
    public function createView(Request $req){
        $content = Blog::where('status', 'active')->get();
        return view('blogs.create', compact('content'));
    }
    public function create(Request $req){
        $req->validate([
            'title' => ['bail', 'required', 'string'],
            'description' => ['bail', 'string', 'required'],
            'image' => ['bail', 'required', 'image'],
            'status' => ['required'],
        ]);
        $img = $req->file('image')->storeAs(
            'blog/' . str_replace(' ', '', $req->input('title')),
            str_replace(' ', '', $req->input('title')) . '.jpg',
            'public'
        );
        Blog::create([
            'title' => $req->input('title'),
            'description' => $req->input('description'),
            'image' => $img,
            'status' => $req->input('status'),
        ]);
        return redirect()->route('blog');
    }
    public function updateView(Request $req, int $id){
        $content =Blog::where('id', $id)->first();
        return view('aboutimg.edit', compact('content'));
    }
    public function update(Request $req, int $id){
        $req->validate([
            'image' => ['bail', 'required', 'image'],
            'name' => ['bail', 'string', 'required', 'max:255'],
            'role' => ['bail', 'required', 'max:255'],
            'status' => ['required'],
        ]);
        $oldImg =Blog::findOrFail($id);
        if($oldImg->image && Storage::disk('public')->exists($oldImg->image)){ // Delete old image
            Storage::disk('public')->delete($oldImg->image);
            Storage::disk('public')->deleteDirectory('aboutimages/'. str_replace(' ', '', $oldImg->name));
        }
        $img = $req->file('image')->storeAs('aboutimages/' . str_replace(' ','',$req->input('name')), str_replace(' ', '', $req->input('name')) . '.jpg', 'public');
       Blog::where('id', $id)->first()->update([
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
            $content =Blog::where('name', 'like', '%' . $search . '%')
            ->orWhere('value', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->get();
        }
        else{
            $content =Blog::where('status', 'unactive')->get();
        }
        return view('aboutimg.history', compact('content'));
    }
    public function softDelete(int $id){
        $content =Blog::where('id', $id)->first();
        $content->update([
            'status' => 'unactive',
        ]);
        return redirect()->route('about.image');
    }
    public function restore(int $id){
        $content =Blog::where('id', $id)->first();
        $content->update([
            'status' => 'active',
        ]);
        return redirect()->route('about.image');
    }
    public function delete(int $id){
        $img =Blog::findOrFail($id);
        if($img->image && Storage::disk('public')->exists($img->image)){ // Delete old image
            Storage::disk('public')->delete($img->image);
            Storage::disk('public')->deleteDirectory('aboutimages/'. str_replace(' ', '', $img->name));
        }
       Blog::where('id', $id)->delete();
        $maxId =Blog::max('id');
        DB::statement('ALTER TABLEBlogs AUTO_INCREMENT =' . $maxId + 1);
        return redirect()->route('aboutimg.history');
    }
}
