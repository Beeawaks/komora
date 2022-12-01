<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use Illuminate\Support\Str;
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

    public function show(Bulletin $bulletin)
    {
        return view('bullet', [
            "title" => "Announcement",
            "active" => "bulletin",
            "post" => $bulletin
        ]);
    }

    public function create()
    {
        return view('bulletin.posts.create', [
            "title" => "Create New Announcement",
            "active" => "bulletin",
        ]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => 'required|max:255',
            'slug' => 'required|unique:bulletins',
            'body' => 'required',
            
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Bulletin::create($validatedData);
        return redirect('/bulletin')->with('success', 'New announcement has been added!');
    }

    public function destroy(Bulletin $bulletin)
    {
        Bulletin::destroy($bulletin->id);
        return redirect('/bulletin')->with('success', 'Announcement deleted!');
    }

    public function edit(Bulletin $bulletins)
    {
        return view('bulletin.posts.edit', [
            "title" => "Edit Bulletin",
            "active" => "bulletin",
            "post" => $bulletins
        ]);
    }

    public function update(Request $request, Bulletin $bulletins)
    {
        $rules = ([
            "title" => 'required|max:255',
            'body' => 'required' 
        ]);

        if($request->slug != $bulletins->slug)
        {
            $rules['slug'] = 'required|unique:bulletins';
        }

        $validatedData=$request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Bulletin::where('id', $bulletins->id)->update($validatedData);
        return redirect('/bulletin')->with('success', 'Bulletin updated!');
    }
}
