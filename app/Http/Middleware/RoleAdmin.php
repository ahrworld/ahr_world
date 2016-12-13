<?php

namespace App\Http\Middleware;
use Gate;
use Illuminate\Support\Facades\Auth;
use Closure;

class RoleAdmin
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
        if (Gate::denies('admin')) {
            return redirect('/');
        }
        return $next($request);
    }
}
