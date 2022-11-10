@extends('layouts.main')

@section('container')
    <article>
        <h2>
            {{ $post->title }}
        </h2>
        <h5>Ditanya oleh Gilang di <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
        <p>{{ $post->body }}</p>
        {{-- <p>{!! post->body !!} </p> --}}
    </article>

    <a href="/home">Back to Home</a>
    
@endsection