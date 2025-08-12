@if($header)
<header x-data="{ open: false, scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 8)" x-on:click.outside="open = false"
class="fixed top-0 left-0 right-0 z-50 bg-white w-full mx-auto text-sm not-has-[nav]:hidden border-b border-black/10 transition-shadow"
:class="{ 'shadow-md' : scrolled }">
        <!-- Top nav row -->
    <div class="w-full lg:border-b border-black/15">
        <nav class="max-w-[1440px] mx-auto relative flex items-center w-full gap-4 lg:gap-10 justify-between py-3 px-6">
            <!-- Mobile Burger Menu (Left) -->
            <div class="flex-shrink-0 lg:hidden w-[20%]">
                <button
                    x-on:click="open = !open"
                    class="lg:hidden inline-flex flex-col justify-center items-center
                    w-8 h-8 gap-[5px] focus:outline-none cursor-pointer">
                    <span
                    :class="{ 'rotate-45 translate-y-[7px]': open }"
                    class="block w-full h-[2px] bg-black transition-transform duration-300">
                    </span>
                    <span
                    :class="{ 'opacity-0': open }"
                    class="block w-full h-[2px] bg-black transition-opacity duration-300">
                    </span>
                    <span
                    :class="{ '-rotate-45 -translate-y-[7px]': open }"
                    class="block w-full h-[2px] bg-black transition-transform duration-300">
                    </span>
                </button>
            </div>

            <!-- Logo (Center on mobile, Left on desktop) -->
            <div class="lg:w-[22%] flex items-center justify-center lg:justify-start">
                <a href="{{ url('/') }}" class="w-auto">
                    <x-logo class="w-32 h-auto lg:w-60 lg:h-30 text-black" />
                </a>
            </div>

            <!-- Search (Center) -->
            <div class="hidden lg:flex flex-1 items-center justify-center">
                <form action="{{ route('home') }}" method="GET" class="w-full max-w-3xl">
                    <div class="group relative flex items-center w-full">
                        <input
                            type="text"
                            name="q"
                            placeholder="{{ __('What service are you looking for today?') }}"
                            class="w-full pl-6 pr-16 py-3 rounded-full border border-black/15 bg-white text-black placeholder-black/40 focus:outline-none focus:border-black focus:ring-1 focus:ring-black focus:ring-offset-0 shadow-inner shadow-black/5 transition"
                        >
                        <button type="submit"
                                class="absolute right-1 h-[42px] w-[42px] rounded-full bg-black text-white grid place-items-center hover:bg-gray-800 transition-colors">
                            @svg('heroicon-o-magnifying-glass', 'h-5 w-5')
                        </button>
                    </div>
                </form>
            </div>

            @auth
                <div class="lg:w-[22%] flex items-center justify-end gap-x-4">
                    <div class="flex items-center justify-center gap-x-4">
                        <div class="flex items-center justify-center relative" x-data="{ showTooltip: false }">
                            <a href="#"
                                aria-label="Notifications"
                                class="focus:outline-none"
                                @mouseenter="showTooltip = true"
                                @mouseleave="showTooltip = false">
                                @svg('heroicon-o-bell', 'w-6 h-6 text-black/70 cursor-pointer')
                            </a>

                            <div x-show="showTooltip"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 px-3 py-1 bg-gray-800 text-white text-sm rounded-lg whitespace-nowrap z-50">
                                {{ __('Notifications') }}
                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-b-4 border-transparent border-b-gray-800"></div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center relative" x-data="{ showTooltip: false }">
                            <a href="#"
                                aria-label="Messages"
                                class="focus:outline-none"
                                @mouseenter="showTooltip = true"
                                @mouseleave="showTooltip = false">
                                @svg('heroicon-o-envelope', 'w-6 h-6 text-black/70 cursor-pointer')
                            </a>

                            <!-- Tooltip -->
                            <div x-show="showTooltip"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 px-3 py-1 bg-gray-800 text-white text-sm rounded-lg whitespace-nowrap z-50">
                                {{ __('Messages') }}
                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-b-4 border-transparent border-b-gray-800"></div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center relative" x-data="{ showTooltip: false }">
                            <a href="#" aria-label="Favorites"
                                class="focus:outline-none"
                                @mouseenter="showTooltip = true"
                                @mouseleave="showTooltip = false">
                                @svg('heroicon-o-heart', 'w-6 h-6 text-black/70 cursor-pointer')
                            </a>

                            <div x-show="showTooltip"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 px-3 py-1 bg-gray-800 text-white text-sm rounded-lg whitespace-nowrap z-50">
                                {{ __('Favorites') }}
                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-b-4 border-transparent border-b-gray-800"></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative lg:w-[22%] flex items-center justify-end" x-data="{ open: false }">
                        <button x-on:click="open = !open" class="focus:outline-none">
                            @svg('heroicon-o-user-circle', 'w-9 h-9 text-black/70 cursor-pointer')
                        </button>
                        <div
                            x-cloak
                            x-show="open"
                            x-transition
                            x-on:click.outside="open = false"
                            class="absolute top-full right-0 mt-2 w-32 bg-white border border-black/10 rounded shadow-lg z-50">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-black/70 px-4 py-2 cursor-pointer">{{ __('Log Out') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="hidden lg:flex items-center justify-end lg:w-[22%] gap-6">
                    <a href="#" class="text-black hover:text-gray-800">{{ __('Become a Creator') }}</a>
                    <a href="{{ route('login') }}" class="text-black hover:text-gray-800">{{ __('Sign in') }}</a>
                    <a href="{{ route('register') }}" class="border border-black/20 px-5 py-2 rounded-lg hover:bg-black hover:text-white transition-colors font-medium">{{ __('Join') }}</a>
                </div>

                <div class="lg:hidden w-[20%] flex items-center justify-end">
                    <a href="#" class="w-full flex items-center justify-end text-base text-black/70 hover:text-black transition-colors font-medium">
                        {{ __('Join') }}
                    </a>
                </div>
            @endauth
        </nav>
    </div>

    <!-- Categories row -->
    <div class="hidden lg:block border-black/10 text-base">
        <div class="max-w-[1440px] mx-auto px-6 relative">
            <ul class="flex items-center justify-between gap-6 overflow-x-auto py-3 scrollbar-none">
                @forelse(collect($topLevelCategories ?? [])->take(12) as $cat)
                    <li class="shrink-0">
                        <a href="{{ url('/?category='.$cat->slug) }}"
                            class="text-black/70 hover:text-black whitespace-nowrap relative after:absolute after:-bottom-1 after:left-0 after:h-[2px] after:w-0 after:bg-black after:transition-all hover:after:w-full">
                            {{ $cat->name }}
                        </a>
                    </li>
                @empty
                    <li class="text-black/70">{{ __('No categories yet') }}</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="lg:hidden absolute top-full left-0 right-0 bg-white/95 backdrop-blur-sm shadow-lg z-40 border-t border-black/10">
        <div class="max-w-[1440px] mx-auto px-4 py-4 text-sm">
            <ul class="flex flex-col items-start gap-4">
                @forelse(collect($topLevelCategories ?? [])->take(12) as $cat)
                    <li class="shrink-0">
                        <a href="{{ url('/?category='.$cat->slug) }}" class="text-black/90 hover:text-black whitespace-nowrap relative after:absolute after:-bottom-1 after:left-0 after:h-[2px] after:w-0 after:bg-black after:transition-all hover:after:w-full">{{ $cat->name }}</a>
                    </li>
                @empty
                    <li class="text-black/50">{{ __('No categories yet') }}</li>
                @endforelse
            </ul>
        </div>
    </div>
</header>
@endif
