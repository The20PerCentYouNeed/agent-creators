<header>
    <nav class="fixed top-0 w-full bg-gray-950/80 backdrop-blur-lg z-50 border-b border-gray-800"
    x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-0 relative">
            <!-- Desktop Navigation -->
            <div class="hidden md:flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg flex items-center justify-center">
                        <x-heroicon-o-bolt class="w-5 h-5 text-white" />
                    </div>
                    <a href="{{ localized_route('home') }}" class="text-xl font-bold text-white">
                        {{ __('AI Agents') }}
                    </a>
                </div>

                <!-- Centered Navigation -->
                <div class="absolute left-1/2 -translate-x-1/2 flex items-center space-x-8">
                    <a href="{{ localized_route('home') . '#services' }}" class="text-gray-300 hover:text-blue-400 transition-colors cursor-pointer">
                        {{ __('Services') }}
                    </a>
                    <a href="{{ localized_route('home') . '#solutions' }}" class="text-gray-300 hover:text-blue-400 transition-colors cursor-pointer">
                        {{ __('Solutions') }}
                    </a>
                    <a href="{{ localized_route('home') . '#dashboard-demo' }}" class="text-gray-300 hover:text-blue-400 transition-colors cursor-pointer">
                        {{ __('Dashboard') }}
                    </a>
                    <a href="{{ localized_route('home') . '#how-we-work' }}" class="text-gray-300 hover:text-blue-400 transition-colors cursor-pointer">{{ __('How We Work') }}</a>
                    <a href="{{ localized_route('home') . '#case-studies' }}" class="text-gray-300 hover:text-blue-400 transition-colors cursor-pointer">{{ __('Case Studies') }}</a>
                </div>

                <!-- Right Side Elements -->
                <div class="flex items-center space-x-4">
                    <!-- Language Switcher -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 px-3 py-2 text-sm font-medium text-gray-200 hover:text-blue-400 transition-colors cursor-pointer">
                            <x-heroicon-o-language class="w-5 h-5" />
                            <span>{{ strtoupper(current_locale()) }}</span>
                            <x-heroicon-s-chevron-down class="w-4 h-4 transition-transform" x-bind:class="open ? 'rotate-180' : ''" />
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg border border-gray-700 py-1 z-50">
                            @foreach (available_locales() as $locale)
                                <a href="{{ locale_route($locale) }}" class="block px-4 py-2 text-sm cursor-pointer {{ current_locale() === $locale ? 'bg-blue-950 text-blue-400 font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                                    {{ locale_name($locale) }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <a
                        href="{{ localized_route('contact') }}"
                        class="px-6 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-violet-600
                        rounded-lg hover:from-blue-700 hover:to-violet-700 transition-all shadow-lg shadow-blue-500/25
                        hover:shadow-xl hover:shadow-blue-500/30 hover:-translate-y-0.5 cursor-pointer"
                    >
                        {{ __('Get Started') }}
                    </a>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div class="md:hidden flex justify-between items-center h-16">
                <!-- Burger Menu Button -->
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="flex items-center justify-start w-10 h-10 text-gray-300 hover:text-blue-400 transition-colors cursor-pointer"
                >
                    <x-heroicon-o-bars-3 class="w-8 h-8" x-show="!mobileMenuOpen" />
                    <x-heroicon-o-x-mark class="w-8 h-8" x-show="mobileMenuOpen" />
                </button>

                <!-- Centered Logo -->
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg flex items-center justify-center">
                        <x-heroicon-o-bolt class="w-5 h-5 text-white" />
                    </div>
                    <span class="text-xl font-bold text-white">
                        {{ __('AI Agents') }}
                    </span>
                </div>

                <!-- Get Started Button -->
                <a
                    href="{{ localized_route('contact') }}"
                    class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-violet-600
                    rounded-lg hover:from-blue-700 hover:to-violet-700 transition-all shadow-lg shadow-blue-500/25 hover:shadow-xl
                    hover:shadow-blue-500/30 hover:-translate-y-0.5 cursor-pointer"
                >
                    {{ __('Get Started') }}
                </a>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div
                x-show="mobileMenuOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2"
                class="md:hidden absolute top-16 left-0 right-0 bg-gray-800 border-b border-gray-700 shadow-lg"
            >
                <div class="px-4 py-6 space-y-4">
                    <!-- Navigation Links -->
                    <div class="space-y-3">
                        <a href="{{ localized_route('home') . '#services' }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-lg font-medium text-gray-300 hover:text-blue-400 hover:bg-gray-700 rounded-lg transition-colors cursor-pointer">
                            {{ __('Services') }}
                        </a>
                        <a href="{{ localized_route('home') . '#solutions' }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-lg font-medium text-gray-300 hover:text-blue-400 hover:bg-gray-700 rounded-lg transition-colors cursor-pointer">
                            {{ __('Solutions') }}
                        </a>
                        <a href="{{ localized_route('home') . '#dashboard-demo' }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-lg font-medium text-gray-300 hover:text-blue-400 hover:bg-gray-700 rounded-lg transition-colors cursor-pointer">
                            {{ __('Dashboard') }}
                        </a>
                        <a href="{{ localized_route('home') . '#how-we-work' }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-lg font-medium text-gray-300 hover:text-blue-400 hover:bg-gray-700 rounded-lg transition-colors cursor-pointer">
                            {{ __('How We Work') }}
                        </a>
                        <a href="{{ localized_route('home') . '#case-studies' }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-lg font-medium text-gray-300 hover:text-blue-400 hover:bg-gray-700 rounded-lg transition-colors cursor-pointer">
                            {{ __('Case Studies') }}
                        </a>
                    </div>

                    <!-- Language Switcher -->
                    <div class="pt-4 border-t border-gray-700">
                        <div class="space-y-2">
                            <p class="px-4 text-sm font-medium text-gray-400 uppercase tracking-wider">{{ __('Language') }}</p>
                            @foreach (available_locales() as $locale)
                                <a href="{{ locale_route($locale) }}" @click="mobileMenuOpen = false"
                                class="flex items-center px-4 py-3 text-lg font-medium {{ current_locale() === $locale ? 'text-blue-400
                                bg-blue-950' : 'text-gray-300
                                hover:text-blue-400 hover:bg-gray-700' }}
                                rounded-lg transition-colors cursor-pointer">
                                    <x-heroicon-o-language class="w-5 h-5 mr-3" />
                                    {{ locale_name($locale) }}
                                    @if(current_locale() === $locale)
                                        <x-heroicon-o-check class="w-5 h-5 ml-auto" />
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
