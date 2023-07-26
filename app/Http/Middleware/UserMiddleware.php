<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Request received',['url'=>$request->url()]);
        // dd($request);
        // if (!$request->hasCookie('authentication_cookie')) {
            // if (!$request->hasCookie('user.cookie')) {
            // Redirect to a public page or login page
        //     return redirect('/user/login')->with('error', 'Please log in to access the private route.');
        // }

        return $next($request);
    }
}
