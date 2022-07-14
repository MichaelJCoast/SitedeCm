@php
    Carbon\Carbon::setlocale(config('app.locale'));
@endphp

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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
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
            <div class="flex justify-center space-x-6 mb-2">
            </div>
                <div class="grid grid-rows-1">
                    <p class="mt-1 text-center text-xs text-white">Departamento de Tecnologia — 2022</p>
                </div>
            </div>
    </footer>

    <script src="{{asset('js/app.js')}}"></script> <!-- script para vue -->

</body>
</html>
