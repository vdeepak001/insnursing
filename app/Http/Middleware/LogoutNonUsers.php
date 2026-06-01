<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogoutNonUsers
{
    /**
     * Handle an incoming request. If an administrative user visits a frontend route, log them out.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role_type !== 'user') {
            // Check if the current request is for a frontend route (NOT admin/dashboard routes)
            if (! $request->is('super-admin*') && 
                ! $request->is('admin*') && 
                ! $request->is('support*') && 
                ! $request->is('sme*') && 
                ! $request->is('dashboard*') && 
                ! $request->is('profile*') && 
                ! $request->is('change-password*') && 
                ! $request->is('logout') &&
                ! $request->is('livewire*')) {
                
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                return redirect()->to('/');
            }
        }

        return $next($request);
    }
}
