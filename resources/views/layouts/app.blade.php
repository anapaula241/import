<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=" {{mix ('css/style.css')}}">
</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>


{{-- <!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @csrf
    <meta name="description"
          content="Eleição de Diretores - UEMG 2021">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Eleição para Diretor(a) e Vice-Diretor(a) - UEMG 2021</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    @yield('style')
</head>
<body>
    <nav class="navbar navbar-dark" style="background-color: rgb(0,0,0,0.1);">
        <img src="/img/logouemg.png" class="float-left">
        <a href="{{route('logout')}}" class="btn btn-info float-right">Sair</a>
        <span class="" style="color: black;">{{$user->nome}} - {{$user->cpf}}</span>
    </nav>
    <div id="app" style="margin-top: 10px;">
        @yield('body')
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
        @yield('javascript')
</body>
</html> --}}
