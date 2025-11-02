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
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-5xl font-bold text-gray-900 dark:text-white">
                    {{ __('Compliance Statement') }}
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
                        {{ __('Compliance Summary') }}
                    </h3>
                </div>
                <p class="text-base md:text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('Elias Kalyvas L&D complies with international standards for data security and protection in the development and deployment of AI solutions.') }}
                </p>
            </div>

            {{-- Detailed Content Header --}}
            <div class="text-center">
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ __('Detailed Compliance Framework') }}
                </h2>
            </div>

            {{-- Section 4.1: Purpose --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832L14 10.202a1 1 0 000-1.404l-4.445-2.63z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('Compliance Purpose') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('Elias Kalyvas L&D is committed to complying with international standards for ethics, data security, and protection in the development and deployment of AI solutions.') }}
                </p>
            </div>

            {{-- Section 4.2: Regulatory Standards --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('Regulatory Standards') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-4 leading-relaxed">
                    {{ __('The company complies with:') }}
                </p>

                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('GDPR (EU 2016/679) — General Data Protection Regulation') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('ISO/IEC 27001 — Information Security Management') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('AI Ethics Principles — Transparency, Human Oversight, Fairness, Security') }}</span>
                    </li>
                </ul>
            </div>

            {{-- Section 4.3: Internal Policies --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('Internal Policies') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-4 leading-relaxed">
                    {{ __('Each project is subject to:') }}
                </p>

                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Data Protection Impact Assessment (DPIA)') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Ethical Review for data use assessment') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Audit Trail for operational transparency') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Confidentiality Clauses for all collaborators') }}</span>
                    </li>
                </ul>
            </div>

            {{-- Section 4.4: Ethics and Human Oversight --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('Ethics and Human Oversight') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('AI Agents are designed with human-centered approach. Capabilities of human intervention are maintained in all decisions and processes during project work.') }}
                </p>
            </div>

            {{-- Section 4.5: Reports & Transparency --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('Reports & Transparency') }}
                    </h3>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('Clients and collaborators receive technical documentation and explicit compliance reports prior to project implementation. The company keeps annual compliance policy updates in accordance with international standards.') }}
                </p>
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
                    {{ __('Questions about our Compliance?') }}
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
