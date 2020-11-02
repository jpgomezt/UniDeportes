@extends('layouts.app')
@section('content')
    <h1>{{ $news->title }}</h1>
    <h2>Por: {{ $news->writer }}</h2>
    <h2>Deporte: {{App\Sport::where('id', $news->sport_id_tag)->first()->sport_name}}</h2>
    <p>
        {{$news->content}}
    </p>
@endsection
