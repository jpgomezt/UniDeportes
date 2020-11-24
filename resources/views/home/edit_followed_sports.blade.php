@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/editSports.css') }}">
    <h2>Configuracion</h2>
    <p>Puede editar los deportes que tienes agregados a tu lista:<br /></p>
    <a href="agregar-deportes"> Agregar Deportes a tu Lista</a> <br />
    <a href="eliminar-deportes"> Eliminar Deportes de tu Lista</a>
    <hr>
    <h2>Deportes</h2>

    <form method="POST" action="{{ url('deporte') }}">
        @csrf
        @foreach ($sports as $sport)
            <button class="sport" type="submit" name="sport" value="{{ $sport->id }}">
                {{ $sport->sport_name }}
            </button><br />
        @endforeach
    </form>
    <hr>
    <h2>Deportes Seguidos</h2>
    @foreach ($followedSports as $followedSport)
        <p>{{ $followedSport->sport_name }}</p>
    @endforeach
@endsection
