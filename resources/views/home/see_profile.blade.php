@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('style/seeUser.css') }}">
@section('content')
    <h1>
        {{ Auth::user()->name }}
    </h1>
    <img src="{{ Auth::user()->picture_url }}" class="profile-pic" style="justify-content: center; display: flex;">
    <p>
        Correo: {{ Auth::user()->email }}
    </p>
    <p>
        Predicciones: {{ $numberOfPredictions }}
    </p>
    <hr>
    <h2 style="font-size: 20px;">
        Cambiar foto de perfil
    </h2>
    <form method="POST" action="{{ url('check-upload') }}" enctype="multipart/form-data">
        @csrf
        <label for="image">Choose Image
            <input id="image" type="file" name="image">
        </label>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Upload">
    </form>
@endsection
