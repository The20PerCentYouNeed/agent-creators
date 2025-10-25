<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AI Agents for Your Business | Custom AI Solutions</title>
        <meta name="description" content="{{ __('Transform your business with custom AI agents. Automate workflows, enhance customer service, and scale operations with intelligent automation.') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|space-grotesk:600,700" rel="stylesheet" />

        <!-- SEO: Alternate Language Links -->
        @foreach (available_locales() as $locale)
            <link rel="alternate" hreflang="{{ $locale }}" href="{{ locale_route($locale) }}" />
        @endforeach
        <link rel="alternate" hreflang="x-default" href="{{ locale_route(config('app.locale')) }}" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100 antialiased">
        <x-header />

        @yield('content')

        <x-footer />

        <!-- Smooth Scroll Script -->
        <script>
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        </script>
    </body>
</html>
