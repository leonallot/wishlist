<?php

namespace App\Http\Middleware;

use Closure;

class DenyAccess
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
        if(\Auth::check()){
            return [ 'status'=>'denied' ];
        }

        return [ 'status'=>'granted' ];
    }
}
