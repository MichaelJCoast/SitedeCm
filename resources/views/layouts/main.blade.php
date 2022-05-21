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
                        <a href="#">
                        <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </body>
    </html>