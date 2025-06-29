<header
    class="flex z-50 sticky top-0 flex-wrap md:justify-start md:flex-nowrap w-full bg-white text-sm py-3 md:py-0 shadow-md">
    <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8" aria-label="Global">
        <div class="relative md:flex md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <!-- Logo and Brand -->
                <div class="flex items-center gap-2">
                    <img src="{{ asset('img/logo4.svg') }}" alt="logo4">
                    <a class="flex-none text-xl font-semibold" href="{{ route('home') }}" aria-label="Brand">SEA
                        Catering</a>
                </div>

                <!-- Mobile hamburger button -->
                <div x-data="{ open: false }" class="md:hidden relative">
                    <!-- Button Hamburger -->
                    <!-- Tombol Hamburger -->
                    <button @click="open = !open"
                        class="ml-auto mt-3 mr-4 flex justify-center items-center w-10 h-10 rounded bg-primary text-white z-50">
                        <!-- Icon buka -->
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon tutup -->
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Menu Dropdown -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-3"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 -translate-y-3" @click.away="open = false"
                        class="absolute right-4 top-14 w-72 bg-white shadow-lg rounded-lg p-5 z-40 space-y-4">

                        <!-- Isi dropdown -->
                        <a href="{{ route('home') }}"
                            class="block font-medium text-gray-700 hover:text-primary">Home</a>
                        <a href="{{ route('menu') }}" class="block font-medium text-gray-700 hover:text-primary">Menu
                            Plans</a>
                        <a href="{{ route('subscription') }}"
                            class="block font-medium text-gray-700 hover:text-primary">Subscription</a>
                        <a href="{{ route('contact') }}"
                            class="block font-medium text-gray-700 hover:text-primary">Contact Us</a>

                        @guest
                            <a href="{{ route('login') }}"
                                class="block text-center bg-primary text-white font-semibold py-2 px-4 rounded hover:bg-primary-dark">
                                Log in
                            </a>
                        @endguest

                        @auth
                            <a href="{{ route('subscription-management') }}"
                                class="block text-gray-800 font-medium hover:text-primary">User Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left text-red-600 hover:text-red-800 font-medium">Log out</button>
                            </form>
                        @endauth
                    </div>
                </div>


            </div>

            <!-- Navigation Menu - This should be outside the flex container above -->
            <div id="navbar-collapse-with-animation"
                class="hs-collapse hidden transition-all duration-300 basis-full grow md:block">
                <div
                    class="max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                    <div
                        class="flex flex-col gap-x-0 mt-5 divide-y divide-dashed divide-gray-200 md:flex-row md:items-center md:justify-end md:gap-x-7 md:mt-0 md:ps-7 md:divide-y-0 md:divide-solid dark:divide-gray-700">

                        <a class="font-medium text-gray-500 hover:text-primary py-3 md:py-6 dark:hover:text-primary transition-colors duration-300"
                            href="{{ route('home') }}" aria-current="page">Home</a>

                        <a class="font-medium text-gray-500 hover:text-primary py-3 md:py-6 dark:hover:text-primary transition-colors duration-300"
                            href="{{ route('menu') }}">Menu Plans</a>

                        <a class="font-medium text-gray-500 hover:text-primary py-3 md:py-6 dark:hover:text-primary transition-colors duration-300"
                            href="{{ route('subscription') }}">Subscription</a>

                        <a class="font-medium text-gray-500 hover:text-primary py-3 md:py-6 dark:hover:text-primary transition-colors duration-300"
                            href="{{ route('contact') }}">Contact Us</a>

                        <!-- Login Button - Appears when NOT LOGGED IN -->
                        @guest
                            <div class="pt-3 md:pt-0">
                                <a class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary text-white hover:bg-primary-dark disabled:opacity-50 disabled:pointer-events-none"
                                    href="{{ route('login') }}">
                                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Log in
                                </a>
                            </div>
                        @endguest

                        <!-- User Dropdown - Appears when LOGGED IN-->
                        @auth
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open"
                                    class="flex items-center gap-2 text-sm text-gray-500 hover:text-primary font-medium py-3 md:py-6 transition-colors duration-300">
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg>
                                </button>

                                <!-- Fixed dropdown positioning -->
                                <div x-show="open" @click.away="open = false"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="absolute right-0 top-full mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-[100]"
                                    style="display: none;">
                                    <div class="py-1">
                                        <a href="{{ route('subscription-management') }}"
                                            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            </svg>
                                            User Dashboard
                                        </a>
                                        <hr class="my-1 border-gray-200">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    viewBox="0 0 24 24">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16,17 21,12 16,7"></polyline>
                                                    <line x1="21" y1="12" x2="9" y2="12">
                                                    </line>
                                                </svg>
                                                Log out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
