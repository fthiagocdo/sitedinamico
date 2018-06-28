<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="loading"></div>
    <header>
        @include('layouts._admin._nav')
    </header>
    <main>
        <input type="hidden" class="msg-text" value="{{ Session::get('mensagem') }}">
        <input type="hidden" class="msg-class" value="{{ Session::get('classe') }}">
        @yield('content')
    </main>
    @include('layouts._admin._footer')
    <!-- Scripts -->
    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
    <script src="{{asset('js/jquery.blockUI.js')}}"></script>
</body>
</html>
