<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/e3cefcbc8d.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('style/app.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    @stack('styles')
</head>

<body>
    <div class="topnav" id="myTopnav">
        <a href="{{ url('/') }}"><i class="fas fa-home"></i>
            {{ config('app.name', 'Laravel') }}
        </a>
        @guest
            <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i>
                {{ __(' Register') }}
            </a>
            <a href="{{ route('login') }}"><i class="fas fa-user"></i>
                {{ __(' Login') }}
            </a>
        @else
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();                                                                                                                                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>{{ __(' Logout') }}
                </a>
            </form>
            <a href="{{ route('elegir-noticias') }}"><i class="far fa-newspaper"></i>
                {{ __(' Noticias') }}
            </a>
            <a href="{{ route('ver-calendario') }}"><i class="far fa-calendar-alt"></i>
                {{ __(' Calendario') }}
            </a>
            <a href="{{ route('ver-deportes') }}"><i class="fas fa-futbol"></i>
                {{ __(' Deportes') }}
            </a>
        @endguest
    </div>
    <div class="container" style="padding: 32px 23em;">
        @yield('content')
    </div>
    <div class="footer">
        <div class="inner_footer">
            <div class="logo_container">
                <a href="#"><img
                        src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fminas.medellin.unal.edu.co%2Feventos%2Flatwaves2018%2Fimages%2Fimagenes%2FEAFIT_logo.png&f=1&nofb=1"
                        style="background: white;"></a>
            </div>

            <div class="footer_third">
                <h1>Legal</h1>
                <a href="#">Politicas de privacidad</a>
                <a href="#">Tratamiento de datos</a>
            </div>

            <div class="footer_third">
                <h1>Productos</h1>
                <a href="#">Ropa Hombres</a>
                <a href="#">Ropa Mujeres</a>
                <a href="#">Descuentos</a>
            </div>

            <div class="footer_third">
                <h1>Contáctenos</h1>

                <a href="#">Estamos ubicados en <br> algun punto de Colombia</a>
                <a href="#">Carrera algo # algo dir algo</a>
                <a style="margin-bottom:-15px;" href="#">El telefono es: +57 123 4567</a><br>
                <li style="display: inline-block;"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                <li style="display: inline-block;"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li style="display: inline-block;"><a href="#"><i class="fab fa-instagram"></i></a></li>
            </div>
        </div>
    </div>
    <footer>
        UniDeportes | Universidad EAFIT
    </footer>

</body>

</html>
