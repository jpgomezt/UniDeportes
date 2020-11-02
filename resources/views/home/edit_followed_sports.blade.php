@extends('layouts.app')
@section('content')
    <h2>Configuracion</h2>
    <p>Puede editar los deportes que tienes agregados a tu lista:<br /></p>
    <a href="agregar-deportes"> Agregar Deportes a tu Lista</a> <br/>
    <a href="eliminar-deportes"> Eliminar Deportes de tu Lista</a> 
    <hr>
    <h2>Deportes</h2>
    @foreach ($sports as $sport)
        <p> ·{{$sport->sport_name}}
    @endforeach
    <hr>
    <h2>Deportes Seguidos</h2>
    @foreach ($followedSports as $followedSport)
        <p> ·{{$followedSport->sport_name}}
    @endforeach
@endsection
