<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckReCAPTCHAVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $resp = $next($request);

        if (!session('recaptcha_verified') && !$request->routeIs('recaptcha.verify')) {
            return redirect()->route('recaptcha.verify');
        }

        return $resp;
    }
}
