@extends('layouts.app')
@section('content')
    <h1>{{ $sport->team_name }}</h1>
    <h2>Deporte: {{ $sport->sport_name }}</h2>
    <h2>Coach: {{ $sport->coach_name }}</h2>
    <img src="{{ $sport->sport_img }}" style="justify-content: center; display: flex;">
    @foreach ($players as $player)
        <p>{{ $player->name}}</p>
        <p>{{ $player->position}}</p>
        <p>{{ $player->team_number}}</p>
        <hr>
    @endforeach
@endsection
