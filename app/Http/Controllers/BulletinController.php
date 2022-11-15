<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    public function index()
    {
        return view('bulletin', [
            "title" => "Bulletin Board",
            "active" => "bulletin",
            //"posts" => pertanyaanPost::all()
            "posts" => Bulletin::latest()->get()
        ]);
    }

    // public function show(Bulletin $bulletin)
    // {
    //     return view('bullet', [
    //         "title" => "Announcement",
    //         "active" => "bulletin",
    //         "post" => $bulletin
    //     ]);
    // }
}
