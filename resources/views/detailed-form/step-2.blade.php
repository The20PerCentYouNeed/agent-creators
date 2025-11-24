@extends('detailed-form.layout', ['currentStep' => 2])

@section('form-content')
    <form method="POST" action="{{ route('detailed-form.step2.store') }}">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-bold text-white mb-4">
                {{ __('SECTION 2: Website Platform') }}
            </h3>
        </div>

        <div class="space-y-6">
            {{-- Platform Selection --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('On which platform is your website built?') }}
                </label>
                <div class="space-y-3">
                    @foreach(['wordpress' => 'WordPress', 'shopify' => 'Shopify', 'custom' => 'Custom / από προγραμματιστή', 'wix' => 'Wix', 'other' => 'Άλλο'] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="radio"
                                name="platform"
                                value="{{ $value }}"
                                {{ old('platform', $data['platform'] ?? '') == $value ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('platform')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Live Chat Availability --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('Does any live chat tool already exist on your site?') }}
                </label>
                <div class="space-y-3">
                    @foreach(['yes' => 'Ναι', 'no' => 'Όχι', 'unknown' => 'Δεν γνωρίζω'] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="radio"
                                name="has_live_chat"
                                value="{{ $value }}"
                                {{ old('has_live_chat', $data['has_live_chat'] ?? '') == $value ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('has_live_chat')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-between">
            <a
                href="{{ route('detailed-form.step1.show') }}"
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

