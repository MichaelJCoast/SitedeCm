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

<body class="antialiased bg-neutral-900 text-white">
    <nav x-data="{isOpen: false}" class="bg-black border-b border-neutral-800">
        <div class="py-5 container mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl xl:max-w-full px-6">
            <div class="relative flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/laravel" aria-label="Logo" title="Logo" class="mr-8">
                    <x-application-logo class="block h-10 sm:h-10 w-auto fill-current" />
                    </a>
                    <ul class="hidden items-center space-x-8 lg:flex">
                        <li>
                            <x-nav-link href="equipa">Equipa</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="merch">Merch</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="links">Links</x-nav-link>
                        </li>
                    </ul>
                </div>
                <ul class="hidden items-center space-x-8 lg:flex">
                @if (Route::has('login'))
                    @auth
                    <li>
                    
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-white hover:text-red-300 hover:border-gray-300 focus:outline-none focus:text-red-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                     @if(Auth::user()->hasRole('admin'))
                        <!-- Authentication --> <form method="GET" action="{{ backpack_url() }}">
                            @csrf

                            <x-dropdown-link :href="backpack_url()"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Backoffice') }}
                            </x-dropdown-link>
                            
                        </form>
                     @endif
                        <form method="GET" action="{{ route('dashboard') }}">
                            @csrf

                            <x-dropdown-link :href="route('dashboard')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                            
                        </form>
                       
                    </x-slot>
                </x-dropdown>
            </div>
                    </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="tracking-wide text-sm text-gray-500">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500">Register</a>
                        </li>
                        @endif
                    @endauth
            @endif
                </ul>
                <!-- Mobile menu -->
                <div class="lg:hidden z-10">
                    <button type="submit" @click="isOpen = !isOpen" aria-label="Open Menu" title="Open Menu"
                        class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline">
                        <svg class="w-6 text-white" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
                            <path fill="currentColor"
                                d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
                            <path fill="currentColor"
                                d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
                        </svg>
                    </button>
        <div class="absolute left-0 right-0 top-0" x-show="isOpen" @click.away="isOpen = false">
          <div class="p-5 bg-black/90 rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <button type="submit" @click="isOpen = !isOpen" aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 transition duration-200 rounded focus:outline-none focus:shadow-outline">
                  <svg class="w-5 text-white" viewBox="0 0 24 24">
                    <path
                      fill="currentColor"
                      d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                    ></path>
                  </svg>
                </button>
            </div>
            <nav>
              <ul class="space-y-6">
                <li><a href="equipa" class="font-bold text-xl tracking-wide">Equipa</a></li>
                <li><a href="merch" class="font-bold text-xl tracking-wide">Merch</a></li>
                <li><a href="links" class="font-bold text-xl tracking-wide">Links</a></li>
                @if (Route::has('login'))
                    @auth
                    <div class="flex items-center justify-center">
                    <li>
                        <a href="{{ url('/dashboard') }}" class="tracking-wide text-white">Bem-vindo, <span class="font-semibold">{{ Auth::user()->name }}</span></a>
                    </li>
                    </div>
                    @else
                        <div class="flex items-center justify-center">
                        <li>
                            <a href="{{ route('login') }}" class="px-6 font-medium tracking-wide text-sm">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="px-6 font-medium tracking-wide text-sm">Register</a>
                        </li>
                        @endif
                        </div>
                        
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

  {{ $slot }}

    <footer class="bg-black fixed inset-x-0 bottom-0">
      <div class="max-w-screen px-4 mx-auto py-8 sm:px-6 lg:px-8">
    
        <p class="mt-2 text-xs sm:text-base text-white font-semibold">
          &copy; <?php echo date("Y"); ?> NECM
        </p>
    </div>
    </footer>
</body>

</html>