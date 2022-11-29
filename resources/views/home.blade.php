@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/home">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                      <button class="btn btn-danger" type="submit">Search
                      </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content mb-3">
        <div class="col-md-6">
           <a href="/pertanyaan/posts/create" class="btn btn-primary mb-3">Create Question</a>
        </div>
    </div>

    @if ($posts->count())
    <div class="card mb-3">
        {{-- <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}"> --}}
        <div class="card-body">
            <h3 class="card-title"><a href="/home/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
            <p>
                <small class="text-muted">
                    By. {{ $posts[0]->author->name }} {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/home/{{ $posts[0]->slug }}" class="text-decoration-none">Read More</a>
        </div>
      </div> 
        

    
    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="positon-absolute px-3 py-2">  </div>
                        {{-- <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}"> --}}
                        <div class="card-body">
                        <h5 class="card-title"><a href="/home/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                        <p>
                            <small class="text-muted">
                                By. {{ $post->author->name }} {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/home/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>  
                </div>
            @endforeach
        </div>
    </div>
    
    @else
       <p class="text-center fs-4">No post found</p> 
    @endif

    {{ $posts->links() }}

@endsection