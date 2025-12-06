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
                    {{ __('Careers') }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="bg-green-900/30 border border-green-600 rounded-lg p-4">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-green-200 text-base md:text-lg">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    {{-- Content Section --}}
    <section class="pb-16 md:pb-20 px-4 sm:px-6 lg:px-8 mt-10">
        <div class="max-w-4xl mx-auto space-y-8 md:space-y-12">

            {{-- Careers Introduction --}}
            <div class="bg-gradient-to-br from-blue-950/30 to-violet-950/30 rounded-2xl p-6 md:p-8 border border-blue-800 shadow-lg">
                <p class="text-base md:text-lg text-gray-300 leading-relaxed mb-4">
                    {{ __('We are developing an international team of creators, consultants, and AI builders.') }}
                </p>
                <p class="text-base md:text-lg text-gray-300 leading-relaxed">
                    {{ __('If you combine technology with pedagogical thinking or strategy, you might belong to the next generation of our partners.') }}
                </p>
            </div>

            {{-- Open Positions Section --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-8 md:mb-10">

                {{-- Section Header with Icon --}}
                <div class="flex items-center space-x-3 md:space-x-4 mb-6">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h2 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('Open Positions:') }}
                    </h2>
                </div>

                {{-- Positions List --}}
                <div class="space-y-4 ml-2 md:ml-6">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                        </svg>
                        <p class="text-base md:text-lg text-gray-300">
                            AI Assistant Designer
                        </p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                        </svg>
                        <p class="text-base md:text-lg text-gray-300">
                            Content Strategist / Learning Architect
                        </p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                        </svg>
                        <p class="text-base md:text-lg text-gray-300">
                            Business Development Specialist
                        </p>
                    </div>
                </div>
            </div>

            {{-- CV Upload Section --}}
            <div class="relative">
                <hr class="border-t-2 border-gray-700 mb-8 md:mb-10">

                {{-- Section Header with Icon --}}
                <div class="flex items-center space-x-3 md:space-x-4 mb-6">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-violet-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"/>
                            <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl md:text-3xl font-bold text-white">
                        {{ __('Apply Now') }}
                    </h2>
                </div>

                {{-- CV Upload Form --}}
                <form action="{{ route('careers.cv.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 ml-2 md:ml-6">
                    @csrf
                    @honeypot

                    {{-- Full Name --}}
                    <div>
                        <label for="full_name" class="block text-sm md:text-base font-medium text-gray-300 mb-2">
                            {{ __('Full Name') }} <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                            id="full_name"
                            name="full_name"
                            value="{{ old('full_name') }}"
                            class="w-full px-4 py-3 bg-gray-900/50 border rounded-lg
                            text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="{{ __('Enter your full name') }}"
                            required>
                        @error('full_name')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm md:text-base font-medium text-gray-300 mb-2">
                            {{ __('Email Address') }} <span class="text-red-400">*</span>
                        </label>
                        <input type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full px-4 py-3 bg-gray-900/50 border rounded-lg text-white placeholder-gray-500
                            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="{{ __('your.email@example.com') }}"
                            required>
                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label for="phone" class="block text-sm md:text-base font-medium text-gray-300 mb-2">
                            {{ __('Phone Number') }}
                        </label>
                        <input type="tel"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="w-full px-4 py-3 bg-gray-900/50 border rounded-lg
                            text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500
                            focus:border-transparent transition-all"
                            placeholder="{{ __('69********') }}">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CV File Upload --}}
                    <div>
                        <label for="cv_file" class="block text-sm md:text-base font-medium text-gray-300 mb-2">
                            {{ __('Upload CV') }} <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input type="file"
                                id="cv_file"
                                name="cv_file"
                                accept=".pdf,.doc,.docx"
                                class="w-full px-4 py-3 bg-gray-900/50 border rounded-lg
                                text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg
                                file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white
                                hover:file:bg-blue-700 file:cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500
                                focus:border-transparent transition-all"
                                required>
                        </div>
                        <p class="mt-2 text-xs md:text-sm text-gray-400">
                            {{ __('Accepted formats: PDF, DOC, DOCX. Max size: 10MB') }}
                        </p>
                        @error('cv_file')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="inline-block px-6 py-3 md:px-8 md:py-4 text-base
                            md:text-lg font-semibold text-white bg-gradient-to-r
                            from-blue-600 to-violet-600 rounded-lg hover:from-blue-700
                            hover:to-violet-700 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5 cursor-pointer">
                            {{ __('Submit Application') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
