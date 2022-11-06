@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Pertanyaan</h1>
    @foreach ($pertanyaan as $pertanyaanSatuan)
        <article class="mb-5">
            <h2>
                <a href="/home/{{ $pertanyaanSatuan->id }}">{{ $pertanyaanSatuan->title }}</a>
            </h2>
            {{-- <h5>Ditanya oleh {{ $pertanyaanSatuan["author"] }}</h5> --}}
            <p>{{ $pertanyaanSatuan->body }}</p>
        </article>
    @endforeach

@endsection