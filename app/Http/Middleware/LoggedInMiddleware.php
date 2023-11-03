<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if ($user->logged_in == 1) {
                if ($user->hasRole('admin')) {
                    return redirect()->route("admin.dashboardAdmin");
                } elseif ($user->hasRole('jury')) {
                    return redirect()->route("jury.index");
                }
            } else if ($user->logged_in > 1) {
                $user->logged_in = 1;
                $user->save();
                Auth::logout();
                return redirect()->route("welcome");
            }
        }
        return $next($request);
    }
}
