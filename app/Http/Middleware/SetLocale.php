<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);

        $availableLocales = config('app.locales', ['en']);

        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
            URL::defaults(['locale' => $locale]);
        } else {
            $locale = config('app.fallback_locale', 'en');
            App::setLocale($locale);
            URL::defaults(['locale' => $locale]);
        }

        return $next($request);
    }
}
