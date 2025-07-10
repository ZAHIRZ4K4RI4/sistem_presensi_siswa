<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|array  $roles  // Parameter roles yang dilewatkan dari rute (misal 'admin', 'guru')
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login'); // Arahkan ke halaman login jika belum login
        }

        $user = Auth::user(); // Dapatkan objek pengguna yang sedang login

        // Periksa apakah pengguna memiliki salah satu peran yang diizinkan
        // Asumsi model User Anda memiliki kolom 'role'
        if (in_array($user->role, $roles)) {
            return $next($request); // Lanjutkan permintaan jika peran sesuai
        }

        // Jika peran tidak sesuai, arahkan ke halaman yang tidak diizinkan atau dashboard
        // Anda bisa membuat halaman 'unauthorized.blade.php' atau redirect ke home
        return redirect('/home')->with('error', 'Anda tidak memiliki akses untuk halaman ini.');
        // Atau: abort(403, 'Unauthorized action.');
    }
}

