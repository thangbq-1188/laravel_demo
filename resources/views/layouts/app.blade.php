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
</head>
<body>
    <div id="app">
        @include('layouts._nav')

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(session()->has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">
                                    {{  session()->get('alert-' . $msg) }}
                                </p>
                            @endif
                        @endforeach
                    </div>

                    <div class="col-md-8">
                        @yield('content')
                    </div>
                          <!-- Sidebar Widgets Column -->
                    <div class="col-md-4">
                        @include('layouts._sidebar')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
