@extends('detailed-form.layout', ['currentStep' => 7])

@section('form-content')
    <form method="POST" action="{{ route('detailed-form.step7.store') }}">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-bold text-white mb-4">
                {{ __('SECTION 7: ERP / CRM & Automation') }}
            </h3>
        </div>

        <div class="space-y-6">
            {{-- Software Usage --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('Do you use any software for organizing and monitoring your business?') }}
                </label>
                <div class="space-y-3">
                    @foreach(['erp' => 'ERP', 'crm' => 'CRM', 'both' => 'Και τα δύο', 'no' => 'Όχι', 'unknown' => 'Δεν γνωρίζω'] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="radio"
                                name="software_type"
                                value="{{ $value }}"
                                {{ old('software_type', $data['software_type'] ?? '') == $value ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('software_type')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Software Name --}}
            <div>
                <label for="software_name" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('If yes, which system/s do you use?') }}
                </label>
                <input
                    type="text"
                    id="software_name"
                    name="software_name"
                    value="{{ old('software_name', $data['software_name'] ?? '') }}"
                    class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                    placeholder="{{ __('e.g., Salesforce, SAP, HubSpot') }}"
                >
                @error('software_name')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Desired Functions --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('In what functions would it interest you for the AI Assistant to help?') }}
                </label>
                <div class="space-y-3">
                    @foreach([
                        'lead_tracking' => 'Καταγραφή νέων leads στο CRM',
                        'order_updates' => 'Ενημέρωση παραγγελιών ή αποθεμάτων στο ERP',
                        'status_tracking' => 'Παρακολούθηση παραστατικών / τιμολογήσης',
                        'follow_up' => 'Υπενθυμίσεις follow-up πωλήσεων',
                        'customer_info' => 'Ενημέρωση στοιχείων πελατών',
                        'other' => 'Άλλο'
                    ] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="checkbox"
                                name="desired_functions[]"
                                value="{{ $value }}"
                                {{ in_array($value, old('desired_functions', $data['desired_functions'] ?? [])) ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 rounded focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white text-sm">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('desired_functions')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- API Access --}}
            <div>
                <label class="block text-sm font-medium text-white mb-3">
                    {{ __('Will API integration or technical approach be needed?') }}
                </label>
                <div class="space-y-3">
                    @foreach(['no' => 'Όχι', 'yes' => 'Ναι', 'unknown' => 'Δεν γνωρίζω (θα μας ενημερώσει η τεχνική μας)'] as $value => $label)
                        <label class="flex items-center gap-3 p-4 bg-white/5 border border-white/20 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                            <input
                                type="radio"
                                name="api_access"
                                value="{{ $value }}"
                                {{ old('api_access', $data['api_access'] ?? '') == $value ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-white/20 border-white/30 focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-white text-sm">{{ __($label) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('api_access')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-between">
            <a
                href="{{ route('detailed-form.step6.show') }}"
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

