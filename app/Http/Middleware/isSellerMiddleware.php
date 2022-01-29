<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isSellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()) {
            if (request()->user()->hasRole('seller')) {
                return $next($request);
            } else {
                return redirect('home');
            }
        } else {
            return redirect('login');
        }
    }
}
