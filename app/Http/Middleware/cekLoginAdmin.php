<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekLoginAdmin
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
        if(!session("admin")){
            return redirect("/");
        }
        return $next($request);
    }
}
