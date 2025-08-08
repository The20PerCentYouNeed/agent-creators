@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center mt-30">
        <h1 class="text-white text-4xl font-bold">{{ __('Test webhook to the AI Chatbot Builder') }}</h1>
        <a
        href="#"
        class="text-xl inline-block px-6 py-2 rounded-full bg-emerald-400 text-black hover:bg-emerald-300 transition-colors mt-8">
        {{ __('Try It Now') }}
    </a>
    </div>
@endsection
