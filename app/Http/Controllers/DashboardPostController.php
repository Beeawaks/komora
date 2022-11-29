<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\pertanyaanPost;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // return Post::where('user_id', auth()->user()->user_id)->get();
      return view('dashboard.posts.index', [
        'posts' => pertanyaanPost::where('user_id', auth()->user()->id)->get()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // return 'hello';
      return view('dashboard.posts.create', [
      ]);
        //
    }

    public function store(Request $request)
    {
      // return ddd($request);
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:pertanyaan_posts',
        'body' => 'required'
      ]);

      $validatedData['user_id'] = auth()->user()->id;
      $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

      pertanyaanPost::create($validatedData);
      return redirect('/dashboard/posts')->with('success', 'New question has been added!');
    }

    public function show(pertanyaanPost $pertanyaanPost)
    {
      return view('dashboard.posts.show', [
        'post' => $pertanyaanPost
      ]);
    }

    public function edit(pertanyaanPost $pertanyaanPost)
    {
      return view('dashboard.posts.edit', [
        'post' => $pertanyaanPost,
      ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pertanyaanPost $pertanyaanPost)
    {
      // buat daulu varuablenya
      $rules =[
        'title' => 'required|max:255',
        'image' => 'image|max:1024',
        'body' => 'required'
      ];

      // jika apa yang kita input 'slug' tidak sama dengan 'slug' milik post
      if ($request->slug != $pertanyaanPost->slug){
        $rules['slug'] ='required|unique:pertanyaan_posts';
      }

      // masukan rules-nya ke validate
      $validatedData = $request->validate($rules);

        $validatedData['image'] = $request->file('image')->store('posts-img');
      }

      // tambahkan 'user_id' dan excerpt
      $validatedData['user_id'] = auth()->user()->id;
      $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

      Post::where('id', $post->id)
        ->update($validatedData);

      return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      if($post->image) {
        Storage::delete($post->image);
      }

      Post::destroy($post->id);
      return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
      $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
      return response()->json(['slug' => $slug]);
    }
}