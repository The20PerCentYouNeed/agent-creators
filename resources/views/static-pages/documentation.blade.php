@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
        {{-- Background Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-violet-50 to-pink-50 dark:from-gray-900 dark:via-blue-950 dark:to-violet-950 opacity-50"></div>

        <div class="relative max-w-5xl mx-auto text-center">
            {{-- Header with Icon --}}
            <div class="flex flex-col items-center mb-6 md:flex-row md:items-center md:justify-center md:mb-8 md:space-x-3">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-pink-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg mb-3 md:mb-0">
                    <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-5xl font-bold text-gray-900 dark:text-white text-center">
                    {{ __('Documentation AI Agents') }}
                </h1>
            </div>

            <p class="text-base md:text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto mb-12">
                {{ __('The AI Agents we develop are designed to fully adapt to each business\'s needs. On this page you will find all the necessary information about their operation, integration, and security. The documentation is continuously updated as new features and integrations are added.') }}
            </p>
        </div>
    </section>

    {{-- Documentation Content --}}
    <section class="pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto space-y-12">

            {{-- Section: How It Works --}}
            <div class="relative">
                {{-- Separator --}}
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                {{-- Section Header --}}
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h2 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('How an AI Agent Works') }}
                    </h2>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('Every AI Agent consists of a sequence of steps that starts from the analysis of business processes and ends with continuous learning and adaptation.') }}
                </p>

                <p class="text-sm md:text-base font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('Operation Steps:') }}
                </p>

                {{-- Steps --}}
                <div class="space-y-4 mb-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white font-bold">1</span>
                        </div>
                        <p class="text-sm md:text-base text-gray-700 dark:text-gray-300">
                            {{ __('Data and use case analysis') }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <p class="text-sm md:text-base text-gray-700 dark:text-gray-300">
                            {{ __('Training the Agent on content and style') }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <p class="text-sm md:text-base text-gray-700 dark:text-gray-300">
                            {{ __('Integration into business systems') }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white font-bold">4</span>
                        </div>
                        <p class="text-sm md:text-base text-gray-700 dark:text-gray-300">
                            {{ __('Performance monitoring and optimization') }}
                        </p>
                    </div>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('The Agents use natural language processing (NLP) and context awareness techniques to understand intentions, questions, and communication context.') }}
                </p>
            </div>

            {{-- Section: Integrations --}}
            <div class="relative">
                {{-- Separator --}}
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                {{-- Section Header --}}
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h2 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('Integrations') }}
                    </h2>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('The AI Agents can connect with a multitude of tools and platforms, enabling fully automated workflows.') }}
                </p>

                <p class="text-sm md:text-base font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('Indicative Integrations:') }}
                </p>

                {{-- Integration List --}}
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <p class="text-sm md:text-base text-gray-700 dark:text-gray-300">
                            {{ __('Email') }}
                            <span class="">(Gmail, Outlook, Microsoft 365)</span>
                        </p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-sm md:text-base text-gray-700 dark:text-gray-300">
                            {{ __('Webchat, WhatsApp, Messenger') }}
                        </p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm3 1h6v4H7V5zm8 8v2h1v-2h-1zm-2-2H7v4h6v-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-sm md:text-base text-gray-700 dark:text-gray-300">
                            {{ __('CRM Systems') }}
                            <span class="">(HubSpot, Zoho, Salesforce)</span>
                        </p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                        </svg>
                        <p class="text-sm md:text-base text-gray-700 dark:text-gray-300">
                            {{ __('E-commerce') }}
                            <span class="">(WooCommerce, Shopify, Magento)</span>
                        </p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                        <p class="text-sm md:text-base text-gray-700 dark:text-gray-300">
                            {{ __('Productivity Tools') }}
                            <span class="">(Google Sheets, Notion, Airtable)</span>
                        </p>
                    </div>
                </div>

                {{-- API Example --}}
                <p class="text-sm md:text-base font-semibold text-gray-900 dark:text-white mt-8 mb-3">
                    {{ __('API Call Example:') }}
                </p>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4 font-mono text-xs md:text-sm overflow-x-auto">
                    <pre class="text-gray-800 dark:text-gray-200"><code>POST /agent/integrations
{
"type": "email",
"account": "info@company.com"
}</code>
                    </pre>
                </div>
            </div>

            {{-- Section: Security & Privacy --}}
            <div class="relative">
                {{-- Separator --}}
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                {{-- Section Header --}}
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h2 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('Security & Privacy') }}
                    </h2>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('Data security is at the core of every project. All Agents operate in full compliance with GDPR and industry encryption standards.') }}
                </p>

                <p class="text-sm md:text-base font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('Basic Principles:') }}
                </p>

                {{-- Security Principles --}}
                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('End-to-end encryption (TLS 1.3)') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Token-based authentication for APIs') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('No storage of sensitive data outside the client environment') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Periodic security audits and compliance reports') }}</span>
                    </li>
                </ul>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('The Agents are developed in a modular architecture, allowing easy transfer to a proprietary server environment.') }}
                </p>
            </div>

            {{-- Section: Management & Monitoring --}}
            <div class="relative">
                {{-- Separator --}}
                <hr class="border-t-2 border-gray-300 dark:border-gray-700 mb-10">

                {{-- Section Header --}}
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 dark:bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white dark:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ __('Management & Monitoring') }}
                    </h2>
                </div>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('Each Agent is accompanied by performance monitoring mechanisms. Through a special dashboard (or reports) you can see:') }}
                </p>

                {{-- Monitoring Points --}}
                <ul class="space-y-3 mb-6 ml-6">
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Volume and type of interactions') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Success rate of responses') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Frequency of questions / tasks') }}</span>
                    </li>
                    <li class="text-sm md:text-base text-gray-700 dark:text-gray-300 flex items-start">
                        <span class="mr-2">-</span>
                        <span>{{ __('Areas for improvement for retraining') }}</span>
                    </li>
                </ul>

                <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('The Agents have a feedback loop – they learn from interactions and continuously improve their quality.') }}
                </p>
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
