@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">

            <h1 class="mb-3"> {{ $post->title }} </h1>

            <h5>By. {{ $post->author->name }}</h5>

            <a href="/pertanyaan/posts/{{ $post->slug }}/edit" class="btn btn-warning">Edit</a>

            <div class="row justify-content mb-3">
                <div class="col-md-6">
                   <form action="/pertanyaan/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger mb-3" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>

            {{-- <p>{{ $post->body }}</p> --}}
            
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
                        
            <a href="/home"class="text-decoration-none d-block mt-3">Back to Home</a>
        </div>
    </div>
</div>
   
@endsection

