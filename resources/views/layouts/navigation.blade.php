<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    <x-nav-link :href="route('players.index')" :active="request()->routeIs('players.index')">
                        {{ __('Jogadores') }}
                    </x-nav-link>
                    <x-nav-link :href="route('teams.index')" :active="request()->routeIs('teams.index')">
                        {{ __('Times') }}
                    </x-nav-link>
                    <x-nav-link :href="route('championships.index')" :active="request()->routeIs('championships.index')">
                        {{ __('Campeonatos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('rankings.index')" :active="request()->routeIs('rankings.index')">
                        {{ __('Rankings') }}
                    </x-nav-link>
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('players.index')" :active="request()->routeIs('players.index')">
                {{ __('Players') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('teams.index')" :active="request()->routeIs('teams.index')">
                {{ __('Times') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('championships.index')" :active="request()->routeIs('championships.index')">
                {{ __('Campeonatos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('rankings.index')" :active="request()->routeIs('rankings.index')">
                {{ __('Rankings') }}
            </x-responsive-nav-link>
        </div>

    </div>
</nav>
