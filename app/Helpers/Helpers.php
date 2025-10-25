<?php

if (! function_exists('current_locale')) {
    /**
     * Get the current locale.
     */
    function current_locale(): string
    {
        return app()->getLocale();
    }
}

if (! function_exists('localized_route')) {
    /**
     * Generate a URL to a named route with locale prefix.
     */
    function localized_route(string $name, array $parameters = [], ?string $locale = null): string
    {
        $locale = $locale ?? current_locale();

        return route($name, array_merge(['locale' => $locale], $parameters));
    }
}

if (! function_exists('localized_url')) {
    /**
     * Generate a URL with locale prefix.
     */
    function localized_url(string $path = '', ?string $locale = null): string
    {
        $locale = $locale ?? current_locale();
        $path = ltrim($path, '/');

        return url("/{$locale}/{$path}");
    }
}

if (! function_exists('locale_route')) {
    /**
     * Generate URL for current route in a different locale.
     */
    function locale_route(?string $locale = null): string
    {
        $locale = $locale ?? current_locale();
        $segments = request()->segments();

        if (count($segments) > 0 && in_array($segments[0], config('app.locales', []))) {
            $segments[0] = $locale;
        } else {
            array_unshift($segments, $locale);
        }

        return url(implode('/', $segments));
    }
}

if (! function_exists('available_locales')) {
    /**
     * Get all available locales.
     */
    function available_locales(): array
    {
        return config('app.locales', ['en']);
    }
}

if (! function_exists('locale_name')) {
    /**
     * Get the display name for a locale.
     */
    function locale_name(string $locale): string
    {
        return match ($locale) {
            'en' => 'English',
            'el' => 'Ελληνικά',
            default => strtoupper($locale),
        };
    }
}
