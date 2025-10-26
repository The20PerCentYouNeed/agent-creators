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
                    {{ $caseStudy->category }}
                </span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">
                    {{ $caseStudy->title }}
                </span>
            </h1>

            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 max-w-4xl">
                {{ $caseStudy->description }}
            </p>
        </div>
    </section>

    {{-- Featured Image --}}
    @if($caseStudy->image_url || $caseStudy->logo_url)
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            @if($caseStudy->image_url)
            <div class="w-full h-96 bg-gradient-to-br from-blue-600 to-violet-600 rounded-2xl overflow-hidden">
                <img src="{{ $caseStudy->image_url }}" alt="{{ $caseStudy->title }}" class="w-full h-full object-cover">
            </div>
            @else
            <div class="w-full h-96 bg-gradient-to-br from-blue-600 to-violet-600 rounded-2xl flex items-center justify-center">
                <x-heroicon-o-sparkles class="w-32 h-32 text-white" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Full Description --}}
    @if($caseStudy->full_description)
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">
                {{ __('Overview') }}
            </h2>
            <div class="prose prose-lg dark:prose-invert max-w-none">
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                    {{ $caseStudy->full_description }}
                </p>
            </div>
        </div>
    </section>
    @endif

    {{-- Key Features --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-12 text-center text-gray-900 dark:text-white">
                {{ __('Key Features') }}
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-6 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-950/30 dark:to-blue-900/20 border border-blue-200 dark:border-blue-800">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <x-heroicon-o-sparkles class="w-6 h-6 text-white" />
                    </div>
                    <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">{{ __('AI-Powered') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ __('Leveraging cutting-edge artificial intelligence for optimal performance') }}</p>
                </div>

                <div class="p-6 rounded-xl bg-gradient-to-br from-violet-50 to-violet-100/50 dark:from-violet-950/30 dark:to-violet-900/20 border border-violet-200 dark:border-violet-800">
                    <div class="w-12 h-12 bg-violet-600 rounded-lg flex items-center justify-center mb-4">
                        <x-heroicon-o-rocket-launch class="w-6 h-6 text-white" />
                    </div>
                    <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">{{ __('Performance') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ __('Designed for speed, efficiency, and scalability') }}</p>
                </div>

                <div class="p-6 rounded-xl bg-gradient-to-br from-pink-50 to-pink-100/50 dark:from-pink-950/30 dark:to-pink-900/20 border border-pink-200 dark:border-pink-800">
                    <div class="w-12 h-12 bg-pink-600 rounded-lg flex items-center justify-center mb-4">
                        <x-heroicon-o-user-group class="w-6 h-6 text-white" />
                    </div>
                    <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">{{ __('User-Friendly') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ __('Intuitive interface designed for seamless user experience') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Call to Action --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-600 to-violet-600 dark:from-blue-700 dark:to-violet-700">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white">
                {{ __('Want to Build Your Own AI Solution?') }}
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                {{ __('Let\'s discuss how we can help transform your business with custom AI agents') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ localized_route('contact') }}" class="px-8 py-4 text-lg font-semibold text-blue-600 bg-white rounded-lg hover:bg-gray-50 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                    {{ __('Get Started') }}
                </a>
                <a href="{{ localized_route('case-studies.index') }}" class="px-8 py-4 text-lg font-semibold text-white bg-transparent border-2 border-white rounded-lg hover:bg-white/10 transition-all">
                    {{ __('View More Case Studies') }}
                </a>
            </div>
        </div>
    </section>
@endsection
