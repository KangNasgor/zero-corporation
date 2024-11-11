<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Storage;

class BlogController extends Controller
{
    public function blog(): View
    {
        $blogs = Blog::where('status', 'active')->get();
        return view('user.blog', compact('blogs'));
    }
    public function blogView(Request $req)
    {
        $search = $req->input('search');
        if ($search) {
            $blogs = Blog::where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')->get();
        } else {
            $blogs = Blog::where('status', 'active')->get();
        }
        return view('blogs.blogs', compact('blogs'));
    }
    public function createView(Request $req)
    {
        $content = Blog::where('status', 'active')->get();
        return view('blogs.create', compact('content'));
    }
    public function create(Request $req)
    {
        $req->validate([
            'title' => ['bail', 'required', 'string'],
            'description' => ['bail', 'string', 'required'],
            'image' => ['bail', 'required', 'image'],
            'status' => ['required'],
        ]);

        $imgPath = 'blog/' . str_replace(' ', '', $req->input('title'));
        $imgName = str_replace(' ', '', $req->input('title')) . '.jpg';
        $img = $req->file('image')->storeAs($imgPath, $imgName, 'public');

        $record = Blog::create([
            'title' => $req->input('title'),
            'description' => $req->input('description'),
            'image' => $img,
            'status' => $req->input('status'),
            'paragraph1' => $req->input('paragraph1'),
            'paragraph2' => $req->input('paragraph2'),
            'paragraph3' => $req->input('paragraph3'),
            'paragraph4' => $req->input('paragraph4'),
            'paragraph5' => $req->input('paragraph5'),
            'paragraph6' => $req->input('paragraph6'),
            'paragraph7' => $req->input('paragraph7'),
            'paragprah8' => $req->input('paragprah8'),
            'paragraph9' => $req->input('paragraph9'),
            'paragraph10' => $req->input('paragraph10'),
        ]);
        $blogName = 'blog-' . Str::slug($req->input('title'), '-') . '.blade.php';
        $blogPath = resource_path('views/user/blogs/' . $blogName);
        $paragraphs = '';
        for($i = 1; $i <= 10 ; $i++){
            $paragraph = $record->{'paragraph' . $i} ?? null;
            if($paragraph) {
                $paragraphs .= <<<HTML
                    <div class="flex flex-col gap-10 w-11/12 mx-auto pb-28">
                        <div class="text-white w-10/12 mx-auto">{$paragraph}</div> <!-- Loop to avoid null paragraph -->
                    </div>
                HTML;
            }
        }
        $blog = <<<BLADE
        @extends('user.user-layout')
        @section('user-layout')
            <div class="h-[40vh] flex justify-center items-center">
                <div class="w-fit">
                    <h1 class="text-white text-5xl font-semibold w-fit mx-auto mb-5"> $record->title </h1>
                    <p class="text-white/75 font-medium w-fit">By Leonard Alfareno</p>
                </div>
            </div>
            <div class="h-fit w-9/12 mx-auto py-10 mb-32 flex justify-center items-center">
                <div class="w-fit">
                    <img src="{{ asset('storage/$record->image') }}" alt="img" width="700" height="300" class="mx-auto">
                </div>
            </div>
            $paragraphs
        @endsection
        BLADE;

        File::put($blogPath, $blog);
        return view('blogs.blogs');
    }
    public function updateView(Request $req, int $id)
    {
        $blogs = Blog::where('id', $id)->first();
        return view('blogs.edit', compact('blogs'));
    }
    public function update(Request $req, int $id)
    {
        $req->validate([
            'title' => ['bail', 'required', 'string'],
            'description' => ['bail', 'string', 'required'],
            'image' => ['bail', 'required', 'image'],
            'status' => ['required'],
        ]);
        $oldImg = Blog::findOrFail($id);
        $oldDirectory = 'blog/' . str_replace(' ', '', $oldImg->title);
        if ($oldImg->image && Storage::disk('public')->exists($oldImg->image)) { // Delete old image
            Storage::disk('public')->delete($oldImg->image);
            Storage::disk('public')->deleteDirectory($oldDirectory);
        }
        $img = $req->file('image')->storeAs('blog/' . str_replace(' ', '', $req->input('title')), str_replace(' ', '', $req->input('title')) . '.jpg', 'public');
        $record = Blog::where('id', $id)->first();
            $record->update([
            'image' => $img,
            'title' => $req->input('title'),
            'description' => $req->input('description'),
            'status' => $req->input('status'),
            'paragraph1' => $req->input('paragraph1'),
            'paragraph2' => $req->input('paragraph2'),
            'paragraph3' => $req->input('paragraph3'),
            'paragraph4' => $req->input('paragraph4'),
            'paragraph5' => $req->input('paragraph5'),
            'paragraph6' => $req->input('paragraph6'),
            'paragraph7' => $req->input('paragraph7'),
            'paragprah8' => $req->input('paragprah8'),
            'paragraph9' => $req->input('paragraph9'),
            'paragraph10' => $req->input('paragraph10'),
        ]);
        $blogName = 'blog-' . Str::slug($req->input('title'), '-') . '.blade.php';
        $blogPath = resource_path('views/user/blogs/' . $blogName);
        $paragraphs = '';
        for($i = 1; $i <= 10 ; $i++){
            $paragraph = $record->{'paragraph' . $i} ?? null;
            if($paragraph) {
                $paragraphs .= <<<HTML
                    <div class="flex flex-col gap-10 w-11/12 mx-auto pb-28">
                        <div class="text-white w-10/12 mx-auto">{$paragraph}</div> <!-- Loop to avoid null paragraph -->
                    </div>
                HTML;
            }
        }
        $blog = <<<BLADE
        @extends('user.user-layout')
        @section('user-layout')
            <div class="h-[40vh] flex justify-center items-center">
                <div class="w-fit">
                    <h1 class="text-white text-5xl font-semibold w-fit mx-auto mb-5"> $record->title </h1>
                    <p class="text-white/75 font-medium w-fit">By Leonard Alfareno</p>
                </div>
            </div>
            <div class="h-fit w-9/12 mx-auto py-10 mb-32 flex justify-center items-center">
                <div class="w-fit">
                    <img src="{{ asset('storage/$record->image') }}" alt="img" width="700" height="300" class="mx-auto">
                </div>
            </div>
            $paragraphs
        @endsection
        BLADE;

        File::put($blogPath, $blog);
        return redirect()->route('blog');
    }
    public function history(Request $req)
    {
        $search = $req->input('search');
        if ($search) {
            $blogs = Blog::where('name', 'like', '%' . $search . '%')
                ->orWhere('value', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->get();
        } else {
            $blogs = Blog::where('status', 'unactive')->get();
        }
        return view('blogs.history', compact('blogs'));
    }
    public function softDelete(int $id)
    {
        $blog = Blog::where('id', $id)->first();
        $blog->update([
            'status' => 'unactive',
        ]);
        return redirect()->route('blog');
    }
    public function restore(int $id)
    {
        $content = Blog::where('id', $id)->first();
        $content->update([
            'status' => 'active',
        ]);
        return redirect()->route('about.image');
    }
    public function delete(int $id)
    {
        $img = Blog::findOrFail($id);
        if ($img->image && Storage::disk('public')->exists($img->image)) { // Delete old image
            Storage::disk('public')->delete($img->image);
            Storage::disk('public')->deleteDirectory('aboutimages/' . str_replace(' ', '', $img->title));
        }
        Blog::where('id', $id)->delete();
        $maxId = Blog::max('id');
        DB::statement('ALTER TABLE Blogs AUTO_INCREMENT =' . $maxId + 1);
        return redirect()->route('blog.history');
    }
}
