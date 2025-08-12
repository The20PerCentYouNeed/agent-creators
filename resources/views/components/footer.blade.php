@if($footer)
<footer class="w-full border-t border-black/10 bg-white mt-20">
    <div class="max-w-[1440px] mx-auto px-6 py-12 lg:py-16">
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8">
            <div>
                <h3 class="text-sm font-semibold text-black/70 mb-3">{{ __('Categories') }}</h3>
                <ul class="space-y-2 text-sm">
                    @forelse(collect($topLevelCategories ?? [])->take(16) as $cat)
                        <li>
                            <a href="{{ url('/?category='.$cat->slug) }}" class="text-black/70 hover:text-black">{{ $cat->name }}</a>
                        </li>
                    @empty
                        <li class="text-black/50">{{ __('No categories yet') }}</li>
                    @endforelse
                    <li class="pt-2"><a href="{{ url('/?browse=all') }}" class="text-black hover:underline">{{ __('All services') }}</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-black/70 mb-3">{{ __('For Clients') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('/how-it-works') }}" class="text-black/70 hover:text-black">{{ __('How it works') }}</a></li>
                    <li><a href="{{ url('/use-cases') }}" class="text-black/70 hover:text-black">{{ __('Use cases & playbooks') }}</a></li>
                    <li><a href="{{ url('/trust-safety') }}" class="text-black/70 hover:text-black">{{ __('Trust & safety') }}</a></li>
                    <li><a href="{{ url('/pricing') }}" class="text-black/70 hover:text-black">{{ __('Pricing & billing') }}</a></li>
                    <li><a href="{{ url('/guides/buyers') }}" class="text-black/70 hover:text-black">{{ __('Buyer guides') }}</a></li>
                    <li><a href="{{ url('/faq') }}" class="text-black/70 hover:text-black">{{ __('FAQ') }}</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-black/70 mb-3">{{ __('For Creators') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('/become-a-creator') }}" class="text-black/70 hover:text-black">{{ __('Become an AI agent creator') }}</a></li>
                    <li><a href="{{ url('/creator-handbook') }}" class="text-black/70 hover:text-black">{{ __('Creator handbook') }}</a></li>
                    <li><a href="{{ url('/community') }}" class="text-black/70 hover:text-black">{{ __('Community hub') }}</a></li>
                    <li><a href="{{ url('/events') }}" class="text-black/70 hover:text-black">{{ __('Events & workshops') }}</a></li>
                    <li><a href="{{ url('/api') }}" class="text-black/70 hover:text-black">{{ __('API & integrations') }}</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-black/70 mb-3">{{ __('Business Solutions') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('/enterprise') }}" class="text-black/70 hover:text-black">{{ __('Enterprise') }}</a></li>
                    <li><a href="{{ url('/managed') }}" class="text-black/70 hover:text-black">{{ __('Managed projects') }}</a></li>
                    <li><a href="{{ url('/ai-matching') }}" class="text-black/70 hover:text-black">{{ __('AI-powered matching') }}</a></li>
                    <li><a href="{{ url('/security') }}" class="text-black/70 hover:text-black">{{ __('Security & compliance') }}</a></li>
                    <li><a href="{{ url('/contact-sales') }}" class="text-black/70 hover:text-black">{{ __('Contact sales') }}</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-black/70 mb-3">{{ __('Company') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('/about') }}" class="text-black/70 hover:text-black">{{ __('About') }}</a></li>
                    <li><a href="{{ url('/careers') }}" class="text-black/70 hover:text-black">{{ __('Careers') }}</a></li>
                    <li><a href="{{ url('/blog') }}" class="text-black/70 hover:text-black">{{ __('Blog') }}</a></li>
                    <li><a href="{{ url('/terms') }}" class="text-black/70 hover:text-black">{{ __('Terms of Service') }}</a></li>
                    <li><a href="{{ url('/privacy') }}" class="text-black/70 hover:text-black">{{ __('Privacy Policy') }}</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-black/70 hover:text-black">{{ __('Contact') }}</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-10 flex flex-col lg:flex-row items-center justify-between gap-4 border-t border-black/10 pt-6">
            <div class="flex items-center gap-2">
                <x-logo class="w-24 h-auto" />
                <span class="text-sm text-black/60">© {{ date('Y') }} {{ config('app.name') }}</span>
            </div>
            <div class="flex items-center gap-4 text-black/70">
                <a href="https://x.com" target="_blank" rel="noopener" aria-label="X" class="hover:text-black">X</a>
                <a href="https://linkedin.com" target="_blank" rel="noopener" aria-label="LinkedIn" class="hover:text-black">LinkedIn</a>
                <a href="https://github.com" target="_blank" rel="noopener" aria-label="GitHub" class="hover:text-black">GitHub</a>
            </div>
        </div>
    </div>
</footer>
@endif

