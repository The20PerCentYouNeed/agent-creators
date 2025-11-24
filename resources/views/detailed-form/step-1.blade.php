@extends('detailed-form.layout', ['currentStep' => 1])

@section('form-content')
    <form method="POST" action="{{ route('detailed-form.step1.store') }}">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-bold text-white mb-2">
                {{ __('Specifications for AI Assistant') }}
            </h3>
            <p class="text-slate-300 text-sm">
                {{ __('The questionnaire will help us understand the needs and flows of your business, so we can design an Assistant tailored to your goals and systems. Please fill in the questions carefully. Note that mandatory fields are only in Section 1. In the following sections answer only the questions regarding the design of the AI assistant.') }}
            </p>
        </div>

        {{-- Global Error Message --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/20 border border-red-400/30 rounded-lg text-red-100 text-sm">
                <div class="flex items-start gap-3">
                    <x-heroicon-o-exclamation-circle class="w-5 h-5 shrink-0 mt-0.5" />
                    <div>
                        <p class="font-semibold mb-1">{{ __('Please correct the following errors:') }}</p>
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="space-y-5">
            {{-- Full Name --}}
            <div>
                <label for="full_name" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Full Name') }} <span class="text-red-400">*</span>
                </label>
                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    required
                    value="{{ old('full_name', $data['full_name'] ?? '') }}"
                    class="form-input w-full px-4 py-3 bg-white/20 border rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('full_name') border-red-400 @else border-white/30 @enderror"
                    placeholder="{{ __('Enter your full name') }}"
                    required
                >
                @error('full_name')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Email') }} <span class="text-red-400">*</span>
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    value="{{ old('email', $data['email'] ?? '') }}"
                    class="form-input w-full px-4 py-3 bg-white/20 border rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('email') border-red-400 @else border-white/30 @enderror"
                    placeholder="{{ __('Enter your email address') }}"
                    required
                >
                @error('email')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Company/Business Name --}}
            <div>
                <label for="company" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Company/Business Name') }} <span class="text-red-400">*</span>
                </label>
                <input
                    type="text"
                    id="company"
                    name="company"
                    required
                    value="{{ old('company', $data['company'] ?? '') }}"
                    class="form-input w-full px-4 py-3 bg-white/20 border rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('company') border-red-400 @else border-white/30 @enderror"
                    placeholder="{{ __('Enter your company name') }}"
                    required
                >
                @error('company')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contact Phone --}}
            <div>
                <label for="phone" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Contact Phone') }} <span class="text-red-400">*</span>
                </label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    required
                    value="{{ old('phone', $data['phone'] ?? '') }}"
                    class="form-input w-full px-4 py-3 bg-white/20 border rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('phone') border-red-400 @else border-white/30 @enderror"
                    placeholder="{{ __('Enter your phone number') }}"
                    required
                >
                @error('phone')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Website / Social Media --}}
            <div>
                <label for="website_social" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Website / Social Media of Business') }} <span class="text-red-400">*</span>
                </label>
                <input
                    type="url"
                    id="website_social"
                    name="website_social"
                    required
                    value="{{ old('website_social', $data['website_social'] ?? '') }}"
                    class="form-input w-full px-4 py-3 bg-white/20 border rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('website_social') border-red-400 @else border-white/30 @enderror"
                    placeholder="{{ __('https://example.com') }}"
                    required
                >
                @error('website_social')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Industry Sector --}}
            <div>
                <label for="industry" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Industry Sector') }} <span class="text-red-400">*</span>
                </label>
                <input
                    type="text"
                    id="industry"
                    name="industry"
                    required
                    value="{{ old('industry', $data['industry'] ?? '') }}"
                    class="form-input w-full px-4 py-3 bg-white/20 border rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('industry') border-red-400 @else border-white/30 @enderror"
                    placeholder="{{ __('e.g., E-commerce, Healthcare, Education') }}"
                    required
                >
                @error('industry')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-end">
            <button
                type="submit"
                class="px-8 py-3 text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-violet-600 rounded-lg hover:from-blue-700 hover:to-violet-700 hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-blue-500/20 hover:shadow-xl hover:shadow-blue-500/30 cursor-pointer"
            >
                {{ __('Next') }}
            </button>
        </div>
    </form>
@endsection

