@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-br from-blue-50 via-violet-50 to-pink-50 dark:from-gray-900 dark:via-blue-950 dark:to-violet-950">
        <div class="absolute inset-0 opacity-50">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/20 dark:bg-blue-600/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-violet-400/20 dark:bg-violet-600/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto">
            <div class="mb-6">
                <a href="{{ localized_route('case-studies.index') }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                    <x-heroicon-o-arrow-left class="w-5 h-5 mr-2" />
                    {{ __('Back to Case Studies') }}
                </a>
            </div>

            <div class="flex items-center gap-3 mb-6">
                <span class="inline-block px-4 py-2 text-sm font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                    {{ __('E-Commerce') }}
                </span>
            </div>

            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                <span class="text-white">
                    {{ __('Case Study: AI Assistant for E-Commerce Business') }}
                </span>
            </h1>

            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 max-w-4xl mb-8">
                {{ __('Case study of developing a custom AI Agent that connects website, email, and messaging apps, reducing response time by 70%.') }}
            </p>

            <div class="flex flex-wrap gap-3">
                <span class="px-4 py-2 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
                    #{{ __('E-Commerce') }}
                </span>
                <span class="px-4 py-2 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
                    #{{ __('Automation') }}
                </span>
                <span class="px-4 py-2 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
                    #{{ __('AIIntegration') }}
                </span>
            </div>
        </div>
    </section>

    {{-- Featured Visual --}}
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="w-full rounded-2xl overflow-hidden bg-gradient-to-br from-blue-100 to-violet-100 dark:from-blue-950/30 dark:to-violet-950/30 p-8">
                <picture>
                    <source srcset="{{ asset('images/chatbot.webp') }}" type="image/webp">
                    <img src="{{ asset('images/chatbot.png') }}" alt="{{ __('AI Assistant Chat Interfaces') }}" class="w-full h-auto object-contain" loading="lazy" width="1200" height="800">
                </picture>
            </div>
        </div>
    </section>

    {{-- Project Overview --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('PROJECT OVERVIEW') }}
                </h2>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                    {{ __('An e-commerce business wanted to organize and automate communication with customers coming from different channels — website, email, and messaging apps. The goal was to maintain the human experience, but reduce delays and the need for manual management.') }}
                </p>

                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="p-6 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-950/30 dark:to-blue-900/20 border border-blue-200 dark:border-blue-800">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">{{ __('Key Facts') }}</h3>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ __('Industry') }}:</span>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">{{ __('E-Commerce Industry') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ __('Implementation Duration') }}:</span>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">{{ __('2 weeks') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ __('Goal') }}:</span>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">{{ __('Communication channel integration and service automation') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ __('Technology') }}:</span>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">{{ __('Custom AI Agent (GPT-based)') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- The Challenge --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('THE CHALLENGE') }}
                </h2>
            </div>

            <div class="bg-gradient-to-br from-gray-50 to-gray-100/50 dark:from-gray-800 dark:to-gray-900/20 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('The customer service team faced an increasing volume of requests, repetitive questions, and the inability to respond immediately across all channels.') }}
                </p>

                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('Communication via email, website chat, and messaging apps was disconnected, without a common management point.') }}
                </p>

                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">{{ __('Main obstacles') }}:</h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-600 dark:text-gray-300">{{ __('Multiple communication channels without integration.') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-600 dark:text-gray-300">{{ __('Delayed responses and low management consistency.') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-600 dark:text-gray-300">{{ __('Lack of automation for basic questions and processes.') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- The Solution --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('THE SOLUTION') }}
                </h2>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 mb-8">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('Creating a multi-channel AI Assistant that acts as a unified communication hub, learns from requests, and improves the service experience.') }}
                </p>

                <div class="flex items-center gap-3 mb-6">
                    <x-heroicon-o-map class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('Implementation Stages') }}</h3>
                </div>

                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">1</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Communication Flow Analysis') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('Mapping the most frequent questions, request sources, and channels.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">2</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Website AI Chatbot Development') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('NLP-based dialogue integration for product, order, and shipping inquiries.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">3</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Email Assistant (Mail API Integration)') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('Automatic incoming classification, responses to recurring requests, and follow-up templates.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">4</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Messaging Bots (Viber / WhatsApp API)') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('Connection with messaging platforms for real-time automated responses.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">5</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Central Integration via AI Agent (API Hub)') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('All channels communicate with a single AI layer that learns, adapts, and updates staff.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Technical Infrastructure --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('TECHNICAL INFRASTRUCTURE') }}
                </h2>
            </div>

            <div class="bg-gray-50 dark:bg-gray-900 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                    {{ __('User → Website / Email / Messaging → AI Agent → CRM / CMS / API Hub') }}
                </p>

                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">{{ __('Technologies') }}:</h3>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="flex items-center gap-3 p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                        <x-heroicon-o-cpu-chip class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        <span class="font-semibold text-gray-900 dark:text-white">OpenAI API</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                        <x-heroicon-o-code-bracket class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        <span class="font-semibold text-gray-900 dark:text-white">Node.js</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                        <x-heroicon-o-server class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        <span class="font-semibold text-gray-900 dark:text-white">RESTful APIs</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                        <x-heroicon-o-shopping-cart class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        <span class="font-semibold text-gray-900 dark:text-white">PrestaShop</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                        <x-heroicon-o-envelope class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        <span class="font-semibold text-gray-900 dark:text-white">Brevo</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                        <x-heroicon-o-shield-check class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        <span class="font-semibold text-gray-900 dark:text-white">Secure Hosting</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Timeline & Support --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('TIMELINE & SUPPORT') }}
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-4">
                        <x-heroicon-o-calendar class="w-8 h-8 text-blue-600 dark:text-blue-400" />
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('Goal') }}</h3>
                    </div>
                    <p class="text-3xl font-bold text-gray-600 dark:text-gray-300">{{ __('2 weeks timeline') }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-4">
                        <x-heroicon-o-chat-bubble-left-ellipsis class="w-8 h-8 text-blue-600 dark:text-blue-400" />
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('Phases') }}</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">{{ __('Analysis → Design → Development → Integration → Testing') }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-4">
                        <x-heroicon-o-arrow-path class="w-8 h-8 text-blue-600 dark:text-blue-400" />
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('Maintenance') }}</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">{{ __('Continuous performance monitoring and monthly AI retraining.') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Visual Diagram --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('DIAGRAM / VISUAL INSIGHT') }}
                </h2>
            </div>

            <div class="bg-gradient-to-br from-gray-900 to-gray-950 dark:from-gray-950 dark:to-black rounded-2xl p-12 border border-gray-700">
                <h3 class="text-2xl font-bold text-white text-center mb-4">{{ __('Infographic flow:') }}</h3>
                <p class="text-gray-400 text-center mb-8">{{ __('Client → AI Assistant → Communication Channels → CRM → Report Dashboard') }}</p>

                <div class="flex items-center justify-center">
                    <picture>
                        <source srcset="{{ asset('images/agent-diagram.webp') }}" type="image/webp">
                        <img src="{{ asset('images/agent-diagram.png') }}" alt="{{ __('AI Agent Architecture Diagram') }}" class="w-full max-w-5xl h-auto" loading="lazy" width="1280" height="720">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl md:text-4xl font-bold text-white mb-6">
                {{ __('Ready to Transform Your Business?') }}
            </h2>
            <p class="text-base md:text-xl text-white/90 mb-8">
                {{ __('Get started with custom AI agents designed specifically for your needs') }}
            </p>
            <a href="{{ localized_route('contact') }}" class="inline-block px-8 py-4 text-lg font-semibold text-blue-600 bg-white rounded-lg hover:bg-gray-100 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                {{ __('Contact Us Today') }}
            </a>
        </div>
    </section>
@endsection

