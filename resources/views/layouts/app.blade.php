<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('dist/app.css') }}" rel="stylesheet">
    <style>
        .expired {
            background: #f5c2c7;
        }

    </style>
</head>

<body>
    <div id="app">
        <header class="p-3 mb-3 border-bottom bg-light">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                      <li>
                        <a href="{{ route('task.index') }}"
                            class="nav-link px-2 link-secondary">{{ __('Tasks') }}</a>
                    </li>
                    </ul>

                    <div class="dropdown text-end">
                        @guest
                            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="nav-link px-2 link-secondary">{{ __('Sign in') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="nav-link px-2 link-dark">{{ __('Register') }}</a>
                                </li>
                            </ul>
                        @else
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                                <img src="https://picsum.photos/100/100" alt="profile" width="32" height="32"
                                    class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">

                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Sign out') }} </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </header>



        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('dist/app.js') }}" type="text/javascript"></script>

</html>
