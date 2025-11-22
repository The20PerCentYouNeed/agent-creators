<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetectNewSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('should_auto_open_chatbot')) {
            session()->forget('should_auto_open_chatbot');
        }

        if (!session()->has('chatbot_auto_opened')) {
            session()->flash('should_auto_open_chatbot', true);
            session()->put('chatbot_auto_opened', true);
        }

        return $next($request);
    }
}
