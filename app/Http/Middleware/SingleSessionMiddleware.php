<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class SingleSessionMiddleware extends Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        if (Auth::check()) {
            // $user = Auth::user();
            // $sessionKey = 'user_session_' . $user->id;

            // if (Cache::has($sessionKey)) {
            //     // If a session key is found, that means the user is already logged in somewhere else
            //     Auth::logout();
            //     return redirect()->route('welcome')->with('error', 'You can only have one active session at a time.');
            // }

            // // Set a cache entry to track the user's session
            // Cache::put($sessionKey, true, now()->addMinutes(20));
        }


        return $next($request);
    }
}
