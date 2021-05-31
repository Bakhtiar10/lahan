<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role_id;
            switch ($role) {
                case 1:
                    return redirect()->route('admin.beranda');
                    break;
                case 2:
                    return redirect()->route('penjual.beranda');
                    break;
                case 3 :
                    return redirect()->route('pembeli.beranda');
                    break;
                default:
                    return redirect()->route('admin.beranda');
                    break;
            }
        }
        return $next($request);
    }
}