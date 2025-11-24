@extends('detailed-form.layout', ['currentStep' => 5])

@section('form-content')
    <form method="POST" action="{{ route('detailed-form.step5.store') }}">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-bold text-white mb-4">
                {{ __('SECTION 5: Email Marketing') }}
            </h3>
        </div>

        <div class="space-y-6">
            {{-- Email Marketing Platform --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('Do you use any platform for email marketing?') }}
                </label>
                <div class="space-y-3">
                    @foreach(['mailchimp' => 'Mailchimp', 'moosend' => 'Moosend', 'klaviyo' => 'Klaviyo', 'no' => 'Όχι', 'other' => 'Άλλο'] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="radio"
                                name="email_platform"
                                value="{{ $value }}"
                                {{ old('email_platform', $data['email_platform'] ?? '') == $value ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('email_platform')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email Types to Automate --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('What types of emails would you like to automate?') }}
                </label>
                <div class="space-y-3">
                    @foreach([
                        'order_confirmation' => 'Email επιβεβαίωσης παραγγελίας',
                        'shipping_tracking' => 'Email αποστολής / tracking',
                        'follow_up' => 'Follow-up emails (ευχαριστήριο, υπενθύμιση κριτικής)',
                        'newsletters' => 'Newsletter ή προσφορές',
                        'other' => 'Άλλο'
                    ] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="checkbox"
                                name="email_types[]"
                                value="{{ $value }}"
                                {{ in_array($value, old('email_types', $data['email_types'] ?? [])) ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 rounded focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white text-sm">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('email_types')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-between">
            <a
                href="{{ route('detailed-form.step4.show') }}"
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

