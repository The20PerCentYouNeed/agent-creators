@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
        {{-- Background Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-blue-950 to-violet-950 opacity-50"></div>

        <div class="relative max-w-5xl mx-auto text-center">
            {{-- Header with Icon --}}
            <div class="flex items-center justify-center lg:mb-8 space-x-3">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-5xl font-bold text-white">
                    {{ __('Privacy Policy') }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="pb-16 md:pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto space-y-8 md:space-y-12">

            {{-- Company Name --}}
            <div class="mb-8 mt-10">
                <h2 class="text-2xl md:text-4xl font-bold text-white">
                    {{ __('Elias Kalyvas Learning & Development') }}
                </h2>
                <div class="mt-2 w-24 h-px bg-gradient-to-r from-violet-600 to-purple-600 border-b-2 border-dashed border-violet-400"></div>
            </div>

            {{-- Summary --}}
            <div class="bg-gradient-to-br from-blue-950/30 to-violet-950/30 rounded-2xl p-6 md:p-8 border border-blue-800 shadow-lg">
                <p class="text-base md:text-lg text-gray-300 leading-relaxed">
                    {{ __('Elias Kalyvas Learning & Development (L&D) respects and protects your privacy and personal data. The information we collect and process is exclusively for communication and providing our services. We manage your personal data in accordance with the General Data Protection Regulation (GDPR 2016/679) and Greek legislation.') }}
                </p>
            </div>

            {{-- Section: What data we collect --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('What data we collect') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 mb-6 leading-relaxed">
                    {{ __('We collect only the necessary data for communication and service provision. Specifically, we may collect the following:') }}
                </p>

                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Name and surname') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Contact email and phone') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Message content or requests') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Technical data (IP address, browser, cookies, analytics)') }}</span>
                    </li>
                </ul>

                <p class="text-sm md:text-base text-gray-300 leading-relaxed mb-4">
                    {{ __('Data is collected through:') }}
                </p>
                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Contact forms or collaboration requests') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Newsletter subscriptions') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Automatic cookies or analytics tools for user experience improvement') }}</span>
                    </li>
                </ul>
            </div>

            {{-- Section: How we use the data --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('How we use the data') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 mb-6 leading-relaxed">
                    {{ __('Your data is used exclusively for:') }}
                </p>

                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Communication with you') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Providing technical or business support') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Sending informational material') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Performance analysis and service improvement') }}</span>
                    </li>
                </ul>

                <p class="text-sm md:text-base text-gray-300 leading-relaxed">
                    {{ __('We do not sell, do not rent and do not transfer data to third parties without your express consent.') }}
                </p>
            </div>

            {{-- Section: Cookies & Analytics --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('Cookies & Analytics') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 mb-6 leading-relaxed">
                    {{ __('The website may use cookies for:') }}
                </p>

                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Storing user preferences') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Measuring visitor traffic through tools like Google Analytics') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Security and performance optimization') }}</span>
                    </li>
                </ul>

                <p class="text-sm md:text-base text-gray-300 leading-relaxed">
                    {{ __('You can disable cookies from your browser settings at any time.') }}
                </p>
            </div>

            {{-- Section: Data Retention & Deletion --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2h8a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 3a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('Data Retention & Deletion') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 mb-6 leading-relaxed">
                    {{ __('Data is stored for as long as necessary to fulfill the purpose for which it was collected or until you request its deletion. You can exercise your rights (access, correction, deletion, restriction, portability) by sending an email to info@eliaskalyvas.gr.') }}
                </p>
            </div>

            {{-- Section: Policy Updates --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('Policy Updates') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 leading-relaxed">
                    {{ __('This Privacy Policy is updated regularly to reflect changes in legislation or our services. The date of the last update is noted at the end of this page.') }}
                </p>
            </div>

            {{-- Last Updated --}}
            <div class="text-center mt-12 pt-8 border-t border-gray-700">
                <p class="text-sm text-gray-400">
                    {{ __('Last updated: October 2025') }}
                </p>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 md:py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600">
        <div class="max-w-4xl mx-auto text-center">
            <div class="flex items-center justify-center md:space-x-4 mb-4 md:mb-6">
                <svg class="w-6 h-6 md:w-10 md:h-10 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-lg md:text-3xl font-bold text-white">
                    {{ __('Questions about our Privacy Policy?') }}
                </h2>
            </div>
            <a href="{{ localized_route('contact') }}"
            class="inline-block px-6 py-3 md:px-8 md:py-4
            text-base md:text-lg font-semibold text-blue-600
            bg-white rounded-lg hover:bg-gray-100 transition-all
            shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                {{ __('Contact Us Today') }}
            </a>
        </div>
    </section>
@endsection
