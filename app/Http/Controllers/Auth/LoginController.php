<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; // Tambahan: Jika Anda ingin memanggil Auth::logout() di luar trait

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware 'guest' mencegah pengguna yang sudah login mengakses halaman login/register
        $this->middleware('guest')->except('logout');

        // Middleware 'auth' memastikan hanya pengguna yang terotentikasi yang dapat melakukan logout
        // Ini adalah praktek standar yang disediakan oleh Laravel UI/Breeze/Jetstream
        $this->middleware('auth')->only('logout');
    }

    /**
     * Metode ini akan dipanggil setelah user berhasil login.
     * Anda bisa mengoverride metode `redirectPath()` dari trait AuthenticatesUsers
     * untuk mengarahkan user berdasarkan role mereka.
     *
     * @return string
     */
    protected function redirectTo()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                    return '/admin/dashboard'; // Atau ke route khusus admin
                    break;
                case 'guru':
                    return '/guru/dashboard';   // Atau ke route khusus guru
                    break;
                case 'karyawan_tu':
                    return '/karyawan_tu/dashboard'; // Atau ke route khusus tata usaha
                    break;
                default:
                    return '/home'; // Default jika role tidak ditemukan atau tidak cocok
                    break;
            }
        }
        return '/login'; // Jika somehow tidak terautentikasi (seharusnya tidak terjadi setelah login sukses)
    }

    // Jika Anda juga ingin mengelola logout secara manual, meskipun trait AuthenticatesUsers sudah menanganinya
    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/'); // Redirect ke halaman utama setelah logout
    // }
}