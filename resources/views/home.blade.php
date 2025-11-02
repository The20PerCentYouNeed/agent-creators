@extends('layouts.app')

@section('content')
    <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
        {{-- Background Gradient & Animated Blobs --}}
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-violet-50 to-pink-50 dark:from-gray-900
        dark:via-blue-950 dark:to-violet-950 opacity-50"></div>
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/20 dark:bg-blue-600/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-violet-400/20 dark:bg-violet-600/10 rounded-full blur-3xl animate-pulse delay-1000"></div>

        <div class="relative max-w-7xl mx-auto text-center">
            <div class="inline-flex items-center space-x-2 px-4 py-2 bg-blue-100 dark:bg-blue-950/50
            rounded-full mb-8 border border-blue-200 dark:border-blue-800">
                <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
                <span class="text-xs md:text-sm font-medium text-blue-900 dark:text-blue-300">
                    {{ __('Transform Your Business with AI') }}
                </span>
            </div>

            <h1 class="text-4xl md:text-7xl font-bold mb-6 leading-tight">
                <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">
                    {{ __('Custom AI Agents') }}
                </span>
                <br>
                <span class="text-gray-900 dark:text-white">
                    {{ __('Built for Your Business') }}
                </span>
            </h1>

            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-12 max-w-3xl mx-auto">
                {{ __('Automate workflows, enhance customer service, and scale operations with intelligent AI agents tailored to your specific needs.') }}
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
                <a href="{{ localized_route('contact') }}" class="px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r
                from-blue-600 to-violet-600 rounded-lg hover:from-blue-700 hover:to-violet-700 transition-all
                shadow-xl shadow-blue-500/25 hover:shadow-2xl hover:shadow-blue-500/40 hover:-translate-y-0.5 cursor-pointer">
                    {{ __('Start Your AI Journey') }}
                </a>
                <a href="#process" class="px-8 py-4 text-lg font-semibold text-gray-700 dark:text-gray-200
                bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all
                border border-gray-200 dark:border-gray-700 shadow-lg cursor-pointer">
                    {{ __('Explore Solutions') }}
                </a>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-arrow-trending-up class="w-10 h-10 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">+40%</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('Increase in Productivity') }}</div>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-currency-dollar class="w-10 h-10 text-violet-600 dark:text-violet-400" />
                    </div>
                    <div class="text-4xl font-bold text-violet-600 dark:text-violet-400 mb-2">-30%</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('Operating Cost') }}</div>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-chat-bubble-left-right class="w-10 h-10 text-pink-600 dark:text-pink-400" />
                    </div>
                    <div class="text-4xl font-bold text-pink-600 dark:text-pink-400 mb-2">+60%</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('Improvement of Customer Experience') }}</div>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-arrow-path class="w-10 h-10 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">24/7</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('Automated Support') }}</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="services" class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
                    {{ __('Our Services') }}
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    {{ __('Everything you need to automate and scale your business operations') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div class="p-8 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-950/30
                dark:to-blue-900/20 border border-blue-200 dark:border-blue-800 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-6">
                        <x-heroicon-o-chat-bubble-left-right class="w-6 h-6 text-white" />
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                        {{ __('Intelligent Conversations') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ __('Natural language processing that understands context and delivers human-like interactions with your customers.') }}
                    </p>
                </div>
                {{-- Feature 2 --}}
                <div class="p-8 rounded-2xl bg-gradient-to-br from-violet-50 to-violet-100/50 dark:from-violet-950/30
                dark:to-violet-900/20 border border-violet-200 dark:border-violet-800 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-12 h-12 bg-violet-600 rounded-lg flex items-center justify-center mb-6">
                        <x-heroicon-o-cog-6-tooth class="w-6 h-6 text-white" />
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                        {{ __('Workflow Automation') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ __('Automate repetitive tasks and streamline complex processes to boost productivity and reduce operational costs.') }}
                    </p>
                </div>
                {{-- Feature 3 --}}
                <div class="p-8 rounded-2xl bg-gradient-to-br from-pink-50 to-pink-100/50 dark:from-pink-950/30
                dark:to-pink-900/20 border border-pink-200 dark:border-pink-800 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-12 h-12 bg-pink-600 rounded-lg flex items-center justify-center mb-6">
                        <x-heroicon-o-chart-bar class="w-6 h-6 text-white" />
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                        {{ __('Real-time Analytics') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ __('Get instant insights into performance metrics, customer interactions, and business outcomes with advanced analytics.') }}
                    </p>
                </div>
                {{-- Feature 4 --}}
                <div class="p-8 rounded-2xl bg-gradient-to-br from-emerald-50 to-emerald-100/50 dark:from-emerald-950/30
                dark:to-emerald-900/20 border border-emerald-200 dark:border-emerald-800 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center mb-6">
                        <x-heroicon-o-lock-closed class="w-6 h-6 text-white" />
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                        {{ __('Enterprise Security') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ __('Bank-level encryption and compliance with industry standards to keep your data secure and protected.') }}
                    </p>
                </div>
                {{-- Feature 5 --}}
                <div class="p-8 rounded-2xl bg-gradient-to-br from-amber-50 to-amber-100/50 dark:from-amber-950/30
                dark:to-amber-900/20 border border-amber-200 dark:border-amber-800 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-12 h-12 bg-amber-600 rounded-lg flex items-center justify-center mb-6">
                        <x-heroicon-o-squares-2x2 class="w-6 h-6 text-white" />
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                        {{ __('Easy Integration') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ __('Seamlessly connect with your existing tools and platforms through our comprehensive API and webhooks.') }}
                    </p>
                </div>
                {{-- Feature 6 --}}
                <div class="p-8 rounded-2xl bg-gradient-to-br from-indigo-50 to-indigo-100/50 dark:from-indigo-950/30
                dark:to-indigo-900/20 border border-indigo-200 dark:border-indigo-800 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-6">
                        <x-heroicon-o-language class="w-6 h-6 text-white" />
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                        {{ __('Multi-language Support') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ __('Communicate with customers globally in their preferred language with our multilingual AI agents.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Industries Section --}}
    <section id="solutions" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
                    {{ __('Solutions for Every Industry') }}
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    {{ __('Custom AI agents designed for your specific business needs') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Solution 1 --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 md:p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all">
                    <div class="flex flex-row items-center space-x-4 mb-6">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-blue-600 to-violet-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-user class="w-6 h-6 sm:w-8 sm:h-8 text-white" />
                        </div>
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">
                            {{ __('Customer Support Agent') }}
                        </h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        {{ __('Provide instant, 24/7 customer support with AI agents that understand context, resolve issues, and escalate complex cases to human agents when needed.') }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('Instant response times') }}
                        </li>
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('Multi-channel integration') }}
                        </li>
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('Personalized responses') }}
                        </li>
                    </ul>
                </div>
                {{-- Solution 2 --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 md:p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all">
                    <div class="flex flex-row items-center space-x-4 mb-6">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-violet-600 to-pink-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-chart-bar-square class="w-6 h-6 sm:w-8 sm:h-8 text-white" />
                        </div>
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">
                            {{ __('Sales Assistant') }}
                        </h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        {{ __('Qualify leads, schedule meetings, and nurture prospects automatically with AI that understands your sales process and customer journey.') }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('Lead qualification') }}
                        </li>
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('Automated follow-ups') }}
                        </li>
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('CRM integration') }}
                        </li>
                    </ul>
                </div>
                {{-- Solution 3 --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 md:p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all">
                    <div class="flex flex-row items-center space-x-4 mb-6">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-document-text class="w-6 h-6 sm:w-8 sm:h-8 text-white" />
                        </div>
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">
                            {{ __('Document Processing') }}
                        </h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        {{ __('Extract, analyze, and organize data from documents automatically. Process invoices, contracts, and reports with AI-powered accuracy.') }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('OCR & data extraction') }}
                        </li>
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('Intelligent classification') }}
                        </li>
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('99%+ accuracy') }}
                        </li>
                    </ul>
                </div>
                {{-- Solution 4 --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 md:p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all">
                    <div class="flex flex-row items-center space-x-4 mb-6">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-amber-600 to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-briefcase class="w-6 h-6 sm:w-8 sm:h-8 text-white" />
                        </div>
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">
                            {{ __('Business Operations') }}
                        </h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        {{ __('Streamline internal processes, automate reporting, and optimize resource allocation with intelligent workflow agents.') }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('Process automation') }}
                        </li>
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('Automated reporting') }}
                        </li>
                        <li class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-heroicon-o-check class="w-5 h-5 text-green-500 mr-3" />
                            {{ __('Smart scheduling') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section id="process" class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
                    {{ __('Our Process') }}
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    {{ __('From concept to deployment in four simple steps') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Step 1 --}}
                <div class="relative">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-violet-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <span class="text-2xl font-bold text-white">1</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                            {{ __('Discovery') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('We analyze your business needs, workflows, and identify automation opportunities.') }}
                        </p>
                    </div>
                </div>
                {{-- Step 2 --}}
                <div class="relative">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-violet-600 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <span class="text-2xl font-bold text-white">2</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                            {{ __('Design') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Our team designs custom AI agents tailored to your specific requirements and use cases.') }}
                        </p>
                    </div>
                </div>
                {{-- Step 3 --}}
                <div class="relative">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-pink-600 to-rose-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <span class="text-2xl font-bold text-white">3</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                            {{ __('Development') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('We build, train, and test your AI agents to ensure optimal performance and accuracy.') }}
                        </p>
                    </div>
                </div>
                {{-- Step 4 --}}
                <div class="relative">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <span class="text-2xl font-bold text-white">4</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                            {{ __('Deploy & Scale') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Launch your AI agents and scale seamlessly as your business grows with ongoing support.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Case Studies Section --}}
    <section id="case-studies" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
                    {{ __('Case Studies') }}
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    {{ __('Explore our AI-powered solutions and their impact') }}
                </p>
            </div>

            @php
                $caseStudies = config('case-studies');
            @endphp

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($caseStudies as $caseStudy)
                <a href="{{ localized_route('case-studies.' . $caseStudy['slug']) }}" class="group">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all hover:-translate-y-1 h-full flex flex-col">
                        <div class="mb-4">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                {{ __($caseStudy['category']) }}
                            </span>
                        </div>

                        @if($caseStudy['image_url'])
                        <div class="w-full lg:h-46 bg-gradient-to-br {{ $caseStudy['gradient'] }} rounded-lg mb-6 flex items-center justify-center overflow-hidden">
                            <picture>
                                <source srcset="{{ $caseStudy['image_url'] }}" type="image/webp">
                                <img src="{{ str_replace('.webp', '.jpg', $caseStudy['image_url']) }}" alt="{{ __($caseStudy['title']) }}" class="w-full h-full object-cover" loading="lazy">
                            </picture>
                        </div>
                        @else
                        <div class="w-full h-48 bg-gradient-to-br {{ $caseStudy['gradient'] }} rounded-lg mb-6 flex items-center justify-center">
                            <x-heroicon-o-sparkles class="w-16 h-16 text-white" />
                        </div>
                        @endif

                        @if($caseStudy['logo_url'])
                        <div class="flex justify-center mb-4">
                            <img src="{{ $caseStudy['logo_url'] }}" alt="{{ __($caseStudy['title']) }} logo" class="h-12">
                        </div>
                        @endif

                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            {{ __($caseStudy['title']) }}
                        </h3>

                        <p class="text-gray-600 dark:text-gray-400 flex-grow">
                            {{ __($caseStudy['description']) }}
                        </p>

                        <div class="mt-4 flex items-center text-blue-600 dark:text-blue-400 font-semibold">
                            <span class="mr-2">{{ __('Learn More') }}</span>
                            <x-heroicon-o-arrow-right class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" />
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section id="faq" class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold mb-3 text-gray-900 dark:text-white">
                    {{ __('Frequently Asked Questions') }}
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    {{ __('Everything you need to know about custom AI agents') }}
                </p>
            </div>

            <div class="grid lg:grid-cols-[5fr_7fr] gap-8 lg:items-start">
                {{-- Left Column: Branding Card --}}
                <div class="bg-gradient-to-br from-blue-600 via-violet-600 to-pink-600 rounded-2xl px-8 py-8
                text-white shadow-2xl flex flex-col justify-center lg:sticky lg:top-8 lg:self-start">
                    <div class="flex justify-center mb-6 md:mb-8">
                        <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center
                        backdrop-blur-sm">
                            <x-heroicon-o-bolt class="w-10 h-10" />
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-center mb-4 md:mb-6">
                        {{ __('Expert AI Solutions') }}
                    </h3>
                    <p class="text-base leading-relaxed text-white/90 text-center">
                        {{ __('We deliver cutting-edge custom AI agents that transform business operations. Our expert team harnesses the power of artificial intelligence to automate workflows, enhance decision-making, and drive measurable growth for enterprises across industries.') }}
                    </p>
                </div>

                {{-- Right Column: FAQ Accordion --}}
                <div class="space-y-3">
                    {{-- FAQ 1 --}}
                    <div x-data="{ active: false }" @click.outside="active = false" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200
                    dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all">
                        <button @click="active = !active" class="w-full px-6 py-4 flex justify-between items-center cursor-pointer
                        text-left focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="text-base font-bold text-gray-900 dark:text-white">
                                {{ __('What are custom AI agents?') }}
                            </span>
                            <x-heroicon-s-chevron-down
                                class="w-5 h-5 text-gray-500 dark:text-gray-400 shrink-0 ml-3 transition-transform duration-200"
                                x-bind:class="active ? 'rotate-180' : ''"
                            />
                        </button>
                        <div x-show="active" class="overflow-hidden">
                            <div class="px-6 pb-4 text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ __('Custom AI agents are intelligent software systems designed to perform specific business tasks autonomously. Unlike generic AI tools, they are tailored to your unique workflows, trained on your data, and integrated with your existing systems to deliver precise, context-aware solutions.') }}
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div x-data="{ active: false }" @click.outside="active = false" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200
                    dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all">
                        <button @click="active = !active" class="w-full px-6 py-4 flex justify-between items-center cursor-pointer
                        text-left focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="text-base font-bold text-gray-900 dark:text-white">
                                {{ __('How can AI agents improve my business?') }}
                            </span>
                            <x-heroicon-s-chevron-down
                                class="w-5 h-5 text-gray-500 dark:text-gray-400 shrink-0 ml-4 transition-transform duration-200"
                                x-bind:class="active ? 'rotate-180' : ''"
                            />
                        </button>
                        <div x-show="active" class="overflow-hidden">
                            <div class="px-6 pb-4 text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ __('AI agents automate repetitive tasks, process vast amounts of data in real-time, provide intelligent insights, enhance customer experiences 24/7, reduce operational costs, and enable your team to focus on strategic, high-value work. Many businesses see 30-70% efficiency improvements.') }}
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div x-data="{ active: false }" @click.outside="active = false" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200
                    dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all">
                        <button @click="active = !active" class="w-full px-6 py-4 flex justify-between items-center cursor-pointer
                        text-left focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="text-base font-bold text-gray-900 dark:text-white">
                                {{ __('What industries do you serve?') }}
                            </span>
                            <x-heroicon-s-chevron-down
                                class="w-5 h-5 text-gray-500 dark:text-gray-400 shrink-0 ml-4 transition-transform duration-200"
                                x-bind:class="active ? 'rotate-180' : ''"
                            />
                        </button>
                        <div x-show="active" class="overflow-hidden">
                            <div class="px-6 pb-4 text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ __('We work across numerous sectors including finance, healthcare, e-commerce, manufacturing, logistics, education, real estate, and professional services. Our solutions are tailored to each industry\'s specific requirements, regulatory compliance, and business objectives.') }}
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 4 --}}
                    <div x-data="{ active: false }" @click.outside="active = false" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200
                    dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all">
                        <button @click="active = !active" class="w-full px-6 py-4 flex justify-between items-center cursor-pointer
                        text-left focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="text-base font-bold text-gray-900 dark:text-white">
                                {{ __('Can AI agents integrate with our existing systems?') }}
                            </span>
                            <x-heroicon-s-chevron-down
                                class="w-5 h-5 text-gray-500 dark:text-gray-400 shrink-0 ml-4 transition-transform duration-200"
                                x-bind:class="active ? 'rotate-180' : ''"
                            />
                        </button>
                        <div x-show="active" class="overflow-hidden">
                            <div class="px-6 pb-4 text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ __('Absolutely. We specialize in seamless integration with your current infrastructure including CRMs, ERPs, databases, APIs, cloud services, and legacy systems. Our agents communicate through standard protocols, ensuring compatibility without disrupting your operations.') }}
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div x-data="{ active: false }" @click.outside="active = false" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200
                    dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all">
                        <button @click="active = !active" class="w-full px-6 py-4 flex justify-between items-center cursor-pointer
                        text-left focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="text-base font-bold text-gray-900 dark:text-white">
                                {{ __('How long does it take to deploy an AI agent?') }}
                            </span>
                            <x-heroicon-s-chevron-down
                                class="w-5 h-5 text-gray-500 dark:text-gray-400 shrink-0 ml-4 transition-transform duration-200"
                                x-bind:class="active ? 'rotate-180' : ''"
                            />
                        </button>
                        <div x-show="active" class="overflow-hidden">
                            <div class="px-6 pb-4 text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ __('Deployment timelines vary based on complexity, but most projects follow this schedule: Discovery & Design (2-3 weeks), Development & Training (4-8 weeks), Testing & Optimization (2 weeks), Deployment (1 week). Simpler agents can go live in 4-6 weeks, while enterprise solutions typically take 10-14 weeks.') }}
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div x-data="{ active: false }" @click.outside="active = false" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200
                    dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all">
                        <button @click="active = !active" class="w-full px-6 py-4 flex justify-between items-center cursor-pointer
                        text-left focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="text-base font-bold text-gray-900 dark:text-white">
                                {{ __('What support and maintenance do you provide?') }}
                            </span>
                            <x-heroicon-s-chevron-down
                                class="w-5 h-5 text-gray-500 dark:text-gray-400 shrink-0 ml-4 transition-transform duration-200"
                                x-bind:class="active ? 'rotate-180' : ''"
                            />
                        </button>
                        <div x-show="active" class="overflow-hidden">
                            <div class="px-6 pb-4 text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ __('We offer comprehensive support packages including 24/7 monitoring, regular updates, performance optimization, bug fixes, feature enhancements, and dedicated account management. Our SLA ensures 99.9% uptime and rapid response times for critical issues.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
