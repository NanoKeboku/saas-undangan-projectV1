<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FakeAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
