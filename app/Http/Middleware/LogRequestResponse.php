<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogRequestResponse
{
    public function handle(Request $request, Closure $next)
    {
        if (config('app.debug') || env('LOG_INPUT', true)) {
            \Log::info('IP: ' . $request->ip() . ' | Request: ' . json_encode($request->all()));
        }

        $response = $next($request);

        if (config('app.debug') || env('LOG_OUTPUT', true)) {
            \Log::info('Response: ' . json_encode($response->getContent()));
        }

        return $response;
    }
}
