<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MiMiddlaware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->email == 'admin@admin.com'){
            return $next($request);
        }else{
            return redirect('/no-autorizado');
        }
    }
}
