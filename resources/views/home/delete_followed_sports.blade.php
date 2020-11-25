@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/verification.css') }}">
    @if (isset($errMessage))
        <h1 style="text-align:center; margin-top: 129px; margin-bottom: 150px">
            {{ $errMessage }}
        </h1>
    @else
        <h1>
            Deportes que puedes eliminar de tu lista de visualizacion:
        </h1>
        <br>
        <form style="margin-bottom: 145px" method="POST" action="{{ url('eliminar') }}">
            @csrf
            @foreach ($followedSports as $followedSport)
                <label class="checkbox-container">{{ $followedSport->sport_name }}
                    <input type="checkbox" name="{{ $followedSport->id }}">
                    <span class="checkmark"></span>
                </label>
            @endforeach
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Eliminar">
        </form>
    @endif
@endsection
