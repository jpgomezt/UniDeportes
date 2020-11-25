@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/browseNews.css') }}">
    <h1>Proximos Partidos</h1>
    <br>
    <a class="href" style="font-size: 20px" href="{{ url('partidos-pasados') }}">
        Ver partidos pasados
    </a>
    <hr>
    <form style="margin-bottom: 190px" method="POST" action="{{ url('ver-partido') }}">
        @csrf
        @foreach ($allMatches as $match)
            <p>{{ $match->sport_name }}</p>
            <button class="href" type="submit" name="match" value="{{ $match->id }}">EAFIT vs
                {{ $match->rival_university }}</button><br />
            <p>Fecha: {{ $match->match_date }}</p>
            <hr>
        @endforeach
    </form>
@endsection
