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

<body class="font-sans antialiased flex-col flex" x-data="{ darkMode: false }" x-init="
    if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      localStorage.setItem('darkMode', JSON.stringify(true));
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>
    <div x-bind:class="{'dark': darkMode == true}">
    <div class="min-h-screen bg-gray-200 dark:bg-neutral-900">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="lg:px-0">
            {{ $slot }}
        </main>
    </div>
    </div>
    @include('layouts.footer')
</body>
</html>
