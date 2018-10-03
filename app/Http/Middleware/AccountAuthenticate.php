<?php

namespace App\Http\Middleware;

use Closure;

class AccountAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session('user')) {
            return redirect('admin/');
        }
        return $next($request);
    }
}
