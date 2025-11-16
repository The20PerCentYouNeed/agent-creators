@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-br from-gray-900 via-blue-950 to-violet-950">
        <div class="absolute inset-0 opacity-50">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-violet-600/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto">
            <div class="mb-6">
                <a href="{{ localized_route('home') . '#case-studies' }}" class="inline-flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                    <x-heroicon-o-arrow-left class="w-5 h-5 mr-2" />
                    {{ __('Back to Case Studies') }}
                </a>
            </div>

            <div class="flex items-center gap-3 mb-6">
                <span class="inline-block px-4 py-2 text-sm font-semibold rounded-full bg-blue-900 text-blue-200">
                    {{ __('Healthcare') }}
                </span>
            </div>

            <h1 class="text-3xl md:text-4xl lg:text-6xl font-bold mb-6 leading-tight">
                <span class="text-white">
                    {{ __('Case Study: AI Assistant for Patient Communication & Appointment Management') }}
                </span>
            </h1>

            <p class="text-lg md:text-xl lg:text-2xl text-gray-300 max-w-4xl mb-8">
                {{ __('Technical research and proposed solution for a dental clinic seeking to automate patient communication, appointment scheduling, and information delivery through an intelligent AI assistant.') }}
            </p>

            <div class="flex flex-wrap gap-3">
                <span class="px-4 py-2 bg-gray-800/50 backdrop-blur-sm rounded-full text-sm font-medium text-gray-300 border border-gray-700">
                    #{{ __('PatientCare') }}
                </span>
                <span class="px-4 py-2 bg-gray-800/50 backdrop-blur-sm rounded-full text-sm font-medium text-gray-300 border border-gray-700">
                    #{{ __('Automation') }}
                </span>
                <span class="px-4 py-2 bg-gray-800/50 backdrop-blur-sm rounded-full text-sm font-medium text-gray-300 border border-gray-700">
                    #{{ __('HealthcareAI') }}
                </span>
            </div>
        </div>
    </section>

    {{-- Project Overview --}}
    <section class="py-12 md:py-20 px-4 sm:px-6 lg:px-8 bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white">
                    {{ __('PROJECT OVERVIEW') }}
                </h2>
            </div>

            <div class="bg-gray-800 rounded-2xl p-4 md:p-8 border border-gray-700">
                <p class="text-base md:text-lg text-gray-300 mb-8 leading-relaxed">
                    {{ __('A dental clinic operating primarily through phone communication sought to enhance patient experience and streamline operations. With a WordPress website lacking live chat capabilities and no integrated CRM or email marketing system, the clinic needed a modern solution to automate patient interactions, provide 24/7 information access, and efficiently manage appointment requests.') }}
                </p>

                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="p-4 md:p-6 rounded-xl bg-gradient-to-br to-blue-100/50 from-blue-950/30 to-blue-900/20 border border-blue-800">
                        <h3 class="text-lg font-bold text-white mb-4">{{ __('Research Context') }}</h3>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-beaker class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-white">{{ __('Project Type') }}:</span>
                                    <span class="text-gray-300 ml-2">{{ __('Technical Research & Proposed Solution') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-building-office class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-white">{{ __('Industry') }}:</span>
                                    <span class="text-gray-300 ml-2">{{ __('Dental Healthcare') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-clipboard-document-check class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-white">{{ __('Objective') }}:</span>
                                    <span class="text-gray-300 ml-2">{{ __('Automate patient communication and appointment management') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-cpu-chip class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-white">{{ __('Proposed Technology') }}:</span>
                                    <span class="text-gray-300 ml-2">{{ __('Custom AI Chatbot with Multi-Channel Integration') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 md:p-6 bg-blue-50 bg-blue-950/30 rounded-xl border border-blue-800">
                    <div class="flex items-start gap-3">
                        <x-heroicon-o-information-circle class="w-6 h-6 text-blue-400 flex-shrink-0 mt-0.5" />
                        <div>
                            <h4 class="font-bold text-white mb-2">{{ __('Important Note') }}</h4>
                            <p class="text-gray-300">{{ __('This case study represents a comprehensive technical research and proposed solution developed for a dental clinic. It showcases our methodology for analyzing business needs, identifying pain points, and designing AI-powered solutions tailored to healthcare environments.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- The Challenge --}}
    <section class="py-12 md:py-20 px-4 sm:px-6 lg:px-8 bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white">
                    {{ __('THE CHALLENGE') }}
                </h2>
            </div>

            <div class="bg-gradient-to-br from-gray-800 to-gray-900/20 rounded-2xl p-4 md:p-8 border border-gray-700">
                <p class="text-base md:text-lg text-gray-300 mb-6 leading-relaxed">
                    {{ __('Through our research, we identified several critical challenges facing the dental clinic:') }}
                </p>

                <h3 class="text-lg md:text-xl font-bold text-white mb-4">{{ __('Current Limitations') }}:</h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-300">{{ __('Communication limited primarily to phone calls during business hours') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-300">{{ __('WordPress website without live chat or interactive support features') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-300">{{ __('No organized CRM system for patient data management') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-300">{{ __('Absence of automated email marketing or patient communication system') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-300">{{ __('Manual handling of appointment requests and patient inquiries') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-300">{{ __('Limited ability to provide post-treatment care instructions proactively') }}</span>
                    </li>
                </ul>

                <p class="text-lg text-gray-300 mt-6 leading-relaxed">
                    {{ __('The clinic needed a solution that would provide immediate patient support, capture inquiries outside business hours, and establish a foundation for digital patient engagement — all while maintaining the personal, professional image essential to healthcare services.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- The Proposed Solution --}}
    <section class="py-12 md:py-20 px-4 sm:px-6 lg:px-8 bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white">
                    {{ __('THE PROPOSED SOLUTION') }}
                </h2>
            </div>

            <div class="bg-gray-800 rounded-2xl p-8 border border-gray-700 mb-8">
                <p class="text-base md:text-lg text-gray-300 mb-6 leading-relaxed">
                    {{ __('We proposed designing a comprehensive AI Assistant that would serve as a digital patient advisor and communication hub. Rather than a simple FAQ bot, this solution would provide meaningful dialogues, guide patients through their dental care journey, and seamlessly integrate with the clinic\'s operations.') }}
                </p>

                <div class="flex items-center gap-3 mb-6">
                    <x-heroicon-o-map class="w-6 h-6 text-blue-400" />
                    <h3 class="text-lg md:text-xl font-bold text-white">{{ __('Proposed Core Features') }}</h3>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <h4 class="font-semibold text-white">{{ __('Patient Communication') }}</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 bg-gray-900 rounded-lg">
                                <x-heroicon-o-chat-bubble-left-right class="w-5 h-5 text-blue-400" />
                                <span class="text-gray-300">{{ __('Interactive conversational chatbot') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-900 rounded-lg">
                                <x-heroicon-o-question-mark-circle class="w-5 h-5 text-blue-400" />
                                <span class="text-gray-300">{{ __('Treatment and procedure information') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-900 rounded-lg">
                                <x-heroicon-o-sparkles class="w-5 h-5 text-blue-400" />
                                <span class="text-gray-300">{{ __('Oral hygiene advice and tips') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-900 rounded-lg">
                                <x-heroicon-o-clipboard-document-list class="w-5 h-5 text-blue-400" />
                                <span class="text-gray-300">{{ __('Pre and post-treatment instructions') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h4 class="font-semibold text-white">{{ __('Appointment Management') }}</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 bg-gray-900 rounded-lg">
                                <x-heroicon-o-calendar class="w-5 h-5 text-blue-400" />
                                <span class="text-gray-300">{{ __('AI-driven appointment request capture') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-900 rounded-lg">
                                <x-heroicon-o-document-text class="w-5 h-5 text-blue-400" />
                                <span class="text-gray-300">{{ __('Symptom and need documentation') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-900 rounded-lg">
                                <x-heroicon-o-envelope class="w-5 h-5 text-blue-400" />
                                <span class="text-gray-300">{{ __('Automated confirmation messages') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-900 rounded-lg">
                                <x-heroicon-o-bell class="w-5 h-5 text-blue-400" />
                                <span class="text-gray-300">{{ __('Follow-up reminders') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-2xl p-4 md:p-8 border border-gray-700">
                <div class="flex items-center gap-3 mb-6">
                    <x-heroicon-o-cog class="w-6 h-6 text-blue-400" />
                    <h3 class="text-lg md:text-xl font-bold text-white">{{ __('Additional Proposed Capabilities') }}</h3>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="p-4 md:p-6 bg-gradient-to-br to-blue-100/50 from-blue-950/30 to-blue-900/20 rounded-xl border border-blue-800">
                        <x-heroicon-o-envelope-open class="w-8 h-8 text-blue-400 mb-3" />
                        <h4 class="font-bold text-white mb-2">{{ __('Email Marketing') }}</h4>
                        <p class="text-sm text-gray-300">{{ __('Patient email collection, automated newsletters, service updates, and promotional campaigns') }}</p>
                    </div>

                    <div class="p-4 md:p-6 bg-gradient-to-br to-violet-100/50 from-violet-950/30 to-violet-900/20 rounded-xl border border-violet-800">
                        <x-heroicon-o-megaphone class="w-8 h-8 text-violet-600 text-violet-400 mb-3" />
                        <h4 class="font-bold text-white mb-2">{{ __('Social Media Integration') }}</h4>
                        <p class="text-sm text-gray-300">{{ __('Connection with Facebook/Instagram for broader patient engagement and educational content distribution') }}</p>
                    </div>

                    <div class="p-4 md:p-6 bg-gradient-to-br from-teal-950/30 to-teal-900/20 rounded-xl border border-teal-800">
                        <x-heroicon-o-circle-stack class="w-8 h-8 text-teal-600 text-teal-400 mb-3" />
                        <h4 class="font-bold text-white mb-2">{{ __('Patient Database') }}</h4>
                        <p class="text-sm text-gray-300">{{ __('Secure data collection for basic CRM functionality and communication history tracking') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Technical Architecture --}}
    <section class="py-12 md:py-20 px-4 sm:px-6 lg:px-8 bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white">
                    {{ __('PROPOSED TECHNICAL ARCHITECTURE') }}
                </h2>
            </div>

            <div class="bg-gradient-to-br from-gray-800 to-gray-900/20 rounded-2xl p-4 md:p-8 border border-gray-700">
                <p class="text-base md:text-lg text-gray-300 mb-8 leading-relaxed">
                    {{ __('The proposed solution follows a modular architecture designed for scalability, maintainability, and easy integration with existing systems.') }}
                </p>

                <h3 class="text-lg md:text-xl font-bold text-white mb-6">{{ __('System Components') }}:</h3>

                <div class="space-y-6 mb-8">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <x-heroicon-o-globe-alt class="w-6 h-6 text-blue-400" />
                        </div>
                        <div>
                            <h4 class="font-bold text-white mb-2">{{ __('Frontend Interface') }}</h4>
                            <p class="text-gray-300">{{ __('Chat widget embedded in WordPress website with responsive design for desktop and mobile devices. Seamless integration maintaining the clinic\'s brand identity.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <x-heroicon-o-cpu-chip class="w-6 h-6 text-blue-400" />
                        </div>
                        <div>
                            <h4 class="font-bold text-white mb-2">{{ __('AI Engine & Orchestration') }}</h4>
                            <p class="text-gray-300">{{ __('Large Language Model (LLM) for natural language understanding, dialog flow management for structured conversations, and comprehensive knowledge base covering dental procedures, oral hygiene, and clinic services.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <x-heroicon-o-puzzle-piece class="w-6 h-6 text-blue-400" />
                        </div>
                        <div>
                            <h4 class="font-bold text-white mb-2">{{ __('Integration Layer') }}</h4>
                            <p class="text-gray-300">{{ __('API connections with email marketing platforms (Mailchimp/Moosend), calendar/booking system integration, and social media channel connectivity.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <x-heroicon-o-shield-check class="w-6 h-6 text-blue-400" />
                        </div>
                        <div>
                            <h4 class="font-bold text-white mb-2">{{ __('Data Storage & Security') }}</h4>
                            <p class="text-gray-300">{{ __('Secure database for storing appointment requests, patient emails, and communication logs with GDPR compliance. Custom monitoring dashboard for tracking interactions and performance metrics.') }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 md:p-6 bg-blue-50 bg-blue-950/30 rounded-xl border border-blue-800">
                    <h4 class="font-bold text-white mb-3">{{ __('Proposed Technology Stack') }}:</h4>
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <x-heroicon-o-check class="w-4 h-4 text-blue-400" />
                            <span>OpenAI / GPT API</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <x-heroicon-o-check class="w-4 h-4 text-blue-400" />
                            <span>Voiceflow / Botpress</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <x-heroicon-o-check class="w-4 h-4 text-blue-400" />
                            <span>WordPress Plugin</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <x-heroicon-o-check class="w-4 h-4 text-blue-400" />
                            <span>Mailchimp / Moosend</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <x-heroicon-o-check class="w-4 h-4 text-blue-400" />
                            <span>Firebase / MySQL</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <x-heroicon-o-check class="w-4 h-4 text-blue-400" />
                            <span>RESTful APIs</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <x-heroicon-o-check class="w-4 h-4 text-blue-400" />
                            <span>Social Media APIs</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <x-heroicon-o-check class="w-4 h-4 text-blue-400" />
                            <span>Custom Dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Expected Benefits --}}
    <section class="py-12 md:py-20 px-4 sm:px-6 lg:px-8 bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white">
                    {{ __('EXPECTED BENEFITS') }}
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gradient-to-br to-blue-100/50 from-blue-950/30 to-blue-900/20 rounded-2xl p-4 md:p-8 border border-blue-800">
                    <x-heroicon-o-clock class="w-12 h-12 text-blue-400 mb-4" />
                    <h3 class="text-lg md:text-xl font-bold text-white mb-2">{{ __('Time Savings') }}</h3>
                    <p class="text-gray-300">{{ __('Automated responses to common questions, freeing staff for complex patient needs') }}</p>
                </div>

                <div class="bg-gradient-to-br to-violet-100/50 from-violet-950/30 to-violet-900/20 rounded-2xl p-4 md:p-8 border border-violet-800">
                    <x-heroicon-o-face-smile class="w-12 h-12 text-violet-600 text-violet-400 mb-4" />
                    <h3 class="text-lg md:text-xl font-bold text-white mb-2">{{ __('Better Patient Experience') }}</h3>
                    <p class="text-gray-300">{{ __('24/7 support availability, clear pre/post-treatment instructions, immediate information access') }}</p>
                </div>

                <div class="bg-gradient-to-br from-teal-950/30 to-teal-900/20 rounded-2xl p-4 md:p-8 border border-teal-800">
                    <x-heroicon-o-arrow-trending-up class="w-12 h-12 text-teal-600 text-teal-400 mb-4" />
                    <h3 class="text-lg md:text-xl font-bold text-white mb-2">{{ __('Increased Engagement') }}</h3>
                    <p class="text-gray-300">{{ __('Regular updates about services, educational content, promotional offers, and health tips') }}</p>
                </div>

                <div class="bg-gradient-to-br to-blue-100/50 from-blue-950/30 to-blue-900/20 rounded-2xl p-4 md:p-8 border border-blue-800">
                    <x-heroicon-o-building-office-2 class="w-12 h-12 text-blue-400 mb-4" />
                    <h3 class="text-lg md:text-xl font-bold text-white mb-2">{{ __('Professional Image') }}</h3>
                    <p class="text-gray-300">{{ __('Modern, technology-forward clinic demonstrating innovation and patient care commitment') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-12 md:py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-xl md:text-2xl lg:text-4xl font-bold text-white mb-6">
                {{ __('Need a Custom AI Solution for Your Business?') }}
            </h2>
            <p class="text-sm md:text-base lg:text-xl text-white/90 mb-8">
                {{ __('We specialize in researching, designing, and implementing AI assistants tailored to your industry and specific challenges') }}
            </p>
            <a href="{{ localized_route('contact') }}" class="inline-block px-8 py-4 text-lg font-semibold text-blue-600 bg-white rounded-lg hover:bg-gray-100 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                {{ __('Discuss Your Project') }}
            </a>
        </div>
    </section>
@endsection

