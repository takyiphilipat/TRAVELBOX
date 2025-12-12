<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckForLogin
{
    public function handle($request, Closure $next)
    {
        // This condition is incorrect, but I'll fix syntax first
        if ($request->url('admins/login')) {

            if (isset(Auth::guard('admin')->user()->name)) {

                // MISSING SEMICOLON FIXED BELOW
                return redirect()->route('admin.go');
            }
        }

        return $next($request);
    }
}
