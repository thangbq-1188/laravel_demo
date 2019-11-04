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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/posts') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.create') }}">{{ __('New Post') }}</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->full_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('posts.index', ['user_id' => auth()->user()->id]) }}">
                                        {{ __('My Post') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

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

                    <!-- Search Widget -->
                        <div class="card">
                          <h5 class="card-header">Search</h5>
                          <div class="card-body">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search for...">
                              <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Go!</button>
                              </span>
                            </div>
                          </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="card my-4">
                          <h5 class="card-header">Categories</h5>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                  <li>
                                    <a href="#">Web Design</a>
                                  </li>
                                  <li>
                                    <a href="#">HTML</a>
                                  </li>
                                  <li>
                                    <a href="#">Freebies</a>
                                  </li>
                                </ul>
                              </div>
                              <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                  <li>
                                    <a href="#">JavaScript</a>
                                  </li>
                                  <li>
                                    <a href="#">CSS</a>
                                  </li>
                                  <li>
                                    <a href="#">Tutorials</a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
