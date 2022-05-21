<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NECM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased bg-zinc-900 text-white">
        <nav class="border-b border-zinc-800">
            <div class="container mx-auto flex items-center justify-between px-4 py-6">
                <ul class="flex items-center">
                    <li>
                        <a href="#">
                            Logo
                        </a>
                    </li>
                    <li class="ml-16">
                        <a href="#" class="hover:text-red-300">Equipa</a>
                    </li>
                    <li class="ml-16">
                        <a href="#" class="hover:text-red-300">Merch</a>
                    </li>
                    <li class="ml-16">
                        <a href="#" class="hover:text-red-300">Links</a>
                    </li>
                </ul>
                <div class="flex items-center">
                    <div class="ml-4">
                    @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-200">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500">Register</a>
                        @endif
                    @endauth
            @endif
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </body>
    </html>