@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/verification.css') }}">
    @if (isset($errMessage))
        <p>
            {{ $errMessage }}
        </p>
    @else
        <form method="POST" action="{{ url('eliminar') }}">
            <p>Deportes que puedes eliminar de tu lista de visualizacion:<br />
                @csrf
                @foreach ($followedSports as $followedSport)
                    <input type="checkbox" name="{{ $followedSport->id }}">
                    {{ $followedSport->sport_name }}<br>
                @endforeach
                <input type="submit" value="Agregar">
            </p>
        </form>
    @endif
@endsection
