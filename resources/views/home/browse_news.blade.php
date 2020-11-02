@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('style/browseNews.css') }}">
@section('content')
    <h1>Noticias</h1>
    <form method="POST" action="{{ url('leer-noticia') }}">
        @csrf
        @foreach ($allNews as $news)
            <input class="button" type="submit" name="news" value="{{ $news->title }}"><br />
            <p>Escritor: {{ $news->writer }}</p>
            <p>Deporte: {{ $news->sport_name }}</p>
            <hr>
        @endforeach
    </form>
@endsection
