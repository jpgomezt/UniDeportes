@extends('layouts.app')
@section('content')
    <h1>{{ App\Sport::where('id', $match->sport_id)->first()->team_name }} vs {{ $match->rival_university }}</h1>
    <h2>Fecha: {{ $match->match_date }}</h2>
    <h3>Prediccion: </h3>
    @if (isset($prediction))
        <p>Las predicciones son:<br>
            Votos a favor de EAFIT: {{ $match->votes_in_favor }}<br>
            Votos en contra de EAFIT: {{ $match->votes_against }}
        </p>
    @else
        <form form method="POST" action="{{ url('prediccion') }}">
            @csrf
            <p>Elige el resultado que crees que tendra el encuentro</p>
            <input type="radio" name="prediction" value="win">Gana EAFIT<br>
            <input type="radio" name="prediction" value="lose">Pierde EAFIT<br>
            <input type="submit" name="dopost" value="Realizar Prediccion"><br>
            <input type="hidden" name="matchID" value={{ $match->id }}>
        </form>
    @endif
@endsection
