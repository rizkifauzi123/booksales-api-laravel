<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login dan punya role admin
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') { // sesuaikan dengan atribut role di model Admin/User kamu
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}
