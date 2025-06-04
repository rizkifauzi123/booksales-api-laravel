<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{
    // ...

    protected function unauthenticated($request, array $guards)
    {
        return response()->json(['message' => 'Unauthenticated.'], 401);
    }
}
