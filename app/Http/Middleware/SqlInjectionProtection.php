<?php

namespace App\Http\Middleware;

use Closure;

class SqlInjectionProtection
{
    public function handle($request, Closure $next)
    {
        $input = $request->all();

        array_walk_recursive($input, function (&$input) {
            $input = strip_tags($input);  // Remueve tags HTML y PHP del input
            $input = addslashes($input);  // Escapa caracteres especiales
        });

        $request->merge($input);

        return $next($request);
    }
}
