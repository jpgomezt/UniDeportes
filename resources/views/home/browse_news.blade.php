@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/browseNews.css') }}">
    <h1>Noticias</h1>
    <hr>
    <form style="margin-bottom: 250px" method="POST" action="{{ url('leer-noticia') }}">
        @csrf
        @foreach ($allNews as $news)
            <input class="href" type="submit" name="news" value="{{ $news->title }}"><br />
            <p>Escritor: {{ $news->writer }}</p>
            <p>Deporte: {{ $news->sport_name }}</p>
            <hr>
        @endforeach
    </form>
@endsection
