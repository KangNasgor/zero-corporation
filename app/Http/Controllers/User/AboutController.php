<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About_img;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\About_contents;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function aboutView(): View{
        $contents = About_contents::whereIn('name', [
            'headingText',
            'headingSubText',
            'howWeStarted1',
            'howWeStarted2',
            'ourGoals',
        ])->pluck('value', 'name');
        $members = About_img::where('status', 'active')->get();
        return view('user.about', [
            'headingText' => $contents['headingText'] ?? null,
            'headingSubText' => $contents['headingSubText'] ?? null,
            'howWeStarted1' => $contents['howWeStarted1'] ?? null,
            'howWeStarted2' => $contents['howWeStarted2'] ?? null,
            'ourGoals' => $contents['ourGoals'] ?? null,
        ], compact('members'));
    }
    public function about(Request $req){
        $search = $req->input('search');
        if($search){
            $content = About_contents::where('name', 'like', '%' . $search . '%')
            ->orWhere('value', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->get();
        }
        else{
            $content = About_contents::where('status', 'active')->get();
        }
        return view('aboutcontent/aboutcontent', compact('content'));
    }
    public function createView(Request $req){
        $content = About_contents::where('status', 'active')->get();
        return view('aboutcontent.create', compact('content'));
    }
    public function create(Request $req){
        $req->validate([
            'name' => ['bail', 'string', 'max:255'],
            'value' => ['bail', 'required'],
            'status' => ['required'],
        ]);
        About_contents::create([
            'name' => $req->input('name'),
            'value' => $req->input('value'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('aboutcontent');
    }
    public function updateView(Request $req, int $id){
        $content = About_contents::where('id', $id)->first();
        return view('aboutcontent.edit', compact('content'));
    }
    public function update(Request $req, int $id){
        $req->validate([
            'name' => ['bail', 'string', 'required', 'max:255'],
            'value' => ['bail', 'required', 'max:255'],
            'status' => ['required'],
        ]);
        About_contents::where('id', $id)->first()->update([
            'name' => $req->input('name'),
            'value' => $req->input('value'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('aboutcontent');
    }
    public function history(Request $req){
        $search = $req->input('search');
        if($search){
            $content = About_contents::where('name', 'like', '%' . $search . '%')
            ->orWhere('value', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->get();
        }
        else{
            $content = About_contents::where('status', 'unactive')->get();
        }
        return view('aboutcontent.history', compact('content'));
    }
    public function softDelete(int $id){
        $content = About_contents::where('id', $id)->first();
        $content->update([
            'status' => 'unactive',
        ]);
        return redirect()->route('aboutcontent');
    }
    public function restore(int $id){
        $content = About_contents::where('id', $id)->first();
        $content->update([
            'status' => 'active',
        ]);
        return redirect()->route('aboutcontent');
    }
    public function delete(int $id){
        About_contents::where('id', $id)->delete();
        $maxId = About_contents::max('id');
        DB::statement('ALTER TABLE about_contents AUTO_INCREMENT =' . $maxId + 1);
        return redirect()->route('aboutcontent');
    }
}
