<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class admin
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
        //check user if  login and this user is admin or not
        if(Auth::check() && Auth::user()->isRole()=="admin"){
            // if this user really admin then redirect to their home
            return $next($request);
        }
            return redirect('login'); //if this is not company the redirect to login
    }
}
