<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;

class AuthCheckSuper
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if (!(session()->has('LoggedAdmin')))
        {
            return redirect('login/admin')->with('fail', 'You must logged in');
        }
        elseif (session()->has('LoggedAdmin'))
        {
            if(session('LoggedAdminType')  != true)
            {
                return redirect('a/dashboard')->with('fail', 'Only Super Admin Can Access');
            }
        }

        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires', 'Sat 01 Jan 1990 00:00');
    }
}
