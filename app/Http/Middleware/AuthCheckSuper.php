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
            if(session('LoggedAdminRole')  != 'SUPER_ADMIN')
            {
                return redirect('dashboard')->with('fail', 'Only Super Admin Can Access');
            }
        }

        return $next($request);
    }
}
