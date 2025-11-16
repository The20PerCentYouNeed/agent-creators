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
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zM8 6a2 2 0 114 0v1H8V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-5xl font-bold text-white">
                    {{ __('Terms of Use') }}
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
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-white">
                        {{ __('Summary') }}
                    </h3>
                </div>
                <p class="text-base md:text-lg text-gray-300 leading-relaxed">
                    {{ __('The use of the website and services of Elias Kalyvas L&D implies acceptance of these terms. The content is intended for informational and educational purposes.') }}
                </p>
            </div>

            {{-- Detailed Terms Header --}}
            <div class="text-center">
                <h2 class="text-xl md:text-2xl font-bold text-white mb-4">
                    {{ __('Detailed Terms') }}
                </h2>
            </div>

            {{-- Section: General Terms --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('General Terms') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 mb-6 leading-relaxed">
                    {{ __('The use of the agent-creators.ai website and the digital services of Elias Kalyvas L&D means acceptance of these terms. If you do not agree with any of these, please do not use the services.') }}
                </p>
            </div>

            {{-- Section: Intellectual Property --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('Intellectual Property') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 leading-relaxed">
                    {{ __('All content (texts, images, logos, videos, files, graphics and AI-generated material) constitutes intellectual property of Elias Kalyvas L&D or its partners. Any use, copying or republishing without written permission is prohibited.') }}
                </p>
            </div>

            {{-- Section: Use of Services --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('Use of Services') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 mb-6 leading-relaxed">
                    {{ __('The AI Agents and tools provided through the website are intended for informational and demonstration use. For commercial or customized utilization a collaboration agreement is required.') }}
                </p>

                <p class="text-sm md:text-base text-gray-300 leading-relaxed">
                    {{ __('The company bears no responsibility for the use of results from AI systems outside agreed frameworks.') }}
                </p>
            </div>

            {{-- Section: Limitation of Liability --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('Limitation of Liability') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 mb-6 leading-relaxed">
                    {{ __('Elias Kalyvas L&D makes every effort to ensure the accuracy and reliability of the content. However, it is not responsible for:') }}
                </p>

                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Temporary service interruptions') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Errors, delays or inaccuracies') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Data loss or damages from unauthorized use') }}</span>
                    </li>
                </ul>
            </div>

            {{-- Section: Terms Modifications --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('Terms Modifications') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-300 leading-relaxed">
                    {{ __('The company reserves the right to modify the terms of use at any time without notice. Changes will be published immediately on the site.') }}
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
            <div class="flex items-center justify-center space-x-2 md:space-x-4 mb-4 md:mb-6">
                <svg class="w-6 h-6 md:w-10 md:h-10 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-lg md:text-3xl font-bold text-white">
                    {{ __('Questions about our Terms of Use?') }}
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
