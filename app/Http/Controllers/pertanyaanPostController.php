<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pertanyaanPost;

class pertanyaanPostController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "Home",
            "pertanyaan" => pertanyaanPost::all()
        ]);
    }

    public function show(pertanyaanPost $pertanyaanPost)
    {
        return view('post', [
            "title" => "Single Post",
            "post" => $pertanyaanPost
        ]);
    }
}
