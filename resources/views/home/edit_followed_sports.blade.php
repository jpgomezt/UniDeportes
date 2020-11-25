@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/editSports.css') }}">
    <h2 style="font-size: xx-large">Configuracion</h2>
    <p>Puede editar los deportes que tienes agregados a tu lista:<br /></p>
    <a class="sport" href="agregar-deportes"> Agregar Deportes a tu Lista</a> <br />
    <a class="sport" href="eliminar-deportes"> Eliminar Deportes de tu Lista</a>
    <hr>
    <form method="POST" action="{{ url('deporte') }}">
        @csrf
        <h2 style="font-size: xx-large">Deportes Disponibles</h2>
        <p>Estos son los deportes disponibles en la plataforma:<br /></p>
        @foreach ($sports as $sport)
            <button class="sport" type="submit" name="sport" value="{{ $sport->id }}">
                {{ $sport->sport_name }}
            </button><br />
        @endforeach
        <hr>
        <h2 style="font-size: xx-large">Deportes Seguidos</h2>
        <p>Estos son los deportes que actualmente estan en tu lista:<br /></p>
        @foreach ($followedSports as $followedSport)
            <button class="sport" type="submit" name="sport" value="{{ $followedSport->id }}">
                {{ $followedSport->sport_name }}
            </button><br />
        @endforeach
    </form>
@endsection
