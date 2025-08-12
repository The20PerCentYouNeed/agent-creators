@extends('layouts.app')

@section('meta')
    <meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
    <main class="w-full max-w-[960px] mx-auto px-6 mt-[80px] lg:mt-[200px]">
        <div class="rounded-3xl border border-black/10 bg-white p-10 lg:p-14 shadow-[0_10px_40px_rgba(0,0,0,0.04)] text-center">
            <div class="mx-auto w-16 h-16 rounded-2xl bg-black text-white grid place-items-center mb-6">
                @svg('heroicon-o-rocket-launch', 'w-8 h-8')
            </div>
            <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight">{{ __('Coming soon') }}</h1>
            <p class="mt-3 text-black/70 text-base sm:text-lg">
                {{ __('We’re building this page. Check back shortly — or head to the homepage to browse creators and services in the meantime.') }}
            </p>
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 bg-black text-white hover:bg-gray-900 px-5 py-3 rounded-xl font-medium">
                    {{ __('Back to homepage') }}
                    <span>→</span>
                </a>
                <a href="{{ url('/?browse=all') }}" class="inline-flex items-center gap-2 border border-black/20 hover:border-black px-5 py-3 rounded-xl font-medium">
                    {{ __('Browse all services') }}
                    <span>→</span>
                </a>
            </div>
        </div>
    </main>
@endsection


