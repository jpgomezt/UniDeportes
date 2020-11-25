@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('style/browseNews.css') }}">
    <h1>Selecciona el tipo de noticia:<br /></h1>
    <a class="href" href="mis-noticias"> Ver Noticias de Deportes que Sigo</a> <br />
    <a class="href" href="todas-las-noticias"> Ver Todas Las Noticias</a>
    <p style="margin-bottom: 210px"></p>
@endsection
