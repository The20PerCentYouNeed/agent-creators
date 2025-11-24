@extends('detailed-form.layout', ['currentStep' => 4])

@section('form-content')
    <form method="POST" action="{{ route('detailed-form.step4.store') }}">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-bold text-white mb-4">
                {{ __('SECTION 4: Role & Functions of AI Assistant') }}
            </h3>
        </div>

        <div class="space-y-6">
            {{-- AI Assistant Functions --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('What would you like the AI Assistant to do?') }}
                </label>
                <div class="space-y-3">
                    @foreach([
                        'faq' => 'Απαντήσεις σε συχνές ερωτήσεις (FAQ)',
                        'product_info' => 'Πληροφορίες προϊόντων / υπηρεσιών',
                        'order_updates' => 'Ενημέρωση για παραγγελίες ή αποστολές',
                        'abandoned_cart' => 'Υπενθύμιση καλαθιού / abandoned cart',
                        'payment_issues' => 'Υποστήριξη σε θέματα πληρωμών ή τιμολογίων',
                        'live_chat_support' => 'Υποστήριξη παραγγελιών μέσω chat',
                        'event_promotion' => 'Παραπομπή σε εκπρόσωπο (ανθρώπινη εξυπηρέτηση)',
                        'newsletter' => 'Προώθηση ενεργειών marketing / newsletters',
                        'other' => 'Άλλο'
                    ] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="checkbox"
                                name="functions[]"
                                value="{{ $value }}"
                                {{ in_array($value, old('functions', $data['functions'] ?? [])) ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 rounded focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white text-sm">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('functions')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Additional Details --}}
            <div>
                <label for="additional_details" class="block text-sm font-medium text-white mb-3">
                    {{ __('If you would like something else or need to clarify the above, please elaborate:') }}
                </label>
                <textarea
                    id="additional_details"
                    name="additional_details"
                    rows="5"
                    class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                    placeholder="{{ __('Additional details...') }}"
                >{{ old('additional_details', $data['additional_details'] ?? '') }}</textarea>
                @error('additional_details')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-between">
            <a
                href="{{ route('detailed-form.step3.show') }}"
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

