<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pertanyaanPost;

class pertanyaanPostController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "All Posts",
            "active" => "home",
            //"posts" => pertanyaanPost::all()
            "posts" => pertanyaanPost::latest()->get()
        ]);
    }

    public function show(pertanyaanPost $pertanyaanPost)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "home",
            "post" => $pertanyaanPost
        ]);
    }
}
