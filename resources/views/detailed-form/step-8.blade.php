@extends('detailed-form.layout', ['currentStep' => 8])

@section('form-content')
    <form method="POST" action="{{ route('detailed-form.step8.store') }}">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-bold text-white mb-4">
                {{ __('SECTION 8: Technical Communication') }}
            </h3>
        </div>

        <div class="space-y-6">
            {{-- Website Manager --}}
            <div>
                <label for="website_manager" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Who manages your website?') }}
                </label>
                <input
                    type="text"
                    id="website_manager"
                    name="website_manager"
                    value="{{ old('website_manager', $data['website_manager'] ?? '') }}"
                    class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                    placeholder="{{ __('Person or company name') }}"
                >
                @error('website_manager')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Technical Person Available --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('Is the same person also responsible for technical matters?') }}
                </label>
                <div class="space-y-3">
                    @foreach(['yes' => 'Ναι', 'no' => 'Όχι'] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="radio"
                                name="technical_person"
                                value="{{ $value }}"
                                {{ old('technical_person', $data['technical_person'] ?? '') == $value ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('technical_person')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Social Media / Email Manager --}}
            <div>
                <label for="social_manager" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Do you have a manager for social media or email marketing?') }}
                </label>
                <input
                    type="text"
                    id="social_manager"
                    name="social_manager"
                    value="{{ old('social_manager', $data['social_manager'] ?? '') }}"
                    class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                    placeholder="{{ __('Person or company name (optional)') }}"
                >
                @error('social_manager')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-between">
            <a
                href="{{ route('detailed-form.step7.show') }}"
                class="px-8 py-3 text-base font-semibold text-white bg-white/10 border border-white/20 rounded-lg hover:bg-white/20 hover:-translate-y-0.5 transition-all duration-200"
            >
                {{ __('Back') }}
            </a>
            <button
                type="submit"
                class="px-8 py-3 text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-violet-600 rounded-lg hover:from-blue-700 hover:to-violet-700 hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-blue-500/20 hover:shadow-xl hover:shadow-blue-500/30 cursor-pointer"
            >
                {{ __('Next') }}
            </button>
        </div>
    </form>
@endsection

