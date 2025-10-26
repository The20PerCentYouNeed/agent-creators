<?php

namespace App\Http\Middleware;

use Barryvdh\Debugbar\LaravelDebugbar;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    protected $debugbar;

    public function __construct(LaravelDebugbar $debugbar)
    {
        $this->debugbar = $debugbar;
    }

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);

        if (!in_array($locale, config('app.locales'))) {
            App::setLocale(config('app.locale', 'en'));
            return $next($request);
        }

        if ($locale === config('app.locale')) {
            $segments = array_slice($request->segments(), 1);
            return redirect('/' . implode('/', $segments));
        }

        App::setLocale($locale);
        $segments = array_slice($request->segments(), 1);
        $request->setPath(implode('/', $segments));

        return $next($request);
    }
}
