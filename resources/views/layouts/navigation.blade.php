
<nav x-data="{ open: false }" class="bg-black border-b border-zinc-700">
    <!-- Primary Navigation Menu -->
    <div class="container mx-auto px-8 md:px-14 py-2">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <x-application-logo />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                        <x-nav-link :href="route('equipa')" :active="request()->routeIs('equipa')">
                            {{ __('Equipa') }}
                        </x-nav-link>
                        <x-nav-link :href="route('merch')" :active="request()->routeIs('merch')">
                            {{ __('Merch') }}
                        </x-nav-link>
                        <x-nav-link :href="route('links')" :active="request()->routeIs('links')">
                            {{ __('Links') }}
                        </x-nav-link>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

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

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 space-y-1">
            <div class="flex flex-row items-center">
            <x-heroicon-o-users class="w-6 h-6 text-white"/>
            <x-responsive-nav-link :href="route('equipa')" :active="request()->routeIs('equipa')">
                {{ __('Equipa') }}
            </x-responsive-nav-link>
            </div>

            <div class="flex flex-row items-center">
            <x-heroicon-o-shopping-bag class="w-6 h-6 text-white"/>
            <x-responsive-nav-link :href="route('merch')" :active="request()->routeIs('merch')">
                {{ __('Merch') }}
            </x-responsive-nav-link>
            </div>

            <div class="flex flex-row items-center">
            <x-heroicon-o-link class="w-6 h-6 text-white"/>
            <x-responsive-nav-link :href="route('links')" :active="request()->routeIs('links')">
                {{ __('Links') }}
            </x-responsive-nav-link>
            </div>

        </div>
    </div>
</nav>
