@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/verification.css') }}">
    @if (isset($errMessage))
        <p>
            {{ $errMessage }}
        </p>
    @else
        <form method="POST" action="{{ url('agregar') }}">
            @csrf
            <p>Deportes que puedes añadir a tu lista de visualizacion:<br />
                @foreach ($unfollowedSports as $unfollowedSport)
                    <input type="checkbox" name="{{ $unfollowedSport->id }}">
                    {{ $unfollowedSport->sport_name }}<br>
                @endforeach
                <input type="submit" value="Agregar">
            </p>
        </form>
    @endif
@endsection
