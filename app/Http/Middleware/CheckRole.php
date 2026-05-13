<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // kalau role tidak sesuai
        if ($request->user()->role !== $role) {

            // optional: beda pesan sesuai role
            if ($role === 'admin') {
                abort(403, 'Akses ditolak. Halaman ini khusus King Beni.');
            }

            if ($role === 'student') {
                abort(403, 'Akses ditolak. Halaman ini khusus Jelata.');
            }

            // fallback default
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}