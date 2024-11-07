<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogpageController extends Controller
{
    public function blogpage(){
        $blog = Blog::where('status', 'active')->all();
    }
}
