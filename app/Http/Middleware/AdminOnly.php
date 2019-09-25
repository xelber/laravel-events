<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminOnly
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
        if ( !Auth::check() ) // We might be able to remove this as 'auth' is added to routes group
        {
            return route('login');
        }

        if ( !Gate::allows('admin-only') )
        {
            return redirect('/');
        }

        return $next($request);
    }
}
