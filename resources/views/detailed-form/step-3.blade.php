@extends('detailed-form.layout', ['currentStep' => 3])

@section('form-content')
    <form method="POST" action="{{ route('detailed-form.step3.store') }}">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-bold text-white mb-4">
                {{ __('SECTION 3: Communication Channels') }}
            </h3>
        </div>

        <div class="space-y-6">
            {{-- Communication Channels --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('Through which channels do your customers communicate with you today?') }}
                </label>
                <div class="space-y-3">
                    @foreach(['email' => 'Email', 'messenger' => 'Messenger', 'instagram' => 'Instagram DM', 'whatsapp' => 'WhatsApp', 'viber' => 'Viber', 'phone' => 'Τηλέφωνο', 'live_chat' => 'Live Chat (στο site)', 'combination' => 'Συνδυασμός'] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="checkbox"
                                name="channels[]"
                                value="{{ $value }}"
                                {{ in_array($value, old('channels', $data['channels'] ?? [])) ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 rounded focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('channels')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- AI Assistant Integration Goal --}}
            <div>
                <label for="integration_goal" class="block text-sm font-medium text-white mb-3">
                    {{ __('In which of the above would you like the AI Assistant to be integrated? And how do you think its function should be?') }}
                </label>
                <textarea
                    id="integration_goal"
                    name="integration_goal"
                    rows="6"
                    class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                    placeholder="{{ __('Describe your integration goals...') }}"
                >{{ old('integration_goal', $data['integration_goal'] ?? '') }}</textarea>
                @error('integration_goal')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-between">
            <a
                href="{{ route('detailed-form.step2.show') }}"
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

