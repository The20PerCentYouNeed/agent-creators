<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- SEO Package: Meta Tags, OpenGraph, Twitter Cards, Structured Data -->
        {!! seo($seoData ?? null) !!}

        <!-- Favicons -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicons/favicon.svg') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
        <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <meta name="msapplication-TileColor" content="#0f172a">
        <meta name="msapplication-config" content="{{ asset('browserconfig.xml') }}">
        <meta name="theme-color" content="#0f172a">

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
    <body class="bg-gray-950 text-gray-100 antialiased">
        <x-header />

        @yield('content')

        <x-footer />

        <!-- Chatbot Widget -->
        <x-chatbot />
    </body>
</html>
