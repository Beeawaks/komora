@extends('layouts.main')

@section('container')
    <article>
        <h2>
            {{ $post->title }}
        </h2>
        <h5>Ditanya oleh Gilang di {{ $post->categoryPertanyaan->name }}</h5>
        <p>{{ $post->body }}</p>
        {{-- <p>{!! post->body !!} </p> --}}
    </article>

    <a href="/home">Back to Home</a>
    
@endsection