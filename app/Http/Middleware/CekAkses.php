<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->guest('/login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        if (in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        return redirect("/")->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }
}
