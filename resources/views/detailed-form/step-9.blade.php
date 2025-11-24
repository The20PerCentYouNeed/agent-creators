@extends('detailed-form.layout', ['currentStep' => 9])

@section('form-content')
    <form method="POST" action="{{ route('detailed-form.step9.submit') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <h3 class="text-xl font-bold text-white mb-4">
                {{ __('SECTION 9: Additional Information') }}
            </h3>
        </div>

        <div class="space-y-6">
            {{-- Specific Expectations --}}
            <div>
                <label for="expectations" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Do you have any specific expectations or goals for the AI Assistant?') }}
                </label>
                <textarea
                    id="expectations"
                    name="expectations"
                    rows="5"
                    class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                    placeholder="{{ __('Your expectations and goals...') }}"
                >{{ old('expectations', $data['expectations'] ?? '') }}</textarea>
                @error('expectations')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- Other Information --}}
            <div>
                <label for="other_info" class="block text-sm font-medium text-white mb-1.5">
                    {{ __('Any other comment or information you would like to share?') }}
                </label>
                <textarea
                    id="other_info"
                    name="other_info"
                    rows="5"
                    class="form-input w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-sm text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                    placeholder="{{ __('Additional comments...') }}"
                >{{ old('other_info', $data['other_info'] ?? '') }}</textarea>
                @error('other_info')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>

            {{-- File Uploads --}}
            <div>
                <label for="additional_files" class="block text-sm font-medium text-white mb-3">
                    {{ __('If you have files that describe the procedures of your business and can guide the perfect solution, upload them here') }}
                </label>
                <div class="relative">
                    <input
                        type="file"
                        id="additional_files"
                        name="additional_files[]"
                        accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png,.gif"
                        multiple
                        class="block w-full text-sm text-white file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer bg-white/10 border border-white/30 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <p class="mt-2 text-xs text-slate-400">
                        {{ __('Max 10MB per file. Supported: PDF, DOC, DOCX, TXT, JPG, PNG, GIF. You can upload multiple files.') }}
                    </p>
                </div>
                @error('additional_files')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
                @error('additional_files.*')
                    <p class="mt-1.5 text-xs text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-between">
            <a
                href="{{ route('detailed-form.step8.show') }}"
                class="px-8 py-3 text-base font-semibold text-white bg-white/10 border border-white/20 rounded-lg hover:bg-white/20 hover:-translate-y-0.5 transition-all duration-200"
            >
                {{ __('Back') }}
            </a>
            <button
                type="submit"
                class="px-8 py-3 text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-violet-600 rounded-lg hover:from-blue-700 hover:to-violet-700 hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-blue-500/20 hover:shadow-xl hover:shadow-blue-500/30 cursor-pointer"
            >
                {{ __('Submit') }}
            </button>
        </div>
    </form>
@endsection

