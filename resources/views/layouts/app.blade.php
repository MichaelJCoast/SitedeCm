<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased flex-col flex">
    <div class="min-h-screen bg-neutral-900">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="lg:px-0">
            {{ $slot }}
        </main>
    </div>

    <footer class="bg-black">
        <div class="container px-8 md:px-14 mx-auto py-8">
            <div class="flex space-x-6 mb-2">
                <x-lineawesome-facebook class="w-8 h-8 text-white transition ease-in-out hover:text-red-600"></x-lineawesome-facebook>
                <x-lineawesome-instagram class="w-8 h-8 text-white transition ease-in-out hover:text-red-600"></x-lineawesome-instagram>
                <x-lineawesome-twitter class="w-8 h-8 text-white transition ease-in-out hover:text-red-600"></x-lineawesome-twitter>
                <x-lineawesome-youtube class="w-8 h-8 text-white transition ease-in-out hover:text-red-600"></x-lineawesome-youtube>
            </div>
                <div class="grid grid-cols-1">
                    <span class="flex space-x-1 mx-auto">
                        <x-lineawesome-laravel class="w-4 h-4 text-white hover:text-red-600" />
                        <p class="text-xs text-gray-500 font-semibold">
                            <a class="hover:text-red-600" href="https://github.com/peixotomdb">Luís Peixoto</a>, <a
                                class="hover:text-red-600" href="https://github.com/MMoreira01">Marco Moreira</a>, <a
                                class="hover:text-red-600" href="https://github.com/elcascavel">Simão Amaral</a>
                        </p>
                    </span>
                    <p class="mt-1 text-center text-xs text-white">Departamento de Tecnologia — 2022</p>
                </div>
            </div>
    </footer>
</body>
</html>
