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

<body class="antialiased bg-zinc-900 text-white">
    <nav x-data="{isOpen: false}" class="bg-black border-b border-zinc-700">
        <div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="relative flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/laravel" aria-label="Logo" title="Logo" class="mr-8">
                    <p>logo</p>
                    </a>
                    <ul class="hidden items-center space-x-8 lg:flex">
                        <li><a href="equipa" aria-label="A nossa equipa" title="A nossa equipa"
                                class="font-semibold transition ease-in-out hover:text-red-300">Equipa</a>
                        </li>
                        <li><a href="merch" aria-label="Merch" title="Merch"
                                class="font-semibold transition ease-in-out hover:text-red-300">Merch</a>
                        </li>
                        <li><a href="links" aria-label="Links" title="Links"
                                class="font-semibold transition ease-in-out hover:text-red-300">Links</a>
                        </li>
                    </ul>
                </div>
                <ul class="hidden items-center space-x-8 lg:flex">
                @if (Route::has('login'))
                    @auth
                    <li>
                        <a href="{{ url('/dashboard') }}" class="tracking-wide text-gray-200 hover:text-red-300">{{ Auth::user()->name }}</a>
                    </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="tracking-wide text-sm text-gray-500 hover:text-red-300">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500 hover:text-red-300">Register</a>
                        </li>
                        @endif
                    @endauth
            @endif
                </ul>
                <!-- Mobile menu -->
                <div class="lg:hidden">
                    <button type="submit" @click="isOpen = !isOpen" aria-label="Open Menu" title="Open Menu"
                        class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline">
                        <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
                            <path fill="currentColor"
                                d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
                            <path fill="currentColor"
                                d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
                        </svg>
                    </button>
        <div class="absolute top-0 left-0 w-full" x-show="isOpen" @click.away="isOpen = false">
          <div class="p-5 bg-zinc-900 border rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
              <div>
                <a href="/laravel" aria-label="NECM" title="NECM" class="inline-flex items-center">
                  <span class="text-xl font-bold tracking-wide uppercase">NECM</span>
                </a>
              </div>
              <div>
                <button type="submit" @click="isOpen = !isOpen" aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                  <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                    <path
                      fill="currentColor"
                      d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                    ></path>
                  </svg>
                </button>
              </div>
            </div>
            <nav>
              <ul class="space-y-4">
                <li><a href="equipa" class="font-medium tracking-wide transition-colors duration-200 hover:text-deep-purple-accent-400">Equipa</a></li>
                <li><a href="merch" class="font-medium tracking-wide transition-colors duration-200 hover:text-deep-purple-accent-400">Merch</a></li>
                <li><a href="links" class="font-medium tracking-wide transition-colors duration-200 hover:text-deep-purple-accent-400">Links</a></li>
                @if (Route::has('login'))
                    @auth
                    <li>
                        <a href="{{ url('/dashboard') }}" class="tracking-wide text-gray-200 hover:text-red-300">{{ Auth::user()->name }}</a>
                    </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-sm text-gray-500 hover:text-red-300">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-sm text-gray-500 hover:text-red-300">Register</a>
                        </li>
                        @endif
                    @endauth
            @endif
              </ul>
            </nav>
          </div>
        </div>
                </div>
            </div>
        </div>
</nav>
    @yield('content')
</body>

</html>