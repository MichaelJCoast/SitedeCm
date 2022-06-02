<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <link rel="icon" href="{{ url('css/cm-icon.svg') }}">

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>
</head>

<body class="antialiased bg-neutral-900 text-white flex-col flex min-h-screen">
    @include('layouts.navigation')
<main class="flex-1">
    {{ $slot }}
</main>
    <footer class="bg-black">
      <div class="max-w-screen px-4 mx-auto py-8 sm:px-6 lg:px-8">
        <p class="mt-2 text-xs sm:text-base text-white font-semibold">
          &copy; <?php echo date("Y"); ?> NECM
        </p>
    </div>
    </footer>
</body>
</html>