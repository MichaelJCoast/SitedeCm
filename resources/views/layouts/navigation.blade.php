
<nav x-data="{ open: false }" class="bg-black border-b border-zinc-700">
    <!-- Primary Navigation Menu -->
    <div class="container mx-auto px-8 md:px-14">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/laravel">
                        <x-application-logo class="block h-10 w-auto fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                @php
                    $profileViews = Route::current()->getName() == 'dashboard' || Route::current()->getName() == 'orders'
                @endphp
                
                @if($profileViews)
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Perfil') }}
                        </x-nav-link>
                        <x-nav-link :href="route('orders')" :active="request()->routeIs('orders')">
                            {{ __('Pedidos') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('equipa')" :active="request()->routeIs('equipa')">
                            {{ __('Equipa') }}
                        </x-nav-link>
                        <x-nav-link :href="route('merch')" :active="request()->routeIs('merch')">
                            {{ __('Merch') }}
                        </x-nav-link>
                        <x-nav-link :href="route('links')" :active="request()->routeIs('links')">
                            {{ __('Links') }}
                        </x-nav-link>
                        @endif

                </div>
            </div>
           
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
            @if (Route::has('login'))
                    @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-white text-lg font-semibold hover:text-red-600 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <form method="GET" action="{{ route('dashboard') }}">
                            @csrf
                            <x-dropdown-link :href="route('dashboard')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                        </form>
                        @if(Auth::user()->hasRole('admin'))
                            <!-- Authentication -->
                            <form method="GET" action="{{ backpack_url() }}">
                                @csrf

                                <x-dropdown-link :href="backpack_url()" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Backoffice') }}
                                </x-dropdown-link>

                            </form>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>

                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
           
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden text-white">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Perfil') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('equipa')" :active="request()->routeIs('equipa')">
                {{ __('Equipa') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('merch')" :active="request()->routeIs('merch')">
                {{ __('Merch') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('links')" :active="request()->routeIs('links')">
                {{ __('Links') }}
            </x-responsive-nav-link>
        </div>


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-zinc-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="space-y-1">
                <!-- Authentication -->
                @if(Auth::user()->hasRole('admin'))
                            <!-- Authentication -->
                            <form method="GET" action="{{ backpack_url() }}">
                                @csrf
                        <x-responsive-nav-link :href="backpack_url()" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Backoffice') }}
                    </x-responsive-nav-link>

                            </form>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                
            </div>
            @else
            <form method="GET" action="{{ route('login') }}">
                @csrf
                <x-responsive-nav-link :href="route('login')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                </form>
                 @if (Route::has('register'))
                 <form method="GET" action="{{ route('register') }}">
                    @csrf
                 <x-responsive-nav-link :href="route('register')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Register') }}
                    </x-responsive-nav-link> 
                </form>
                 @endif
             @endauth
         @endif
        </div>
    </div>
</nav>
