<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="favicons/favicon.ico" rel="icon">


    <link href="css/reloj.css" rel="stylesheet">

</head>

<body>

    <div id="clock" class="light">
        <div class="display">
            <div class="weekdays"></div>
            <div class="ampm"></div>
            <div class="alarm"></div>
            <div class="digits"></div>
        </div>
    </div>

    <div class="button-holder">
        @if (Route::has('login'))
            @auth
                <a href="{{ route('dashboard') }}" class="button">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="button">Iniciar Sesión</a>
            @endauth
        @endif
    </div>
    <footer>
        <div style=" color: white; text-align: center">
            &copy; Copyright <a style="color:darkorange"
               href="https://riacad.com/"><strong>RiaCAD Systems</strong></a>. Todos los Derechos
            Reservados
        </div>

    </footer><!-- End Footer -->

    <!-- JavaScript Includes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>


    <!-- Template Main JS File -->
    <script src="js/reloj.js"></script>

</body>

</html>
