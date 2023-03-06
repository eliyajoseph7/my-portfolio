<nav x-data="{ open: false }" class="bg-white h-14 sha dow-sm mb-4 fixed top-0 left-0 right-0 z-30 w-screen border-b border-gray-100">
    <div class="container mx-auto grid grid-flow-col grid-cols-3 gap-4 h-full px-2">
        <div class="colspan-2 ">
            <a class="inline-flex items-center bg-blue-700 hover:bg-blue-800 text-white font-bold my-2 px-2 focus:ring-blue-700 cursor-pointer rounded-md text-4xl">
                iJn
            </a>
        </div>
        <div class="colspan-1 inline-flex  col-end-12 items-center">
            <a href="{{ $linkedin->link ?? '#' }}" class="inline-flex items-center px-1">
                <i class="fab fa-linkedin  text-blue-700 hover:text-blue-800 fa-xl"></i>
                <span class="hidden md:flex px-2 text-lg">Linkedin </span>
            </a>
            <a href="{{ $facebook->link ?? '#' }}" class="inline-flex items-center px-1">
                <i class="fab fa-facebook  text-blue-700 hover:text-blue-800 fa-xl "></i>
                <span class="hidden md:flex px-2 text-lg">Facebook</span>
            </a>
            <a href="{{ $instagram->link ?? '#' }}" class="inline-flex items-center px-1">
                <i class="fab fa-instagram  text-blue-700 hover:text-blue-800 fa-xl "></i>
                <span class="hidden md:flex px-2 text-lg">Instagram</span>
            </a>
            <a href="{{ $github->link ?? '#' }}" class="inline-flex items-center px-1">
                <i class="fab fa-github  text-blue-700 hover:text-blue-800 fa-xl "></i>
                <span class="hidden md:flex px-2 text-lg">GitHub</span>
            </a>
            <!-- Settings Dropdown -->
            @if (Auth::check())

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
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
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @else
                <a href="{{ route('login') }}">
                    <button class="bg-blue-700 text-white border px-3 py-1 rounded-md hover:bg-blue-800">Login</button>
                </a>
            @endif
        </div>
    </div>

    @if (Auth::check())
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
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
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>

    @endif
</nav>