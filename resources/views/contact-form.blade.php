@extends('layouts.app')

@section('content')
    {{-- CTA Section --}}
    <section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden">
        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="relative max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white">
                {{ __('Ready to Transform Your Business?') }}
            </h2>
            <p class="text-xl text-blue-100 mb-12 max-w-2xl mx-auto">
                {{ __('Join hundreds of companies already using AI agents to automate workflows and scale operations.') }}
            </p>

            {{-- Lead Capture Form --}}
            <div class="max-w-3xl mx-auto mb-12" x-data="leadForm()">
                <form @submit.prevent="submitForm" class="bg-white/10 backdrop-blur-lg rounded-2xl p-10 border border-white/20 shadow-2xl">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-white mb-2">
                            {{ __('Get Started Today') }}
                        </h3>
                        <p class="text-blue-100">
                            {{ __('Fill out the form below and our team will contact you within 24 hours') }}
                        </p>
                    </div>
                    {{-- Success Message --}}
                    <div x-show="success" x-transition class="mb-6 p-4 bg-green-500/20 border border-green-400/30 rounded-lg text-green-100 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <x-heroicon-o-check class="w-5 h-5" />
                            <span>{{ __('We\'ll get back to you soon!') }}</span>
                        </div>
                    </div>
                    {{-- Error Message --}}
                    <div x-show="error" x-transition class="mb-6 p-4 bg-red-500/20 border border-red-400/30 rounded-lg text-red-100 text-center">
                        <span x-text="errorMessage"></span>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        {{-- Full Name --}}
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-white mb-2">
                                {{ __('Full Name') }} <span class="text-red-400">*</span>
                            </label>
                            <input
                                type="text"
                                id="full_name"
                                x-model="form.full_name"
                                class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg
                                text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                                :class="{ 'border-red-400': errors.full_name }"
                                placeholder="{{ __('Enter your full name') }}"
                                required
                            >
                            <p x-show="errors.full_name" x-text="errors.full_name" class="mt-1 text-sm text-red-300"></p>
                        </div>
                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-2">
                                {{ __('Email Address') }} <span class="text-red-400">*</span>
                            </label>
                            <input
                                type="email"
                                id="email"
                                x-model="form.email"
                                class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white
                                placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                                :class="{ 'border-red-400': errors.email }"
                                placeholder="{{ __('Enter your email address') }}"
                                required
                            >
                            <p x-show="errors.email" x-text="errors.email" class="mt-1 text-sm text-red-300"></p>
                        </div>
                        {{-- Company Name --}}
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
                        {{-- Phone --}}
                        <div>
                            <label for="phone" class="block text-sm font-medium text-white mb-2">
                                {{ __('Phone Number') }}
                            </label>
                            <input
                                type="tel"
                                id="phone"
                                x-model="form.phone"
                                class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg
                                text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all"
                                :class="{ 'border-red-400': errors.phone }"
                                placeholder="{{ __('Enter your phone number') }}"
                            >
                            <p x-show="errors.phone" x-text="errors.phone" class="mt-1 text-sm text-red-300"></p>
                        </div>
                        {{-- Business Size --}}
                        <div>
                            <label for="business_size" class="block text-sm font-medium text-white mb-2">
                                {{ __('Business Size') }}
                            </label>
                            <div class="relative text-center">
                                <select
                                    id="business_size"
                                    x-model="form.business_size"
                                    class="form-input w-full px-4 py-3 pr-10 bg-white/20 border border-white/30 rounded-lg
                                    text-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all appearance-none"
                                >
                                    <option value="" class="bg-gray-800 text-white">{{ __('Select business size') }}</option>
                                    <option value="small" class="bg-gray-800 text-white">{{ __('Small (1-10 employees)') }}</option>
                                    <option value="medium" class="bg-gray-800 text-white">{{ __('Medium (11-50 employees)') }}</option>
                                    <option value="large" class="bg-gray-800 text-white">{{ __('Large (51-200 employees)') }}</option>
                                    <option value="enterprise" class="bg-gray-800 text-white">{{ __('Enterprise (200+ employees)') }}</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <x-heroicon-s-chevron-down class="w-5 h-5 text-white/60" />
                                </div>
                            </div>
                        </div>
                        {{-- Industry --}}
                        <div>
                            <label for="industry" class="block text-sm font-medium text-white mb-2">
                                {{ __('Industry') }}
                            </label>
                            <div class="relative">
                                <select
                                    id="industry"
                                    x-model="form.industry"
                                    class="form-input w-full px-4 py-3 pr-10 bg-white/20 border border-white/30 rounded-lg
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
                                    <x-heroicon-s-chevron-down class="w-5 h-5 text-white/60" />
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Project Description --}}
                    <div class="mt-6">
                        <label for="project_description" class="block text-sm font-medium text-white mb-2">
                            {{ __('Tell us about your project') }}
                        </label>
                        <textarea
                            id="project_description"
                            x-model="form.project_description"
                            rows="4"
                            class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white
                            placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all resize-none"
                            placeholder="{{ __('Describe your project requirements and goals...') }}"
                        ></textarea>
                    </div>
                    {{-- Submit Button --}}
                    <div class="mt-8 text-center">
                        <button
                            type="submit"
                            :disabled="loading"
                            class="w-full md:w-auto px-12 py-4 text-lg font-semibold text-blue-600 bg-white rounded-lg
                            hover:bg-gray-50 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5 disabled:opacity-50
                            cursor-pointer disabled:cursor-not-allowed disabled:transform-none"
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
                    <x-heroicon-o-check class="w-5 h-5" />
                    <span>{{ __('No credit card required') }}</span>
                </div>
                <div class="flex items-center space-x-2">
                    <x-heroicon-o-check class="w-5 h-5" />
                    <span>{{ __('14-day free trial') }}</span>
                </div>
                <div class="flex items-center space-x-2">
                    <x-heroicon-o-check class="w-5 h-5" />
                    <span>{{ __('Setup in minutes') }}</span>
                </div>
            </div>
        </div>
    </section>
@endsection
