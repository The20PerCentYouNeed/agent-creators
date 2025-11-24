@extends('layouts.app')

@section('content')
    <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950">
        <div class="max-w-4xl mx-auto">
            {{-- Progress Indicator --}}
            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-2xl md:text-3xl font-bold text-white">
                        {{ __('AI Assistant Questionnaire') }}
                    </h2>
                    <span class="text-blue-200 text-sm font-medium">
                        {{ __('Step') }} {{ $currentStep }} {{ __('of') }} 9
                    </span>
                </div>

                {{-- Progress Bar --}}
                <div class="w-full bg-white/10 rounded-full h-2 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-violet-600 h-2 transition-all duration-500 ease-out"
                         style="width: {{ ($currentStep / 9) * 100 }}%">
                    </div>
                </div>
            </div>

            {{-- Form Card --}}
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 shadow-2xl">
                @yield('form-content')
            </div>
        </div>
    </section>
@endsection

