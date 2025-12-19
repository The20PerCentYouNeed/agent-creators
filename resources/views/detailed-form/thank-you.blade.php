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
                {{ __('Thank You for Your Detailed Responses!') }}
            </h1>
            <p class="text-xl md:text-2xl text-slate-200 mb-8 leading-relaxed max-w-2xl mx-auto">
                {{ __('We\'ve received your comprehensive questionnaire and our team will carefully review your requirements to design the perfect AI Assistant solution for your business.') }}
            </p>

            {{-- Additional Information --}}
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 shadow-2xl mb-10 max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold text-white mb-6">
                    {{ __('What Happens Next?') }}
                </h2>

                <div class="space-y-6 text-left">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-blue-300 font-bold">1</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white mb-1">
                                {{ __('Detailed Analysis') }}
                            </h3>
                            <p class="text-slate-300 text-sm">
                                {{ __('Our AI specialists will thoroughly analyze your responses to understand your business needs, workflows, and integration requirements.') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-violet-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-violet-300 font-bold">2</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white mb-1">
                                {{ __('Custom Solution Design') }}
                            </h3>
                            <p class="text-slate-300 text-sm">
                                {{ __('We\'ll create a tailored AI Assistant architecture specifically designed for your platform, communication channels, and business objectives.') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-green-300 font-bold">3</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white mb-1">
                                {{ __('Detailed Proposal') }}
                            </h3>
                            <p class="text-slate-300 text-sm">
                                {{ __('Within 48-72 hours, you\'ll receive a comprehensive proposal including technical specifications, timeline, implementation plan, and pricing.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Information --}}
            <div class="mb-10">
                <p class="text-slate-300 mb-6">
                    {{ __('Have questions in the meantime? We\'re here to help:') }}
                </p>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="mailto:{{ config('mail.from.address') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg text-blue-200 hover:text-white hover:bg-white/20 transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span>{{ config('mail.from.address') }}</span>
                    </a>

                    <a href="https://www.eliaskalyvas.gr" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg text-blue-200 hover:text-white hover:bg-white/20 transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.513-.737.85.242.266.36.539.435.806.071.264.145.597.293 1.095.073.25.061.535.093.777.029.249.077.485.14.707.044.152.096.29.142.407.047.113.09.198.121.261.033.063.052.097.057.104L10 12.5a8 8 0 01-4.084-1.936 6.003 6.003 0 01.837-4.118A8 8 0 0110 2z" clip-rule="evenodd"/>
                        </svg>
                        <span>www.eliaskalyvas.gr</span>
                    </a>
                </div>
            </div>

            {{-- Action Button --}}
            <div class="flex justify-center">
                <a href="{{ route('home') }}" class="px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-blue-600 to-violet-600 rounded-lg hover:from-blue-700 hover:to-violet-700 hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-blue-500/20 hover:shadow-xl hover:shadow-blue-500/30">
                    {{ __('Return to Homepage') }}
                </a>
            </div>
        </div>
    </section>
@endsection

