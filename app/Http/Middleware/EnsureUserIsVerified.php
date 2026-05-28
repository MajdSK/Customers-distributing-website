<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('LogIn')->with('error', 'Please log in first.');
        }

        $user = Auth::user();

        if (!$user->verified) {
            abort(403, 'Unauthorized action. Only verified users can access.');
        }
        
        return $next($request);
    }
}