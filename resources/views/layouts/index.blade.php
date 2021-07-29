<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PerdigaSon') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href={{ asset('css/style.css') }} rel="stylesheet">

    <!--Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-green-500 py-6 text-white">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    @guest
                        <a href="{{ url('/') }}"
                            class="font-light tracking-wider text-2xl sm:mb-8 sm:text-4xl no-underline">
                            {{ config('app.name', 'PerdigaSon') }}
                        </a>
                    @else
                        <a href="{{ url('/home') }}"
                            class="font-light tracking-wider text-2xl sm:mb-8 sm:text-4xl no-underline">
                            {{ config('app.name', 'PerdigaSon') }}
                        </a>
                    @endguest
                </div>
                <nav class="space-x-4 text-sm sm:text-base flex flex-row items-center">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <div>
                            <ul class="menu px-5 text-center">
                                <li class="relative px-5"><a href="{{ route('home') }}">{{ Auth::user()->name }}</a>
                                </li>
                            </ul>
                        </div>

                        <a href="{{ route('logout') }}" class="no-underline hover:underline" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')

        <footer class="bg-green-500 py-4 text-white mt-5">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <p class="font-light tracking-wider text-xl sm:text-2xl">{{ config('app.name', 'PerdigaSon') }}</p>
                </div>
                <nav class="space-x-4 text-sm sm:text-base flex flex-row items-center">
                    <div class="flex flex-col flex-wrap md:flex-row gap-x-1 items-center justify-center">
                        <p class="font-light tracking-wider">Desenvolvido por:</p>
                        <p class="font-light tracking-wider">Mariana Gruszkowska</p>
                        <p class="font-light tracking-wider">de Lacerda Soares</p>
                    </div>
                    <a class="no-underline hover:underline" target="_blank" href="https://github.com/gruszkowska"><i class="fab fa-github"></i></a>
                </nav>
            </div>
        </footer>
    </div>
</body>

</html>
