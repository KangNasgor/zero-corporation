<?php

namespace App\Http\Controllers\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Dashboard_content;
use Illuminate\Support\Facades\Storage;

class DashboardContentController extends Controller{
    public function dashboardContent(Request $req): View
    {
        $search = $req->input('search');

        if ($search) {
            $dashboardcontent = Dashboard_Content::where('description', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->get();
        } else {
            $dashboardcontent = Dashboard_Content::where('status', 'active')->get();
        }
        return view('dashboardcontent/dashboardcontent', compact('dashboardcontent', 'search'));
    }

    public function createView(): View
    {
        $dashboardcontent = Dashboard_Content::where('status', 'active')->get();
        return view('dashboardcontent/create', compact('dashboardcontent'));
    }

    public function create(Request $req)
    {
        $validate = Validator::make($req->all(), [
            'product_id' => ['bail', 'required'],
            'description' => ['bail', 'required', 'max:255'],
            'image' => ['bail', 'required', 'image'],
            'status' => ['required']
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $image = $req->file('image')->storeAs('images/' . $req->input('product_id'), $req->input('product_id') . '.jpg', 'public');
            Dashboard_Content::create([
                'product_id' => $req->input('product_id'),
                'description' => $req->input('description'),
                'image' => $image,
                'status' => $req->input('status')
            ]);

            return redirect()->route('dashboardcontent');
        }
    }

    public function updateView(Request $req, int $id): View
    {
        $dashboardcontent = Dashboard_Content::where('id', $id)->first();
        return view('dashboardcontent/edit', compact('dashboardcontent'));
    }

    public function update(Request $req, int $id)
    {
        $validate = Validator::make($req->all(), [
            'product_id' => ['bail', 'required'],
            'description' => ['bail', 'required', 'max:255'],
            'image' => ['bail', 'nullable', 'mimes:jpg,jpeg,png'],
            'status' => ['required']
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $dashboardcontent = Dashboard_Content::where('id', $id)->first();
            $image = $req->file('image')->storeAs('images/' . $req->input('product_id'), $req->input('product_id') . '.jpg', 'public');
            $dashboardcontent->update([
                'product_id' => $req->input('product_id'),
                'description' => $req->input('description'),
                'image' => $image,
                'status' => $req->input('status')
            ]);

            return redirect()->route('dashboardcontent', $dashboardcontent->id);
        }
    }

    public function history(Request $req): View
    {
        $search = $req->input('search');

        if ($search) {
            $dashboardcontent = Dashboard_Content::where('description', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->get();
        } else {
            $dashboardcontent = Dashboard_Content::where('status', 'unactive')->get();
        }

        return view('dashboardcontent/history', compact('dashboardcontent', 'search'));
    }

    public function softdelete(int $id)
    {
        $dashboardcontent = Dashboard_Content::where('id', $id)->first();
        $dashboardcontent->update([
            'status' => 'unactive',
        ]);

        return redirect()->route('dashboardcontent');
    }

    public function delete(int $id)
    {
        $dashboardcontent = Dashboard_Content::where('id', $id)->first();
        $dashboardcontent->delete();

        $maxId = Dashboard_Content::max('id');
        DB::statement('ALTER TABLE dashboard_contents AUTO_INCREMENT = ' . ($maxId + 1));

        return redirect()->route('dashboardcontent.history');
    }

    public function restore(int $id)
    {
        $dashboardcontent = Dashboard_Content::where('id', $id)->first();
        $dashboardcontent->update([
            'status' => 'active',
        ]);

        return redirect()->route('dashboardcontent');
    }
}
