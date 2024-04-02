<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckSuperadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   // app/Http/Middleware/CheckSuperadmin.php

// app/Http/Middleware/CheckSuperadmin.php

public function handle($request, Closure $next)
{
    if (Auth::check() && Auth::user()->role == 'superadmin') {
        return $next($request);
    }

    return redirect('/dashboard')->with('error', 'You do not have superadmin access.');
}


}
