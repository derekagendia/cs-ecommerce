<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureShopIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return string
     */
    public function handle(Request $request, Closure $next)
    {
        if(isset(auth()->user()->shop) && auth()->user()->shop->is_active && (auth()->user()->shop->user_id == auth()->user()->id))
            return $next($request);

        return redirect('home');
    }
}
