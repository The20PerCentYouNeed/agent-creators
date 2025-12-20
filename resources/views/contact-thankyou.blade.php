@extends('layouts.app')

@section('content')
    {{-- Thank You Section --}}
    <section class="min-h-screen py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 relative overflow-hidden flex items-center">
        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-[-8rem] left-[-4rem] w-[28rem] h-[28rem] bg-blue-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-10rem] right-[-6rem] w-[32rem] h-[32rem] bg-violet-500/25 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-4xl mx-auto text-center">
            {{-- Success Icon --}}
            <div class="mb-8 flex justify-center mt-4">
                    <x-heroicon-o-check-circle class="w-16 h-16 text-green-400" />
            </div>

            {{-- Thank You Message --}}
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                {{ __('Thank You!') }}
            </h1>
            <p class="text-xl md:text-2xl text-slate-200 mb-8 leading-relaxed max-w-2xl mx-auto">
                {{ __('We\'ve received your request and our team will contact you within 24 hours.') }}
            </p>

            {{-- Additional Information --}}
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 shadow-2xl mb-10 max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold text-white mb-6">
                    {{ __('What Happens Next?') }}
                </h2>

                <div class="space-y-6 text-left">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-blue-300 font-bold">1</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white mb-1">
                                {{ __('Review Your Request') }}
                            </h3>
                            <p class="text-slate-300 text-sm">
                                {{ __('Our team will carefully review your project requirements and goals.') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-violet-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-violet-300 font-bold">2</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white mb-1">
                                {{ __('Personalized Consultation') }}
                            </h3>
                            <p class="text-slate-300 text-sm">
                                {{ __('We\'ll reach out to schedule a free consultation to discuss your AI needs.') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-green-300 font-bold">3</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white mb-1">
                                {{ __('Custom Proposal') }}
                            </h3>
                            <p class="text-slate-300 text-sm">
                                {{ __('You\'ll receive a tailored solution proposal with timeline and pricing.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Information --}}
            <div class="mb-10">
                <p class="text-slate-300 mb-6">
                    {{ __('Need immediate assistance? Feel free to reach out directly:') }}
                </p>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="mailto:{{ config('mail.from.address') }}" class="inline-flex items-center space-x-2 px-6 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg text-blue-200 hover:text-white hover:bg-white/20 transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span>{{ config('mail.from.address') }}</span>
                    </a>

                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('home') }}" class="px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-blue-600 to-violet-600 rounded-lg hover:from-blue-700 hover:to-violet-700 hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-blue-500/20 hover:shadow-xl hover:shadow-blue-500/30">
                    {{ __('Return to Homepage') }}
                </a>

                <a href="{{ route('contact') }}" class="px-8 py-4 text-lg font-semibold text-white bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg hover:bg-white/20 hover:-translate-y-0.5 transition-all duration-200">
                    {{ __('Submit Another Request') }}
                </a>
            </div>
        </div>
    </section>
@endsection

