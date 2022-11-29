<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pertanyaanPost;
use Illuminate\Support\Str;

class pertanyaanPostController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "All Posts",
            "active" => "home",
            //"posts" => pertanyaanPost::all()
            "posts" => pertanyaanPost::latest()->filter(request(['search']))->paginate(7)
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

    public function create()
    {
        return view('pertanyaan.posts.create', [
            "title" => "Create New Question",
            "active" => "home",
        ]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => 'required|max:255',
            'slug' => 'required|unique:pertanyaan_posts',
            'body' => 'required' 
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        pertanyaanPost::create($validatedData);
        return redirect('/pertanyaan/posts')->with('success', 'New question has been added!');
    }
    
    public function destroy(pertanyaanPost $pertanyaanPost)
    {
        pertanyaanPost::destroy($pertanyaanPost->id);
        return redirect('/home')->with('success', 'Question deleted!');
    }

    public function edit(pertanyaanPost $pertanyaanPost)
    {
        return view('pertanyaan.posts.edit', [
            "title" => "Edit Question",
            "active" => "home",
            "post" => $pertanyaanPost
        ]);
    }
}
