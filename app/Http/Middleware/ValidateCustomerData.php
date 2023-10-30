<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Region;
use App\Models\Commune;

class ValidateCustomerData
{
    public function handle($request, Closure $next)
    {
        $region = Region::find($request->input('id_reg'));
        $commune = Commune::find($request->input('id_com'));

        if (!$region || !$commune || ($commune && $commune->id_reg != $request->input('id_reg'))) {
            return response()->json(['message' => 'Invalid region or commune data.'], 400);
        }

        return $next($request);
    }
}
