<?php

namespace App\Http\Middleware;

use Closure;

class AdministrartorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if($user->isAdministrator()){
            return $next($request);
        }
        return view("errors.401");

    }
}
