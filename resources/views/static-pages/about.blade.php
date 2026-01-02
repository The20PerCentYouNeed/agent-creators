@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-27 md:pt-32 pb-12 md:pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
        {{-- Background Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-blue-950 to-violet-950 opacity-50"></div>

        <div class="relative max-w-5xl mx-auto text-center">
            {{-- Header with Icon --}}
            <div class="flex items-center justify-center lg:mb-8 space-x-3">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-5xl font-bold text-white">
                    {{ __('About Us') }}
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

            {{-- Main Paragraph --}}
            <div class="bg-gradient-to-br from-blue-950/30 to-violet-950/30 rounded-2xl p-6 md:p-8 border border-blue-800 shadow-lg">
                <p class="text-base md:text-lg text-gray-300 leading-relaxed mb-6">
                    {{ __('An ecosystem that unites education, leadership, and artificial intelligence. We design programs for the development of people and businesses and create customized AI Agents that transform knowledge and data into strategic action.') }}
                </p>
            </div>

            {{-- Founder Info with Team Images --}}
            <div class="bg-gray-800 rounded-2xl p-6 md:p-8 border border-gray-700 shadow-lg">
                <p class="text-base md:text-lg text-gray-300 leading-relaxed mb-8">
                    {{ __('The company was founded by Elias Kalyvas, Learning and Development and AI Strategist, with a mission to help businesses grow with clarity, strategy, and substance.') }}
                </p>

                {{-- Team Members --}}
                <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-40 mt-8">
                    {{-- Elias Kalyvas --}}
                    <div class="flex flex-col items-center text-center">
                        <a href="https://eliaskalyvas.gr/" target="_blank" rel="noopener noreferrer" class="group">
                            <div class="relative mb-4">
                                {{-- Circular background --}}
                                <div class="w-48 h-48 rounded-full p-1">
                                    <div class="w-full h-full rounded-full overflow-hidden">
                                        <picture>
                                            <source srcset="{{ asset('images/elias.webp') }}" type="image/webp">
                                            <img
                                                src="{{ asset('images/elias.png') }}"
                                                alt="Elias Kalyvas"
                                                class="w-full h-full object-cover rounded-full"
                                                width="200"
                                                height="200"
                                                loading="lazy"
                                            />
                                        </picture>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-1">
                            {{ __('Elias Kalyvas') }}
                        </h3>
                        <p class="text-sm md:text-base text-gray-400">
                            {{ __('Founder & Strategist') }}
                        </p>
                    </div>

                    {{-- Apostolis Moustakis --}}
                    <div class="flex flex-col items-center text-center">
                        <a href="https://www.linkedin.com/in/apostolis-moustakis-b82bab294/" target="_blank" rel="noopener noreferrer" class="group">
                            <div class="relative mb-4">
                                {{-- Circular background --}}
                                <div class="w-48 h-48 rounded-full p-1">
                                    <div class="w-full h-full rounded-full overflow-hidden">
                                        <picture>
                                            <source srcset="{{ asset('images/apostolis.webp') }}" type="image/webp">
                                            <img
                                                src="{{ asset('images/apostolis.png') }}"
                                                alt="Apostolis Moustakis"
                                                class="w-full h-full object-cover rounded-full"
                                                width="200"
                                                height="200"
                                                loading="lazy"
                                            />
                                        </picture>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-1">
                            {{ __('Apostolis Moustakis') }}
                        </h3>
                        <p class="text-sm md:text-base text-gray-400">
                            {{ __('Developer & Co-founder') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Team Information --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-8 md:mb-10">

                <div class="space-y-6">
                    <div class="flex items-start space-x-3 md:space-x-4">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-base md:text-lg text-gray-300 leading-relaxed">
                                {{ __('In this context, a team of specialized professionals has been formed who develop the AI Agents. The main contributors to the project are Elias Kalyvas and Apostolis Moustakis, who coordinate the research, design, and development of the Agents for different business sectors.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mission Statement --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-8 md:mb-10">

                <div class="flex items-start space-x-3 md:space-x-4">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-4a1 1 0 00-1-1H6a1 1 0 00-1 1v4a1 1 0 01-1 1H2a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-lg md:text-xl font-semibold text-white">
                        {{ __('Our Mission is to empower people and organizations to work smarter, not harder.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 md:py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600">
        <div class="max-w-4xl mx-auto text-center">
            <div class="flex items-start md:items-center justify-center space-x-3 mb-4 md:mb-6">
                <svg class="w-8 h-8 md:w-8 md:h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-lg md:text-3xl font-bold text-white">
                    {{ __('Learn more about Elias Kalyvas L&D') }}
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

