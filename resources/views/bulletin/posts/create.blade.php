@extends('layouts.main')

@section('container')

<h1 class="mb-3">{{ $title }}</h1>

<div class="col-lg-8">
    <form method="post" action="/bulletin/posts">
        @csrf
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" name="title" autofocus required value="{{ old('title') }}">
        @error('title')
            <div class="invalid-feedback">
            {{ $message }}
        @enderror
        </div>

        <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Enter slug" name="slug" value="{{ old('slug') }}">
        </div>
        
        {{-- <div class="form-group">
        <label for="excerpt">Body Quote</label>
        <input type="text" class="form-control" id="excerpt" placeholder="Enter body quote" name="excerpt">
        </div> --}}
        
        <div class="form-group">
            <label for="body">Announcement</label>
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" rows="3" placeholder="Enter announcement" name="body" required value="{{ old('body') }}"></textarea>
            @error('body')
            <div class="invalid-feedback">
            {{ $message }}
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
    });
</script>

@endsection