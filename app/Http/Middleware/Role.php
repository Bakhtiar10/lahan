<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, String $role)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        
        // $user = Auth::user();
        // if($user->role_id === $role){
        //     return $next($request);
        // }
        return redirect()->route('login');
    }
}
