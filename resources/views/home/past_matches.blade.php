@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/browseNews.css') }}">
    <h1>Partidos Pasados</h1>
    <hr>
    @foreach ($allMatches as $match)
        <p>{{ $match->sport_name }}</p>
        <p style="color: #069">EAFIT vs
            {{ $match->rival_university }}</p>
        <p>Fecha: {{ $match->match_date }}</p>
        @if (isset($match->result))
            <p>Resultado: {{ $match->result }}</p>
        @endif
        @if (isset($match->score))
            <p>Marcador: {{ $match->score }}</p>
        @endif
        <hr>
    @endforeach
    <p style="margin-bottom: 250px"></p>
@endsection
