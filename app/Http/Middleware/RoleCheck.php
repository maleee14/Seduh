<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    { {
            // Check if the user is authenticated
            if (auth()->check()) {
                // Check if the user's role is in the allowed roles
                if (in_array(auth()->user()->role, $role)) {
                    return $next($request);
                }
            }

            // Redirect to a different route if the user does not have access
            return redirect()->route('home'); // or another appropriate route
        }
    }
}
