@extends('layouts.app')

@section('content')
    <section class="relative w-full lg:min-h-[680px] flex items-center mt-[50px] lg:mt-[120px] bg-gradient-to-b from-[#0f172a] to-[#1e293b] lg:bg-transparent">
        <video
            class="absolute inset-0 w-full h-full object-cover hidden lg:block"
            autoplay muted playsinline loop preload="auto"
            poster="{{ asset('storage/images/poster.jpg') }}">
            <source src='{{ asset('storage/videos/home-page-video.webm') }}' type='video/webm' media='(min-width:1024px)'>
            <source src='{{ asset('storage/videos/home-page-video-2.mp4') }}'  type='video/mp4'  media='(min-width:1024px)'>
        </video>
        <div class="absolute inset-0 bg-transparent lg:bg-black/40"></div>
        <div class="relative z-10 w-full max-w-[1440px] mx-auto px-6 py-20">
            <div class="flex flex-col max-w-5xl items-start justify-center">
                <h1 class="text-white text-4xl sm:text-5xl lg:text-7xl font-semibold leading-tight max-w-5xl">
                    {{ __('Hire AI agent creators to build custom agents for you') }}
                </h1>

                <div class="w-full mt-8 max-w-[95%] sm:max-w-3xl lg:max-w-5xl">
                    <form action="{{ route('home') }}" method="GET">
                        <div class="group relative flex items-center w-full">
                            <input
                                type="text"
                                name="q"
                                placeholder="{{ __("Try: 'Shopify support bot', 'Lead-qualifying agent', 'Research + summarization'") }}"
                                class="w-full pl-6 pr-16 py-4 rounded-full border border-black/15 bg-white text-black placeholder-black/40 focus:outline-none focus:border-black focus:ring-black focus:ring-offset-0 shadow-inner shadow-black/5 transition"
                            >
                            <button type="submit"
                                    class="absolute right-1 h-[48px] w-[48px] rounded-full bg-black text-white grid place-items-center hover:bg-gray-800 transition-colors">
                                @svg('heroicon-o-magnifying-glass', 'h-6 w-6')
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-6 hidden lg:flex flex-wrap gap-3">
                    @php($chips = [
                        'Answer support tickets',
                        'Qualify leads 24/7',
                        'Scrape and summarize websites',
                        'Automate CRM updates',
                        'Generate product descriptions',
                        'Shopify FAQ bot',
                        'Back-office automations'
                    ])
                    @foreach($chips as $chip)
                        <a href="{{ url('/?q='.rawurlencode($chip)) }}" class="inline-flex items-center gap-2 text-white/90 hover:text-white rounded-full border border-white/30 bg-black/20 px-4 py-2 backdrop-blur">
                            <span>{{ $chip }}</span>
                            <span class="inline-block">→</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="w-full max-w-[1440px] mx-auto px-6 mt-10 lg:mt-16 lg:h-[420px]">
        <div class="rounded-3xl bg-rose-50 px-8 sm:px-12 py-12 sm:py-16 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <div class="text-2xl font-bold text-black mb-3">{{ __('How it works') }}</div>
                <h3 class="text-3xl sm:text-5xl font-semibold text-black leading-tight">{{ __('Bring your AI agent idea to life') }}</h3>
                <p class="mt-4 text-black/70 text-base sm:text-lg">{{ __('Choose a service, match with vetted creators, and launch with confidence. No templates required—just experts who build the right agent for your needs.') }}</p>
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <a href="{{ url('/projects/new') }}" class="inline-flex items-center gap-2 bg-black text-white hover:bg-gray-900 px-5 py-3 rounded-xl font-medium">
                        {{ __('Browse creators') }}
                        <span>→</span>
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class=" rounded-2xl bg-white shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-black/10 p-6">
                    <ol class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <li class="rounded-xl p-4 bg-rose-100">
                            <div class="text-sm font-semibold text-rose-700">{{ __('Step 1') }}</div>
                            <div class="mt-1 text-black font-medium">{{ __('Describe your goal') }}</div>
                            <div class="mt-1 text-black/60 text-sm">{{ __('Share use case, stack, budget, and timeline.') }}</div>
                        </li>
                        <li class="rounded-xl p-4 bg-rose-100">
                            <div class="text-sm font-semibold text-rose-700">{{ __('Step 2') }}</div>
                            <div class="mt-1 text-black font-medium">{{ __('Match with creators') }}</div>
                            <div class="mt-1 text-black/60 text-sm">{{ __('Review portfolios, proposals, and references.') }}</div>
                        </li>
                        <li class="rounded-xl p-4 bg-rose-100">
                            <div class="text-sm font-semibold text-rose-700">{{ __('Step 3') }}</div>
                            <div class="mt-1 text-black font-medium">{{ __('Build and launch') }}</div>
                            <div class="mt-1 text-black/60 text-sm">{{ __('Milestones, demos, and secure payment.') }}</div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full max-w-[1440px] mx-auto px-6 mt-10 lg:mt-16">
        <div class="flex items-center justify-center rounded-3xl bg-gradient-to-br from-emerald-600 via-teal-600
        to-cyan-600 text-white px-8 sm:px-12 py-14 sm:py-16 lg:h-[420px]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <h3 class="text-3xl sm:text-5xl font-semibold leading-tight">{{ __('Become an AI Agent Creator') }}</h3>
                    <p class="mt-4 text-white/90 text-base sm:text-lg">{{ __('Get matched with real businesses, build production agents, and grow your income with a community that cares about quality and outcomes.') }}</p>
                    <div class="mt-6 flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 bg-white text-black hover:bg-gray-100 px-5 py-3 rounded-xl font-medium">
                            {{ __('Start creating') }}
                            <span>→</span>
                        </a>
                        <a href="{{ url('/creator-handbook') }}" class="inline-flex items-center gap-2 bg-white/10 text-white hover:bg-white/20 px-5 py-3 rounded-xl font-medium ring-1 ring-white/30">
                            {{ __('Creator handbook') }}
                            <span>→</span>
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="rounded-2xl bg-white/10 ring-1 ring-white/20 p-4">
                        <div class="text-sm font-semibold">{{ __('Verified leads') }}</div>
                        <div class="mt-1 text-sm text-white/90">{{ __('Work with clients who are ready to build and ship.') }}</div>
                    </div>
                    <div class="rounded-2xl bg-white/10 ring-1 ring-white/20 p-4">
                        <div class="text-sm font-semibold">{{ __('Escrow & milestones') }}</div>
                        <div class="mt-1 text-sm text-white/90">{{ __('Get paid securely as you deliver value.') }}</div>
                    </div>
                    <div class="rounded-2xl bg-white/10 ring-1 ring-white/20 p-4">
                        <div class="text-sm font-semibold">{{ __('Portfolio & demos') }}</div>
                        <div class="mt-1 text-sm text-white/90">{{ __('Showcase projects and interactive agent demos.') }}</div>
                    </div>
                    <div class="rounded-2xl bg-white/10 ring-1 ring-white/20 p-4">
                        <div class="text-sm font-semibold">{{ __('Community & events') }}</div>
                        <div class="mt-1 text-sm text-white/90">{{ __('Join workshops, AMAs, and a supportive creator network.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full max-w-[1440px] mx-auto px-6 mt-10 lg:mt-16 lg:h-[420px]">
        <div class="rounded-3xl bg-gradient-to-br from-[#9B1C74] to-[#C63D5B] text-white px-8 sm:px-12 py-14 sm:py-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div>
                <h3 class="text-3xl sm:text-5xl font-semibold leading-tight">{{ __('Stuck on an agent build?') }}</h3>
                <p class="mt-4 text-white/85 text-base sm:text-lg">{{ __('Get matched with the right creator to turn your prototype into a real, working product — complete with integrations, evals and deployment.') }}</p>
                <a href="{{ url('/?browse=all') }}" class="mt-6 inline-flex items-center gap-2 bg-white text-black hover:bg-gray-100 px-5 py-3 rounded-xl font-medium">
                    {{ __('Find an expert') }}
                    <span>→</span>
                </a>
            </div>
            <div class="relative">
                <div class="rounded-2xl bg-white/10 backdrop-blur ring-1 ring-white/20 p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                        <div class="rounded-lg bg-white p-4 text-black">
                            <div class="text-xs font-semibold text-[#9B1C74] uppercase tracking-wide">{{ __('Discover AI Agent Expertise') }}</div>
                            <div class="mt-1 text-sm text-black/80">
                                {{ __('Browse creators who specialize in custom AI agents for customer support, automation, research, e-commerce, and beyond.') }}
                            </div>
                        </div>

                        <div class="rounded-lg bg-white p-4 text-black">
                            <div class="text-xs font-semibold text-[#9B1C74] uppercase tracking-wide">{{ __('Match by Skills & Platforms') }}</div>
                            <div class="mt-1 text-sm text-black/80">
                                {{ __('Find the perfect creator based on their tech stack, frameworks, and platform experience.') }}
                            </div>
                            <div class="mt-2 flex flex-wrap gap-1.5">
                                @foreach(['OpenAI','Claude','LangChain','Flowise','Zapier','Shopify'] as $tag)
                                    <span class="px-2 py-0.5 rounded-md bg-black/5 text-black/70 text-[11px] border border-black/10">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="rounded-lg bg-white p-4 text-black">
                            <div class="text-xs font-semibold text-[#9B1C74] uppercase tracking-wide">{{ __('Hire & Build Fast') }}</div>
                            <div class="mt-1 text-sm text-black/80">
                                {{ __('Chat with creators, review their work, set milestones, and launch your AI agent—ready to integrate into your business.') }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
