<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoIndex
{
    /**
     * Add X-Robots-Tag headers when SEO is disabled via env.
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        $indexable = (bool) config('seo.indexable', true);

        if ($indexable === false) {
            // Apply to all responses; crawlers will respect the header for HTML and many other types.
            $response->headers->set(
                'X-Robots-Tag',
                'noindex, nofollow'
            );
        }

        return $response;
    }
}
