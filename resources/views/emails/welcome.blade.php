@component('mail::message')
    <h1>
        Bienvenido {{ Auth::user()->name }} a UniDeportes
    </h1>
    <br>
    <p>
        En la platforma podras encontrar los distintos equipos de la universidad, y podras agregarlos a tu lista.
        Podras ver sus Nombre, entrenador y alineaciones, ademas de ver el calendario deportivo de los deportes que sigues
        y estar enterado de la actualidad y noticias que rodean a los diferentes equipos de la universidad.
    </p><br>
    Gracias,<br>
    {{ config('app.name') }}
@endcomponent
