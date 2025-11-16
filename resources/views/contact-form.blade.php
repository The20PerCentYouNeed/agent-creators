@extends('layouts.app')

@section('content')
    {{-- CTA Section --}}
    <section id="contact" class="py-30 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 relative overflow-hidden">
        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-[-8rem] left-[-4rem] w-[28rem] h-[28rem] bg-blue-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-10rem] right-[-6rem] w-[32rem] h-[32rem] bg-violet-500/25 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto">
            {{-- Two-Column Layout --}}
            <div class="grid lg:grid-cols-2 gap-10 items-start">

                {{-- Left Column: Content --}}
                <div class="text-white">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">
                        {{ __('Ready to Transform Your Business?') }}
                    </h1>
                    <p class="text-lg md:text-xl text-slate-200 mb-6 leading-relaxed">
                        {{ __('Join hundreds of companies already using AI agents to automate workflows and scale operations.') }}
                    </p>

                    {{-- Key Benefits --}}
                    <div class="space-y-4 mb-6">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                <x-heroicon-o-check class="w-5 h-5 text-white" />
                            </div>
                            <div>
                                <h3 class="text-base font-semibold mb-0.5">{{ __('Custom AI Solutions') }}</h3>
                                <p class="text-blue-100 text-sm">{{ __('Tailored to your specific business needs and workflows') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                <x-heroicon-o-check class="w-5 h-5 text-white" />
                            </div>
                            <div>
                                <h3 class="text-base font-semibold mb-0.5">{{ __('Expert Team') }}</h3>
                                <p class="text-blue-100 text-sm">{{ __('Work with experienced AI developers and consultants') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                <x-heroicon-o-check class="w-5 h-5 text-white" />
                            </div>
                            <div>
                                <h3 class="text-base font-semibold mb-0.5">{{ __('Fast Deployment') }}</h3>
                                <p class="text-blue-100 text-sm">{{ __('Get your AI agents up and running in weeks, not months') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Contact Information --}}
                    <div class="border-t border-white/10 pt-6 mt-6">
                        <h3 class="text-base font-semibold text-white mb-4">{{ __('Get in Touch') }}</h3>
                        <div class="space-y-3 text-slate-200">
                            {{-- Email --}}
                            <a href="mailto:info@eliaskalyvas.gr" class="flex items-center space-x-3 text-blue-100 hover:text-white transition-colors group">
                                <div class="flex-shrink-0 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center group-hover:bg-white/30 transition-colors">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                </div>
                                <span class="text-sm md:text-base">info@eliaskalyvas.gr</span>
                            </a>

                            {{-- Website --}}
                            <a href="https://www.eliaskalyvas.gr" target="_blank" rel="noopener noreferrer" class="flex items-center space-x-3 text-blue-100 hover:text-white transition-colors group">
                                <div class="flex-shrink-0 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center group-hover:bg-white/30 transition-colors">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.513-.737.85.242.266.36.539.435.806.071.264.145.597.293 1.095.073.25.061.535.093.777.029.249.077.485.14.707.044.152.096.29.142.407.047.113.09.198.121.261.033.063.052.097.057.104L10 12.5a8 8 0 01-4.084-1.936 6.003 6.003 0 01.837-4.118A8 8 0 0110 2z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span class="text-sm md:text-base">www.eliaskalyvas.gr</span>
                            </a>

                            {{-- Location --}}
                            <div class="flex items-center space-x-3 text-blue-100">
                                <div class="flex-shrink-0 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span class="text-sm md:text-base">{{ __('Athens, Greece') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Form --}}
                <div class="w-full" x-data="leadForm()">
                    <form @submit.prevent="submitForm" class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-2xl">
                        <div class="mb-5">
                            <h2 class="text-xl font-bold text-white mb-1">
                                {{ __('Get Started Today') }}
                            </h2>
                            <p class="text-blue-100 text-sm">
                                {{ __('Fill out the form below and our team will contact you within 24 hours') }}
                            </p>
                        </div>

                        {{-- Success Message --}}
                        <div x-show="success" x-transition class="mb-5 p-3 bg-green-500/20 border border-green-400/30 rounded-lg text-green-100 text-center text-sm">
                            <div class="flex items-center justify-center space-x-2">
                                <x-heroicon-o-check class="w-4 h-4" />
                                <span>{{ __('We\'ll get back to you soon!') }}</span>
                            </div>
                        </div>

                        {{-- Error Message --}}
                        <div x-show="error" x-transition class="mb-5 p-3 bg-red-500/20 border border-red-400/30 rounded-lg text-red-100 text-center text-sm">
                            <span x-text="errorMessage"></span>
                        </div>

                        <div class="space-y-5">
                            {{-- Row 1: Full Name and Email --}}
                            <div class="grid md:grid-cols-2 gap-5">
                                {{-- Full Name --}}
                                <div>
                                    <label for="full_name" class="block text-sm font-medium text-white mb-1.5">
                                        {{ __('Full Name') }} <span class="text-red-400">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="full_name"
                                        x-model="form.full_name"
                                        class="form-input w-full px-3 py-2.5 bg-white/20 border border-white/30 rounded-lg text-sm
                                        text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                                        :class="{ 'border-red-400': errors.full_name }"
                                        placeholder="{{ __('Enter your full name') }}"
                                        required
                                    >
                                    <p x-show="errors.full_name" x-text="errors.full_name" class="mt-1 text-xs text-red-300"></p>
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="block text-sm font-medium text-white mb-1.5">
                                        {{ __('Email Address') }} <span class="text-red-400">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        x-model="form.email"
                                        class="form-input w-full px-3 py-2.5 bg-white/20 border border-white/30 rounded-lg text-sm text-white
                                        placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                                        :class="{ 'border-red-400': errors.email }"
                                        placeholder="{{ __('Enter your email address') }}"
                                        required
                                    >
                                    <p x-show="errors.email" x-text="errors.email" class="mt-1 text-xs text-red-300"></p>
                                </div>
                            </div>

                            {{-- Row 2: Company Name and Phone --}}
                            <div class="grid md:grid-cols-2 gap-5">
                                {{-- Company Name --}}
                                <div>
                                    <label for="company" class="block text-sm font-medium text-white mb-1.5">
                                        {{ __('Company Name') }} <span class="text-red-400">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="company"
                                        x-model="form.company"
                                        class="form-input w-full px-3 py-2.5 bg-white/20 border border-white/30 rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                                        :class="{ 'border-red-400': errors.company }"
                                        placeholder="{{ __('Enter your company name') }}"
                                        required
                                    >
                                    <p x-show="errors.company" x-text="errors.company" class="mt-1 text-xs text-red-300"></p>
                                </div>

                                {{-- Phone --}}
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-white mb-1.5">
                                        {{ __('Phone Number') }}
                                    </label>
                                    <input
                                        type="tel"
                                        id="phone"
                                        x-model="form.phone"
                                        class="form-input w-full px-3 py-2.5 bg-white/20 border border-white/30 rounded-lg text-sm
                                        text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                                        :class="{ 'border-red-400': errors.phone }"
                                        placeholder="{{ __('Enter your phone number') }}"
                                    >
                                    <p x-show="errors.phone" x-text="errors.phone" class="mt-1 text-xs text-red-300"></p>
                                </div>
                            </div>

                            {{-- Business Size & Industry Row --}}
                            <div class="grid md:grid-cols-2 gap-5">
                                {{-- Business Size --}}
                                <div>
                                    <label for="business_size" class="block text-sm font-medium text-white mb-1.5">
                                        {{ __('Business Size') }}
                                    </label>
                                    <div class="relative">
                                        <select
                                            id="business_size"
                                            x-model="form.business_size"
                                            class="form-input w-full px-3 py-2.5 pr-10 bg-white/20 border border-white/30 rounded-lg text-sm
                                            text-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all appearance-none"
                                        >
                                            <option value="" class="bg-gray-800 text-white">{{ __('Select business size') }}</option>
                                            <option value="small" class="bg-gray-800 text-white">{{ __('Small (1-10 employees)') }}</option>
                                            <option value="medium" class="bg-gray-800 text-white">{{ __('Medium (11-50 employees)') }}</option>
                                            <option value="large" class="bg-gray-800 text-white">{{ __('Large (51-200 employees)') }}</option>
                                            <option value="enterprise" class="bg-gray-800 text-white">{{ __('Enterprise (200+ employees)') }}</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <x-heroicon-s-chevron-down class="w-4 h-4 text-white/60" />
                                        </div>
                                    </div>
                                </div>

                                {{-- Industry --}}
                                <div>
                                    <label for="industry" class="block text-sm font-medium text-white mb-1.5">
                                        {{ __('Industry') }}
                                    </label>
                                    <div class="relative">
                                        <select
                                            id="industry"
                                            x-model="form.industry"
                                            class="form-input w-full px-3 py-2.5 pr-10 bg-white/20 border border-white/30 rounded-lg text-sm
                                            text-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all appearance-none"
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
                                            <x-heroicon-s-chevron-down class="w-4 h-4 text-white/60" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Project Description --}}
                            <div>
                                <label for="project_description" class="block text-sm font-medium text-white mb-1.5">
                                    {{ __('Tell us about your project') }}
                                </label>
                                <textarea
                                    id="project_description"
                                    x-model="form.project_description"
                                    rows="2"
                                    class="h-24 form-input w-full px-3 py-2.5 bg-white/20 border border-white/30 rounded-lg text-sm text-white
                                    placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all resize-none"
                                    placeholder="{{ __('Describe your project requirements and goals...') }}"
                                ></textarea>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="mt-5 flex justify-center">
                            <button
                                type="submit"
                                :disabled="loading"
                                class="px-10 py-4 text-lg font-semibold text-white bg-gradient-to-r from-blue-600/80 to-violet-600/80 backdrop-blur-sm  rounded-lg
                                hover:from-blue-600 hover:to-violet-600 hover:border-blue-400/50 hover:-translate-y-0.5 transition-all duration-200
                                shadow-lg shadow-blue-500/20 hover:shadow-xl hover:shadow-blue-500/30
                                disabled:opacity-50 cursor-pointer disabled:cursor-not-allowed disabled:hover:-translate-y-0"
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
            </div>
        </div>
    </section>
@endsection
