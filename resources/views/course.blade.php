{{-- @extends('layouts.main')
@section('container')
<h1>Bulletin</h1>
@endsection --}}

@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="row justify-content mb-3">
        <div class="col-md-6">
           <a href="/course/posts/create" class="btn btn-primary mb-3">Create Course</a>
        </div>
    </div>

    @if ($posts->count())
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        {{-- <div class="positon-absolute px-3 py-2"> <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-dark">{{ $post->category->name }}</a> </div> --}}
                        {{-- <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}"> --}}
                        <div class="card-body">
                        <h5 class="card-title"><a href="/course/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                        <p>
                            <small class="text-muted">
                                By. <a href="/authors/{{ $post->author->username }}"class = "text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/course/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>  
                </div>
            @endforeach
        </div>
    </div>
        
    @else
       <p class="text-center fs-4">No post found</p> 
    @endif
    
    
@endsection