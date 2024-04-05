<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RateLimitMiddleware
{
    public function handle($request, Closure $next)
    {
        $key = 'rate_limit_' . $request->ip();

        if (Session::has($key)) {
            return response()->json(['error' => 'Rate limit exceeded'], 429);
        }

        Session::put($key, true);

        return $next($request);
    }
}
