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

</head>

<body class="bg-neutral-900 dark:bg-neutral-200">
    <div id="app">
        <router-view></router-view>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
<script>
    if(localStorage.theme==='dark'){
        document.documentElement.classList.add('dark')
    }
    else if(localStorage.theme==='light'){
    }
</script>
</html>
