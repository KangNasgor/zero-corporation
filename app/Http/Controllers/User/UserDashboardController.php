<?php

namespace App\Http\Controllers\User;

use App\Models\Dashboard_content;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Userdashboard;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function home(): View{
        $dashboardData = Userdashboard::whereIn('name', [
            'title',
            'Heading Text',
            ])->pluck('value', 'name');

        $content = Dashboard_content::with('product')->where('status', 'active')->get();
        return view('user/dashboard', [
            'title' => $dashboardData['title'] ?? null,
            'headingText' => $dashboardData['Heading Text'] ?? null,
        ],
        compact('content'));
    }
    public function dashboarduser(Request $req){
        $search = $req->input('search');
        if($search){
            $dashboard = Userdashboard::where('name', 'like', '%' . $search . '%')
            ->orWhere('value', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->get();
        }
        else{
            $dashboard = userDashboard::where('status', 'active')->get();
        }
        return view('userdashboard.userdashboard', compact('dashboard'));
    }
    public function createDashboardView(Request $req){
        $dashboard = Userdashboard::where('status', 'active')->get();
        return view('userdashboard.create', compact('dashboard'));
    }
    public function createDashboard(Request $req){
        $req->validate([
            'name' => ['bail', 'string', 'max:255'],
            'value' => ['bail', 'required'],
            'status' => ['required'],
        ]);
        Userdashboard::create([
            'name' => $req->input('name'),
            'value' => $req->input('value'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('dashboarduser');
    }
    public function updateDashboardView(Request $req, int $id){
        $dashboard = Userdashboard::where('id', $id)->first();
        return view('userdashboard.edit', compact('dashboard'));
    }
    public function updateDashboard(Request $req, int $id){
        $req->validate([
            'name' => ['bail', 'string', 'required', 'max:255'],
            'value' => ['bail', 'required', 'max:255'],
            'status' => ['required'],
        ]);
        Userdashboard::where('id', $id)->first()->update([
            'name' => $req->input('name'),
            'value' => $req->input('value'),
            'status' => $req->input('status'),
        ]);
        return redirect()->route('dashboarduser');
    }
    public function dashboardHistory(){
        $dashboard = Userdashboard::where('status', 'unactive')->get();
        return view('userdashboard.history', compact('dashboard'));
    }
    public function dashboardSoftDelete(int $id){
        $dashboard = Userdashboard::where('id', $id)->first();
        $dashboard->update([
            'status' => 'unactive',
        ]);
        return redirect()->route('dashboarduser');
    }
    public function dashboardRestore(int $id){
        $dashboard = Userdashboard::where('id', $id)->first();
        $dashboard->update([
            'status' => 'active',
        ]);
        return redirect()->route('dashboarduser');
    }
    public function dashboardDelete(int $id){
        Userdashboard::where('id', $id)->delete();
        $maxId = Userdashboard::max('id');
        DB::statement('ALTER TABLE user_dashboards AUTO_INCREMENT =' . $maxId + 1);
        return redirect()->route('dashboarduser');
    }
}