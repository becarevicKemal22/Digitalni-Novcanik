<nav x-data="{ open: false }"
     class="bg-siva w-min border-b-8 border-accent rounded-xl fixed top-full -translate-y-24 text-white left-1/2 -translate-x-1/2 ">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between gap-2">

            <!-- Navigation Links -->
            <div class="flex p-3 px-0 justify-between gap-6">
                <a href="{{route('dashboard')}}" class="flex flex-col items-center justify-center text-sm gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6 fill-white">
                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                    </svg>
                    <h3>Dashboard</h3>
                </a>
                <a href="{{route('transactions')}}" class="flex flex-col items-center justify-center text-sm gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6 fill-white">
                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/>
                    </svg>
                    <h3>Transakcije</h3>
                </a>
                <a href="{{route('transaction.create')}}"
                   class="flex flex-col items-center justify-center text-sm gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 fill-accent">
                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                    </svg>
                    <h3 class="text-accent">Dodaj</h3>
                </a>
                <a href="{{route('conversions')}}" class="flex flex-col items-center justify-center text-sm gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-6 fill-white">
                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z"/>
                    </svg>
                    <h3>Konverzije</h3>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button href="{{route('logout')}}" onclick="event.preventDefault();
                                                                        this.closest('form').submit();"
                            class="flex flex-col items-center justify-center text-sm gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 fill-white">
                            <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                        </svg>
                        <h3>Odjava</h3>
                    </button>
                </form>
                {{--                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">--}}
                {{--                        {{ __('Dashboard') }}--}}
                {{--                    </x-nav-link>--}}
                {{--                    <x-nav-link :href="route('transactions')" :active="request()->routeIs('transactions')">--}}
                {{--                        {{ __('Pregled transakcija') }}--}}
                {{--                    </x-nav-link>--}}
                {{--                    <x-nav-link :href="route('cyclicalTransactions')" :active="request()->routeIs('cyclicalTransactions')">--}}
                {{--                        {{ __('Pregled cikličnih transakcija') }}--}}
                {{--                    </x-nav-link>--}}
                {{--                    <x-nav-link :href="route('transaction.create')" :active="request()->routeIs('transaction.create')">--}}
                {{--                        {{ __('Dodaj Transakciju') }}--}}
                {{--                    </x-nav-link>--}}
                {{--                    <x-nav-link :href="route('conversions')" :active="request()->routeIs('conversions')">--}}
                {{--                        {{ __('Konverzije valuta') }}--}}
                {{--                    </x-nav-link>--}}
            </div>

            <!-- Settings Dropdown -->
            {{--            <div class="hidden sm:flex sm:items-center sm:ms-6">--}}
            {{--                <x-dropdown align="right" width="48">--}}
            {{--                    <x-slot name="trigger">--}}
            {{--                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">--}}
            {{--                            <div>{{ Auth::user()->name }}</div>--}}

            {{--                            <div class="ms-1">--}}
            {{--                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
            {{--                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
            {{--                                </svg>--}}
            {{--                            </div>--}}
            {{--                        </button>--}}
            {{--                    </x-slot>--}}

            {{--                    <x-slot name="content">--}}
            {{--                        <x-dropdown-link :href="route('profile.edit')">--}}
            {{--                            {{ __('Profile') }}--}}
            {{--                        </x-dropdown-link>--}}

            {{--                        <!-- Authentication -->--}}
            {{--                        <form method="POST" action="{{ route('logout') }}">--}}
            {{--                            @csrf--}}

            {{--                            <x-dropdown-link :href="route('logout')"--}}
            {{--                                    onclick="event.preventDefault();--}}
            {{--                                                this.closest('form').submit();">--}}
            {{--                                {{ __('Log Out') }}--}}
            {{--                            </x-dropdown-link>--}}
            {{--                        </form>--}}
            {{--                    </x-slot>--}}
            {{--                </x-dropdown>--}}
            {{--            </div>--}}

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
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
