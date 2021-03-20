<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyLoggedIn
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
        if (session()->has('LoggedMember') && (url('login') == $request->url())){
            return redirect('member');
        }
        if(session()->has('LoggedAdmin') && (url('login/admin') == $request->url())){
            return redirect('dashboard');
        }
        if (session()->has('LoggedMember') && (url('login/admin') == $request->url())){
            return redirect('member');
        }
        if(session()->has('LoggedAdmin') && (url('login') == $request->url())){
            return redirect('dashboard');
        }
        return $next($request);
    }
}
