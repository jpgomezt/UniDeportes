@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('style/verification.css') }}">
@section('content')
    @if (isset($errMessage))
        <p>
            {{ $errMessage }}
        </p>
    @else
        <form method="POST" action="{{ url('agregar') }}">
            <p>Deportes que puedes añadir a tu lista de visualizacion:<br />
                @csrf
                @foreach ($unfollowSports as $unfollowSport)
                    <input type="checkbox" name="{{ $unfollowSport->id }}">
                    {{ $unfollowSport->sport_name }}<br>
                @endforeach
                <input type="submit" value="Agregar">
            </p>
        </form>
    @endif
@endsection
