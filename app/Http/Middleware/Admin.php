<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin = auth()->user();
        if ($admin->type == 'admin') {
            return $next($request);
        }
        return abort(404);
    }
}
