<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Jika pengguna sudah login, lanjutkan permintaan
            return $next($request);
        }

        // Jika sesi login berakhir, redirect ke halaman login
        return redirect('/login')->with('error', 'Sesi login berakhir. Silakan login kembali.');
    }
}
