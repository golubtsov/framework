<?php

namespace framework;

use Closure;
use Framework\Http\Request;

class Middleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
