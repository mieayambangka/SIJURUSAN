<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role = 'admin'): Response
    {
        if ($request->user()->role !== $role) {
            abort(403, 'Akses ditolak, hanya admin yang bisa akses page ini');
        }

        return $next($request);
    }
}
