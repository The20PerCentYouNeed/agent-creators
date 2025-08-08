@if($header)
<header x-data="{ open: false }" x-on:click.outside="open = false"
class="fixed top-0 left-0 right-0 z-50 bg-white w-full mx-auto text-sm mb-6 not-has-[nav]:hidden py-4 px-4">
    <div class="max-w-[1200px] mx-auto relative">
        <nav class="flex items-center w-full gap-4 lg:gap-10 justify-between">
            <!-- Mobile Burger Menu (Left) -->
            <div class="flex-shrink-0 lg:hidden">
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
            <div class="lg:w-[35%] flex items-center justify-center lg:justify-start">
                <a href="{{ url('/') }}" class="w-auto">
                    <x-logo class="w-32 h-auto lg:w-60 lg:h-30 text-black" />
                </a>
            </div>

            <!-- Desktop Navigation (Center) -->
            <ul class="hidden lg:flex flex-1 justify-center items-center gap-8 text-base">
                <li>
                    <a href="{{ route('home') }}" class="text-black transition-colors relative group">
                        {{ __('Learn') }}
                        <span class="absolute bottom-[-5px] left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-300 ease-out"></span>
                    </a>
                </li>
                <li>
                    <a href="#features" class="text-black transition-colors relative group">
                        {{ __('Features') }}
                        <span class="absolute bottom-[-5px] left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-300 ease-out"></span>
                    </a>
                </li>
                <li>
                    <a href="#pricing" class="text-black transition-colors relative group">
                        {{ __('Pricing') }}
                        <span class="absolute bottom-[-5px] left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-300 ease-out"></span>
                    </a>
                </li>
                <li>
                    <a href="#integrations" class="text-black transition-colors relative group">
                        {{ __('Integrations') }}
                        <span class="absolute bottom-[-5px] left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-300 ease-out"></span>
                    </a>
                </li>
                <li>
                    <a href="#about" class="text-black transition-colors relative group">
                        {{ __('About') }}
                        <span class="absolute bottom-[-5px] left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-300 ease-out"></span>
                    </a>
                </li>
            </ul>

            <!-- Desktop Button (Right) -->
            <div class="hidden lg:flex items-center justify-end lg:w-[35%]">
                <a href="#demo" class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition-colors font-medium">
                    {{ __('Contact us!') }}
                </a>
            </div>

            <!-- Mobile Button (Right) -->
            <div class="lg:hidden">
                <a href="#demo" class="bg-black text-white px-3 py-2 rounded-lg hover:bg-gray-800 transition-colors text-xs lg:text-sm font-medium">
                    {{ __('Contact us!') }}
                </a>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="lg:hidden absolute top-full left-0 right-0 bg-white/95 backdrop-blur-sm shadow-lg z-40">
            <div class="max-w-[1200px] mx-auto px-4 py-4">
                <ul class="flex flex-col items-start gap-4">
                    <li>
                        <a x-on:click="open = false" href="{{ route('home') }}" class="text-black hover:text-gray-600 transition-colors">{{ __('Learn') }}</a>
                    </li>
                    <li>
                        <a x-on:click="open = false" href="#features" class="text-black hover:text-gray-600 transition-colors">{{ __('Features') }}</a>
                    </li>
                    <li>
                        <a x-on:click="open = false" href="#pricing" class="text-black hover:text-gray-600 transition-colors">{{ __('Pricing') }}</a>
                    </li>
                    <li>
                        <a x-on:click="open = false" href="#integrations" class="text-black hover:text-gray-600 transition-colors">{{ __('Integrations') }}</a>
                    </li>
                    <li>
                        <a x-on:click="open = false" href="#about" class="text-black hover:text-gray-600 transition-colors">{{ __('About') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
@endif
