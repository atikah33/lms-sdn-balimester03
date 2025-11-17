<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        if(!auth()->user()->is_active){
            auth()->logout();
            return redirect()->route('login')->with('error', 'Akun anda tidak aktif. Hubungi administrator!');
        }

        // Get user role
        $userRole = auth()->user()->role;
        
        if(!in_array($userRole, $roles)){
            abort(403, 'ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI');
        }
        return $next($request);
    }
}
