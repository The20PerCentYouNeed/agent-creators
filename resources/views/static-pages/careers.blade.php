@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-27 md:pt-32 pb-12 md:pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
        {{-- Background Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-violet-50 to-pink-50 dark:from-gray-900 dark:via-blue-950 dark:to-violet-950 opacity-50"></div>

        <div class="relative max-w-5xl mx-auto text-center">
            {{-- Header with Icon --}}
            <div class="flex items-center justify-center lg:mb-8 space-x-3">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-5xl font-bold text-gray-900 dark:text-white">
                    {{ __('Careers') }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="pb-16 md:pb-20 px-4 sm:px-6 lg:px-8 mt-10">
        <div class="max-w-4xl mx-auto space-y-8 md:space-y-12">

            {{-- Careers Introduction --}}
            <div class="bg-gradient-to-br from-blue-50 to-violet-50 dark:from-blue-950/30 dark:to-violet-950/30 rounded-2xl p-6 md:p-8 border border-blue-200 dark:border-blue-800 shadow-lg">
                <p class="text-base md:text-lg text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    {{ __('We are developing an international team of creators, consultants, and AI builders.') }}
                </p>
                <p class="text-base md:text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('If you combine technology with pedagogical thinking or strategy, you might belong to the next generation of our partners.') }}
                </p>
            </div>

            {{-- Open Positions Section --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-8 md:mb-10">

                {{-- Section Header with Icon --}}
                <div class="flex items-center space-x-3 md:space-x-4 mb-6">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h2 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('Open Positions:') }}
                    </h2>
                </div>

                {{-- Positions List --}}
                <div class="space-y-4 ml-2 md:ml-6">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-600 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                        </svg>
                        <p class="text-base md:text-lg text-gray-700 dark:text-gray-300">
                            AI Assistant Designer
                        </p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-600 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                        </svg>
                        <p class="text-base md:text-lg text-gray-700 dark:text-gray-300">
                            Content Strategist / Learning Architect
                        </p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-600 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                        </svg>
                        <p class="text-base md:text-lg text-gray-700 dark:text-gray-300">
                            Business Development Specialist
                        </p>
                    </div>
                </div>
            </div>

            {{-- CTA Section --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-8 md:mb-10">

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4 ml-2 md:ml-6">
                    <a href="{{ localized_route('contact') }}"
                        class="inline-block px-6 py-3 md:px-8 md:py-4 text-base md:text-lg font-semibold
                        text-blue-600 bg-white rounded-lg hover:bg-gray-100 transition-all shadow-xl
                        hover:shadow-2xl hover:-translate-y-0.5">
                        {{ __('Send CV') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
