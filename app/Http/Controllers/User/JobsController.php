<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function frontend(){
        return view('user.jobs.frontend');
    }
    public function backend(){
        return view('user.jobs.backend');
    }
    public function uiux(){
        return view('user.jobs.uiux');
    }
}
