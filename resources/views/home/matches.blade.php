@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/browseNews.css') }}">
    <h1>Partidos</h1>
    <form method="POST" action="{{ url('ver-partido') }}">
        @csrf
        @foreach ($allMatches as $match)
            <p>{{ $match->sport_name }}</p>
            <button class="button" type="submit" name="match" value="{{ $match->id }}">EAFIT vs
                {{ $match->rival_university }}</button><br />
            <p>Fecha: {{ $match->match_date }}</p>
            @if (isset($match->result))
                <p>Resultado: {{ $match->result }}</p>
            @endif
            @if (isset($match->score))
                <p>Marcador: {{ $match->score }}</p>
            @endif
            <hr>
        @endforeach
    </form>
@endsection
