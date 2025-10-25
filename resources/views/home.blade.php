@extends('layouts.app')

@section('content')
<section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-violet-50 to-pink-50 dark:from-gray-900 dark:via-blue-950 dark:to-violet-950 opacity-50"></div>

    <!-- Animated Blobs -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/20 dark:bg-blue-600/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-violet-400/20 dark:bg-violet-600/10 rounded-full blur-3xl animate-pulse delay-1000"></div>

    <div class="relative max-w-7xl mx-auto text-center">
        <div class="inline-flex items-center space-x-2 px-4 py-2 bg-blue-100 dark:bg-blue-950/50 rounded-full mb-8 border border-blue-200 dark:border-blue-800">
            <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
            <span class="text-sm font-medium text-blue-900 dark:text-blue-300">{{ __('Transform Your Business with AI') }}</span>
        </div>

        <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
            <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">{{ __('Custom AI Agents') }}</span>
            <br>
            <span class="text-gray-900 dark:text-white">{{ __('Built for Your Business') }}</span>
        </h1>

        <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-12 max-w-3xl mx-auto">
            {{ __('Automate workflows, enhance customer service, and scale operations with intelligent AI agents tailored to your specific needs.') }}
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
            <a href="#contact" class="px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-blue-600 to-violet-600 rounded-lg hover:from-blue-700 hover:to-violet-700 transition-all shadow-xl shadow-blue-500/25 hover:shadow-2xl hover:shadow-blue-500/40 hover:-translate-y-0.5 cursor-pointer">
                {{ __('Start Your AI Journey') }}
            </a>
            <a href="#solutions" class="px-8 py-4 text-lg font-semibold text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all border border-gray-200 dark:border-gray-700 shadow-lg cursor-pointer">
                {{ __('Explore Solutions') }}
            </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">50+</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('AI Agents Deployed') }}</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-violet-600 dark:text-violet-400 mb-2">95%</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('Client Satisfaction') }}</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-pink-600 dark:text-pink-400 mb-2">24/7</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('Automated Support') }}</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">70%</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('Cost Reduction') }}</div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('Powerful AI Capabilities') }}</h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">{{ __('Everything you need to automate and scale your business operations') }}</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="p-8 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-950/30 dark:to-blue-900/20 border border-blue-200 dark:border-blue-800 hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Intelligent Conversations') }}</h3>
                <p class="text-gray-600 dark:text-gray-400">{{ __('Natural language processing that understands context and delivers human-like interactions with your customers.') }}</p>
            </div>

            <!-- Feature 2 -->
            <div class="p-8 rounded-2xl bg-gradient-to-br from-violet-50 to-violet-100/50 dark:from-violet-950/30 dark:to-violet-900/20 border border-violet-200 dark:border-violet-800 hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-12 h-12 bg-violet-600 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Workflow Automation') }}</h3>
                <p class="text-gray-600 dark:text-gray-400">{{ __('Automate repetitive tasks and streamline complex processes to boost productivity and reduce operational costs.') }}</p>
            </div>

            <!-- Feature 3 -->
            <div class="p-8 rounded-2xl bg-gradient-to-br from-pink-50 to-pink-100/50 dark:from-pink-950/30 dark:to-pink-900/20 border border-pink-200 dark:border-pink-800 hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-12 h-12 bg-pink-600 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Real-time Analytics') }}</h3>
                <p class="text-gray-600 dark:text-gray-400">{{ __('Get instant insights into performance metrics, customer interactions, and business outcomes with advanced analytics.') }}</p>
            </div>

            <!-- Feature 4 -->
            <div class="p-8 rounded-2xl bg-gradient-to-br from-emerald-50 to-emerald-100/50 dark:from-emerald-950/30 dark:to-emerald-900/20 border border-emerald-200 dark:border-emerald-800 hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Enterprise Security') }}</h3>
                <p class="text-gray-600 dark:text-gray-400">{{ __('Bank-level encryption and compliance with industry standards to keep your data secure and protected.') }}</p>
            </div>

            <!-- Feature 5 -->
            <div class="p-8 rounded-2xl bg-gradient-to-br from-amber-50 to-amber-100/50 dark:from-amber-950/30 dark:to-amber-900/20 border border-amber-200 dark:border-amber-800 hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-12 h-12 bg-amber-600 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Easy Integration') }}</h3>
                <p class="text-gray-600 dark:text-gray-400">{{ __('Seamlessly connect with your existing tools and platforms through our comprehensive API and webhooks.') }}</p>
            </div>

            <!-- Feature 6 -->
            <div class="p-8 rounded-2xl bg-gradient-to-br from-indigo-50 to-indigo-100/50 dark:from-indigo-950/30 dark:to-indigo-900/20 border border-indigo-200 dark:border-indigo-800 hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Multi-language Support') }}</h3>
                <p class="text-gray-600 dark:text-gray-400">{{ __('Communicate with customers globally in their preferred language with our multilingual AI agents.') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Solutions Section -->
<section id="solutions" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('Solutions for Every Industry') }}</h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">{{ __('Custom AI agents designed for your specific business needs') }}</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Solution 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-violet-600 rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('Customer Support Agent') }}</h3>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    {{ __('Provide instant, 24/7 customer support with AI agents that understand context, resolve issues, and escalate complex cases to human agents when needed.') }}
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Instant response times') }}
                    </li>
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Multi-channel integration') }}
                    </li>
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Personalized responses') }}
                    </li>
                </ul>
            </div>

            <!-- Solution 2 -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-violet-600 to-pink-600 rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('Sales Assistant') }}</h3>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    {{ __('Qualify leads, schedule meetings, and nurture prospects automatically with AI that understands your sales process and customer journey.') }}
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Lead qualification') }}
                    </li>
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Automated follow-ups') }}
                    </li>
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('CRM integration') }}
                    </li>
                </ul>
            </div>

            <!-- Solution 3 -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('Document Processing') }}</h3>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    {{ __('Extract, analyze, and organize data from documents automatically. Process invoices, contracts, and reports with AI-powered accuracy.') }}
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('OCR & data extraction') }}
                    </li>
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Intelligent classification') }}
                    </li>
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('99%+ accuracy') }}
                    </li>
                </ul>
            </div>

            <!-- Solution 4 -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-600 to-orange-600 rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('Business Operations') }}</h3>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    {{ __('Streamline internal processes, automate reporting, and optimize resource allocation with intelligent workflow agents.') }}
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Process automation') }}
                    </li>
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Automated reporting') }}
                    </li>
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Smart scheduling') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section id="process" class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('How It Works') }}</h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">{{ __('From concept to deployment in four simple steps') }}</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="relative">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-violet-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">1</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Discovery') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ __('We analyze your business needs, workflows, and identify automation opportunities.') }}</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-violet-600 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">2</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Design') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ __('Our team designs custom AI agents tailored to your specific requirements and use cases.') }}</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-600 to-rose-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Development') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ __('We build, train, and test your AI agents to ensure optimal performance and accuracy.') }}</p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="relative">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">4</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('Deploy & Scale') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ __('Launch your AI agents and scale seamlessly as your business grows with ongoing support.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('Trusted by Leading Companies') }}</h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">{{ __('See what our clients say about their AI transformation') }}</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    "{{ __('The AI agent reduced our customer support costs by 65% while improving response times. It\'s been a game-changer for our business.') }}"
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                        SM
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 dark:text-white">Sarah Mitchell</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('CEO, TechCorp') }}</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    "{{ __('Implementation was seamless and the results exceeded our expectations. Our sales team now focuses on high-value activities.') }}"
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-violet-600 to-pink-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                        JC
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 dark:text-white">James Chen</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('VP Sales, InnovateLab') }}</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    "{{ __('Outstanding support and incredibly powerful AI capabilities. The ROI was evident within the first month of deployment.') }}"
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                        EP
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 dark:text-white">Emily Parker</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('COO, GrowthHub') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl animate-pulse delay-1000"></div>
    </div>

    <div class="relative max-w-4xl mx-auto text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white">{{ __('Ready to Transform Your Business?') }}</h2>
        <p class="text-xl text-blue-100 mb-12 max-w-2xl mx-auto">
            {{ __('Join hundreds of companies already using AI agents to automate workflows and scale operations.') }}
        </p>

        <!-- Lead Capture Form -->
        <div class="max-w-3xl mx-auto mb-12" x-data="leadForm()">
            <form @submit.prevent="submitForm" class="bg-white/10 backdrop-blur-lg rounded-2xl p-10 border border-white/20 shadow-2xl">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-white mb-2">{{ __('Get Started Today') }}</h3>
                    <p class="text-blue-100">{{ __('Fill out the form below and our team will contact you within 24 hours') }}</p>
                </div>

                <!-- Success Message -->
                <div x-show="success" x-transition class="mb-6 p-4 bg-green-500/20 border border-green-400/30 rounded-lg text-green-100 text-center">
                    <div class="flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ __('We\'ll get back to you soon!') }}</span>
                    </div>
                </div>

                <!-- Error Message -->
                <div x-show="error" x-transition class="mb-6 p-4 bg-red-500/20 border border-red-400/30 rounded-lg text-red-100 text-center">
                    <span x-text="errorMessage"></span>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Full Name -->
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-white mb-2">
                            {{ __('Full Name') }} <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="text"
                            id="full_name"
                            x-model="form.full_name"
                            class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                            :class="{ 'border-red-400': errors.full_name }"
                            placeholder="{{ __('Enter your full name') }}"
                            required
                        >
                        <p x-show="errors.full_name" x-text="errors.full_name" class="mt-1 text-sm text-red-300"></p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-2">
                            {{ __('Email Address') }} <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            x-model="form.email"
                            class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                            :class="{ 'border-red-400': errors.email }"
                            placeholder="{{ __('Enter your email address') }}"
                            required
                        >
                        <p x-show="errors.email" x-text="errors.email" class="mt-1 text-sm text-red-300"></p>
                    </div>

                    <!-- Company Name -->
                    <div>
                        <label for="company" class="block text-sm font-medium text-white mb-2">
                            {{ __('Company Name') }} <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="text"
                            id="company"
                            x-model="form.company"
                            class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                            :class="{ 'border-red-400': errors.company }"
                            placeholder="{{ __('Enter your company name') }}"
                            required
                        >
                        <p x-show="errors.company" x-text="errors.company" class="mt-1 text-sm text-red-300"></p>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-white mb-2">
                            {{ __('Phone Number') }}
                        </label>
                        <input
                            type="tel"
                            id="phone"
                            x-model="form.phone"
                            class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                            :class="{ 'border-red-400': errors.phone }"
                            placeholder="{{ __('Enter your phone number') }}"
                        >
                        <p x-show="errors.phone" x-text="errors.phone" class="mt-1 text-sm text-red-300"></p>
                    </div>

                    <!-- Business Size -->
                    <div>
                        <label for="business_size" class="block text-sm font-medium text-white mb-2">
                            {{ __('Business Size') }}
                        </label>
                        <div class="relative text-center">
                            <select
                                id="business_size"
                                x-model="form.business_size"
                                class="form-input w-full px-4 py-3 pr-10 bg-white/20 border border-white/30 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all appearance-none"
                            >
                                <option value="" class="bg-gray-800 text-white">{{ __('Select business size') }}</option>
                                <option value="small" class="bg-gray-800 text-white">{{ __('Small (1-10 employees)') }}</option>
                                <option value="medium" class="bg-gray-800 text-white">{{ __('Medium (11-50 employees)') }}</option>
                                <option value="large" class="bg-gray-800 text-white">{{ __('Large (51-200 employees)') }}</option>
                                <option value="enterprise" class="bg-gray-800 text-white">{{ __('Enterprise (200+ employees)') }}</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Industry -->
                    <div>
                        <label for="industry" class="block text-sm font-medium text-white mb-2">
                            {{ __('Industry') }}
                        </label>
                        <div class="relative">
                            <select
                                id="industry"
                                x-model="form.industry"
                                class="form-input w-full px-4 py-3 pr-10 bg-white/20 border border-white/30 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all appearance-none"
                            >
                                <option value="" class="bg-gray-800 text-white">{{ __('Select industry') }}</option>
                                <option value="technology" class="bg-gray-800 text-white">{{ __('Technology') }}</option>
                                <option value="healthcare" class="bg-gray-800 text-white">{{ __('Healthcare') }}</option>
                                <option value="finance" class="bg-gray-800 text-white">{{ __('Finance') }}</option>
                                <option value="ecommerce" class="bg-gray-800 text-white">{{ __('E-commerce') }}</option>
                                <option value="education" class="bg-gray-800 text-white">{{ __('Education') }}</option>
                                <option value="manufacturing" class="bg-gray-800 text-white">{{ __('Manufacturing') }}</option>
                                <option value="other" class="bg-gray-800 text-white">{{ __('Other') }}</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Description -->
                <div class="mt-6">
                    <label for="project_description" class="block text-sm font-medium text-white mb-2">
                        {{ __('Tell us about your project') }}
                    </label>
                    <textarea
                        id="project_description"
                        x-model="form.project_description"
                        rows="4"
                        class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all resize-none"
                        placeholder="{{ __('Describe your project requirements and goals...') }}"
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <div class="mt-8 text-center">
                    <button
                        type="submit"
                        :disabled="loading"
                        class="w-full md:w-auto px-12 py-4 text-lg font-semibold text-blue-600 bg-white rounded-lg hover:bg-gray-50 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5 disabled:opacity-50 cursor-pointer disabled:cursor-not-allowed disabled:transform-none"
                    >
                        <span x-show="!loading">{{ __('Submit Request') }}</span>
                        <span x-show="loading" class="flex items-center justify-center space-x-2">
                            <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>{{ __('Submitting...') }}</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-8 text-white/80 text-sm">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ __('No credit card required') }}</span>
            </div>
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ __('14-day free trial') }}</span>
            </div>
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ __('Setup in minutes') }}</span>
            </div>
        </div>
    </div>
</section>
@endsection
