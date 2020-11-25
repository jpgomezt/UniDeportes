@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/seeSport.css') }}">
    <h1 class="h1"><strong>{{ $sport->team_name }}</strong></h1>
    <h2 class="h2">{{ $sport->sport_name }}</h2>
    <img class="img" src="{{ $sport->sport_img }}">
    <h2 style="text-align: center; font-size:50px">Alineacion</h2>
    <h2>Coach: {{ $sport->coach_name }}</h2>
    <hr>
    @foreach ($players as $player)
        <p style="font-size: 20px">{{ $player->name }} | <i class="fas fa-tshirt"></i> {{ $player->team_number }}
        <p style="font-size: 15px">{{ $player->position }}</p>
        <hr>
    @endforeach
@endsection
