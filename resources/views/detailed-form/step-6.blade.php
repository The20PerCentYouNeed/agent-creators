@extends('detailed-form.layout', ['currentStep' => 6])

@section('form-content')
    <form method="POST" action="{{ route('detailed-form.step6.store') }}">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-bold text-white mb-4">
                {{ __('SECTION 6: Content & Operating Hours') }}
            </h3>
        </div>

        <div class="space-y-6">
            {{-- Ready Content --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('Do you have ready content available for email, chatbot or FAQ?') }}
                </label>
                <div class="space-y-3">
                    @foreach(['yes' => 'Ναι', 'no' => 'Όχι', 'partially' => 'Μερικώς', 'in_development' => 'Σε εξέλιξη'] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="radio"
                                name="ready_content"
                                value="{{ $value }}"
                                {{ old('ready_content', $data['ready_content'] ?? '') == $value ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('ready_content')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Operating Hours --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('What hours would you like the AI Agent to be active?') }}
                </label>
                <div class="space-y-3">
                    @foreach(['24_7' => '24/7', 'business_hours' => 'Καθημερινές εργάσιμες ώρες'] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="radio"
                                name="operating_hours"
                                value="{{ $value }}"
                                {{ old('operating_hours', $data['operating_hours'] ?? '') == $value ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('operating_hours')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-between">
            <a
                href="{{ route('detailed-form.step5.show') }}"
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

