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
        $blogs = Blog::where('status', 'active')->get();
        return view('user.blog', compact('blogs'));
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
        $blogs = Blog::where('id', $id)->first();
        return view('blogs.edit', compact('blogs'));
    }
    public function update(Request $req, int $id){
        $req->validate([
            'title' => ['bail', 'required', 'string'],
            'description' => ['bail', 'string', 'required'],
            'image' => ['bail', 'required', 'image'],
            'status' => ['required'],
        ]);
        $oldImg = Blog::findOrFail($id);
        $oldDirectory = 'blog/'. str_replace(' ', '', $oldImg->title);
        if($oldImg->image && Storage::disk('public')->exists($oldImg->image)){ // Delete old image
            Storage::disk('public')->delete($oldImg->image);
            Storage::disk('public')->deleteDirectory($oldDirectory);
        }
        $img = $req->file('image')->storeAs('blog/' . str_replace(' ','',$req->input('title')), str_replace(' ', '', $req->input('title')) . '.jpg', 'public');
        Blog::where('id', $id)->first()->update([
                'image' => $img,
                'title' => $req->input('title'),
                'description' => $req->input('description'),
                'status' => $req->input('status'),
            ]);
        return redirect()->route('blog');
    }
    public function history(Request $req){
        $search = $req->input('search');
        if($search){
            $blogs = Blog::where('name', 'like', '%' . $search . '%')
            ->orWhere('value', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->get();
        }
        else{
            $blogs = Blog::where('status', 'unactive')->get();
        }
        return view('blogs.history', compact('blogs'));
    }
    public function softDelete(int $id){
        $blog = Blog::where('id', $id)->first();
        $blog->update([
            'status' => 'unactive',
        ]);
        return redirect()->route('blog');
    }
    public function restore(int $id){
        $content =Blog::where('id', $id)->first();
        $content->update([
            'status' => 'active',
        ]);
        return redirect()->route('about.image');
    }
    public function delete(int $id){
        $img = Blog::findOrFail($id);
        if($img->image && Storage::disk('public')->exists($img->image)){ // Delete old image
            Storage::disk('public')->delete($img->image);
            Storage::disk('public')->deleteDirectory('aboutimages/'. str_replace(' ', '', $img->title));
        }
        Blog::where('id', $id)->delete();
        $maxId =Blog::max('id');
        DB::statement('ALTER TABLE Blogs AUTO_INCREMENT =' . $maxId + 1);
        return redirect()->route('blog.history');
    }
}
