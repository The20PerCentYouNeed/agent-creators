@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-br from-blue-50 via-violet-50 to-pink-50 dark:from-gray-900 dark:via-blue-950 dark:to-violet-950">
        <div class="absolute inset-0 opacity-50">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/20 dark:bg-blue-600/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-violet-400/20 dark:bg-violet-600/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto text-center">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                <span class="text-white">
                    {{ __('Case Studies') }}
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                {{ __('Explore our AI-powered solutions and their impact') }}
            </p>
        </div>
    </section>

    {{-- Case Studies Grid --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($caseStudies as $caseStudy)
                <a href="{{ localized_route('case-studies.ai-' . $caseStudy['slug']) }}" class="group">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all hover:-translate-y-1 h-full flex flex-col">
                        <div class="mb-4">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                {{ $caseStudy['category'] }}
                            </span>
                        </div>

                        @if($caseStudy['image_url'])
                        <div class="w-full h-48 bg-gradient-to-br {{ $caseStudy['gradient'] }} rounded-lg mb-6 flex items-center justify-center overflow-hidden">
                            <img src="{{ $caseStudy['image_url'] }}" alt="{{ $caseStudy['title'] }}" class="w-full h-full object-cover">
                        </div>
                        @else
                        <div class="w-full h-48 bg-gradient-to-br {{ $caseStudy['gradient'] }} rounded-lg mb-6 flex items-center justify-center">
                            <x-heroicon-o-sparkles class="w-16 h-16 text-white" />
                        </div>
                        @endif

                        @if($caseStudy['logo_url'])
                        <div class="flex justify-center mb-4">
                            <img src="{{ $caseStudy['logo_url'] }}" alt="{{ $caseStudy['title'] }} logo" class="h-12">
                        </div>
                        @endif

                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            {{ $caseStudy['title'] }}
                        </h3>

                        <p class="text-gray-600 dark:text-gray-400 flex-grow">
                            {{ $caseStudy['description'] }}
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
@endsection
