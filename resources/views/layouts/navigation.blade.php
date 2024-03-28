<nav x-data="{ open: false }" class=" text-white fixed  w-full">
    <!-- Primary Navigation Menu -->
    <div class="bg-slate-800 rounded-md max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 shadow-lg my-3">
        <div class="flex justify-between h-12">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center  w-[60px] h-12  justify-center" >
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center justify-center ">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Accueil') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center justify-center">
                    <x-nav-link :href="route('assurence')" :active="request()->routeIs('assurence')">
                        {{ __('Assurances') }}
                    </x-nav-link>
                </div>
                {{-- admin--}}
                @if (Auth::user()->statut==1)
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center justify-center">
                    <x-nav-link :href="route('gestion.agent')" :active="request()->routeIs('gestion.agent')">
                        {{ __('Gestion agent') }}
                    </x-nav-link>
                </div>
                @endif
                {{-- DGI --}}
                @if (Auth::user()->statut==2)
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center justify-center">
                    <x-nav-link :href="route('register.car')" :active="request()->routeIs('register.car')">
                        {{ __('Gestion vehicules') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center">
                    <x-nav-link :href="route('assurence.index')" :active="request()->routeIs('assurence.index')">
                        {{ __('Gestion assurances') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center justify-center">
                    <x-nav-link :href="route('payement.index')" :active="request()->routeIs('payement.index')">
                        {{ __('Payement') }}
                    </x-nav-link>
                </div>
                @endif

                {{-- PCR --}}
                @if (Auth::user()->statut==3)
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center justify-center">
                    <x-nav-link :href="route('contravention.index')" :active="request()->routeIs('contravention.index')">
                        {{ __('gestion faute') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center justify-center">
                    <x-nav-link :href="route('contravention.index')" :active="request()->routeIs('contravention.index')">
                        {{ __('contraventions') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center justify-center">
                    <x-nav-link :href="route('contravention.payement.index')" :active="request()->routeIs('contravention.payement.index')">
                        {{ __('payements') }}
                    </x-nav-link>
                </div>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.index')">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Se deconnecter') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('assurence')" :active="request()->routeIs('assurence')">
                {{ __('assurence') }}
            </x-responsive-nav-link>
            {{-- admin --}}
            @if (Auth::user()->statut==1)
            
                <x-responsive-nav-link :href="route('gestion.agent')" :active="request()->routeIs('gestion.agent')">
                    {{ __('gestion agent') }}
                </x-responsive-nav-link>
            
            @endif
            {{-- DGI --}}
            @if (Auth::user()->statut==2)
            <x-responsive-nav-link :href="route('register.car')" :active="request()->routeIs('register.car')">
                {{ __('gestion vehicule') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('assurence.index')" :active="request()->routeIs('assurence.index')">
                {{ __('gestion assurances') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('payement.index')" :active="request()->routeIs('payement.index')">
                {{ __('payements') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.index')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('se deconnecter') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

</nav>
<div class="h-[60px]"></div>