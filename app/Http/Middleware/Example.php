<?php

namespace App\Http\Middleware;

use Closure;

class Example 
{
    public function handle($request, Closure $next)
    {
        //se define la condicion
        if (true) {
            # code...
            return $next($request);
        }
        return response('No puedes continuar',404);
    }
}
