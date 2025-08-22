<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RoleMiddleware
{
    
    public function handle(Request $request, Closure $next, $role)
    {
        $user = session('user');

        if (!$user || $user->role !== $role) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
        
    }
}
