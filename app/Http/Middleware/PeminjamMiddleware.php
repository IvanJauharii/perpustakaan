<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Symfony\Component\HttpFoundation\Response;

class PeminjamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'peminjam') {
            return $next($request);
        }
        // Redirect jika bukan admin
        return redirect('/')->with('error', 'peminjam tidak ditemukan');
    }
}
