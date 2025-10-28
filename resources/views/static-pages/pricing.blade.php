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
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-5xl font-bold text-gray-900 dark:text-white">
                    {{ __('Pricing') }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="pb-16 md:pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-8 md:space-y-12">

            {{-- Introduction Section --}}
            <div class="text-center mt-8 md:mt-16">
                <p class="text-lg text-gray-700 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    {{ __('Every AI Agent is designed specifically for your business needs. We develop intelligent, multilingual solutions that adapt to your workflows, enhance productivity, and provide superior customer experiences.') }}
                </p>
                <p class="text-base text-gray-600 dark:text-gray-400 mt-4">
                    {{ __('By selecting, deploying, and training the right technology for your specific business objectives.') }}
                </p>
            </div>

            {{-- Pricing Plans Grid --}}
            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8 mt-12">

                {{-- Custom AI Chatbot --}}
                <div class="bg-gradient-to-br from-blue-50 to-violet-50 dark:from-blue-950/30 dark:to-violet-950/30 rounded-2xl p-6 md:p-8 border border-blue-200 dark:border-blue-800 shadow-lg hover:shadow-xl transition-all">
                    <div class="flex items-center gap-x-3 mb-6">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-gray-900 dark:text-white leading-tight">
                            {{ __('Custom AI Chatbot') }}
                        </h3>
                    </div>

                    <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        {{ __('Perfect for websites, landing pages, or platforms that need direct customer communication with your audience.') }}
                    </p>

                    <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        {{ __('The Agent learns your tone, information needs, and objectives to provide immediate 24/7 support with natural language and tone of voice.') }}
                    </p>

                    <div class="space-y-3 mb-6">
                        <h4 class="font-semibold text-gray-900 dark:text-white">{{ __('Deliverables:') }}</h4>
                        <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <span class="mr-2 text-blue-600">•</span>
                                <span>{{ __('Website installation (FAQs, livechat, etc.)') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-blue-600">•</span>
                                <span>{{ __('WordPress, Webflow, or custom site customization') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-blue-600">•</span>
                                <span>{{ __('Basic conversation analysis & statistics dashboard') }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="border-t border-blue-200 dark:border-blue-700 pt-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('Implementation Cost:') }}</span>
                            <span class="text-lg font-bold text-blue-600">1.500 € - 2.000 €</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('Monthly Support & Monitoring:') }}</span>
                            <span class="text-base font-semibold text-gray-900 dark:text-white">150 €/{{ __('month') }}</span>
                        </div>
                    </div>
                </div>

                {{-- AI Agent for Email Integration --}}
                <div class="bg-gradient-to-br from-violet-50 to-pink-50 dark:from-violet-950/30 dark:to-pink-950/30 rounded-2xl p-6 md:p-8 border border-violet-200 dark:border-violet-800 shadow-lg hover:shadow-xl transition-all">
                    <div class="flex items-center gap-x-3 mb-6">
                        <div class="w-10 h-10 bg-violet-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-gray-900 dark:text-white leading-tight">
                            {{ __('AI Agent for Email Integration') }}
                        </h3>
                    </div>

                    <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        {{ __('An Agent that connects with your email (Outlook, Gmail, etc.) and automatically responds to business inquiries or sends targeted messages.') }}
                    </p>

                    <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        {{ __('Additionally, it classifies emails by priority and creates proactive outreach and tone of voice adjustments.') }}
                    </p>

                    <div class="space-y-3 mb-6">
                        <h4 class="font-semibold text-gray-900 dark:text-white">{{ __('Deliverables:') }}</h4>
                        <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <span class="mr-2 text-violet-600">•</span>
                                <span>{{ __('Email integration and security setup') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-violet-600">•</span>
                                <span>{{ __('Full-featured AI integration & tone calibration') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-violet-600">•</span>
                                <span>{{ __('Integration with CRM or outreach pipeline (custom)') }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="border-t border-violet-200 dark:border-violet-700 pt-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('Implementation Cost:') }}</span>
                            <span class="text-lg font-bold text-violet-600">2.500 € - 3.500 €</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('Live Tuning Support:') }}</span>
                            <span class="text-base font-semibold text-gray-900 dark:text-white">200 €/{{ __('month') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Custom Pricing Section --}}
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800/30 dark:to-gray-900/30 rounded-2xl p-6 md:p-8 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl transition-all md:col-span-2 xl:col-span-1">
                    <div class="flex items-center gap-x-3 mb-6">
                        <div class="w-10 h-10 bg-gray-700 dark:bg-gray-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-gray-900 dark:text-white leading-tight">
                            {{ __('Custom Pricing') }}
                        </h3>
                    </div>

                    <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        {{ __('Do you have an Agent that integrates with your company\'s systems? Video input or automation with third-party platforms?') }}
                    </p>

                    <p class="text-sm md:text-base text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        {{ __('We create advanced custom solutions for optimal performance in medium-to-large business environments.') }}
                    </p>

                    <div class="mt-6 mb-6">
                        <a href="{{ localized_route('contact') }}"
                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-600 to-gray-700
                           text-white text-sm font-medium rounded-lg hover:from-gray-700 hover:to-gray-800
                           transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            {{ __('Schedule Technical Meeting') }}
                        </a>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-600 pt-6">
                        <div class="text-center">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">{{ __('Completely Custom Solution') }}</p>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ __('Contact Us for Quote') }}</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Additional Information Section --}}
            <div class="bg-gradient-to-br from-green-50 to-blue-50 dark:from-green-950/30 dark:to-blue-950/30 rounded-2xl p-6 md:p-8 border border-green-200 dark:border-green-800 shadow-lg mt-12">
                <div class="flex items-center gap-x-3 mb-6">
                    <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 dark:text-white leading-tight">
                        {{ __('Important Notes') }}
                    </h3>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-3">{{ __('What You Get:') }}</h4>
                        <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <span class="mr-2 text-green-600">✓</span>
                                <span>{{ __('Complete Agent development and implementation') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-green-600">✓</span>
                                <span>{{ __('Training and optimization for your specific use case') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-green-600">✓</span>
                                <span>{{ __('Integration with existing systems and workflows') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-green-600">✓</span>
                                <span>{{ __('Comprehensive documentation and training') }}</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-3">{{ __('Implementation Timeline:') }}</h4>
                        <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <span class="mr-2 text-blue-600">•</span>
                                <span>{{ __('Discovery & Requirements: 1-2 weeks') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-blue-600">•</span>
                                <span>{{ __('Development & Training: 3-6 weeks') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-blue-600">•</span>
                                <span>{{ __('Testing & Optimization: 1-2 weeks') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2 text-blue-600">•</span>
                                <span>{{ __('Deployment & Launch: 1 week') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 md:py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600">
        <div class="max-w-4xl mx-auto text-center">
            <div class="flex items-center justify-center space-x-2 md:space-x-4 mb-4 md:mb-6">
                <svg class="w-6 h-6 md:w-10 md:h-10 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-lg md:text-3xl font-bold text-white">
                    {{ __('Ready to Get Your Custom AI Agent?') }}
                </h2>
            </div>
            <p class="text-base md:text-lg text-white/90 mb-6 md:mb-8 max-w-2xl mx-auto">
                {{ __('Schedule a consultation to discuss your specific needs and get a detailed proposal for your AI Agent solution.') }}
            </p>
            <a href="{{ localized_route('contact') }}"
               class="inline-block px-6 py-3 md:px-8 md:py-4
               text-base md:text-lg font-semibold text-blue-600
               bg-white rounded-lg hover:bg-gray-100 transition-all
               shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                {{ __('Schedule Free Consultation') }}
            </a>
        </div>
    </section>
@endsection
