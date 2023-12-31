<nav x-data="{ open: false }" class="bg-slate-200 border-b border-gray-100 bg-opacity-70">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/home">
                        <img style="width:50px" alt="logo" src="{{ asset('assets/images/logo_no_context.png') }}" />
                    </a>
                </div>


                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex pt-3">
                    <x-nav-link class="bg-slate-300 hover:bg-orange-600 w-13 h-7 rounded-md mt-5  px-2"
                        :href="route('games')" :active="request()->routeIs('games')">
                        {{ __('Games') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex pt-3">
                    <x-nav-link class="bg-slate-300 hover:bg-orange-600 w-13 h-7 rounded-md mt-5  px-2"
                        :href="route('appointments.reserve')" :active="request()->routeIs('appointments.reserve')">
                        {{ __('Cafe') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex pt-3">
                    <x-nav-link class="bg-slate-300 hover:bg-orange-600 w-13 h-7 rounded-md mt-5  px-2"
                        :href="route('shop')" :active="request()->routeIs('shop')">
                        {{ __('Products') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex pl-96 pt-3">
                    <x-nav-link class="bg-slate-300 hover:bg-orange-600 w-13 h-7 rounded-md mt-5  px-2"
                        :href="route('about-us')" :active="request()->routeIs('about-us')">
                        {{ __('About Us') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex pt-3">
                    <x-nav-link class="bg-slate-300 hover:bg-orange-600 w-13 h-7 rounded-md mt-5  px-2"
                        :href="route('contact-us')" :active="request()->routeIs('contact-us')">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-bold rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
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
                        <x-dropdown-link class="nav_text" :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @if (Auth::user()->usertype == 'user')
                            <x-dropdown-link class="nav_text" :href="route('checkout.orders')">
                                {{ __('My Orders') }}
                            </x-dropdown-link>
                            <x-dropdown-link class="nav_text" :href="route('appointments.my-reservations')">
                                {{ __('My Reservations') }}
                            </x-dropdown-link>
                            <x-dropdown-link class="nav_text" :href="route('chat')">
                                {{ __('Customer Support') }}
                            </x-dropdown-link>
                        @endif

                        @auth
                            <x-dropdown-link class="nav_text" :href="route('home')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            <x-dropdown-link class="nav_text" :href="route('orders')">
                                {{ __('Orders') }}
                            </x-dropdown-link>

                            <x-dropdown-link class="nav_text" :href="route('users')">
                                {{ __('Users') }}
                            </x-dropdown-link>
                            <x-dropdown-link class="nav_text" :href="route('category')">
                                {{ __('Categories') }}
                            </x-dropdown-link>
                            <x-dropdown-link class="nav_text" :href="route('products')">
                                {{ __('Products') }}
                            </x-dropdown-link>
                            <x-dropdown-link class="nav_text" :href="route('admin.games')">
                                {{ __('Games') }}
                            </x-dropdown-link>
                            <x-dropdown-link class="nav_text" :href="route('appointments')">
                                {{ __('Business Hours') }}
                            </x-dropdown-link>
                            <x-dropdown-link class="nav_text" :href="route('reservations')">
                                {{ __('Reservations') }}
                            </x-dropdown-link>

                        @endauth


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link class="nav_text" :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
