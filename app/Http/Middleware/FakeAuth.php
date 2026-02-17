<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FakeAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah session is_logged_in ada dan true
        if (! session('is_logged_in')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
