@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
        {{-- Background Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-violet-50 to-pink-50 dark:from-gray-900 dark:via-blue-950 dark:to-violet-950 opacity-50"></div>

        <div class="relative max-w-5xl mx-auto text-center">
            {{-- Header with Icon --}}
            <div class="flex items-center justify-center lg:mb-8 space-x-3">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-5xl font-bold text-gray-900 dark:text-white">
                    {{ __('Security Policy') }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="pb-16 md:pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto space-y-8 md:space-y-12">

            {{-- Company Name --}}
            <div class="mb-8 mt-10">
                <h2 class="text-2xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('Elias Kalyvas Learning & Development') }}
                </h2>
                <div class="mt-2 w-24 h-px bg-gradient-to-r from-violet-600 to-purple-600 border-b-2 border-dashed border-violet-400"></div>
            </div>

            {{-- Summary --}}
            <div class="bg-gradient-to-br from-blue-50 to-violet-50 dark:from-blue-950/30 dark:to-violet-950/30 rounded-2xl p-6 md:p-8 border border-blue-200 dark:border-blue-800 shadow-lg">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">
                        {{ __('Summary') }}
                    </h3>
                </div>
                <p class="text-base md:text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('Data and system security is a fundamental pillar of our operation. We implement multi-layered protection measures and continuous monitoring.') }}
                </p>
            </div>

            {{-- Detailed Terms Header --}}
            <div class="text-center">
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ __('Detailed Text') }}
                </h2>
            </div>

            {{-- Section: Introduction --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        3.1 {{ __('Introduction') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('Data and infrastructure security is a cornerstone of Elias Kalyvas L&D operations. All services are developed based on the Security by Design principle.') }}
                </p>
            </div>

            {{-- Section: Protection Measures --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        3.2 {{ __('Protection Measures') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('We implement technical and organizational measures such as:') }}
                </p>

                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('TLS 1.3 encryption in all communications') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('OAuth 2.0 authentication for secure access') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Multi-level firewall') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Daily system monitoring') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Automated notifications for suspicious activity') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Regular penetration tests and audit logs') }}</span>
                    </li>
                </ul>
            </div>

            {{-- Section: AI Agents Security --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        3.3 {{ __('AI Agents Security') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('AI Agents are developed in modular architecture, allowing:') }}
                </p>

                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Complete environment isolation') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Easy maintenance') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Secure transfer or delivery to client') }}</span>
                    </li>
                </ul>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('Each project is accompanied by a security plan and access control (access policy).') }}
                </p>
            </div>

            {{-- Section: Incident Management --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        3.4 {{ __('Incident Management') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('In case of data breach or cyber attack, an incident response plan is implemented with:') }}
                </p>

                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Immediate notification of interested parties') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Service restoration') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Security policy review') }}</span>
                    </li>
                </ul>
            </div>

            {{-- Last Updated --}}
            <div class="text-center mt-12 pt-8 border-t border-gray-300 dark:border-gray-700">
                <p class="text-sm text-gray-500 dark:text-gray-400">
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
                    {{ __('Questions about our Security Policy?') }}
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
