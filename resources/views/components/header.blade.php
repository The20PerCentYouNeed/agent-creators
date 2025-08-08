@if($header)
<header x-data="{ open: false }" class="container w-full text-sm mb-6 not-has-[nav]:hidden">
    <nav class="flex items-center w-full gap-6 lg:gap-10 justify-between">
        <div class="w-[25%] lg:hidden">
            <button
            x-on:click="open = !open"
            class="lg:hidden inline-flex flex-col justify-center items-center
            w-8 h-8 gap-[3px] focus:outline-none cursor-pointer">
            <span
            :class="{ 'rotate-45 translate-y-[5px]': open }"
            class="block w-full h-[2px] bg-white transition-transform duration-300">
            </span>
            <span
            :class="{ 'opacity-0': open }"
            class="block w-full h-[2px] bg-white transition-opacity duration-300">
            </span>
            <span
            :class="{ '-rotate-45 -translate-y-[5px]': open }"
            class="block w-full h-[2px] bg-white transition-transform duration-300">
            </span>
        </button>
        </div>

        <!-- Logo -->
        <a href="{{ url('/') }}" class="shrink-0 flex items-center">

            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>

        <ul class="hidden lg:flex flex-1 justify-center items-center gap-8 text-lg">
            <li>
                <a href="{{ route('home') }}" class="text-white hover:text-emerald-400 dark:hover:text-emerald-300">{{ __('Home') }}</a>
            </li>
            <li>
                <a href="#about" class="text-white hover:text-emerald-400 dark:hover:text-emerald-300">{{ __('About') }}</a>
            </li>
            <li>
                <a href="#pricing" class="text-white hover:text-emerald-400 dark:hover:text-emerald-300">{{ __('Pricing') }}</a>
            </li>
        </ul>

        <div class="flex items-center gap-4 w-[25%] lg:w-auto justify-end">
        </div>
    </nav>

    <div x-show="open" x-transition class="lg:hidden mt-4">
        <ul class="flex flex-col items-start gap-4 px-2">
            <li>
                <a x-on:click="open = false" href="{{ url('/') }}" class="text-white hover:text-emerald-400 dark:hover:text-emerald-300">{{ __('Home') }}</a>
            </li>
            <li>
                <a x-on:click="open = false" href="#about" class="text-white hover:text-emerald-400 dark:hover:text-emerald-300">{{ __('About') }}</a>
            </li>
            <li>
                <a x-on:click="open = false" href="#pricing" class="text-white hover:text-emerald-400 dark:hover:text-emerald-300">{{ __('Pricing') }}</a>
            </li>
        </ul>
    </div>
</header>
@endif
