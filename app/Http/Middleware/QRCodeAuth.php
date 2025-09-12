<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QRCodeAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in via session
        if (!session('user_logged_in') || !session('user_data')) {
            return redirect()->route('index')->withErrors('Please login first to access this page.');
        }
        
        return $next($request);
    }
}
