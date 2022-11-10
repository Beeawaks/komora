@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Post Category: {{ $category }}</h1>
    @foreach ($pertanyaan as $pertanyaanSatuan)
        <article class="mb-5">
            <h2>
                <a href="/home/{{ $pertanyaanSatuan->slug }}">{{ $pertanyaanSatuan->title }}</a>
            </h2>
            {{-- <h5>Ditanya oleh {{ $pertanyaanSatuan["author"] }}</h5> --}}
            <p>{{ $pertanyaanSatuan->excerpt}}</p>
        </article>
    @endforeach

@endsection