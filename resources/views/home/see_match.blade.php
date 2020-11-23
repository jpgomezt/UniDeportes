@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('style/seeMatch.css') }}">
@section('content')
    <h1>{{ App\Sport::where('id', $match->sport_id)->first()->team_name }}</h1> 
    <h1> vs </h1> 
    <h1>{{ $match->rival_university }}</h1>
    <h2>Fecha: {{ $match->match_date }}</h2>
    <h3>Prediccion: </h3>
    @if (isset($prediction))
        <p>Las predicciones son:<br>
            Votos a favor de EAFIT: {{ $match->votes_in_favor }}<br>
            Votos en contra de EAFIT: {{ $match->votes_against }}
        </p>
    @else
        <form method="POST" action="{{ url('prediccion') }}">
            @csrf
            <p>Elige el resultado que crees que tendra el encuentro</p>
            <label class="radio-container">Gana EAFIT
                <input type="radio" checked="checked" name="prediction" value="win">
                <span class="checkmark"></span>
            </label>
            <label class="radio-container">Pierde EAFIT
                <input type="radio" name="prediction" value="lose">
                <span class="checkmark"></span>
            </label>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="dopost" value="Realizar Prediccion"><br>
            <input type="hidden" name="matchID" value={{ $match->id }}>
        </form>
    @endif
@endsection
